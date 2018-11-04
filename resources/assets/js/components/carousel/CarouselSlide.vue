<template>
    <transition :name="transition">
        <div class="slide" v-show="visible">
            <slot></slot>
        </div>
    </transition>
</template>

<script>

    export default {
        data () {
            return {
                index: 0
            }
        },
        computed: {
            transition () {
                if (this.$parent.direction) {
                    return 'slide-' + this.$parent.direction
                }
            },
            visible () {
                return this.index === this.$parent.index
            }
        }
    }
</script>

<style scoped>
    .slide {
        text-align: center;
    }
    .slide-right-enter-active{
        animation: slideRightIn 0.8s;
    }
    .slide-right-leave-active{
        animation: slideRightOut 0.8s;
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        width: 100%;
    }

    @keyframes slideRightIn {
        from { transform: translateX(100%) }
        to { transform: translateX(0) }
    }
    @keyframes slideRightOut {
        from { transform: translateX(0) }
        to { transform: translateX(-100%) }
    }

    .slide-left-enter-active{
        animation: slideLeftIn 0.8s;
    }
    .slide-left-leave-active{
        animation: slideLeftOut 0.8s;
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        width: 100%;
    }
    @keyframes slideLeftIn {
        from { transform: translateX(-100%) }
        to { transform: translateX(0) }
    }
    @keyframes slideLeftOut {
        from { transform: translateX(0) }
        to { transform: translateX(100%) }
    }
</style>