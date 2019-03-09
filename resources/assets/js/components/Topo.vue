<template>

</template>

<script>
    export default {
        props: ['titulo', 'url', 'linkcart', 'quantidade', 'action', 'token'],
        methods: {
            executaForm: function (index) {
                document.getElementById(index).submit();
                axios
                    .get(this.action)
                    .then(response => (this.info = response))
            },
        }
    }
</script>
