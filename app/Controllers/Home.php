<?php

namespace App\Controllers;
use App\Libraries\Hash;
class Home extends BaseController
{
    private $db;
    public function __construct()
    {
        $this->db = db_connect();
    }

    //admin authentication
    public function Auth()
    {
        return view('auth');
    }

    public function Authentication()
    {
        $logsModel = new \App\Models\logsModel();
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');

        $validation = $this->validate([
            'username'=>'required',
            'password'=>'min_length[8]|max_length[12]'
        ]);
        if(!$validation)
        {
            session()->setFlashdata('fail','Invalid Username or Password!');
            return redirect()->to('/auth')->withInput();
        }
        else
        {
            $builder = $this->db->table('tblaccount');
            $builder->select('*');
            $builder->WHERE('username',$username)->WHERE('Status',1);
            $data = $builder->get();
            if($row = $data->getRow())
            {
                $check_password = Hash::check($password, $row->password);
                if(empty($check_password) || !$check_password)
                {
                    session()->setFlashdata('fail','Invalid username or password');
                    return redirect()->to('/auth')->withInput();
                }
                else
                {
                    session()->set('loggedUser', $row->accountID);
                    session()->set('sess_fullname', $row->Fullname);
                    session()->set('sess_role',$row->systemRole);
                    //save the logs
                    $values = [
                        'Date'=>date('Y-m-d'),'Time'=>date('h:i:s a'),'accountID'=>$row->accountID,'Activity'=>'Logged In'
                    ];
                    $logsModel->save($values);
                    return redirect()->to('admin/dashboard');
                }
            }
            else
            {
                session()->setFlashdata('fail','Account is disabled. Please contact the Administrator');
                return redirect()->to('/auth')->withInput();
            }
        }
    }

    public function checkAccount()
    {
        $username = $this->request->getPost('email');
        $password = $this->request->getPost('password');

        $validation = $this->validate([
            'email'=>'required|valid_email',
            'password'=>'min_length[8]|max_length[12]'
        ]);
        if(!$validation)
        {
            session()->setFlashdata('fail','Invalid Username or Password!');
            return redirect()->to('/sign-in')->withInput();
        }
        else
        {
            $builder = $this->db->table('tblcustomer');
            $builder->select('*');
            $builder->WHERE('Email',$username)->WHERE('Status',1);
            $data = $builder->get();
            if($row = $data->getRow())
            {
                $check_password = Hash::check($password, $row->Password);
                if(empty($check_password) || !$check_password)
                {
                    session()->setFlashdata('fail','Invalid username or password');
                    return redirect()->to('/sign-in')->withInput();
                }
                else
                {
                    session()->set('sess_id', $row->customerID);
                    session()->set('sess_fullname', $row->Fullname);
                    session()->set('customer_email',$row->Email);
                    return redirect()->to('customer/dashboard');
                }
            }
            else
            {
                session()->setFlashdata('fail','Account is disabled. Please contact the PetLigo IT Support');
                return redirect()->to('/sign-in')->withInput();
            }
        }
    }

    public function logout()
    {
        if(session()->has('loggedUser'))
        {
            session()->remove('loggedUser');
            return redirect()->to('/auth?access=out')->with('fail', 'You are logged out!');
        }
    }

    public function signOut()
    {
        if(session()->has('customer_email'))
        {
            session()->remove('customer_email');
            session()->remove('sess_id');
            return redirect()->to('/sign-in?access=out')->with('fail', 'You are logged out!');
        }
    }
    
    //admin template

    public function Dashboard()
    {
        return view('admin/index');
    }

    public function Maintenance()
    {
        if(session()->get('sess_role')!="Administrator")
        {
            return redirect()->back();
        }
        else
        {
            $builder = $this->db->table('tblaccount');
            $builder->select('*');
            $account = $builder->get()->getResult();
            //fee
            $builder = $this->db->table('tblfee a');
            $builder->select('a.Title,a.Description,a.Charge,a.feeID');
            $fee = $builder->get()->getResult();
            //discount
            $builder = $this->db->table('tbldiscount a');
            $builder->select('a.*,b.Title');
            $builder->join('tblfee b','b.feeID=a.feeID','LEFT');
            $discount = $builder->get()->getResult();
            //services
            $builder = $this->db->table('tblservices');
            $builder->select('*');
            $services = $builder->get()->getResult();
            //categories
            $builder = $this->db->table('tblcategory');
            $builder->select('*');
            $category = $builder->get()->getResult();

            $data = ['account'=>$account,'fee'=>$fee,'discount'=>$discount,'services'=>$services,'category'=>$category,];
            return view('admin/maintenance',$data);
        }
    }

    public function newAccount()
    {
        if(session()->get('sess_role')!="Administrator")
        {
            return redirect()->back();
        }
        else
        {
            return view('admin/new-account');
        }
    }

