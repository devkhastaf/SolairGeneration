<template>
    <div class="form-group">
        <slot></slot>
        <featured-input v-for="f in rang"></featured-input>
        <button class="btn btn-default" @click.prevent="add">Add new featured</button>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                featuredinputs: []
            }
        },
        methods: {
            add() {
                this.featuredinputs.add()
                console.log(this.rang)
            }
        }
    }
</script>

<style scoped>

</style>