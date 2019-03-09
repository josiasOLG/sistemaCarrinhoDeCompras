<template>
    <div>
        <div class="block-4 text-center border">
            <figure class="block-4-image">
                <a href="shop-single.html">
                    <img :src="'/storage'+imagem" width="50%">
                </a>
            </figure>
            <div class="block-4-text p-4">
                <h3><a href="shop-single.html">{{titulo}}</a></h3>
                <p class="mb-0">{{descricao}}</p>
                <p class="text-primary font-weight-bold">R${{preco}}</p>
            </div>
            <div class="block-4-text mb-5">
                <a v-bind:href="link" class="btn btn-primary" style="color: white">Ver mais</a>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props: ['imagem', 'titulo', 'descricao', 'preco', 'link'],
        computed: {
            lista: function () {
                return this.itens;
            },
            lista2: function () {
                return this.categoria;
            }
        }
    }
</script>
