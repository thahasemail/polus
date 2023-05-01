<?php

namespace App\Http\Controllers;

use App\Models\ListItem;
use Illuminate\Http\Request;

class ListController extends Controller
{
    //
    public function save(){

        $count = request("count_row");

        mt_srand(mktime(23));
        $order_id = mt_rand();

        for($i = 1;$i<=$count;$i++){

            $name = request("name" . $i );
            $quantity = request("quantity" . $i );
            $unit_price = request("unit_price" . $i );
            $tax = request("tax" . $i );
    


           $user = ListItem::create([
            'name' => $name,
            'quantity' => $quantity,
            'unit_price' => $unit_price,
            'tax' => $tax,
            'order_id' => $order_id
        ]);

        }
       
        return  redirect()->route('home')->with("message","List items added successfully!");


    }
}