    public function addAccount()
    {
        $accountModel = new \App\Models\accountModel();
        //data
        $fullname = $this->request->getPost('fullname');
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');
        $defaultPassword = Hash::make($password);
        $role = $this->request->getPost('role');
        $status = 1;$date = date('Y-m-d');
        $validation = $this->validate([
            'fullname'=>'required','username'=>'required','password'=>'required','role'=>'required'
        ]);
        if(!$validation)
        {
            session()->setFlashdata('fail','Invalid! Please fill in the form to continue');
            return redirect()->to('admin/new-account')->withInput();
        }
        else
        {
            $values = ['username'=>$username, 'password'=>$defaultPassword,'Fullname'=>$fullname,'Status'=>$status,'systemRole'=>$role,'DateCreated'=>$date];
            $accountModel->save($values);
            session()->setFlashdata('success','Great! Successfully registered');
            return redirect()->to('admin/maintenance')->withInput();
        }
    }

    public function Edit($id=null)
    {
        if(session()->get('sess_role')!="Administrator")
        {
            return redirect()->back();
        }
        else
        {
            $accountModel = new \App\Models\accountModel();
            $account = $accountModel->WHERE('accountID',$id)->first();
            $data = ['account'=>$account,];
            return view('admin/edit-account',$data);
        }
    }

    public function updateAccount()
    {
        $accountModel = new \App\Models\accountModel();
        //data
        $accountID = $this->request->getPost('accountID');
        $fullname = $this->request->getPost('fullname');
        $username = $this->request->getPost('username');
        $role = $this->request->getPost('role');
        $status = $this->request->getPost('status');
        $validation = $this->validate([
            'fullname'=>'required','username'=>'required','role'=>'required'
        ]);
        if(!$validation)
        {
            session()->setFlashdata('fail','Invalid! Please fill in the form to continue');
            return redirect()->to('admin/edit/'.$accountID)->withInput();
        }
        else
        {
            $values = ['username'=>$username,'Fullname'=>$fullname,'Status'=>$status,'systemRole'=>$role];
            $accountModel->update($accountID,$values);
            session()->setFlashdata('success','Great! Successfully updated');
            return redirect()->to('admin/maintenance')->withInput();
        }
    }

    public function allProducts()
    {
        $builder = $this->db->table('tblproduct');
        $builder->select('*');
        $builder->groupBy('productID');
        $product = $builder->get()->getResult();
        $data = ['products'=>$product];
        return view('admin/products',$data);
    }

    public function newProduct()
    {
        $builder = $this->db->table('tblcategory');
        $builder->select('*');
        $category = $builder->get()->getResult();
        $data = ['category'=>$category];
        return view('admin/new-product',$data);
    }

    public function editProduct($id=null)
    {
        $productModel = new \App\Models\productModel();
        $product = $productModel->WHERE('productID',$id)->first();
        $data = ['product'=>$product];
        return view('admin/edit-product',$data);
    }

    public function updateProduct()
    {
        $productModel = new \App\Models\productModel();
        //data
        $productID = $this->request->getPost('productID');
        $productName = $this->request->getPost('productName');
        $desc = $this->request->getPost('description');
        $qty = $this->request->getPost('qty');
        $unitPrice = $this->request->getPost('unitPrice');
        $itemUnit = $this->request->getPost('itemUnit');
        $file = $this->request->getFile('files');
        $originalName = $file->getClientName();
        //validate
        $validation = $this->validate([
            'productName'=>'required','qty'=>'required','unitPrice'=>'required','itemUnit'=>'required'
        ]);
        if(!$validation)
        {
            session()->setFlashdata('fail','Invalid! Please fill in the form to continue');
            return redirect()->to('admin/edit-product/'.$productID)->withInput();
        }
        else
        {
            if($file->isValid() && ! $file->hasMoved())
            {
                $file->move('Images/',$originalName);
                //save the data
                $values= [
                    'productName'=>$productName, 'Description'=>$desc,'Image'=>$originalName,'ItemUnit'=>$itemUnit,'Qty'=>$qty,'UnitPrice'=>$unitPrice,
                ];
                $productModel->update($productID,$values);

                session()->setFlashdata('success','Great! Successfully updated');
                return redirect()->to('admin/products')->withInput();
            }
            else
            {
                session()->setFlashdata('fail','Error! Something went wrong');
                return redirect()->to('admin/edit-product/'.$productID)->withInput();
            }
        }
    }

