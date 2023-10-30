<template>
    <div>
        <div
            class="flex items-center justify-between border-gray-200 bg-white py-3"
        >
            <div class="flex flex-1 justify-between sm:hidden">
                <a
                    href="#"
                    class="relative inline-flex items-center rounded-md border border-gray-300 bg-white px-4 py-2 text-sm font-medium text-gray-700 hover:bg-gray-50"
                    >Previous</a
                >
                <a
                    href="#"
                    class="relative ml-3 inline-flex items-center rounded-md border border-gray-300 bg-white px-4 py-2 text-sm font-medium text-gray-700 hover:bg-gray-50"
                    >Next</a
                >
            </div>
            <div
                class="hidden sm:flex sm:flex-1 sm:items-center sm:justify-between"
            >
                <!-- <div>
                    <p class="text-sm text-gray-700">
                        Showing
                        <span class="font-medium">1</span>
                        to
                        <span class="font-medium">{{ data.per_page }}</span>
                        of
                        <span class="font-medium">{{ data.total }}</span>
                        results
                    </p>
                </div> -->
                <div>
                    <nav
                        class="isolate inline-flex -space-x-px rounded-md shadow-sm"
                        aria-label="Pagination"
                    >
                        <a
                            role="button"
                            @click="prev(data.prev_page_url)"
                            class="relative inline-flex items-center rounded-l-md px-2 py-2 text-gray-400 ring-1 ring-inset ring-gray-300 hover:bg-gray-50 focus:z-20 focus:outline-offset-0"
                        >
                            <span class="sr-only">Previous</span>
                            <svg
                                class="h-5 w-5"
                                viewBox="0 0 20 20"
                                fill="currentColor"
                                aria-hidden="true"
                            >
                                <path
                                    fill-rule="evenodd"
                                    d="M12.79 5.23a.75.75 0 01-.02 1.06L8.832 10l3.938 3.71a.75.75 0 11-1.04 1.08l-4.5-4.25a.75.75 0 010-1.08l4.5-4.25a.75.75 0 011.06.02z"
                                    clip-rule="evenodd"
                                />
                            </svg>
                        </a>

                        <a
                            role="button"
                            @click="redirect(data.path, index)"
                            v-for="index in data.last_page"
                            :key="index"
                            aria-current="page"
                            :class="
                                data.current_page == index
                                    ? 'bg-indigo-700 text-white'
                                    : ''
                            "
                            class="relative z-10 inline-flex items-center border px-4 py-2 text-sm font-semibold focus:z-20 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600"
                            >{{ index }}</a
                        >

                        <a
                            role="button"
                            @click="next(data.next_page_url)"
                            class="relative inline-flex items-center rounded-r-md px-2 py-2 text-gray-400 ring-1 ring-inset ring-gray-300 hover:bg-gray-50 focus:z-20 focus:outline-offset-0"
                        >
                            <span class="sr-only">Next</span>
                            <svg
                                class="h-5 w-5"
                                viewBox="0 0 20 20"
                                fill="currentColor"
                                aria-hidden="true"
                            >
                                <path
                                    fill-rule="evenodd"
                                    d="M7.21 14.77a.75.75 0 01.02-1.06L11.168 10 7.23 6.29a.75.75 0 111.04-1.08l4.5 4.25a.75.75 0 010 1.08l-4.5 4.25a.75.75 0 01-1.06-.02z"
                                    clip-rule="evenodd"
                                />
                            </svg>
                        </a>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
export default {
    data() {
        return {};
    },
    components: {},

    props: ["data"],

    computed: {},

    methods: {
        next(url) {
            this.$parent.nextPage(url);
        },

        prev(url) {
            this.$parent.prevPage(url);
        },

        redirect(url, page) {
            this.$parent.goToPage(url, page);
        },
    },

    watch: {
        $data: {
            handler: function (val, oldVal) {
                console.log("watcher: ", val);
            },
            deep: true,
        },

        $props: {
            handler: function (val, oldVal) {
                console.log("watcher: ", val);
            },
            deep: true,
        },
        some_prop: function () {
            //do something if some_prop updated
        },
    },

    updated() {},

    beforeMounted() {},

    mounted() {},
};
</script>

<style scoped>
</style>
