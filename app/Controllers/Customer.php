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
        $user = session()->get('sess_id');
        $builder = $this->db->table('tblpets');
        $builder->select('*');
        $builder->WHERE('customerID',$user);
        $pets = $builder->get()->getResult();
        $data = ['pets'=>$pets];
        return view('customer/pets',$data);    
    }

    public function profile()
    {
        return view('customer/profile');
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
        $builder->WHERE('customerID',$user);
        $items = $builder->get()->getResult();
        $data = ['items'=>$items];
        return view('cart/checkout',$data);
    }
}