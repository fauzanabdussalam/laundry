<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Layanan;

class CartController extends Controller
{
    function cart(Request $request)  
    {
        $cartCollection = \Cart::getContent();
        $arr_cart = array();
        foreach($cartCollection as $data)
        {
            $arr_cart[] = array(
                "id"        => $data->id,
                "name"      => $data->name,
                "quantity"  => "Rp " . number_format($data->quantity, 0, ",", "."),
                "price"     => str_replace(".", ",", $data->price),
                "total"     => "Rp " . number_format(\Cart::get($data->id)->getPriceSum(), 0, ",", "."),
            );
        }
        $data['cart']   = $arr_cart;
        $data['total']  = "Rp " . number_format(\Cart::getTotal(), 0, ",", ".");
        
        return response()->json($data);
    }

    function clear(Request $request)
    {
        \Cart::clear();
        
        return response()->json(true);
    }
    
    function add(Request $request)
    {
        $classLayanan = new Layanan();

        $data_layanan = $classLayanan->getDetailData($request->id)->first();

        \Cart::add([
            [
                'id'       => $request->id,
                'name'     => $data_layanan->Nama_Layanan,
                'quantity' => $data_layanan->Tarif,
                'price'    => $request->price
            ] 
        ]);
        
        return response()->json(true);
    }

    function remove(Request $request)
    {
        \Cart::remove($request->id);
        
        return response()->json(true);
    }
}
