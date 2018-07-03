<template>
    <div>
        <slot></slot>
        <div class="form-group">
            <label>Featured Name</label>
            <select name="featured_id">
                <option v-for="featured in featureds" v-bind="featured.id">{{ featured.name}}</option>
            </select>
        </div>
        <div class="form-group">
            <label>Value</label>
            <input type="text" name="value"/>
        </div>
        <div class="form-group">
            <button class="btn btn-danger">X</button>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                index: 0,
                featureds: []
            }
        },
        mounted () {
            this.loadFeatureds()
        },
        methods: {
            loadFeatureds () {
                window.axios.get('/api/filters').then(({data})=>{
                    this.featureds = data
                    console.log(this.featureds)
                })
            }
        }
    }
</script>

<style scoped>

</style>