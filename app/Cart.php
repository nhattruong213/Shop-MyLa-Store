<?php
    namespace App;

use phpDocumentor\Reflection\Types\Null_;

class Cart{

        public $products = null;
        public $totalPrice = 0;
        public $totalQuanty = 0;

        public function __construct($cart)
        {
            if($cart!=null){
                $this->products = $cart->products;
                $this->totalPrice = $cart->totalPrice;
                $this->totalQuanty = $cart->totalQuanty;
            }
        }
        public function AddCart($product, $id, $quanty) {
            $checkprice = $product->discount != null ? $product->discount : $product->price;
            $newProduct =  ['quanty' => 0, 'price' => $checkprice , 'productInfo'=> $product];
            if($this->products != Null) {
                if(array_key_exists($id, $this->products)){   // check product toon tai hay chua
                    $newProduct = $this->products[$id];
                }
            }

            if($quanty!=null){
                $newProduct['quanty'] += $quanty;
                // dd($newProduct['quanty']);
                $this->totalQuanty += $quanty ;
                $this->totalPrice += $quanty * $checkprice;
            }else {
                $newProduct['quanty']++;
                $this->totalQuanty++;
                $this->totalPrice += $checkprice;
            }
              
            $newProduct['price'] = $newProduct['quanty'] * $checkprice;
            $this->products[$id] = $newProduct;
            
            
        }

        public function DeleteItemCart($id){
            $this->totalQuanty -= $this->products[$id]['quanty'];
            $this->totalPrice -= $this->products[$id]['price'];
            unset( $this->products[$id]);
        }

        public function UpdateItemCart($id, $quanty)
        {
            $checkprice =  $this->products[$id]['productInfo']->discount != null ? $this->products[$id]['productInfo']->discount : $this->products[$id]['productInfo']->price;
            $this->totalPrice -=  $this->products[$id]['price'];
            $this->totalQuanty -= $this->products[$id]['quanty'];


            $this->products[$id]['quanty'] = $quanty;
            $this->products[$id]['price'] = $quanty * $checkprice;

            $this->totalPrice += $this->products[$id]['price'];
            $this->totalQuanty += $this->products[$id]['quanty'];
        }
    }
?>