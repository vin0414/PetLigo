<?php

namespace App\Controllers;
use App\Libraries\Hash;
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
        return view('customer/orders');
    }

    public function Pets()
    {
        return view('customer/pets');    
    }

    public function profile()
    {
        return view('customer/profile');
    }
}