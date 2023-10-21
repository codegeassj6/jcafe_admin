<template>
    <div>
        <Aside />
    <div class="md:ml-64 ml-16 max-w-6xl pt-20 px-4">
        <div class="mb-4">
            <button class="text-white bg-indigo-700 border-0 py-0.5 px-6 focus:outline-none hover:bg-indigo-600 rounded text-lg">
                <i class="fa-regular fa-plus mr-2 fa-lg"></i>Add Product
            </button>
        </div>

        <div class="border p-4 rounded">
            <div class="md:grid md:grid-cols-5 sm:grid sm:grid-cols-4 sm:grid-flow-col gap-4">
                <div class="col-span-2">
                    <img src="https://image.uniqlo.com/UQ/ST3/AsianCommon/imagesgoods/455503/sub/goods_455503_sub16.jpg?width=494" class="w-full h-40" alt="">
                </div>
                <div class="col-span-2">
                    <div class="text-xl text-indigo-700 font-bold">
                        Men' Shorts
                    </div>
                    <div class="text-yellow-400">
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star-half mr-2"></i>
                        <span class="text-indigo-700 font-bold">4.3</span>
                    </div>
                    <div>
                        Velit enim ad excepteur consequat ullamco. Cillum veniam ad proident irure. Reprehenderit cupidatat voluptate eiusmod consectetur magna reprehenderit ea laboris consequat nisi minim voluptate aliqua elit.
                    </div>
                </div>

                <div class="w-full flex flex-col px-4 col-span-1 border-l border-indigo-700">
                        <h3 class="text-2xl">$34</h3>

                        <div class="my-auto flex flex-col gap-2">
                            <button class="text-white bg-indigo-500 border-0 py-0.5 px-6 focus:outline-none hover:bg-indigo-600 rounded text-lg">
                                Update
                            </button>
                            <button class="text-white bg-red-700 border-0 py-0.5 px-6 focus:outline-none hover:bg-red-600 rounded text-lg">
                                Delete
                            </button>
                        </div>
                </div>

            </div>
        </div>
    </div>
</div>
</template>
<script>
import Aside from '../components/Aside.vue';

export default {
    data() {
        return {

        }
    },
    components: {
    Aside
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
