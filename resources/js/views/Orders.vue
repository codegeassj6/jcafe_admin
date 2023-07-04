<template>
  <div>
    <Aside />

    <div class="pt-20 ml-64 px-4">
      <div
        class="relative overflow-x-auto shadow-lg sm:rounded-lg border rounded p-4"
      >
        <table
          class="w-full text-sm text-left text-gray-500 dark:text-gray-400 mb-4"
        >
          <caption
            class="p-2 mb-2 text-lg font-semibold text-left text-gray-900 bg-white dark:text-white dark:bg-gray-800"
          >
            <div class="flex flex-row">
              <h3>Jhon Rey Repuela</h3>
              <div class="ms-auto">
                <i class="fa-solid fa-ellipsis-vertical"></i>
              </div>
            </div>
          </caption>
          <thead
            class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400"
          >
            <tr>
              <th scope="col" class="px-6 py-3">Product name</th>
              <th scope="col" class="px-6 py-3">Mode of Payment</th>
              <th scope="col" class="px-6 py-3">Variant</th>
              <th scope="col" class="px-6 py-3">Quantity</th>
              <th scope="col" class="px-6 py-3">Price</th>
              <th scope="col" class="px-6 py-3">Total</th>
              <th scope="col" class="px-6 py-3">
                <span class="sr-only">Edit</span>
              </th>
            </tr>
          </thead>
          <tbody>
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
              <th
                scope="row"
                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white"
              >
                <p>Apple MacBook Pro 17"</p>
              </th>
              <td class="px-6 py-4">Stripe</td>
              <td class="px-6 py-4">Silver</td>
              <td class="px-6 py-4">Laptop</td>
              <td class="px-6 py-4">$2999</td>
              <td class="px-6 py-4">$2999</td>
              <td class="px-6 py-4 text-right">
                <a
                  href="#"
                  class="font-medium text-blue-600 dark:text-blue-500 hover:underline"
                  >Edit</a
                >
              </td>
            </tr>
          </tbody>
        </table>
        <div class="flex flex-row-reverse bg-indigo-50 p-4">
          <h3>Total: $2328</h3>
        </div>
      </div>
    </div>
  </div>
</template>
<script>
import Aside from '../components/Aside.vue';

export default {
  data() {
    return {};
  },
  components: {
    Aside,
  },

  props: {},

  computed: {},

  methods: {},

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
