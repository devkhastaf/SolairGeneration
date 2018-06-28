<template>
    <div>
        <h1>Filters</h1>
        <div v-for="f in filters">
            <h3>{{ f.name }}</h3>
            <div v-for="value in f.values">
                <label>{{ value.value}}</label>
                <input type="checkbox" :name="f.slug" />
            </div>
        </div>
        <button @click="getProducts()">Save</button>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                filter: {
                    name: '',
                    slug: '',
                    values: []
                },
                filters: []
            }
        },
        mounted () {
            this.loadFilters()
        },
        methods: {
            loadFilters () {
                window.axios.get('/api/filters?category=desktop').then(({data})=>{
                    this.filters = data
                    console.log(this.filters)
                })
            },
            getProducts() {

            },
        }
    }
</script>

<style scoped>

</style>