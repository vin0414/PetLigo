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
            $user_info = $accountModel->where('username', $username)->WHERE('Status',1)->first();
            $check_password = Hash::check($password, $user_info['password']);
            if(!$check_password || empty($check_password))
            {
                session()->setFlashdata('fail','Invalid Username or Password!');
                return redirect()->to('/auth')->withInput();
            }
            else
            {
                session()->set('loggedUser', $user_info['accountID']);
                session()->set('sess_fullname', $user_info['Fullname']);
                return redirect()->to('admin/dashboard');
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
        $builder = $this->db->table('tblaccount');
        $builder->select('*');
        $account = $builder->get()->getResult();
        $data = ['account'=>$account,];
        return view('admin/maintenance',$data);
    }

    public function newAccount()
    {
        return view('admin/new-account');
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
        $accountModel = new \App\Models\accountModel();
        $account = $accountModel->WHERE('accountID',$id)->first();
        $data = ['account'=>$account,];
        return view('admin/edit-account',$data);
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
        $builder = $this->db->table('tblproduct a');
        $builder->select('a.*,b.Image');
        $builder->join('tblproductimage b','b.productID=a.productID','LEFT');
        $builder->groupBy('a.productID');
        $product = $builder->get()->getResult();
        $data = ['products'=>$product];
        return view('admin/products',$data);
    }

    public function newProduct()
    {
        return view('admin/new-product');
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
        if(empty(session()->get('sess_id')))
        {
            return view('register');
        }
        else
        {
            return redirect()->back();
        }
    }

    public function products()
    {
        return view('products');
    }
}
