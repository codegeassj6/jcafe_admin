<template>
    <div class="flex flex-row text-sm mb-1 items-center">
        <i v-for="count in 5" :key="count" class="fa-solid fa-star text-yellow-400"></i>
        <span class="ml-1">{{ counts }}</span>
    </div>
</template>
<script>


export default {
    data() {
        return {

        }
    },
    components: {

    },

    props: {
        counts: Number,
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
