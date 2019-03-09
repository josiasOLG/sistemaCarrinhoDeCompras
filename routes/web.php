<?php

use App\Produtos;
use App\Categorias;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/','HomeController@index', function () {
    return view('home');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');





//Route::post('/adicionarcarrinho', function () {
//    //$produtos = Produtos::find($id);
//
//    $produtos = array('aa'=>1);
//    return view('produtosDet',compact('produtos'));
//})->name('adicionarcarrinho');


Route::resource('carrinho', 'CarrinhoController');
Route::resource('finalizar', 'FinalizarController');
//Route::post('carrinho.stores', 'CarrinhoController@stores')->name('stores');
Route::post('carrinho-deletarcart', 'CarrinhoController@deletarcart')->name('deletarcart');

Route::post('home.buscarproduto', 'HomeController@buscarproduto')->name('buscarproduto');


Route::get('/finalizar', function () {

    $produtos = Session::get('cart')->itens;
    $total = Session::get('cart')->totalPrice;
    return view("finalizar", compact('produtos', 'total'));

})->name('finalizar');

Route::get('/finalizarSucesso', function () {

    return view("finalizarSucesso");
})->name('finalizarSucesso');


Route::get('/produtos-det/{id}/{titulo?}', function ($id) {
    $produtos = Produtos::find($id);
    $produtoscara = Produtos::listaProdutosCarac($id);

    if($produtos){
        return view('produtosDet',compact('produtos', 'produtoscara'));
    }
    return redirect()->route('home');
})->name('produtos-det');

Route::get('/produtos/{id}', function ($id) {
    $listaProdutos = DB::table('produtos_categorias')
        ->join('produtos','produtos_categorias.produto','=','produtos.id')
        ->select('produtos.id','produtos.titulo','produtos.descricao','produtos.imagem','produtos.preco')
        ->where('produtos_categorias.categoria', $id)->get();
    $listaCat = Categorias::select('id', 'nome')->get();

    if($listaProdutos){
        $pesquisa = "";
        return view('home',compact('listaProdutos', 'listaCat', 'pesquisa'));
    }
    return redirect()->route('home');
})->name('produtos');


Route::post('/produtos-busca', function () {

    $listaProdutos = DB::table('produtos_categorias')
        ->join('produtos','produtos_categorias.produto','=','produtos.id')
        ->select('produtos.id','produtos.titulo','produtos.descricao','produtos.imagem','produtos.preco')
        ->where('produtos.titulo','LIKE','%'.$_POST["pesquisa"].'%')->get();
    $listaCat = Categorias::select('id', 'nome')->get();
    if($listaProdutos){

        Session::put('pesquisa', $_POST['pesquisa']);
        return view('home',compact('listaProdutos', 'listaCat'));
    }
    return redirect()->route('home');
})->name('produtos-busca');

Route::middleware(['auth'])->prefix('admin')->namespace('Admin')->group(function (){
    Route::resource('produtos', 'ProdutosController');
    Route::resource('categorias', 'CategoriasController');
});
