<?php

namespace App;

use App\Physician;

class Cart
{

    public $items = [];
    public $totalQty;
    public $totalPrice;


    public function __construct($cart = null)
    {
        if ($cart) {
            $this->items = $cart->items;
            $this->totalPrice = $cart->totalPrice;
            $this->totalQty = $cart->totalQty;
        } else {
            $this->items = [];
            $this->totalQty = 0;
            $this->totalPrice = 0;
        }
    }

    public function add($physician)
    {
        //$physician = Physician::findOrFail($physician);
        $item = [
            'id' => $physician->id,
            'name' => $physician->name,
            'price' => $physician->price,
            'qty' => 0,
            'image' => $physician->image

        ];
        if (!array_key_exists($physician->id, $this->items)) {
            $this->items[$physician->id] = $item;
            $this->totalQty += 1;
            $this->totalPrice += $physician->price;
        } else {
            $this->totalQty += 1;
            $this->totalPrice += $physician->price;
        }
        $this->items[$physician->id]['qty'] += 1;
    }
}
