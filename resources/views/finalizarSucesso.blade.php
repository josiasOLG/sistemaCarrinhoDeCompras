@extends('layouts.app')

@section('content')
    <div class="site-section">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    <span class="icon-check_circle display-3 text-success"></span>
                    <h2 class="display-3 text-black">Obrigado por comprar!</h2>
                    <p class="lead mb-5">Seu pedido foi efetuado com sucesso!.</p>
                    <p><a href="{{route('home')}}" class="btn btn-sm btn-primary">Voltar as compras</a></p>
                </div>
            </div>
        </div>
    </div>
@endsection
<script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.3.1.min.js"></script>

<script>
    $(document).ready(function () {

    });
</script>