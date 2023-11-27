<?php

namespace App\Controllers;
use App\Libraries\Hash;
use CodeIgniter\Database\SQLite3\Table;

class Customer extends BaseController
{
    private $db;
    public function __construct()
    {
        $this->db = db_connect();
    }

    public function Dashboard()
    {
        return view('customer/index');
    }

    public function Reservations()
    {
        return view('customer/reservations');
    }

    public function Orders()
    {
        $user = session()->get('sess_id');
        $builder = $this->db->table('tblcustomer_order');
        $builder->select('*');
        $builder->WHERE('customerID',$user);
        $order = $builder->get()->getResult();
        $data = ['order'=>$order];
        return view('customer/orders',$data);
    }

    public function Confirm()
    {
        $customerOrderModel = new \App\Models\customerOrderModel();
        $paymentModel = new \App\Models\paymentModel();
        //data
        $code = $this->request->getPost('code');
        $paymentMethod = $this->request->getPost('paymentMethod');
        $total = $this->request->getPost('total');
        $user = session()->get('sess_id');
        if($paymentMethod=="Gcash")
        {
            //send email
        }
        //verify if the customer already purchase membership
        $builder = $this->db->table('tblmembership');
        $builder->select('customerID');
        $builder->WHERE('customerID',$user)->WHERE('DateCreated <=',date('Y-m-d'));
        $data = $builder->get();
        if($row = $data->getRow())
        {
            //get the records from the tblcustomer_order
            $builder = $this->db->table('tblcustomer_order');
            $builder->select('OrderNo');
            $builder->WHERE('TransactionNo',$code);
            $list = $builder->get();
            if($rows = $list->getRow())
            {
                $values = [
                    'charge'=>0.00,'Total'=>$total,
                ];
                $customerOrderModel->update($rows->OrderNo,$values);
            }
            //save the payment
            $values = [
                'TransactionNo'=>$code, 'PaymentMethod'=>$paymentMethod,'Status'=>0,'Total'=>$total,'Date'=>date('Y-m-d')
            ];
            $paymentModel->save($values);
        }
        else //no records
        {
            //get the records from the tblcustomer_order
            $builder = $this->db->table('tblcustomer_order');
            $builder->select('OrderNo');
            $builder->WHERE('TransactionNo',$code);
            $list = $builder->get();
            if($rows = $list->getRow())
            {
                $values = [
                    'charge'=>38.00,'Total'=>$total,
                ];
                $customerOrderModel->update($rows->OrderNo,$values);
            }
            //save the payment
            $values = [
                'TransactionNo'=>$code, 'PaymentMethod'=>$paymentMethod,'Status'=>0,'Total'=>$total+38.00,'Date'=>date('Y-m-d')
            ];
            $paymentModel->save($values);
        }
        session()->setFlashdata('success','Great! Your order(s) successfully confirmed');
        return redirect()->to('customer/orders')->withInput();
    }

    public function cancelOrder()
    {
        $customerOrderModel = new \App\Models\customerOrderModel();
        $paymentModel = new \App\Models\paymentModel();
    }

    public function Pets()
    {
        $user = session()->get('sess_id');
        $builder = $this->db->table('tblpets');
        $builder->select('*');
        $builder->WHERE('customerID',$user);
        $pets = $builder->get()->getResult();
        $data = ['pets'=>$pets];
        return view('customer/pets',$data);    
    }

    public function editPet($id=null)
    {
        $builder = $this->db->table('tblpets');
        $builder->select('*');
        $builder->WHERE('petsID',$id);
        $pets = $builder->get()->getResult();
        $data = ['pets'=>$pets];
        return view('customer/edit-pets',$data);
    }

    public function updatePet()
    {
        $petModel = new \App\Models\petModel();
        //data
        $file = $this->request->getFile('files');
        $originalName = $file->getClientName();
        $pet = $this->request->getPost('petname');
        $breed = $this->request->getPost('breed');
        $age = $this->request->getPost('age');
        $id = $this->request->getPost('petID');

        $validation = $this->validate([
            'petname'=>'required',
            'breed'=>'required',
            'age'=>'required',
        ]);

        if(!$validation)
        {
            session()->setFlashdata('fail','Invalid! Please fill in the form to continue');
            return redirect()->to('customer/pets')->withInput();
        }
        else
        {
            if($file->isValid() && ! $file->hasMoved())
            {
                $file->move('pets/',$originalName);
                $values = [
                    'Name'=>$pet,'Breed'=>$breed,'Age'=>$age,'Photo'=>$originalName,
                ];
                $petModel->update($id,$values);
                session()->setFlashdata('success','Great! Successfully updated');
                return redirect()->to('customer/pets')->withInput();
            }
            else
            {
                session()->setFlashdata('fail','Error! Something went wrong');
                return redirect()->to('customer/pets')->withInput();
            }
        }
    }

    public function profile()
    {
        return view('customer/profile');
    }

