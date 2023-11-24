<?php

namespace App\Controllers;

class Cart extends BaseController
{
    private $db;
    public function __construct()
    {
        $this->db = db_connect();
    }

    public function viewCart()
    {
        $data['items'] = is_array(session('cart'))?array_values(session('cart')):array();
        $data['total'] = $this->total();
        return view('cart/index',$data);
    }

    public function details($id)
    {
        $builder = $this->db->table('tblproduct a');
        $builder->select('a.*,b.CategoryName');
        $builder->join('tblcategory b','b.categoryID=a.categoryID','LEFT');
        $builder->WHERE('a.productID',$id);
        $products = $builder->get()->getResult();
        $data = ['product'=>$products,];
        return view('cart/details',$data);
    }

    public function remove($id)
    {
        $index = $this->exists($id);
        $cart = array_values(session('cart'));
        unset($cart[$index]);
        $session = session();
        $session->set('cart',$cart);
        return $this->response->redirect(site_url('cart/view'));
    }

    public function buy($id)
    {
        $productModel = new \App\Models\productModel();
        $product = $productModel->find($id);
        $item = array(
            'id'=>$product['productID'],
            'name'=>$product['productName'],
            'photo'=>$product['Image'],
            'price'=>$product['UnitPrice'],
            'quantity'=>$this->request->getGet('qty')
        );
        $session = session();
        if($session->has('cart'))
        {
            $index = $this->exists($id);
            $cart = array_values(session('cart'));
            if($index == -1)
            {
                array_push($cart, $item);
            }
            else
            {
                session()->setFlashdata('fail','Invalid! Item(s) already added in your cart');
                return redirect()->to('/products')->withInput();
            }
            $session->set('cart',$cart);
        }
        else
        {
            $cart = array($item);
            $session->set('cart',$cart);
        }
        return $this->response->redirect(site_url('cart/view'));
    }

    private function exists($id)
    {
        $items = array_values(session('cart'));
        for($i = 0; $i < count($items); $i++)
        {
            if($items[$i]['id']==$id)
            {
                return $i;
            }
        }
        return -1;
    }

    private function total()
    {
        $s = 0;
        $items = is_array(session('cart'))?array_values(session('cart')):array();
        foreach($items as $item)
        {
            $s += $item['price']*$item['quantity'];
        }
        return $s;
    }

    public function checkOut()
    {
        $orderModel = new \App\Models\orderModel();
        $user = session()->get('sess_id');
        if(empty($user))
        {
            $session = session();
            $session->remove('cart');
            session()->setFlashdata('fail','Invalid! Please login to continue');
            return redirect()->to('/products')->withInput();
        }
        else
        {
            $items = array_values(session('cart'));
            foreach($items as $item)
            {
                $values = [
                    'customerID'=>$user,'productName'=>$item['name'], 'Qty'=>$item['quantity'],
                    'price'=>$item['price'],'Status'=>0,'OrderNo'=>0
                ];
                $orderModel->save($values);
            }
            $session = session();
            $session->remove('cart');
            return $this->response->redirect(site_url('cart/shipping'));
        }
    }

    public function saveOrder()
    {
        $customerOrder = new \App\Models\customerOrderModel();
        $orderModel = new \App\Models\orderModel();
        //datas
        $user = session()->get('sess_id');
        $emailadd = $this->request->getPost('email');
        $phone = $this->request->getPost('phone');
        $fname = $this->request->getPost('firstname');
        $sname = $this->request->getPost('surname');
        //address
        $apartment = $this->request->getPost('apartment');
        $street = $this->request->getPost('street');
        $city = $this->request->getPost('city');
        $province = $this->request->getPost('province');
        $zip  = $this->request->getPost('zipcode');
        $address = $apartment." ".$street.", ".$city.", ".$province." ".$zip;
        //generate code
        $code="";
        $builder = $this->db->table('tblcustomer_order');
        $builder->select('COUNT(OrderNo)+1 as total');
        $count = $builder->get();
        if($row = $count->getRow())
        {
            $code = str_pad($row->total, 7, '0', STR_PAD_LEFT);
        }
        //save
        $values = [
            'customerID'=>$user,'Firstname'=>$fname, 'Surname'=>$sname,'Address'=>$address,
            'Email'=>$emailadd,'contactNumber'=>$phone,'Status'=>0,'charge'=>0.00,'Total'=>0.00,
            'DateCreated'=>date('Y-m-d'),'TransactionNo'=>$code,'DateReceived'=>'0000-00-00'
        ];
        $customerOrder->save($values);
        //update the item ordered
        $builder = $this->db->table('tblorders');
        $builder->select('orderID');
        $builder->WHERE('customerID',$user)->WHERE('Status',0);
        $data = $builder->get();
        foreach($data->getResult() as $row)
        {
            $values = ['Status'=>1,'TransactionNo'=>$code];
            $orderModel->update($row->orderID,$values);
        }
        return $this->response->redirect(site_url('customer/success?code='.$code));
    }
}
