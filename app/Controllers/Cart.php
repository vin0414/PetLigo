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
                $cart[$index]['quantity']++; 
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
            session()->destroy(session('cart'));
            return $this->response->redirect(site_url('/products?error=user_authentication'));
        }
        else
        {
            $items = array_values(session('cart'));
            $count = count($items['id']);
            for($i=0;$i<$count;$i++)
            {
                $values = [
                    'customerID'=>$user,'productName'=>$items['name'], 'Qty'=>$items['quantity'],'price'=>$items['price'],'Status'=>0,
                ];
                $orderModel->save($values);
            }
            return $this->response->redirect(site_url('cart/checkout'));
        }
    }
}
