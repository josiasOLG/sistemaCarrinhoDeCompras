<template>
    <div>
        <div class="form-inline">
            <div class="form-group pull-right">
                <input type="search" class="form-control" placeholder="Buscar" v-model="buscar" >
            </div>
        </div>
        <table class="table table-striped table-hover">
            <thead>
            <tr>
                <th width="5%">Imagem</th>
                <th>Titulo</th>
                <th>Descricao</th>
                <th>Preço</th>
                <th style="text-align: right">Excluir</th>
            </tr>
            </thead>
            <tbody>
            <tr v-for="(item,index) in lista">
                <td style="vertical-align: middle"><img :src="'/storage'+item.imagem" width="100%"></td>
                <td style="vertical-align: middle">{{item.titulo}}</td>
                <td style="vertical-align: middle">{{item.descricao.substring(0,50)}}</td>
                <td style="vertical-align: middle">{{item.preco}}</td>
                <td style="vertical-align: middle;text-align: right">

                    <form v-bind:id="index" v-bind:action="deletar + item.id" method="post">
                        <input type="hidden" name="_method" value="DELETE">
                        <input type="hidden" name="_token" v-bind:value="token">
                        <a href="#" class="btn btn-primary" v-on:click="executaForm(index)"> Deletar</a>
                    </form>
                </td>
            </tr>
            </tbody>
        </table>
    </div>
</template>

<script>
    export default {
        props:['itens','deletar','token', 'href'],
        data: function(){
            return {
                buscar:'',
                ordemAux: this.ordem || "asc",
                ordemAuxCol: this.ordemcol || 0
            }
        },
        methods:{
            executaForm: function(index){
                document.getElementById(index).submit();
            },
            ordenaColuna: function(coluna){
                this.ordemAuxCol = coluna;
                if(this.ordemAux.toLowerCase() == "asc"){
                    this.ordemAux = 'desc';
                }else{
                    this.ordemAux = 'asc';
                }
            }
        },
        computed:{
            lista:function(){

                let ordem = this.ordemAux;
                let ordemCol = this.ordemAuxCol;
                ordem = ordem.toLowerCase();
                ordemCol = parseInt(ordemCol);

                if(ordem == "asc"){
                    this.itens.sort(function(a,b){
                        if (Object.values(a)[ordemCol] > Object.values(b)[ordemCol] ) { return 1;}
                        if (Object.values(a)[ordemCol] < Object.values(b)[ordemCol] ) { return -1;}
                        return 0;
                    });
                }else{
                    this.itens.sort(function(a,b){
                        if (Object.values(a)[ordemCol] < Object.values(b)[ordemCol] ) { return 1;}
                        if (Object.values(a)[ordemCol] > Object.values(b)[ordemCol] ) { return -1;}
                        return 0;
                    });
                }

                if(this.buscar){
                    return this.itens.filter(res => {
                        for(let k = 0;k < res.length; k++){
                            if((res[k] + "").toLowerCase().indexOf(this.buscar.toLowerCase()) >= 0){
                                return true;
                            }
                        }
                        return false;

                    });
                }


                return this.itens;
            }
        }
    }
</script>
