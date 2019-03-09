<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProdutosCaracteristica extends Model
{
    use SoftDeletes;
    protected $fillable = ['produto', 'caracteristica'];

}
