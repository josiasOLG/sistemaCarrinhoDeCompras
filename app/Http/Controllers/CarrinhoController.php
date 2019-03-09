<?php

namespace App\Http\Controllers;

use App\CarrinhoModel;
use Illuminate\Http\Request;
use App\Produtos;
use App\Categorias;
use Illuminate\Support\Facades\Session;

class CarrinhoController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Session::has('cart')){

            $cart = CarrinhoModel::listaCarrinho();
            //dd($cart);
            return view('carrinho', ['produtos'=>$cart->itens, 'totalValor'=>$cart->totalPrice]);
        }else{
            return view ('carrinho');
        }

    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new CarrinhoModel($oldCart);
        $cart->add($data, $data['id']);
        $request->session()->put('cart', $cart);
        return '1';
        //return view('home');
    }

    public function deletarcart(Request $request){
          $id = $request->all()['id'];
//        $request->session()->forget('cart', $id);
        //$request->session()->flush();
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $product = new CarrinhoModel($oldCart);
        $cart = CarrinhoModel::remove($product->itens,$id);
        //$cart->totalQty = 0;
        $request->session()->put('cart', $cart);
        return view('carrinho', ['produtos'=>$cart->itens, 'totalValor'=>$cart->totalPrice]);
    }

    public function stores(Request $request)
    {
        return 'a';
        //return view('home');
    }
}
