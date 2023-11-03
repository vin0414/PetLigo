<?php

namespace App\Controllers;

class Cart extends BaseController
{
    public function viewCart()
    {
        $data['items'] = array_values(session('cart'));
        return view('cart/index',$data);
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

        }
        else
        {
            $cart = array($item);
            $session->set('cart',$cart);
        }
        return $this->response->redirect(site_url('cart/index'));
    }
}