    public function saveProduct()
    {
        $productModel = new \App\Models\productModel();
        //data
        $product_type = $this->request->getPost('product_type');
        $category = $this->request->getPost('category');
        $productName = $this->request->getPost('productName');
        $desc = $this->request->getPost('description');
        $qty = $this->request->getPost('qty');
        $unitPrice = $this->request->getPost('unitPrice');
        $itemUnit = $this->request->getPost('itemUnit');
        $file = $this->request->getFile('files');
        $originalName = $file->getClientName();
        //validate
        $validation = $this->validate([
            'productName'=>'required','qty'=>'required','unitPrice'=>'required','itemUnit'=>'required',
            'product_type'=>'required','category'=>'required',
        ]);
        if(!$validation)
        {
            session()->setFlashdata('fail','Invalid! Please fill in the form to continue');
            return redirect()->to('admin/new-product')->withInput();
        }
        else
        {
            if($file->isValid() && ! $file->hasMoved())
            {
                $file->move('Images/',$originalName);
                //save the data
                $values= [
                    'productName'=>$productName,'Description'=>$desc,'Image'=>$originalName, 'ItemUnit'=>$itemUnit,
                    'Qty'=>$qty,'UnitPrice'=>$unitPrice,'DateCreated'=>date('Y-m-d'),'Product_Type'=>$product_type,'categoryID'=>$category,
                ];
                $productModel->save($values);
                //save the images

                session()->setFlashdata('success','Great! Successfully added');
                return redirect()->to('admin/products')->withInput();
            }
            else
            {
                session()->setFlashdata('fail','Error! Something went wrong');
                return redirect()->to('admin/new-product')->withInput();
            }
        }
    }

    public function addFee()
    {
        if(session()->get('sess_role')!="Administrator")
        {
            return redirect()->back();
        }
        else
        {
            return view('admin/new-membership-fee');
        }
    }

    public function saveFee()
    {
        $membershipFeeModel = new \App\Models\membershipFeeModel();
        //data
        $title = $this->request->getPost('title');
        $desc = $this->request->getPost('description');
        $charge = $this->request->getPost('charge');
        $validation = $this->validate([
            'title'=>'required','description'=>'required','charge'=>'required'
        ]);
        if(!$validation)
        {
            session()->setFlashdata('fail','Invalid! Please fill in the form to continue');
            return redirect()->to('admin/fee')->withInput();
        }
        else
        {
            $values = [
                'Title'=>$title, 'Description'=>$desc,'Charge'=>$charge,
            ];
            $membershipFeeModel->save($values);
            session()->setFlashdata('success','Great! Successfully added');
            return redirect()->to('admin/maintenance')->withInput();
        }
    }

    public function editFee($id=null)
    {
        $membershipFeeModel = new \App\Models\membershipFeeModel();
        $fee  = $membershipFeeModel->WHERE('feeID',$id)->first();
        $data = ['fee'=>$fee];
        return view('admin/edit-fee',$data);
    }

    public function updateFee()
    {
        $membershipFeeModel = new \App\Models\membershipFeeModel();
        //data
        $feeID = $this->request->getPost('feeID');
        $title = $this->request->getPost('title');
        $desc = $this->request->getPost('description');
        $charge = $this->request->getPost('charge');
        $validation = $this->validate([
            'title'=>'required','description'=>'required','charge'=>'required'
        ]);
        if(!$validation)
        {
            session()->setFlashdata('fail','Invalid! Please fill in the form to continue');
            return redirect()->to('admin/edit-fee/'.$feeID)->withInput();
        }
        else
        {
            $values = [
                'Title'=>$title, 'Description'=>$desc,'Charge'=>$charge,
            ];
            $membershipFeeModel->update($feeID,$values);
            session()->setFlashdata('success','Great! Successfully updated');
            return redirect()->to('admin/maintenance')->withInput();
        }
    }

    public function saveDiscount()
    {
        $discountModel = new \App\Models\discountModel();
        //data
        $feeID = $this->request->getPost('feeID');
        $desc = $this->request->getPost('description');
        $discount = $this->request->getPost('discount');
        $fdate = $this->request->getPost('fromdate');
        $tdate = $this->request->getPost('todate');
        $validation = $this->validate([
            'description'=>'required',
            'discount'=>'required',
            'fromdate'=>'required',
            'todate'=>'required'
        ]);
        if(!$validation)
        {
            echo "Invalid! Please fill in the form";
        }
        else
        {
            $values = [
                'feeID'=>$feeID,'Description'=>$desc, 'Discount'=>$discount/100,'FromDate'=>$fdate,'ToDate'=>$tdate,
            ];
            $discountModel->save($values);
            echo "success";
        }
    }

    public function editDiscount($id=null)
    {
        $discountModel = new \App\Models\discountModel();
        $discount = $discountModel->WHERE('discountID',$id)->first();
        $data = ['discount'=>$discount,];
        return view('admin/edit-discount',$data);
    }

    public function updateDiscount()
    {
        $discountModel = new \App\Models\discountModel();
        //data
        $id = $this->request->getPost('discountID');
        $desc = $this->request->getPost('description');
        $discount = $this->request->getPost('discount');
        $fdate = $this->request->getPost('fromdate');
        $tdate = $this->request->getPost('todate');
        $validation = $this->validate([
            'description'=>'required',
            'discount'=>'required',
            'fromdate'=>'required',
            'todate'=>'required'
        ]);
        if(!$validation)
        {
            session()->setFlashdata('fail','Invalid! Please fill in the form to continue');
            return redirect()->to('admin/edit-discount/'.$id)->withInput();
        }
        else
        {
            $values = [
                'Description'=>$desc, 'Discount'=>$discount,'FromDate'=>$fdate,'ToDate'=>$tdate,
            ];
            $discountModel->update($id,$values);
            session()->setFlashdata('success','Great! Successfully updated');
            return redirect()->to('admin/maintenance')->withInput();
        }
    }

