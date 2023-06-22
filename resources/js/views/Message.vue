<template>
  <div class="w-full flex flex-row gap-4">
    <div class="bg-indigo-50 fixed h-full w-80 pt-20">
      <div class="flex flex-row gap-2 align-center mb-4 px-2">
        <h3 class="text-1xl font-semibold ms-1">Messages</h3>
        <div class="bg-red-500 px-2 rounded-full text-white">3</div>
        <div class="ms-auto">
          <i class="fa-solid fa-ellipsis-vertical"></i>
        </div>
      </div>

      <div class="w-full mb-4 px-2">
        <div class="relative h-10 w-full min-w-[200px]">
          <div
            class="absolute top-2/4 right-3 grid h-5 w-5 -translate-y-2/4 place-items-center"
          >
            <i class="fas fa-search text-indigo-700" aria-hidden="true"></i>
          </div>
          <input
            class="peer w-full rounded-[7px] border border-blue-gray-200 border-t-transparent px-3 py-2.5 !pr-9 font-sans text-sm font-normal text-blue-gray-700 outline outline-0 transition-all placeholder-shown:border placeholder-shown:border-blue-gray-200 placeholder-shown:border-t-blue-gray-200 focus:border-2 focus:border-indigo-600 focus:border-t-transparent focus:outline-0 disabled:border-0 disabled:bg-blue-gray-50"
            placeholder=" "
          />
          <label
            class="before:content[' '] after:content[' '] pointer-events-none absolute left-0 -top-1.5 flex h-full w-full select-none text-[11px] font-normal leading-tight text-blue-gray-400 transition-all before:pointer-events-none before:mt-[6.5px] before:mr-1 before:box-border before:block before:h-1.5 before:w-2.5 before:rounded-tl-md before:border-t before:border-l before:border-blue-gray-200 before:transition-all after:pointer-events-none after:mt-[6.5px] after:ml-1 after:box-border after:block after:h-1.5 after:w-2.5 after:flex-grow after:rounded-tr-md after:border-t after:border-r after:border-blue-gray-200 after:transition-all peer-placeholder-shown:text-sm peer-placeholder-shown:leading-[3.75] peer-placeholder-shown:text-blue-gray-500 peer-placeholder-shown:before:border-transparent peer-placeholder-shown:after:border-transparent peer-focus:text-[11px] peer-focus:leading-tight peer-focus:text-indigo-600 peer-focus:before:border-t-2 peer-focus:before:border-l-2 peer-focus:before:border-indigo-600 peer-focus:after:border-t-2 peer-focus:after:border-r-2 peer-focus:after:border-indigo-600 peer-disabled:text-transparent peer-disabled:before:border-transparent peer-disabled:after:border-transparent peer-disabled:peer-placeholder-shown:text-blue-gray-500"
          >
            Search
          </label>
        </div>
      </div>

      <div class="flex flex-col h-full overflow-y-scroll">
        <div class="border bg-white cursor-pointer border-l-indigo-700 border-l-8 mx-2">
          <div class="p-2 flex flex-row gap-2 items-center">
            <img
              src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80"
              class="w-14 h-full rounded-full"
              alt=""
            />

            <div class="w-full">
              <div class="flex flex-row items-center">
                <h3 class="text-1xl text-indigo-700 font-bold">
                  Jhon Rey Repuela
                </h3>
                <div class="ms-auto text-gray-400 text-sm">4h</div>
              </div>
              <p>messages</p>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="ml-80 pt-16 h-screen">
        <div class="h-full relative">
          <div
            class="border bg-white shadow-md p-4 flex flex-row items-center gap-2 px-6 absolute w-full top-0"
          >
            <div class="relative h-10 w-full">
              <div
                class="absolute top-2/4 right-3 grid h-5 w-5 -translate-y-2/4 place-items-center"
              >
                <i class="fas fa-search text-indigo-700" aria-hidden="true"></i>
              </div>
              <input
                class="peer h-full w-full rounded-[7px] border border-blue-gray-200 px-3 py-2 !pr-9 font-sans text-sm font-normal text-blue-gray-700 outline outline-0 transition-all placeholder-shown:border placeholder-shown:border-blue-gray-200 placeholder-shown:border-t-blue-gray-200 focus:border-2 focus:border-indigo-600 focus:border-t-transparent focus:outline-0 disabled:border-0 disabled:bg-blue-gray-50"
                placeholder=" "
              />
              <label
                class="before:content[' '] after:content[' '] pointer-events-none absolute left-0 -top-1.5 flex h-full w-full select-none text-[11px] font-normal leading-tight text-blue-gray-400 transition-all before:pointer-events-none before:mt-[6.5px] before:mr-1 before:box-border before:block before:h-1.5 before:w-2.5 before:rounded-tl-md before:border-t before:border-l before:border-blue-gray-200 before:transition-all after:pointer-events-none after:mt-[6.5px] after:ml-1 after:box-border after:block after:h-1.5 after:w-2.5 after:flex-grow after:rounded-tr-md after:border-t after:border-r after:border-blue-gray-200 after:transition-all peer-placeholder-shown:text-sm peer-placeholder-shown:leading-[3.75] peer-placeholder-shown:text-blue-gray-500 peer-placeholder-shown:before:border-transparent peer-placeholder-shown:after:border-transparent peer-focus:text-[11px] peer-focus:leading-tight peer-focus:text-indigo-600 peer-focus:before:border-t-2 peer-focus:before:border-l-2 peer-focus:before:border-indigo-600 peer-focus:after:border-t-2 peer-focus:after:border-r-2 peer-focus:after:border-indigo-600 peer-disabled:text-transparent peer-disabled:before:border-transparent peer-disabled:after:border-transparent peer-disabled:peer-placeholder-shown:text-blue-gray-500"
              >
                Search in Conversation
              </label>
            </div>
            <div>
              <button
                class="inline-flex text-white bg-indigo-700 border-0 p-2.5 focus:outline-none hover:bg-indigo-500 rounded text-lg"
              >
                <i class="fa regular fa-cog"></i>
              </button>
            </div>
          </div>
          <div class="h-full py-20 overflow-y-scroll">


            <div class="px-6 py-2 flex flex-row gap-4">
              <div class="border shadow py-2 rounded px-4">
                Do magna eiusmod magna dolor culpa irure quis qui incididunt
                adipisicing adipisicing. Do magna eiusmod magna dolor culpa irure
                quis qui incididunt adipisicing adipisicing. Do magna eiusmod magna
                dolor culpa irure quis qui incididunt adipisicing adipisicing.
              </div>
              <img
                src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80"
                alt=""
                class="w-12 h-12 rounded-full"
              />
            </div>

            <div class="px-6 py-2 flex flex-row gap-4">
              <img
                src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80"
                alt=""
                class="w-12 h-12 rounded-full"
              />
              <div class="border shadow py-2 rounded px-4">
                Do magna eiusmod magna dolor culpa irure quis qui incididunt
                adipisicing adipisicing. Do magna eiusmod magna dolor culpa irure
                quis qui incididunt adipisicing adipisicing. Do magna eiusmod magna
                dolor culpa irure quis qui incididunt adipisicing adipisicing.
              </div>
            </div>

            <div class="px-6 py-2 flex flex-row gap-4">
              <div class="border shadow py-2 rounded px-4">
                Do magna eiusmod magna dolor culpa irure quis qui incididunt
                adipisicing adipisicing. Do magna eiusmod magna dolor culpa irure
                quis qui incididunt adipisicing adipisicing. Do magna eiusmod magna
                dolor culpa irure quis qui incididunt adipisicing adipisicing.
              </div>
              <img
                src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80"
                alt=""
                class="w-12 h-12 rounded-full"
              />
            </div>

            <div class="px-6 py-2 flex flex-row gap-4">
              <img
                src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80"
                alt=""
                class="w-12 h-12 rounded-full"
              />
              <div class="border shadow py-2 rounded px-4">
                Do magna eiusmod magna dolor culpa irure quis qui incididunt
                adipisicing adipisicing. Do magna eiusmod magna dolor culpa irure
                quis qui incididunt adipisicing adipisicing. Do magna eiusmod magna
                dolor culpa irure quis qui incididunt adipisicing adipisicing.
              </div>
            </div>

            <div class="px-6 py-2 flex flex-row gap-4">
              <div class="border shadow py-2 rounded px-4">
                Do magna eiusmod magna dolor culpa irure quis qui incididunt
                adipisicing adipisicing. Do magna eiusmod magna dolor culpa irure
                quis qui incididunt adipisicing adipisicing. Do magna eiusmod magna
                dolor culpa irure quis qui incididunt adipisicing adipisicing.
              </div>
              <img
                src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80"
                alt=""
                class="w-12 h-12 rounded-full"
              />
            </div>

            <div class="px-6 py-2 flex flex-row gap-4">
              <img
                src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80"
                alt=""
                class="w-12 h-12 rounded-full"
              />
              <div class="border shadow py-2 rounded px-4">
                Do magna eiusmod magna dolor culpa irure quis qui incididunt
                adipisicing adipisicing. Do magna eiusmod magna dolor culpa irure
                quis qui incididunt adipisicing adipisicing. Do magna eiusmod magna
                dolor culpa irure quis qui incididunt adipisicing adipisicing.
              </div>
            </div>

            <div class="px-6 py-2 flex flex-row gap-4">
              <div class="border shadow py-2 rounded px-4">
                Do magna eiusmod magna dolor culpa irure quis qui incididunt
                adipisicing adipisicing. Do magna eiusmod magna dolor culpa irure
                quis qui incididunt adipisicing adipisicing. Do magna eiusmod magna
                dolor culpa irure quis qui incididunt adipisicing adipisicing.
              </div>
              <img
                src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80"
                alt=""
                class="w-12 h-12 rounded-full"
              />
            </div>

            <div class="px-6 py-2 flex flex-row gap-4">
              <img
                src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80"
                alt=""
                class="w-12 h-12 rounded-full"
              />
              <div class="border shadow py-2 rounded px-4">
                Do magna eiusmod magna dolor culpa irure quis qui incididunt
                adipisicing adipisicing. Do magna eiusmod magna dolor culpa irure
                quis qui incididunt adipisicing adipisicing. Do magna eiusmod magna
                dolor culpa irure quis qui incididunt adipisicing adipisicing.
              </div>
            </div>

            <div class="px-6 py-2 flex flex-row gap-4">
              <div class="border shadow py-2 rounded px-4">
                Do magna eiusmod magna dolor culpa irure quis qui incididunt
                adipisicing adipisicing. Do magna eiusmod magna dolor culpa irure
                quis qui incididunt adipisicing adipisicing. Do magna eiusmod magna
                dolor culpa irure quis qui incididunt adipisicing adipisicing.
              </div>
              <img
                src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80"
                alt=""
                class="w-12 h-12 rounded-full"
              />
            </div>

            <div class="px-6 py-2 flex flex-row gap-4">
              <img
                src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80"
                alt=""
                class="w-12 h-12 rounded-full"
              />
              <div class="border shadow py-2 rounded px-4">
                Do magna eiusmod magna dolor culpa irure quis qui incididunt
                adipisicing adipisicing. Do magna eiusmod magna dolor culpa irure
                quis qui incididunt adipisicing adipisicing. Do magna eiusmod magna
                dolor culpa irure quis qui incididunt adipisicing adipisicing.
              </div>
            </div>

            <div class="px-6 py-2 flex flex-row gap-4">
              <div class="border shadow py-2 rounded px-4">
                Do magna eiusmod magna dolor culpa irure quis qui incididunt
                adipisicing adipisicing. Do magna eiusmod magna dolor culpa irure
                quis qui incididunt adipisicing adipisicing. Do magna eiusmod magna
                dolor culpa irure quis qui incididunt adipisicing adipisicing.
              </div>
              <img
                src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80"
                alt=""
                class="w-12 h-12 rounded-full"
              />
            </div>

            <div class="px-6 py-2 flex flex-row gap-4">
              <img
                src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80"
                alt=""
                class="w-12 h-12 rounded-full"
              />
              <div class="border shadow py-2 rounded px-4">
                Do magna eiusmod magna dolor culpa irure quis qui incididunt
                adipisicing adipisicing. Do magna eiusmod magna dolor culpa irure
                quis qui incididunt adipisicing adipisicing. Do magna eiusmod magna
                dolor culpa irure quis qui incididunt adipisicing adipisicing.
              </div>
            </div>

            <div class="px-6 py-2 flex flex-row gap-4">
              <div class="border shadow py-2 rounded px-4">
                Do magna eiusmod magna dolor culpa irure quis qui incididunt
                adipisicing adipisicing. Do magna eiusmod magna dolor culpa irure
                quis qui incididunt adipisicing adipisicing. Do magna eiusmod magna
                dolor culpa irure quis qui incididunt adipisicing adipisicing.
              </div>
              <img
                src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80"
                alt=""
                class="w-12 h-12 rounded-full"
              />
            </div>

            <div class="px-6 py-2 flex flex-row gap-4">
              <img
                src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80"
                alt=""
                class="w-12 h-12 rounded-full"
              />
              <div class="border shadow py-2 rounded px-4">
                Do magna eiusmod magna dolor culpa irure quis qui incididunt
                adipisicing adipisicing. Do magna eiusmod magna dolor culpa irure
                quis qui incididunt adipisicing adipisicing. Do magna eiusmod magna
                dolor culpa irure quis qui incididunt adipisicing adipisicing.
              </div>
            </div>

            <div class="px-6 py-2 flex flex-row gap-4">
              <div class="border shadow py-2 rounded px-4">
                Do magna eiusmod magna dolor culpa irure quis qui incididunt
                adipisicing adipisicing. Do magna eiusmod magna dolor culpa irure
                quis qui incididunt adipisicing adipisicing. Do magna eiusmod magna
                dolor culpa irure quis qui incididunt adipisicing adipisicing.
              </div>
              <img
                src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80"
                alt=""
                class="w-12 h-12 rounded-full"
              />
            </div>

            <div class="px-6 py-2 flex flex-row gap-4">
              <img
                src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80"
                alt=""
                class="w-12 h-12 rounded-full"
              />
              <div class="border shadow py-2 rounded px-4">
                Do magna eiusmod magna dolor culpa irure quis qui incididunt
                adipisicing adipisicing. Do magna eiusmod magna dolor culpa irure
                quis qui incididunt adipisicing adipisicing. Do magna eiusmod magna
                dolor culpa irure quis qui incididunt adipisicing adipisicing.
              </div>
            </div>


          </div>

          <footer class="absolute w-full bottom-0">
            <div
              class="border bg-white shadow-md p-4 flex flex-row items-center gap-2 px-6"
            >
              <div class="relative h-10 w-full">
                <div
                  class="absolute top-2/4 right-3 grid h-5 w-5 -translate-y-2/4 place-items-center"
                >
                  <a role="button">
                    <i
                      class="fa-solid fa-paperclip text-indigo-700"
                      aria-hidden="true"
                    ></i>
                  </a>
                </div>
                <input
                  class="peer h-full w-full rounded-[7px] border border-blue-gray-200 px-3 py-2 !pr-9 font-sans text-sm font-normal text-blue-gray-700 outline outline-0 transition-all placeholder-shown:border placeholder-shown:border-blue-gray-200 placeholder-shown:border-t-blue-gray-200 focus:border-2 focus:border-indigo-600 focus:border-t-transparent focus:outline-0 disabled:border-0 disabled:bg-blue-gray-50"
                  placeholder=" "
                />
                <label
                  class="before:content[' '] after:content[' '] pointer-events-none absolute left-0 -top-1.5 flex h-full w-full select-none text-[11px] font-normal leading-tight text-blue-gray-400 transition-all before:pointer-events-none before:mt-[6.5px] before:mr-1 before:box-border before:block before:h-1.5 before:w-2.5 before:rounded-tl-md before:border-t before:border-l before:border-blue-gray-200 before:transition-all after:pointer-events-none after:mt-[6.5px] after:ml-1 after:box-border after:block after:h-1.5 after:w-2.5 after:flex-grow after:rounded-tr-md after:border-t after:border-r after:border-blue-gray-200 after:transition-all peer-placeholder-shown:text-sm peer-placeholder-shown:leading-[3.75] peer-placeholder-shown:text-blue-gray-500 peer-placeholder-shown:before:border-transparent peer-placeholder-shown:after:border-transparent peer-focus:text-[11px] peer-focus:leading-tight peer-focus:text-indigo-600 peer-focus:before:border-t-2 peer-focus:before:border-l-2 peer-focus:before:border-indigo-600 peer-focus:after:border-t-2 peer-focus:after:border-r-2 peer-focus:after:border-indigo-600 peer-disabled:text-transparent peer-disabled:before:border-transparent peer-disabled:after:border-transparent peer-disabled:peer-placeholder-shown:text-blue-gray-500"
                >
                  Send Message
                </label>
              </div>
              <div>
                <button
                  class="inline-flex text-indigo-700 border-0 p-2.5 focus:outline-none hover:text-white hover:bg-indigo-500 rounded text-lg"
                >
                  <i class="fa-solid fa-paper-plane"></i>
                </button>
              </div>
            </div>
          </footer>
        </div>

    </div>
  </div>
</template>
<script>
import Aside from "../components/Aside.vue";

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