    public function upload()
    {
        $user = session()->get('sess_id');
        $file = $this->request->getFile('file');
        $originalName = $file->getClientName();
        if(empty($originalName))
        {
            echo "Invalid! Please fill in the form";
        }
        else
        {
            if($file->isValid() && ! $file->hasMoved())
            {
                $builder = $this->db->table('tblcustomer_info');
                $builder->select('infoID');
                $builder->WHERE('customerID',$user);
                $data = $builder->get();
                if($row = $data->getRow())
                {
                    $infoModel = new \App\Models\informationModel();
                    $file->move('profile/',$originalName);
                    $values = ['Image'=>$originalName];
                    $infoModel->update($row->infoID,$values);
                    echo "Success";
                }
                else
                {
                    echo "Sorry! Please update your account";
                }
            }
            else
            {
                echo "File already uploaded";
            }
        }
    }

    //functions 
    public function savePet()
    {
        $petModel = new \App\Models\petModel();
        //data
        $file = $this->request->getFile('files');
        $originalName = $file->getClientName();
        $pet = $this->request->getPost('petname');
        $breed = $this->request->getPost('breed');
        $age = $this->request->getPost('age');
        $user = session()->get('sess_id');

        $validation = $this->validate([
            'petname'=>'required',
            'breed'=>'required',
            'age'=>'required',
        ]);

        if(!$validation)
        {
            session()->setFlashdata('fail','Invalid! Please fill in the form to continue');
            return redirect()->to('customer/pets')->withInput();
        }
        else
        {
            if($file->isValid() && ! $file->hasMoved())
            {
                $file->move('pets/',$originalName);
                $values = [
                    'customerID'=>$user, 'Name'=>$pet,'Breed'=>$breed,'Age'=>$age,'Photo'=>$originalName,
                ];
                $petModel->save($values);
                session()->setFlashdata('success','Great! Successfully added');
                return redirect()->to('customer/pets')->withInput();
            }
            else
            {
                session()->setFlashdata('fail','Error! Something went wrong');
                return redirect()->to('customer/pets')->withInput();
            }
        }
    }

    public function shipping()
    {
        $user = session()->get('sess_id');
        $builder = $this->db->table('tblorders');
        $builder->select('*');
        $builder->WHERE('customerID',$user)->WHERE('Status',0);
        $items = $builder->get()->getResult();
        //total
        $builder = $this->db->table('tblorders');
        $builder->select('SUM(Qty*price)total');
        $builder->WHERE('customerID',$user)->WHERE('Status',0);
        $total = $builder->get()->getResult();

        $data = ['items'=>$items,'total'=>$total];
        return view('cart/checkout',$data);
    }

    public function Success()
    {
        $code = $this->request->getGet('code');
        $builder = $this->db->table('tblorders');
        $builder->select('*');
        $builder->WHERE('TransactionNo',$code);
        $list = $builder->get()->getResult();
        //total
        $builder = $this->db->table('tblorders');
        $builder->select('SUM(Qty*price)total');
        $builder->WHERE('TransactionNo',$code)->GROUPBY('TransactionNo');
        $total = $builder->get()->getResult();

        $data = ['list'=>$list,'total'=>$total,'code'=>$code];
        return view('customer/success',$data);
    }

    public function saveInfo()
    {
        $informationModel = new \App\Models\informationModel();
        //save data
        $user = session()->get('sess_id');
        $address = $this->request->getPost('address');
        $email = $this->request->getPost('email');
        $phone = $this->request->getPost('phone');
        $image = "N/A";

        $validation = $this->validate([
            'address'=>'required',
            'email'=>'required|valid_email',
            'phone'=>'required',
        ]);

        if(!$validation)
        {
            echo "Invalid! Please fill in the form";
        }
        else
        {
            $values = [
                'customerID'=>$user, 'Address'=>$address,'ContactNo'=>$phone,'EmailAddress'=>$email,'Image'=>$image
            ];
            $informationModel->save($values);
            echo "success";
        }
    }

    public function updatePassword()
    {
        $customerModel = new \App\Models\customerModel();
        $user = session()->get('sess_id');
        $new_password = $this->request->getPost('new_password');
        $retype_password = $this->request->getPost('retype_password');
        
        $validation = $this->validate([
            'new_password'=>'required',
            'retype_password'=>'required',
        ]);
        if(!$validation)
        {
            session()->setFlashdata('fail','Invalid! Please fill in the form to continue');
            return redirect()->to('customer/profile')->withInput();
        }
        else
        {
            if($new_password!=$retype_password)
            {
                session()->setFlashdata('fail','Invalid! Password mismatched');
                return redirect()->to('customer/profile')->withInput();
            }
            else
            {
                $defaultPassword = Hash::make($new_password);
                $values = ['Password'=>$defaultPassword,];
                $customerModel->update($user,$values);
                session()->setFlashdata('success','Great! Successfully save changes');
                return redirect()->to('customer/profile')->withInput();
            }
        }
    }

    public function fetchInfo()
    {
        $user = session()->get('sess_id');
        $builder = $this->db->table('tblcustomer_info a');
        $builder->select('*');
        $builder->WHERE('customerID',$user);
        $data = $builder->get();
        $info="";
        foreach($data->getResult() as $row)
        {
            $info = array("Address"=>$row->Address,"Contact"=>$row->ContactNo,"Email"=>$row->EmailAddress);
        }
        echo json_encode($info);
    }

    public function removeItem()
    {
        $val = $this->request->getPost('value');
        $builder = $this->db->table('tblorders');
        $builder->where('orderID', $val);
        $builder->delete();
        echo "success";
    }
}