<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class CarrinhoModel
{
    public $itens = null;
    public $totalQty = null;
    public $totalPrice = null;

    public function __construct($oldCart)
    {

        if($oldCart){

            $this->itens = $oldCart->itens;
            $this->totalQty = $oldCart->totalQty;
            $this->totalPrice = $oldCart->totalPrice;
        }
    }

    public static function listaCarrinho(){
         if(!Session::has('cart')){
             return view('carrinho', ['produtos'=> null]);
         }

         $proutos = Session::get('cart');
         $cart = new CarrinhoModel($proutos);
         return $cart;

        //$request->session()->get('cart');
    }

    public function add($item, $id){
        $storedItem = ['qty'=>0, 'preco'=> $item['preco'], 'item'=> $item];


        if($this->itens){
            if(array_key_exists($id, $this->itens)){
                $storedItem = $this->itens[$id];

            }
        }

        $storedItem['qty']++;
        $storedItem['preco'] = $item['preco'] * $storedItem['qty'];
        $this->itens[$id] = $storedItem;
        $this->totalQty++;
        $this->totalPrice += $item['preco'];

    }

    public static function remove($item,$id){
        if(Session::has('cart')){
            $cart = Session::get('cart');
            $products = $cart->itens;
            if(array_key_exists($id,$products)){
                unset($products[$id]);
                $cart->totalQty -= $cart->itens[$id]['qty'];
                $cart->totalPrice = $cart->totalPrice - $item[$id]['preco'];
            }

            $newCart=new CarrinhoModel($cart);
            if($cart->totalQty<=0){
                $cart->totalQty = 0;
            }
            $newCart->totalQty=$cart->totalQty;
            $newCart->totalPrice=$cart->totalPrice;
            $newCart->itens=$products;

            if(count($newCart->itens)==0){
                Session::forget('cart');
            }
            return $newCart;
        }
    }
}
