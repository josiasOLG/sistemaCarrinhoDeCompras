@extends('layouts.app')

@section('content')
    <div class="site-section">
        <div class="container">
            @if(Session::get('cart') && Session::get('cart')->itens)
                <div class="row mb-5">
                    <div class="col-md-12" >
                        <div class="site-blocks-table">
                            <table class="table table-bordered">
                                <thead>
                                <tr>
                                    <th class="product-thumbnail">Imagem</th>
                                    <th class="product-name">Nome produto</th>
                                    <th class="product-price">Valor</th>
                                    <th class="product-quantity">Quantidade</th>
                                    <th class="product-total">Total</th>
                                    <th class="product-remove">Remover</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @foreach($produtos as $linha)
                                        <tr>
                                            <td class="product-thumbnail">
                                                <img src="/storage{{$linha['item']['imagem']}}" alt="Image" class="img-fluid">
                                            </td>
                                            <td class="product-name">
                                                <h2 class="h5 text-black">{{$linha['item']['titulo']}}</h2>
                                            </td>
                                            <td>R${{$linha['preco']}}</td>
                                            <td>
                                                {{$linha['qty']}}

                                            </td>
                                            <td>R${{$linha['preco']}}</td>

                                            <td>
                                                <form action="{{route('deletarcart')}}"
                                                      enctype="multipart/form-data" method="post"
                                                      token="{{csrf_token()}}">
                                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                    <input type="hidden" name="id" value="{{$linha['item']['id']}}">
                                                    <button type="submit" class="btn btn-primary btn-sm">X</button>
                                                </form>
                                            </td>
                                        </tr>
                                     @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">

                    </div>
                    <div class="col-md-6 pl-5">
                        <div class="row justify-content-end">
                            <div class="col-md-7">
                                <div class="row">
                                    <div class="col-md-12 text-right border-bottom mb-5">
                                        <h3 class="text-black h4 text-uppercase">Total do carrinho</h3>
                                    </div>
                                </div>
                                {{--<div class="row mb-3">--}}
                                    {{--<div class="col-md-6">--}}
                                        {{--<span class="text-black">Subtotal</span>--}}
                                    {{--</div>--}}
                                    {{--<div class="col-md-6 text-right">--}}
                                        {{--<strong class="text-black">$230.00</strong>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                                <div class="row mb-5">
                                    <div class="col-md-6">
                                        <span class="text-black">Total</span>
                                    </div>
                                    <div class="col-md-6 text-right">
                                        <strong class="text-black">R$ {{$totalValor}}</strong>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <a href="{{route('finalizar')}}" class="btn btn-primary btn-lg py-3 btn-block">Finalizar</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @else
                <div class="row">
                    <div class="col-md-12 text-center">
                        <span class="icon-cart-plus display-3 text-success"></span>
                        <h2 class="display-3 text-black">Nenhum prouto encontrado!</h2>
                        <p><a href="{{route('home')}}" class="btn btn-sm btn-primary">Voltar as compras</a></p>
                    </div>
                </div>
            @endif
        </div>
    </div>
@endsection
<script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.3.1.min.js"></script>

<script>
    $(document).ready(function () {

    });
</script>