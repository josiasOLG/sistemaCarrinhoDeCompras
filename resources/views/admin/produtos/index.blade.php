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

    <paineladmin titulo="Produtos">
        <modal-link tipo="button" nome="meuModalTeste" titulo="Adicionar produtos" css=""></modal-link>
        {{--<tabela-lista v-bind:itens="{{$listaProdutos}}" token="csrf_token()"></tabela-lista>--}}
        <tabela-lista
                v-bind:itens="{{$listaProdutos}}"
                deletar="/admin/produtos/" token="{{ csrf_token() }}"
                href=""
                ></tabela-lista>
    </paineladmin>
    <modal nome="meuModalTeste">
        <paineladmin titulo="Produtos">
            <form id="formAdicioar" action="{{route('produtos.store')}}"
                  enctype="multipart/form-data" method="post" token="{{csrf_token()}}">
                <div class="form-group">
                    <label for="titulo">Titulo</label>
                    <input type="text" class="form-control" id="titulo" name="titulo" placeholder="Titulo">
                </div>
                <div class="form-group">
                    <label for="descricao">Descrição</label>
                    <textarea class="form-control" id="descricao" name="descricao" placeholder="Descrição"></textarea>
                </div>
                <div class="form-group">
                    <label for="preco">Preço</label>
                    <input type="text" class="form-control money" id="preco" name="preco" placeholder="Preço">
                </div>
                <div class="form-group">
                    <label for="titulo">Categoria</label>
                    <input-categoria v-bind:itens="{{$listaCat}}"></input-categoria>
                </div>
                <div class="form-group">
                    <label for="titulo">Caracteristica</label>
                    <input-caracteristica v-bind:itens="{{$listaCaracterica}}"></input-caracteristica>
                </div>
                <div class="form-group">
                    <input type="file" name="imagem" id="imagem">
                </div>
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <button type="submit" class="btn btn-primary">Cadastrar produto</button>
            </form>
        </paineladmin>
    </modal>
@endsection

@section('scripts')
    <script>
        $(document).ready(function(){
            $('.money').mask('(99) 9 9999-9999');
        });
    </script>
@endsection
