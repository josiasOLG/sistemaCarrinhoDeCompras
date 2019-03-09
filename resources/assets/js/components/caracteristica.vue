<template>
    <div class="col-xs-12">
        <div class="form-group col-sm-3" v-for="(item,index) in lista">
            <input type="checkbox" v-bind:name="'caracteristica['+item.id+']'" :id="'caracteristica['+item.id+']'" v-bind:value="item.id"/>
            <label :for="'caracteristica['+item.id+']'">{{item.nome}}</label>
        </div>
    </div>
</template>

<script>
    export default {
        props: ['itens'],
        computed:{
            lista:function(){
                return this.itens;
            }
        }
    }
</script>