    public function saveCategory()
    {
        $categoryModel = new \App\Models\categoryModel();
        //data
        $cat_name = $this->request->getPost('category_name');
        $values = ['CategoryName'=>$cat_name,];
        $categoryModel->save($values);
        echo "success";
    }

    public function addStocks()
    {
        $stocksModel = new \App\Models\stocksModel();
        $productModel = new \App\Models\productModel();
        //data
        $id = $this->request->getPost('productID');
        $desc = $this->request->getPost('description');
        $qty = $this->request->getPost('qty');
        $unitPrice = $this->request->getPost('unitPrice');
        $itemUnit = $this->request->getPost('itemUnit');
        $supplier = $this->request->getPost('supplier');
        $validation = $this->validate([
            'qty'=>'required','unitPrice'=>'required','itemUnit'=>'required'
        ]);
        if(!$validation)
        {
            echo "Invalid! Please fill in the form to continue";
        }
        else
        {
            $values = [
                'productID'=>$id,'Description'=>$desc, 'ItemUnit'=>$itemUnit,'Qty'=>$qty,'UnitPrice'=>$unitPrice,'Supplier'=>$supplier,'DateCreated'=>date('Y-m-d')
            ];
            $stocksModel->save($values);
            $builder = $this->db->table('tblproduct');
            $builder->select('Qty');
            $builder->WHERE('productID',$id);
            $data = $builder->get();
            if($row = $data->getRow())
            {
                $newQty = $row->Qty + $qty;
                $values = ['Qty'=>$newQty,];
                $productModel->update($id,$values);
            }
            echo "success";
        }
    }

    public function newServices()
    {
        if(session()->get('sess_role')!="Administrator")
        {
            return redirect()->back();
        }
        else
        {
            return view('admin/new-services');
        }
    }

    public function addServices()
    {
        $servicesModel = new \App\Models\servicesModel();
        //data
        $category = $this->request->getPost('category');
        $serviceType = $this->request->getPost('serviceType');
        $charge = $this->request->getPost('charge');
        $desc = $this->request->getPost('description');
        $validation = $this->validate([
            'category'=>'required','serviceType'=>'required','charge'=>'required','description'=>'required'
        ]);
        if(!$validation)
        {
            session()->setFlashdata('fail','Invalid! Please fill in the form to continue');
            return redirect()->to('admin/new-services')->withInput();
        }
        else
        {
            $values = [
                'Category'=>$category,'serviceType'=>$serviceType, 'Charge'=>$charge,'Description'=>$desc,'DateCreated'=>date('Y-m-d'),
            ];
            $servicesModel->save($values);
            session()->setFlashdata('success','Great! Successfully added');
            return redirect()->to('admin/maintenance')->withInput();
        }
    }

    public function editServices($id=null)
    {
        $servicesModel = new \App\Models\servicesModel();
        $services = $servicesModel->WHERE('servicesID',$id)->first();
        $data = ['services'=>$services,];
        return view('admin/edit-services',$data);
    }

    public function updateServices()
    {
        $servicesModel = new \App\Models\servicesModel();
        //data
        $id = $this->request->getPost('servicesID');
        $category = $this->request->getPost('category');
        $serviceType = $this->request->getPost('serviceType');
        $charge = $this->request->getPost('charge');
        $desc = $this->request->getPost('description');
        $validation = $this->validate([
            'category'=>'required','serviceType'=>'required','charge'=>'required','description'=>'required'
        ]);
        if(!$validation)
        {
            session()->setFlashdata('fail','Invalid! Please fill in the form to continue');
            return redirect()->to('admin/edit-services/'.$id)->withInput();
        }
        else
        {
            $values = [
                'Category'=>$category,'serviceType'=>$serviceType, 'Charge'=>$charge,'Description'=>$desc,
            ];
            $servicesModel->update($id,$values);
            session()->setFlashdata('success','Great! Successfully updated');
            return redirect()->to('admin/maintenance')->withInput();
        }
    }

    public function Reservations()
    {
        return view('admin/reservations');
    }

