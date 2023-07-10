<template>
  <div>
    <Aside />

    <div class="pt-20 px-4 ml-64">
      <div class="relative overflow-x-auto shadow-md sm:rounded-lg p-4 border">
        <div
          class="flex items-center justify-between pb-4 bg-white dark:bg-gray-900"
        >
          <Popover class="relative">
            <PopoverButton
              class="text-white bg-indigo-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2.5 text-center inline-flex items-center"
              >Actions
              <svg
                class="w-4 h-4 ml-2"
                aria-hidden="true"
                fill="none"
                stroke="currentColor"
                viewBox="0 0 24 24"
                xmlns="http://www.w3.org/2000/svg"
              >
                <path
                  stroke-linecap="round"
                  stroke-linejoin="round"
                  stroke-width="2"
                  d="M19 9l-7 7-7-7"
                ></path>
              </svg>
            </PopoverButton>
            <PopoverPanel
              class="z-10 bg-white absolute mt-2 divide-y divide-gray-100 shadow w-56"
            >
              <div class="py-2 text-sm text-gray-700">
                <a
                  @click="setIsOpen(modal.addGames = true)"
                  role="button"
                  class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600"
                  >Add Games</a
                >
                <a
                  role="button"
                  class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600"
                  @click="deleteGames"
                  >Delete Games</a
                >
              </div>
            </PopoverPanel>
          </Popover>
          <label for="table-search-games" class="sr-only">Search</label>
          <div class="relative">
            <div
              class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none"
            >
              <svg
                class="w-5 h-5 text-gray-500 dark:text-gray-400"
                aria-hidden="true"
                fill="currentColor"
                viewBox="0 0 20 20"
                xmlns="http://www.w3.org/2000/svg"
              >
                <path
                  fill-rule="evenodd"
                  d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                  clip-rule="evenodd"
                ></path>
              </svg>
            </div>
            <input
              type="text"
              id="table-search-games"
              class="block p-2 pl-10 text-sm text-gray-900 border border-gray-300 rounded-lg w-80 bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
              placeholder="Search games"
              @keyup="searchGames"
            />
          </div>
        </div>
        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
          <thead
            class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400"
          >
            <tr>
              <th scope="col" class="p-4">
                <div class="flex items-center">
                  <input
                    id="checkbox-all"
                    @change="selectAll"
                    type="checkbox"
                    class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600"
                  />
                  <label for="checkbox-all" class="sr-only"
                    >checkbox</label
                  >
                </div>
              </th>
              <th scope="col" class="px-2 py-3">ID</th>
              <th scope="col" class="px-6 py-3">Name</th>
              <th scope="col" class="px-6 py-3">Action</th>
            </tr>
          </thead>
          <tbody>
            <tr
              class="bg-white border-b items-center dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600"
              v-for="game in games"
              :key="game.id"
            >
              <td class="w-4 p-4">
                <div class="flex items-center">
                  <input
                    v-model="selected_games"
                    :value="game.id"
                    :id="game.id"
                    type="checkbox"
                    class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600"
                  />
                  <label :for="game.id" class="sr-only"
                    >checkbox</label
                  >
                </div>
              </td>
              <td class="px-2 py-4">
                <div class="text-base text-dark font-semibold">{{ game.id }}</div>
              </td>
              <td class="px-6 py-4">
                <div class="text-base text-dark font-semibold">{{ game.name }}</div>
              </td>
              <td class="px-6 py-4">
                <a
                  href="#"
                  class="font-medium text-blue-600 dark:text-blue-500 hover:underline"
                  >Edit
                </a>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>


    <Dialog :open="modal.addGames" @close="setIsOpen" class="relative z-50">
    <div class="fixed inset-0 flex items-center justify-center p-4">
      <DialogPanel class="w-full max-w-sm rounded bg-white">
        <DialogTitle>Complete your order</DialogTitle>
        <DialogDescription>
          This will permanently deactivate your account
        </DialogDescription>
      </DialogPanel>
    </div>
  </Dialog>


  </div>
</template>
<script>
import { Popover, PopoverButton, PopoverPanel, Dialog, DialogPanel, DialogTitle, DialogDescription } from "@headlessui/vue";
import Aside from '../components/Aside.vue';
import { userStore } from "../stores/userStore";

export default {
  data() {
    return {
      games: '',
      selected_games: [],
      modal: {
        addGames: false,
      },
    };
  },
  components: {
    Popover,
    PopoverButton,
    PopoverPanel,
    Dialog,
    DialogPanel,
    DialogTitle,
    DialogDescription,
    Aside,
  },

  props: {},

  computed: {},

  methods: {
    setIsOpen() {},

    getGames() {
      const AuthStr = 'Bearer '.concat(userStore().user.access_token);
      axios({
          method: 'get',
          url: `/api/games`,
          headers: {Authorization: AuthStr}
      }).then(res => {
        this.games = res.data
      }).catch(err => {

      });
    },

    searchGames(e) {
      if(e.target.value) {
        const AuthStr = 'Bearer '.concat(userStore().user.access_token);
        axios({
            method: 'get',
            params: {query: e.target.value},
            url: `/api/games/search`,
            headers: {Authorization: AuthStr}
        }).then(res => {
          this.games = res.data;
        }).catch(err => {

        });
      } else {
        this.getGames();
      }
    },

    selectAll(e) {
      if(e.target.checked) {
        this.games.forEach((game) => {
          if(!this.selected_games.includes(game.id)) {
            this.selected_games.push(game.id);
          }
        });
      } else {
        this.selected_games = [];
      }
    },

    initAddGames() {

    },

    addGames() {

    },

    deleteGames() {
      const AuthStr = 'Bearer '.concat(userStore().user.access_token);
      axios({
          method: 'delete',
          data: {id: this.selected_games},
          url: `/api/games`,
          headers: {Authorization: AuthStr},
      }).then(res => {

      }).catch(err => {
        console.log(err.response);
      });
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

  mounted() {
    this.getGames();
  },
};
</script>

<style scoped>
</style>
