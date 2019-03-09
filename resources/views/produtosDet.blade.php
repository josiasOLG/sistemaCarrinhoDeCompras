@extends('layouts.app')

@section('content')
    <div class="site-section">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <img src="/storage{{$produtos->imagem}}" alt="Image" class="img-fluid">
                </div>
                <div class="col-md-6">
                    <form id="formAddCarrinho"  enctype="multipart/form-data" method="post" token="{{csrf_token()}}">
                        <h2 class="text-black">{{$produtos->titulo}}</h2>
                        <p>{{$produtos->descricao}}</p>
                        <div class="mb-1 d-flex">
                            @foreach($produtoscara as $key => $linha)
                                <label for="option-sm" class="d-flex mr-3 mb-3">
                                    <span class="d-inline-block mr-2" style="top:-2px; position: relative;">
                                        <input type="radio" name="cor" id="cor-{{$linha->nome}}" value="{{$linha->id}}">
                                    </span>
                                    <span class="d-inline-block text-black">{{$linha->nome}}</span>
                                </label>
                            @endforeach
                        </div>
                        <div class="mb-5">
                            <div class="input-group mb-3" style="max-width: 120px;">
                                <div class="input-group-prepend">
                                    <button class="btn btn-outline-primary js-btn-minus" type="button">&minus;</button>
                                </div>
                                <input type="text" name="qty" class="form-control text-center"
                                       value="1" placeholder="" aria-label="Example text with button addon" aria-describedby="button-addon1">
                                <div class="input-group-append">
                                    <button class="btn btn-outline-primary js-btn-plus" type="button">&plus;</button>
                                </div>
                            </div>

                        </div>
                        <p>
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <input type="hidden" name="id" value="{{ $produtos->id }}">
                            <input type="hidden" name="preco" value="{{ $produtos->preco }}">
                            <input type="hidden" name="descricao" value="{{ $produtos->descricao }}">
                            <input type="hidden" name="titulo" value="{{ $produtos->titulo }}">
                            <input type="hidden" name="imagem" value="{{ $produtos->imagem }}">
                            <button type="submit" class="buy-now btn btn-sm btn-primary">Adicionar no carrinho</button>
                        </p>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection


<link rel="stylesheet/scss" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.33.1/sweetalert2.min.css">
<script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.3.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.33.1/sweetalert2.all.js"></script>
<script>
    $(document).ready(function () {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $("#formAddCarrinho").submit(function () {
            var dados  = $(this).serialize();
            $.ajax({
               cache: false,
               url: "{{route('carrinho.store')}}",
               type: 'POST',
               data: dados,
               dataType: 'json',
               success: function (response) {
                   console.log(response);
                   Swal.fire(
                       'Sucesso!',
                       'Produto adicionado com sucesso!',
                       'success'
                   )
               }
            });


            return false;
        });
    });
</script>