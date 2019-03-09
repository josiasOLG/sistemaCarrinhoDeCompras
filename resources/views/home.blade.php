@extends('layouts.app')

@section('content')
    <div class="site-section">
        <div class="container">
            <div>
                <div class="row mb-5">
                    <div class="col-md-9 order-2">

                        <div class="row">
                            <div class="col-md-12 mb-5">
                                <div class="float-md-left"><h2 class="text-black h5">Todos os produtos</h2></div>
                                <div class="d-flex">
                                </div>
                            </div>
                        </div>
                        <div class="row mb-5">
                            @foreach($listaProdutos as $key => $linha)
                                <div class="col-sm-6 col-lg-4 mb-4" data-aos="fade-up">
                                    <painel imagem="{{$linha->imagem}}"
                                            titulo="{{$linha->titulo}}"
                                            descricao="{{$linha->descricao}}"
                                            preco="{{$linha->preco}}" link="{{route('produtos-det',$linha->id)}}"></painel>
                                </div>
                            @endforeach
                        </div>

                    </div>

                    <div class="col-md-3 order-1 mb-5 mb-md-0">
                        <div class="border p-4 rounded mb-4">
                            <h3 class="mb-3 h6 text-uppercase text-black d-block">Categorias</h3>
                            <ul class="list-unstyled mb-0">
                                @foreach($listaCat as $key => $linha2)
                                    <li class="mb-1">
                                        <painel-cat link="{{route('produtos',$linha2->id)}}" nome="{{$linha2->nome}}"></painel-cat>
                                    </li>
                                @endforeach
                            </ul>
                        </div>


                    </div>
                </div>


            </div>

        </div>
    </div>
@endsection
