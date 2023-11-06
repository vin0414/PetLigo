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
        $accountModel = new \App\Models\accountModel();
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

    public function logout()
    {
        if(session()->has('loggedUser'))
        {
            session()->remove('loggedUser');
            return redirect()->to('/auth?access=out')->with('fail', 'You are logged out!');
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

            $data = ['account'=>$account,'fee'=>$fee,'discount'=>$discount,'services'=>$services,];
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
        return view('admin/new-product');
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
                    'productName'=>$productName, 'Description'=>$desc,'ItemUnit'=>$itemUnit,'Qty'=>$qty,'UnitPrice'=>$unitPrice,
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
            return redirect()->to('admin/new-product')->withInput();
        }
        else
        {
            if($file->isValid() && ! $file->hasMoved())
            {
                $file->move('Images/',$originalName);
                //save the data
                $values= [
                    'productName'=>$productName,'Description'=>$desc,'Image'=>$originalName, 'ItemUnit'=>$itemUnit,'Qty'=>$qty,'UnitPrice'=>$unitPrice,'DateCreated'=>date('Y-m-d'),
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
        return view('admin/orders');
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
        return view('admin/profile');
    }

    //webpage 
    public function index()
    {
        return view('welcome_message');
    }

    public function membership()
    {
        return view('membership');
    }

    public function book()
    {
        return view('book');
    }

    public function services()
    {
        return view('services');
    }

    public function register()
    {
        return view('register');
    }

    public function createAccount()
    {
        $customerModel = new \App\Models\customerModel();
        //data
        $email = $this->request->getPost('email');
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
            session()->setFlashdata('fail','Invalid! Please fill in the form');
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
                
            }
        }
    }

    public function Login()
    {
        return view('sign-in');
    }

    public function products()
    {
        $products = new \App\Models\productModel();
        $data['products'] = $products->findAll();
        return view('products',$data);
    }
}
