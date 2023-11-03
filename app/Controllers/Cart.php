<?php

namespace App\Controllers;

class Cart extends BaseController
{
    public function viewCart()
    {
        $data['items'] = array_values(session('cart'));
        $data['total'] = $this->total();
        return view('cart/index',$data);
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
            'quantity'=>1
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
        $items = array_values(session('cart'));
        foreach($items as $item)
        {
            $s += $item['price']*$item['quantity'];
        }
        return $s;
    }
}
