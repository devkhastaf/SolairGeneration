<template>
    <div class="carousel">
        <slot></slot>
        <button class="carousel__nav carousel__next" @click.prevent="next"></button>
        <button class="carousel__nav carousel__prev" @click.prevent="prev"></button>
        <div class="carousel__pagination">
            <button v-for="n in slidesCount" @click="goto(n-1)" :class="{active: n-1 === index}"></button>
        </div>
    </div>
</template>

<script>
    export default {
        data () {
            return {
                index: 1,
                slides: [],
                direction: null
            }
        },
        mounted () {
            this.slides = this.$children
            this.slides.forEach((slide, i) => {
                slide.index = i
        })
            this.loop()
        },
        computed: {
            slidesCount () { return this.slides.length }
        },
        methods: {
            next () {
                this.index++
                this.direction = 'right'
                if (this.index >= this.slidesCount) {
                    this.index = 0
                }
            },
            prev () {
                this.index--
                this.direction = 'left'
                if (this.index < 0) {
                    this.index = this.slidesCount - 1
                }
            },
            goto (index) {
                this.direction = index > this.index ? 'right' : 'left'
                this.index = index
            },
            loop () {
                var self = this
                setInterval(() => {
                    self.next()
            }, 4000)
            }
        }
    }
</script>

<style scoped>
    .carousel {
        position: relative;
        overflow: hidden;
    }
    .carousel__nav {
        position: absolute;
        top: 50%;
        margin-top: -31px;
        left: 10px;
        background: url("prev.svg");
        width: 63px;
        height: 63px;
        border: none;
        text-decoration: none;
        cursor: pointer;
        opacity: 0.4;
    }
    button:hover {
        opacity: 1;
    }
    button:focus {
        outline: 0;
    }
    .carousel__nav.carousel__next {
        right: 10px;
        left: auto;
        background-image: url("next.svg");
    }
    .carousel__pagination {
        position: absolute;
        bottom: 10px;
        right: 0;
        left: 0;
        text-align: center;
    }
    .carousel__pagination button {
        display: inline-block;
        width: 10px;
        height: 10px;
        background-color: #000;
        opacity: 0.8;
        border-radius: 50%;
        margin: 0 2px;
        border: none;
        text-decoration: none;
        cursor: pointer;
    }
    .carousel__pagination button.active {
        background-color: #fff;
    }
</style>