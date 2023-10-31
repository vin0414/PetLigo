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

    //admin template
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

    public function Edit($id=null)
    {
        $accountModel = new \App\Models\accountModel();
        $account = $accountModel->WHERE('accountID',$id)->first();
        $data = ['account'=>$account,];
        return view('admin/edit-account',$data);
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