    public function Orders()
    {
        $builder = $this->db->table('tblcustomer_order a');
        $builder->select('a.Status as Remarks,a.DateCreated,a.TransactionNo,a.Firstname,a.Surname,a.Address,a.Email,a.contactNumber,
        b.Status,b.PaymentMethod,b.Total,b.paymentID');
        $builder->join('tblpayment b','b.TransactionNo=a.TransactionNo','LEFT');
        $builder->groupBy('a.OrderNo');
        $order = $builder->get()->getResult();
        $data = ['order'=>$order,];
        return view('admin/orders',$data);
    }

    public function Tag()
    {
        $paymentModel = new \App\Models\paymentModel();
        $val = $this->request->getPost('value');
        $builder = $this->db->table('tblpayment');
        $builder->select('paymentID');
        $builder->WHERE('TransactionNo',$val);
        $data = $builder->get();
        if($row = $data->getRow())
        {
            $values = ['Status'=>1];
            $paymentModel->update($row->paymentID,$values);
        }
        echo "success";
    }

    public function Members()
    {
        return view('admin/membership');
    }

    public function Reports()
    {
        return view('admin/reports');
    }

    public function Profile()
    {
        $user = session()->get('loggedUser');
        $builder = $this->db->table('tblaccount');
        $builder->select('*');
        $builder->WHERE('accountID',$user);
        $account = $builder->get()->getResult();
        //logs
        $builder = $this->db->table('tbllogs a');
        $builder->select('a.*,b.Fullname');
        $builder->join('tblaccount b','b.accountID=a.accountID','LEFT');
        $builder->orderby('a.logID','DESC')->limit(10);
        $logs = $builder->get()->getResult();

        $data = ['account'=>$account,'logs'=>$logs];
        return view('admin/profile',$data);
    }

    public function updatePassword()
    {
        $accountModel = new \App\Models\accountModel();
        $user = session()->get('loggedUser');
        $new_pass = $this->request->getPost('new_password');
        $retype = $this->request->getPost('retype_password');

        $validation = $this->validate([
            'new_password'=>'required',
            'retype_password'=>'required'
        ]);
        if(!$validation)
        {
            session()->setFlashdata('fail','Invalid! Please fill in the form to continue');
            return redirect()->to('admin/profile')->withInput();
        }
        else
        {
            if($new_pass!=$retype)
            {
                session()->setFlashdata('fail','Error! Password mismatched. Try again');
                return redirect()->to('admin/profile')->withInput();
            }
            else
            {
                $defaultPassword = Hash::make($new_pass);
                $values = ['password'=>$defaultPassword,];
                $accountModel->update($user,$values);

                session()->setFlashdata('success','Great! Password has successfully updated');
                return redirect()->to('admin/profile')->withInput();
            }
        }
    }

    public function postBlogs()
    {
        return view('admin/blog');
    }

    public function read()
    {
        $builder = $this->db->table('tblblog');
        $builder->select('*');
        $builder->orderby('blogID','DESC')->limit(5);
        $data = $builder->get();
        foreach($data->getResult() as $row)
        {
            ?>
            <a href="#" class="list-group-item list-group-item-action flex-column align-items-start">
                <h5 class="mb-1 h5"><?php echo $row->blogTitle ?></h5>
                <div class="pb-1">
                    <small class="weight-600"><?php echo $row->Date ?></small>
                </div>
                <p class="mb-1 font-14">
                    <?php echo substr($row->Content,0,30) ?>...
                </p>
            </a>
            <?php
        }
    }

    public function createBlog()
    {
        $blogModel = new \App\Models\blogModel();
        $user = session()->get('loggedUser');
        $date = date('Y-m-d');
        $title = $this->request->getPost('title');
        $content = $this->request->getPost('content');
        $file = $this->request->getFile('files');
        $originalName = $file->getClientName();

        $validation = $this->validate([
            'title'=>'required',
            'content'=>'required',
        ]);

        if(!$validation)
        {
            echo "Invalid! Please fill in the form";
        }
        else
        {
            if($file->isValid() && ! $file->hasMoved())
            {
                $file->move('Blogs/',$originalName);
                $values = [
                    'blogTitle'=>$title, 'Content'=>$content,'Image'=>$originalName,'Date'=>$date,'accountID'=>$user
                ];
                $blogModel->save($values);
            }
            echo "success";
        }
    }

    //webpage 
    public function index()
    {
        $builder = $this->db->table('tblblog a');
        $builder->select('a.*,b.Fullname');
        $builder->join('tblaccount b','b.accountID=a.accountID','LEFT');
        $builder->orderBy('a.blogID','DESC')->limit(3);
        $blog = $builder->get()->getResult();
        $data = ['blog'=>$blog];
        return view('welcome_message',$data);
    }

    public function membership()
    {
        $builder = $this->db->table('tblblog a');
        $builder->select('a.*,b.Fullname');
        $builder->join('tblaccount b','b.accountID=a.accountID','LEFT');
        $builder->orderBy('a.blogID','DESC')->limit(3);
        $blog = $builder->get()->getResult();
        $data = ['blog'=>$blog];
        return view('membership',$data);
    }

    public function book()
    {
        $builder = $this->db->table('tblblog a');
        $builder->select('a.*,b.Fullname');
        $builder->join('tblaccount b','b.accountID=a.accountID','LEFT');
        $builder->orderBy('a.blogID','DESC')->limit(3);
        $blog = $builder->get()->getResult();
        $data = ['blog'=>$blog];
        return view('book',$data);
    }

    public function services()
    {
        $builder = $this->db->table('tblblog a');
        $builder->select('a.*,b.Fullname');
        $builder->join('tblaccount b','b.accountID=a.accountID','LEFT');
        $builder->orderBy('a.blogID','DESC')->limit(3);
        $blog = $builder->get()->getResult();
        $data = ['blog'=>$blog];
        return view('services',$data);
    }

    public function register()
    {
        return view('register');
    }

    public function viewBlogs()
    {
        $builder = $this->db->table('tblblog a');
        $builder->select('a.*,b.Fullname');
        $builder->join('tblaccount b','b.accountID=a.accountID','LEFT');
        $builder->orderBy('a.blogID','DESC');
        $blog = $builder->get()->getResult();
        //stories
        $builder = $this->db->table('tblblog a');
        $builder->select('a.*,b.Fullname');
        $builder->join('tblaccount b','b.accountID=a.accountID','LEFT');
        $builder->orderBy('a.blogID','DESC')->limit(3);
        $stories = $builder->get()->getResult();
        $data = ['blog'=>$blog,'stories'=>$stories];
        return view('blogs',$data);
    }

    public function post($id=null)
    {
        $builder = $this->db->table('tblblog');
        $builder->select('*');
        $builder->WHERE('blogTitle',$id);
        $story = $builder->get()->getResult();
        //blogs
        $builder = $this->db->table('tblblog a');
        $builder->select('a.*,b.Fullname');
        $builder->join('tblaccount b','b.accountID=a.accountID','LEFT');
        $builder->orderBy('a.blogID','DESC')->limit(3);
        $blog = $builder->get()->getResult();
        $data = ['blog'=>$blog];

        $data = ['story'=>$story,'stories'=>$blog];
        return view('post',$data);
    }

    public function createAccount()
    {
        $customerModel = new \App\Models\customerModel();
        //data
        $emailadd = $this->request->getPost('email');
        $fullname = $this->request->getPost('fullname');
        $password = $this->request->getPost('password');
        $retype = $this->request->getPost('retype_password');

        $validation = $this->validate([
            'email'=>'required|valid_email|is_unique[tblcustomer.Email]',
            'fullname'=>'required',
            'password'=>'required',
            'retype_password'=>'required',
        ]);

        if(!$validation)
        {
            session()->setFlashdata('fail','Invalid! Email already exists');
            return redirect()->to('/register')->withInput();
        }
        else
        {
            if($password!=$retype)
            {
                session()->setFlashdata('fail','Invalid! Password mismatched');
                return redirect()->to('/register')->withInput();
            }
            else
            {
                $token_code = random_int(100000, 999999);
                $hash_password = Hash::make($password);
                $values = [
                    'Email'=>$emailadd, 'Password'=>$hash_password ,'Fullname'=>$fullname,'Status'=>0,'Token'=>$token_code,'DateCreated'=>date('Y-m-d')
                ];
                $customerModel->save($values);
                $email = \Config\Services::email();
                $email->setTo($emailadd,$fullname);
                $email->setFrom("petligo2023@gmail.com","PetLigo");
                $imgURL = "assets/images/petligo.png";
                $email->attach($imgURL);
                $cid = $email->setAttachmentCID($imgURL);
                $template = "<center>
                <img src='cid:". $cid ."' width='100'/>
                <table style='padding:20px;background-color:#ffffff;' border='0'><tbody>
                <tr><td><center><h1>Account Verification</h1></center></td></tr>
                <tr><td><center>Hi, ".$fullname."</center></td></tr>
                <tr><td><p><center>Please enter the code below to verify your account.</center></p></td><tr>
                <tr><td><center><b><h2>".$token_code."</h2></b></center></td></tr>
                <tr><td><p><center>If you did not sign-up in PetLigo Website,<br/> please ignore this message or contact us @ petligo2023@gmail.com</center></p></td></tr>
                <tr><td>PetLigo IT Support</td></tr></tbody></table></center>";
                $subject = "Email Verification";
                $email->setSubject($subject);
                $email->setMessage($template);
                $email->send();
                session()->set('customer_email', $emailadd);
                return redirect()->to('/verify/email');
            }
        }
    }

    public function verify()
    {
        $customerModel = new \App\Models\customerModel();
        $email = session()->get('customer_email');
        $customer = $customerModel->WHERE('Email',$email)->first();
        $data = ['customer'=>$customer,];
        return view('verify',$data);
    }

    public function verifyEmail()
    {
        $customerModel = new \App\Models\customerModel();
        $customerID = $this->request->getPost('customerID');
        $email = $this->request->getPost('email');
        $token = $this->request->getPost('otp');
        //check if exists and match
        $builder = $this->db->table('tblcustomer');
        $builder->select('*');
        $builder->WHERE('customerID',$customerID)->WHERE('Email',$email)->WHERE('Token',$token);
        $data  = $builder->get();
        if($row = $data->getRow())
        {
            $values = ['Status'=>1,];
            $customerModel->update($customerID,$values);
            session()->setFlashdata('success','Great! Your account is verified. Please log-in');
            return redirect()->to('/verify/email')->withInput();
        }
        else
        {
            session()->setFlashdata('fail','You seem to have entered an invalid OTP');
            return redirect()->to('/verify/email')->withInput();
        }
    }

    public function Login()
    {
        return view('sign-in');
    }

    public function forgotPassword()
    {
        return view('forgot-password');
    }

    public function products()
    {
        $categoryModel = new \App\Models\categoryModel();
        $category = $categoryModel->findAll();
        $builder = $this->db->table('tblblog a');
        $builder->select('a.*,b.Fullname');
        $builder->join('tblaccount b','b.accountID=a.accountID','LEFT');
        $builder->orderBy('a.blogID','DESC')->limit(3);
        $blog = $builder->get()->getResult();
        $data = ['category'=>$category,'blog'=>$blog];
        return view('products',$data);
    } 

    public function loadProducts()
    {
        $builder = $this->db->table('tblproduct a');
        $builder->select('a.*,b.CategoryName');
        $builder->join('tblcategory b','b.categoryID=a.categoryID','LEFT');
        $builder->groupBy('a.productID');
        $data = $builder->get();
        foreach($data->getResult() as $row)
        {
            ?>
            <?php $imgURL = "/Images/".$row->Image; ?>
                <div class="col-lg-3">
                    <div class="block-7">
                        <div class="img" style="background-image: url(<?php echo $imgURL ?>);"></div>
                        <div class="text-center p-4">
                            <span class="excerpt d-block"><?php echo $row->productName ?></span>
                            <span class="price">PhP <?php echo number_format($row->UnitPrice,2)?></span>
                            <span class="d-block">
                                <?php echo $row->CategoryName ?>
                            </span>
                            <a href="<?=site_url('cart/details/')?><?php echo $row->productID ?>" class="btn btn-primary d-block px-2 py-3">View Details</a>
                        </div>
                    </div>
                </div>
            <?php
        }
    }

    public function searchProducts()
    {
        $val = "%".$this->request->getGet('value')."%";
        $builder = $this->db->table('tblproduct a');
        $builder->select('a.*,b.CategoryName');
        $builder->join('tblcategory b','b.categoryID=a.categoryID','LEFT');
        $builder->LIKE('a.productName',$val);
        $builder->groupBy('a.productID');
        $data = $builder->get();
        foreach($data->getResult() as $row)
        {
            ?>
            <?php $imgURL = "/Images/".$row->Image; ?>
                <div class="col-lg-3">
                    <div class="block-7">
                        <div class="img" style="background-image: url(<?php echo $imgURL ?>);"></div>
                        <div class="text-center p-4">
                            <span class="excerpt d-block"><?php echo $row->productName ?></span>
                            <span class="price">PhP <?php echo number_format($row->UnitPrice,2)?></span>
                            <span class="d-block">
                                <?php echo $row->CategoryName ?>
                            </span>
                            <a href="<?=site_url('cart/details/')?><?php echo $row->productID ?>" class="btn btn-primary d-block px-2 py-3">View Details</a>
                        </div>
                    </div>
                </div>
            <?php
        }
    }

    public function filterProducts()
    {
        $val = $this->request->getGet('value');
        if($val=="0")
        {
            $builder = $this->db->table('tblproduct a');
            $builder->select('a.*,b.CategoryName');
            $builder->join('tblcategory b','b.categoryID=a.categoryID','LEFT');
            $builder->groupBy('a.productID');
            $data = $builder->get();
            foreach($data->getResult() as $row)
            {
                ?>
                <?php $imgURL = "/Images/".$row->Image; ?>
                    <div class="col-lg-3">
                        <div class="block-7">
                            <div class="img" style="background-image: url(<?php echo $imgURL ?>);"></div>
                            <div class="text-center p-4">
                                <span class="excerpt d-block"><?php echo $row->productName ?></span>
                                <span class="price">PhP <?php echo number_format($row->UnitPrice,2)?></span>
                                <span class="d-block">
                                    <?php echo $row->CategoryName ?>
                                </span>
                                <a href="<?=site_url('cart/details/')?><?php echo $row->productID ?>" class="btn btn-primary d-block px-2 py-3">View Details</a>
                            </div>
                        </div>
                    </div>
                <?php
            }
        }
        else
        {
            $builder = $this->db->table('tblproduct a');
            $builder->select('a.*,b.CategoryName');
            $builder->join('tblcategory b','b.categoryID=a.categoryID','LEFT');
            $builder->WHERE('a.categoryID',$val);
            $builder->groupBy('a.productID');
            $data = $builder->get();
            foreach($data->getResult() as $row)
            {
                ?>
                <?php $imgURL = "/Images/".$row->Image; ?>
                    <div class="col-lg-3">
                        <div class="block-7">
                            <div class="img" style="background-image: url(<?php echo $imgURL ?>);"></div>
                            <div class="text-center p-4">
                                <span class="excerpt d-block"><?php echo $row->productName ?></span>
                                <span class="price">PhP <?php echo number_format($row->UnitPrice,2)?></span>
                                <span class="d-block">
                                    <?php echo $row->CategoryName ?>
                                </span>
                                <a href="<?=site_url('cart/details/')?><?php echo $row->productID ?>" class="btn btn-primary d-block px-2 py-3">View Details</a>
                            </div>
                        </div>
                    </div>
                <?php
            }
        }
    }

    public function filterCategoryProducts()
    {
        $val = $this->request->getGet('value');
        if($val=="All")
        {
            $builder = $this->db->table('tblproduct a');
            $builder->select('a.*,b.CategoryName');
            $builder->join('tblcategory b','b.categoryID=a.categoryID','LEFT');
            $builder->groupBy('a.productID');
            $data = $builder->get();
            foreach($data->getResult() as $row)
            {
                ?>
                <?php $imgURL = "/Images/".$row->Image; ?>
                    <div class="col-lg-3">
                        <div class="block-7">
                            <div class="img" style="background-image: url(<?php echo $imgURL ?>);"></div>
                            <div class="text-center p-4">
                                <span class="excerpt d-block"><?php echo $row->productName ?></span>
                                <span class="price">PhP <?php echo number_format($row->UnitPrice,2)?></span>
                                <span class="d-block">
                                    <?php echo $row->CategoryName ?>
                                </span>
                                <a href="<?=site_url('cart/details/')?><?php echo $row->productID ?>" class="btn btn-primary d-block px-2 py-3">View Details</a>
                            </div>
                        </div>
                    </div>
                <?php
            }
        }
        else if($val=="Dogs")
        {
            $builder = $this->db->table('tblproduct a');
            $builder->select('a.*,b.CategoryName');
            $builder->join('tblcategory b','b.categoryID=a.categoryID','LEFT');
            $builder->WHERE('a.Product_Type',$val);
            $builder->groupBy('a.productID');
            $data = $builder->get();
            foreach($data->getResult() as $row)
            {
                ?>
                <?php $imgURL = "/Images/".$row->Image; ?>
                    <div class="col-lg-3">
                        <div class="block-7">
                            <div class="img" style="background-image: url(<?php echo $imgURL ?>);"></div>
                            <div class="text-center p-4">
                                <span class="excerpt d-block"><?php echo $row->productName ?></span>
                                <span class="price">PhP <?php echo number_format($row->UnitPrice,2)?></span>
                                <span class="d-block">
                                    <?php echo $row->CategoryName ?>
                                </span>
                                <a href="<?=site_url('cart/details/')?><?php echo $row->productID ?>" class="btn btn-primary d-block px-2 py-3">View Details</a>
                            </div>
                        </div>
                    </div>
                <?php
            }
        }
        else if($val=="Cats")
        {
            $builder = $this->db->table('tblproduct a');
            $builder->select('a.*,b.CategoryName');
            $builder->join('tblcategory b','b.categoryID=a.categoryID','LEFT');
            $builder->WHERE('a.Product_Type',$val);
            $builder->groupBy('a.productID');
            $data = $builder->get();
            foreach($data->getResult() as $row)
            {
                ?>
                <?php $imgURL = "/Images/".$row->Image; ?>
                    <div class="col-lg-3">
                        <div class="block-7">
                            <div class="img" style="background-image: url(<?php echo $imgURL ?>);"></div>
                            <div class="text-center p-4">
                                <span class="excerpt d-block"><?php echo $row->productName ?></span>
                                <span class="price">PhP <?php echo number_format($row->UnitPrice,2)?></span>
                                <span class="d-block">
                                    <?php echo $row->CategoryName ?>
                                </span>
                                <a href="<?=site_url('cart/details/')?><?php echo $row->productID ?>" class="btn btn-primary d-block px-2 py-3">View Details</a>
                            </div>
                        </div>
                    </div>
                <?php
            }
        }
        else if($val=="Small Pets")
        {
            $builder = $this->db->table('tblproduct a');
            $builder->select('a.*,b.CategoryName');
            $builder->join('tblcategory b','b.categoryID=a.categoryID','LEFT');
            $builder->WHERE('a.Product_Type',$val);
            $builder->groupBy('a.productID');
            $data = $builder->get();
            foreach($data->getResult() as $row)
            {
                ?>
                <?php $imgURL = "/Images/".$row->Image; ?>
                    <div class="col-lg-3">
                        <div class="block-7">
                            <div class="img" style="background-image: url(<?php echo $imgURL ?>);"></div>
                            <div class="text-center p-4">
                                <span class="excerpt d-block"><?php echo $row->productName ?></span>
                                <span class="price">PhP <?php echo number_format($row->UnitPrice,2)?></span>
                                <span class="d-block">
                                    <?php echo $row->CategoryName ?>
                                </span>
                                <a href="<?=site_url('cart/details/')?><?php echo $row->productID ?>" class="btn btn-primary d-block px-2 py-3">View Details</a>
                            </div>
                        </div>
                    </div>
                <?php
            }
        }
    }
}
