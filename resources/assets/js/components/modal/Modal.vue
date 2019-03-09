<template>
    <div v-bind:id="nome" class="modal fade " role="dialog">
        <div class="modal-dialog modal-lg">
            <!-- Modal content-->
            <div class="modal-content">
                <slot></slot>
            </div>

        </div>
    </div>
</template>

<script>
    export default {
        props: ['nome']
    }
</script>
