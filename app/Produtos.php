<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

use Illuminate\Support\Facades\DB;

class Produtos extends Model
{
    use SoftDeletes;

    protected $fillable = ['titulo', 'descricao', 'imagem', 'preco'];

    public static function listaProdutosCarac($id)
    {
        $listaProdutos = DB::table('produtos_caracteristica')
            ->join('caracteristica','produtos_caracteristica.caracteristica','=','caracteristica.id')
            ->select('caracteristica.nome', 'caracteristica.id')
            ->where('produtos_caracteristica.produto', $id)->get();



        return $listaProdutos;
    }
}
