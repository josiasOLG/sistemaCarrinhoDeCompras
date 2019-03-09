@extends('admin/layouts.app')

@section('content')
    @if($errors->all())
        <div class="alert alert-danger alert-dismissible text-center" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            @foreach ($errors->all() as $key => $value)
                <li><strong>{{$value}}</strong></li>
            @endforeach
        </div>
    @endif

    <paineladmin titulo="Categorias">
        <modal-link tipo="button" nome="meuModalTeste" titulo="Adicionar produtos" css=""></modal-link>
        {{--<tabela-lista v-bind:itens="{{$listaProdutos}}" token="csrf_token()"></tabela-lista>--}}
        <tabela-lista2
                v-bind:itens="{{$listaCat}}"
                deletar="/admin/categorias/" token="{{ csrf_token() }}"
        ></tabela-lista2>
    </paineladmin>
    <modal nome="meuModalTeste">
        <paineladmin titulo="Produtos">
            <form id="formAdicioar" action="{{route('categorias.store')}}" enctype="multipart/form-data" method="post" token="{{csrf_token()}}">
                <div class="form-group">
                    <label for="nome">Nome</label>
                    <input type="text" class="form-control" id="nome" name="nome" placeholder="Nome">
                </div>
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <button type="submit" class="btn btn-primary">Cadastrar categoria</button>
            </form>
        </paineladmin>
    </modal>
@endsection
