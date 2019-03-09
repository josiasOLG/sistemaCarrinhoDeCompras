@extends('layouts.app')

@section('content')
    <div class="site-section">
        <div class="container">
            <form action="{{route('finalizar.store')}}"  enctype="multipart/form-data" method="post"
                  token="{{csrf_token()}}">
                <div class="row">

                    <div class="col-md-6 mb-5 mb-md-0">
                        <h2 class="h3 mb-3 text-black">Detalhes adicionais</h2>
                        <div class="p-3 p-lg-5 border">
                            <div class="form-group row">
                                <div class="col-md-6">
                                    <label for="c_fname" class="text-black">Primeiro nome <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="primeironome" name="primeironome" required>
                                </div>
                                <div class="col-md-6">
                                    <label for="c_lname" class="text-black">Segundo nome <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="segundonome" name="segundonome" required>
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-md-12">
                                    <label for="c_address" class="text-black">Endereço <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="endereco" name="endereco" placeholder="Endereço" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="cidade" class="text-black">Cidade <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="cidade" name="cidade" required>
                            </div>

                            <div class="form-group row">
                                <div class="col-md-6">
                                    <label for="c_state_country" class="text-black">Estado <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="uf" name="uf" required>
                                </div>
                                <div class="col-md-6">
                                    <label for="c_postal_zip" class="text-black">Cep <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="cep" name="cep" required>
                                </div>
                            </div>

                            <div class="form-group row mb-5">
                                <div class="col-md-6">
                                    <label for="c_email_address" class="text-black">Email <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="email" name="email" required>
                                </div>
                                <div class="col-md-6">
                                    <label for="c_phone" class="text-black">Telefone <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="telefone" name="telefone" placeholder="Telefone" required>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="row mb-5">
                            <div class="col-md-12">
                                <h2 class="h3 mb-3 text-black">Produtos</h2>
                                <div class="p-3 p-lg-5 border">
                                    <table class="table site-block-order-table mb-5">
                                        <thead>
                                            <th>Produto</th>
                                            <th>Preço</th>
                                        </thead>
                                        <tbody>
                                            @foreach($produtos as $key => $linha)
                                                <tr>
                                                    <td>
                                                        {{$linha['item']["titulo"]}}
                                                        <strong class="mx-2">X</strong> {{$linha["qty"]}}
                                                    </td>
                                                    <td>R${{$linha["preco"]}}</td>
                                                </tr>
                                             @endforeach
                                        </tbody>
                                    </table>

                                    <table class="table site-block-order-table mb-5">
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <strong>Total</strong>
                                                </td>
                                                <td style="text-align: right">
                                                    R${{$total}}
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>

                                    <div class="form-group">
                                        <input type="hidden" name="total" value="{{$total}}">
                                        <input type="hidden" name="data" value="{{date('Y-d-m')}}">
                                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                                        <button type="submit" class="btn btn-primary btn-lg py-3 btn-block">Finalizar pagamento</button>
                                    </div>

                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
<script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.3.1.min.js"></script>

<script>
    $(document).ready(function () {

    });
</script>