<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use App\Produtos;
use App\Categorias;
use Illuminate\Support\Facades\DB;

class ProdutosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $listaProdutos = json_encode(Produtos::select('id', 'titulo', 'descricao', 'imagem', 'preco')->get());
        $listaCat = json_encode(Categorias::select('id', 'nome')->get());
        $listaCaracterica = json_encode(DB::table('caracteristica')->get());
        return view('admin.produtos.index', compact('listaProdutos', 'listaCat', 'listaCaracterica'));
    }

    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data  = $request->all();
        $cat  = $request->all();

        $cara = $cat["caracteristica"];
        $cat = $cat["categoria"];



        unset($data['categoria']);
        unset($data['caracteristica']);


        if($request->hasFile('imagem')){
            $file = $request->imagem;
            $extencao = $request->imagem->extension();
            $nameFile = $file.".".$extencao;
            $data['imagem'] = $nameFile;
            $upload  = $request->imagem->storeAs('public', $nameFile);
            //$upload = $request->imagem->move(public_path('/produtos'), $nameFile);
            if(!$upload)
                return redirect()->back()->with('error', 'Falha');
        }

        $id = Produtos::create($data);
        $id = $id->id;

        foreach ($cat as $linha){
            DB::table('produtos_categorias')->insert(
                ['produto' => $id, 'categoria' => $linha]
            );
        }

        foreach ($cara as $linha){
            DB::table('produtos_caracteristica')->insert(
                ['produto' => $id, 'caracteristica' => $linha]
            );
        }


        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Produtos::find($id)->delete();
        return redirect()->back();
    }
}
