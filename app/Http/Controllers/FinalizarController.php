<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use App\Produtos;
use App\Categorias;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;

class FinalizarController extends Controller
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

        //dd(Session::get('cart'));
        return view('finalizar');
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

        $iduser = Auth::id();

        $id = DB::table('finalizar')->insertGetId(
            ['primeironome' => $data['primeironome'],
                'segundonome' => $data['segundonome'],
                'endereco' => $data['endereco'],
                'cidade' => $data['cidade'],
                'uf' => $data['uf'],
                'cep' => $data['cep'],
                'email' => $data['email'],
                'telefone' => $data['telefone'],
                'total' => $data['total'],
                'data' => $data['data'],
                'idusuario'=>$iduser]
        );


        $produtos  = Session::get('cart')->itens;
        foreach ($produtos as $key => $linha){
            DB::table('finalizar_produto')->insert(
                ['finalizar' => $id, 'produto' => $key, 'idusuario'=>$iduser]
            );
        }
        Session::forget('cart');
        return redirect()->route('finalizarSucesso');


    }

}
