<template>
    <div>
        <a :href="link" class="d-flex"><span>{{nome}}</span></a>
    </div>
</template>

<script>
    export default {
        props: ['nome', 'link'],
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
