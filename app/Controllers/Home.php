<?php

namespace App\Controllers;

class Home extends BaseController
{

    //admin template
    public function Auth()
    {
        if(empty(session()->get('sess_id')))
        {
            return view('auth');
        }
        else
        {
            return redirect()->back();
        }
    }

    public function dashboard()
    {
        return view('admin/index');
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
