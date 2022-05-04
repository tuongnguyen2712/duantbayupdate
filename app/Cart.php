<?php
    namespace App;
    class Cart{
        public $products = null;
        public $totalPrice = 0;
        public $totalQty = 0;
        public function __construct($oldCart){
            if($oldCart){
                $this->products = $oldCart->products;
                $this->totalPrice = $oldCart->totalPrice;
                $this->totalQty = $oldCart->totalQty;
            }
        }
        public function add($product, $id){
            $storedProduct = ['quanty'=>0, 'price'=>$product->giamgia, 'productInfo'=>$product];
            if($this->products){
                if(array_key_exists($id, $this->products)){
                    $storedProduct = $this->products[$id];
                }
            }
            $storedProduct['quanty']++;
            $storedProduct['price'] = $product->giamgia * $storedProduct['quanty'];
            $this->products[$id] = $storedProduct;
            $this->totalQty++;
            $this->totalPrice += $product->giamgia;
        }
        public function deletecart($id){
            $this->totalQty -= $this->products[$id]['quanty'];
            $this->totalPrice -= $this->products[$id]['price'];
            unset($this->products[$id]);
        }
        public function updatecart($id, $quanty){
            $this->totalQty -= $this->products[$id]['quanty'];
            $this->totalPrice -= $this->products[$id]['price'];
            $this->products[$id]['quanty'] = $quanty;
            $this->products[$id]['price'] = $this->products[$id]['productInfo']->giamgia * $quanty;
            $this->totalQty += $quanty;
            $this->totalPrice += $this->products[$id]['price'];
        }

    }
?>
