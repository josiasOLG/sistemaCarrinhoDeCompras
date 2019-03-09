<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Produtos;
use App\Categorias;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
class HomeController extends Controller
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
        $listaProdutos = Produtos::select('id', 'titulo', 'descricao', 'imagem', 'preco')->get();
        $listaCat = Categorias::select('id', 'nome')->get();
        //dd(Session::get('cart'));
        return view('home',compact('listaProdutos', 'listaCat', 'pesquisa'));
    }
    public function buscarproduto(Request $request){
        $data = $request->all();
        $listaProdutos = DB::table('produtos_categorias')
            ->join('produtos','produtos_categorias.produto','=','produtos.id')
            ->select('produtos.id','produtos.titulo','produtos.descricao','produtos.imagem','produtos.preco')
            ->where('produtos.titulo','LIKE','%'.$data["pesquisa"].'%')->get();
        $listaCat = Categorias::select('id', 'nome')->get();
        return view('home',compact('listaProdutos', 'listaCat'));
    }
}
