<template>
    <div class="mx-auto max-w-screen-xl px-4 flex flex-row gap-4 h-full fixed left-0">

        <Aside />

        <div class="mt-16">
            s
        </div>
    </div>
</template>
<script>
import Aside from '../components/Aside.vue'

export default {
    data() {
        return {

        }
    },
    components: {
        Aside,
    },

    props: {

    },

    computed: {

    },

    methods: {

    },

    watch: {
        $data: {
            handler: function(val, oldVal) {
                console.log('watcher: ',val);
            },
            deep: true
        },

        $props: {
            handler: function(val, oldVal) {
                console.log('watcher: ',val);
            },
            deep: true
        },
        some_prop: function() {
            //do something if some_prop updated
        },
    },

    updated() {

    },

    beforeMounted() {

    },

    mounted() {

    },
}
</script>

<style scoped>

</style>
