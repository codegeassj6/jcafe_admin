<template>
    <div class="mt-20 px-2">
      <div class="grid grid-cols-4 gap-2">
        <div class="col-span-1">
          <div class="border p-4 text-center w-full rounded text-gray-500">
            <i class="fa-solid fa-user text-5xl mb-4"></i>
            <p>363</p>
          </div>
        </div>
        <div>
          s
        </div>
        <div>
          s
        </div>
        <div>
          s
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
