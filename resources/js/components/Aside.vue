<template>
    <div class="w-64 fixed h-full z-10">
        <div class="mt-16 relative h-full bg-slate-700">
            <div class="flex flex-col">
                <div class="">
                  <router-link to="/dashboard" class="w-full flex text-xl flex-row items-center gap-2 text-white border-0 py-4 ps-4 focus:outline-none hover:bg-indigo-600">
                    <i class="fa-solid fa-chart-pie"></i> Dashboard
                  </router-link>
                </div>
                <div class="">
                  <router-link to="/users" class="w-full flex text-xl flex-row items-center gap-2 text-white border-0 py-4 ps-4 focus:outline-none hover:bg-indigo-600">
                    <i class="fa-solid fa-users"></i> Users
                  </router-link>
                </div>
                <div class="">
                  <router-link to="/messages" class="w-full flex text-xl flex-row items-center gap-2 text-white border-0 py-4 ps-4 focus:outline-none hover:bg-indigo-600">
                    <i class="fa-regular fa-message"></i> Messages
                  </router-link>
                </div>
                <div class="">
                  <router-link to="/posts" class="w-full flex text-xl flex-row items-center gap-2 text-white border-0 py-4 ps-4 focus:outline-none hover:bg-indigo-600">
                    <i class="fa-regular fa-newspaper"></i> Post
                  </router-link>
                </div>
                <div class="">
                  <router-link to="/games" class="w-full flex text-xl flex-row items-center gap-2 text-white border-0 py-4 ps-4 focus:outline-none hover:bg-indigo-600">
                    <i class="fa-solid fa-chess-knight"></i> Games
                  </router-link>
                </div>
                <div class="">
                  <router-link to="/orders" class="w-full flex text-xl flex-row items-center gap-2 text-white border-0 py-4 ps-4 focus:outline-none hover:bg-indigo-600">
                    <i class="fa-solid fa-cart-shopping"></i> Orders
                  </router-link>
                </div>
            </div>
        </div>
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
