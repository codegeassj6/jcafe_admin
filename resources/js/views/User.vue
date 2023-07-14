<template>
  <div>
    <Aside />

    <div class="pt-20 px-4 ml-16 md:ml-64">
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
                  role="button"
                  class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600"
                  @click="modal.add = true"
                  >Add User</a
                >
                <a
                  role="button"
                  class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600"
                  @click="deleteUser()"
                  >Delete User</a
                >
              </div>
            </PopoverPanel>
          </Popover>
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
              class="block p-2 pl-10 text-sm text-gray-900 border border-gray-300 rounded-lg w-80 bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
              placeholder="Search for users"
              @keyup="searchUser"
              ref="search"
            />
          </div>
        </div>
        <table
          class="w-full text-sm text-left text-gray-500 dark:text-gray-400"
        >
          <thead
            class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400"
          >
            <tr>
              <th scope="col" class="p-4">
                <div class="flex items-center">
                  <input
                    ref="checkbox_all"
                    @change="selectAll"
                    id="checkbox_id"
                    type="checkbox"
                    class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600"
                  />
                  <label for="checkbox_id" class="sr-only">checkbox</label>
                </div>
              </th>
              <th scope="col" class="px-2 py-3">ID</th>
              <th scope="col" class="px-6 py-3">Name</th>
              <th scope="col" class="px-6 py-3">Details</th>
              <th scope="col" class="px-6 py-3">Status</th>
              <th scope="col" class="px-6 py-3">Action</th>
            </tr>
          </thead>
          <tbody>
            <tr
              class="bg-white border-b items-center dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600"
              v-for="user in users"
              :key="user.id"
            >
              <td class="w-4 p-4">
                <div class="flex items-center">
                  <input
                    :id="user.id"
                    type="checkbox"
                    v-model="selected_users"
                    :value="user.id"
                    class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600"
                  />
                  <label :for="user.id" class="sr-only">checkbox</label>
                </div>
              </td>
              <td class="px-2 py-4">
                <div class="text-base text-dark font-semibold">
                  {{ user.id }}
                </div>
              </td>
              <td class="px-6 py-4">
                <div class="text-base text-dark font-semibold">
                  {{ user.first_name }} {{ user.last_name }}
                </div>
              </td>
              <td class="px-6 py-4">
                <p>Role: {{ user.role }}</p>
              </td>
              <td class="px-6 py-4">
                <div class="flex items-center">
                  <div class="h-2.5 w-2.5 rounded-full bg-green-500 mr-2"></div>
                  Online
                </div>
              </td>
              <td class="px-6 py-4">
                <a
                  role="button"
                  class="font-medium text-blue-600 dark:text-blue-500 hover:underline"
                  @click="initEditModal(true, user)"
                  >Edit
                </a>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>

    <Dialog
      v-if="edit_user"
      :open="modal.edit"
      @close="initEditModal"
      class="z-50 bg-opacity-50 absolute bg-black w-full p-4 overflow-x-hidden overflow-y-auto inset-0 h-[calc(100%-1rem)] max-h-full"
    >
      <DialogPanel
        class="relative w-full max-w-5xl max-h-full justify-center mx-auto mt-24"
      >
        <div class="relative bg-white rounded-lg shadow p-8">
          <DialogTitle class="text-xl font-bold mb-4 border-b"
            >Edit User</DialogTitle
          >
          <DialogDescription>
            <div class="flex flex-row gap-4">
              <div class="relative mb-4 w-full">
                <label for="first_name" class="leading-7 text-sm text-gray-600"
                  >First name</label
                >
                <input
                  type="text"
                  id="first_name"
                  ref="first_name"
                  class="w-full bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out"
                  :value="edit_user.first_name"
                />
              </div>
              <div class="relative mb-4 w-full">
                <label for="last_name" class="leading-7 text-sm text-gray-600"
                  >Last name</label
                >
                <input
                  type="text"
                  id="last_name"
                  ref="last_name"
                  class="w-full bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out"
                  :value="edit_user.last_name"
                />
              </div>
            </div>

            <div class="relative mb-4 w-full">
              <label for="email" class="leading-7 text-sm text-gray-600"
                >Email</label
              >
              <input
                type="text"
                id="email"
                ref="email"
                class="w-full bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out"
                :value="edit_user.email"
              />
            </div>

            <div class="flex flex-row gap-4">
              <div class="relative mb-4 w-full">
                <label for="password" class="leading-7 text-sm text-gray-600"
                  >Password</label
                >
                <input
                  type="password"
                  id="password"
                  ref="password"
                  class="w-full bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out"
                />
              </div>
              <div class="relative mb-4 w-full">
                <label
                  for="confirm_pass"
                  class="leading-7 text-sm text-gray-600"
                  >Confirm Password</label
                >
                <input
                  type="password"
                  id="confirm_pass"
                  ref="confirm_password"
                  class="w-full bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out"
                />
              </div>
            </div>

            <div class="relative mb-4">
              <label for="addr" class="leading-7 text-sm text-gray-600"
                >Address</label
              >
              <input
                type="text"
                id="addr"
                ref="address"
                class="w-full bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out"
                :value="edit_user.address"
              />
            </div>

            <div class="flex flex-row gap-4">
              <div class="relative mb-4 w-full">
                <label for="contact" class="leading-7 text-sm text-gray-600"
                  >Contact</label
                >
                <input
                  type="number"
                  id="contact"
                  ref="contact"
                  class="w-full bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out"
                  :value="edit_user.contact"
                />
              </div>
              <div class="relative mb-4 w-full">
                <label for="bday" class="leading-7 text-sm text-gray-600"
                  >Birthday</label
                >
                <input
                  type="date"
                  id="bday"
                  ref="birthday"
                  class="w-full bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out"
                  :value="edit_user.birthday"
                />
              </div>
            </div>
          </DialogDescription>

          <div class="flex flex-row-reverse gap-2">
            <button
              @click="updateUser"
              class="inline-flex text-white bg-indigo-700 border-0 py-1 px-6 focus:outline-none hover:bg-indigo-600 rounded text-lg"
            >
              Save
            </button>
            <button
              @click="initEditModal(false)"
              class="inline-flex text-white bg-red-700 border-0 py-1 px-6 focus:outline-none hover:bg-indigo-600 rounded text-lg"
            >
              Cancel
            </button>
          </div>
        </div>
      </DialogPanel>
    </Dialog>

    <Dialog
      :open="modal.add"
      @close="initAddModal"
      class="z-50 bg-opacity-50 absolute bg-black w-full p-4 overflow-x-hidden overflow-y-auto inset-0 h-[calc(100%-1rem)] max-h-full"
    >
      <DialogPanel
        class="relative w-full max-w-5xl max-h-full justify-center mx-auto mt-24"
      >
        <div class="relative bg-white rounded-lg shadow p-8">
          <DialogTitle class="text-xl font-bold mb-4 border-b"
            >Add User</DialogTitle
          >
          <DialogDescription>
            <div class="flex flex-row gap-4">
              <div class="relative mb-4 w-full">
                <label
                  for="add_first_name"
                  class="leading-7 text-sm text-gray-600"
                  >First Name</label
                >
                <input
                  v-model="form.addUser.first_name"
                  type="text"
                  id="add_first_name"
                  class="w-full bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out"
                />
              </div>

              <div class="relative mb-4 w-full">
                <label
                  for="add_last_name"
                  class="leading-7 text-sm text-gray-600"
                  >Last Name</label
                >
                <input
                  type="text"
                  v-model="form.addUser.last_name"
                  id="add_last_name"
                  class="w-full bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out"
                />
              </div>
            </div>

            <div class="relative mb-4">
              <label for="add_email" class="leading-7 text-sm text-gray-600"
                >Email</label
              >
              <input
                type="email"
                v-model="form.addUser.email"
                id="add_email"
                class="w-full bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out"
              />
            </div>

            <div class="flex flex-row gap-4">
              <div class="relative mb-4 w-full">
                <label
                  for="add_password"
                  class="leading-7 text-sm text-gray-600"
                  >Password</label
                >
                <input
                  type="password"
                  v-model="form.addUser.password"
                  id="add_password"
                  class="w-full bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out"
                />
              </div>

              <div class="relative mb-4 w-full">
                <label
                  for="add_confirm_pass"
                  class="leading-7 text-sm text-gray-600"
                  >Confirm Password</label
                >
                <input
                  type="password"
                  v-model="form.addUser.confirm_password"
                  id="add_confirm_pass"
                  class="w-full bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out"
                />
              </div>
            </div>

            <div class="relative mb-4 w-full">
              <label for="add_contact" class="leading-7 text-sm text-gray-600"
                >Address</label
              >
              <input
                type="text"
                id="add_address"
                v-model="form.addUser.address"
                class="w-full bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out"
              />
            </div>

            <div class="flex flex-row gap-4 mb-4">
              <div class="relative mb-4 w-full">
                <label for="add_contact" class="leading-7 text-sm text-gray-600"
                  >Contact</label
                >
                <input
                  type="number"
                  id="add_contact"
                  v-model="form.addUser.contact"
                  class="w-full bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out"
                />
              </div>

              <div class="relative mb-4 w-full">
                <label
                  for="add_birthday"
                  class="leading-7 text-sm text-gray-600"
                  >Birthday</label
                >
                <input
                  type="date"
                  v-model="form.addUser.birthday"
                  id="add_birthday"
                  class="w-full bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out"
                />
              </div>

              <div class="relative mb-4 w-full">
                <label for="role" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Role</label>
                <select id="role" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" v-model="form.addUser.role">
                  <option value="" selected>Choose role</option>
                  <option value="freelancer">Freelancer</option>
                  <option value="client">Client</option>
                  <option value="admin">Admin</option>
                </select>
              </div>

            </div>

            <div class="flex flex-row justify-center gap-4">
              <button
                class="inline-flex text-white bg-indigo-500 border-0 py-2 px-6 focus:outline-none hover:bg-indigo-600 rounded text-lg"
                @click="createUser"
              >
                Add User
              </button>
              <button
                class="inline-flex text-white bg-indigo-500 border-0 py-2 px-6 focus:outline-none hover:bg-indigo-600 rounded text-lg"
              >
                Cancel
              </button>
            </div>
          </DialogDescription>
        </div>
      </DialogPanel>
    </Dialog>
  </div>
</template>
<script>
import { Popover, PopoverButton, PopoverPanel } from "@headlessui/vue";
import Aside from "../components/Aside.vue";
import { userStore } from "../stores/userStore";

import {
  Dialog,
  DialogPanel,
  DialogTitle,
  DialogDescription,
} from "@headlessui/vue";

export default {
  data() {
    return {
      users: "",
      modal: {
        add: false,
        edit: false,
      },
      form: {
        addUser: {
          first_name: '',
          last_name: '',
          email: '',
          address: '',
          contact: '',
          birthday: '',
          password: '',
          confirm_password: '',
          role: '',
        }
      },
      edit_user: "",
      selected_users: [],
    };
  },
  components: {
    Popover,
    PopoverButton,
    PopoverPanel,
    Aside,
    Dialog,
    DialogPanel,
    DialogTitle,
    DialogDescription,
  },

  props: {},

  computed: {},

  methods: {
    deleteUser() {
      const AuthStr = 'Bearer '.concat(userStore().user.access_token);
      axios({
          method: 'delete',
          params: {id: this.selected_users},
          url: `/api/users`,
          headers: {Authorization: AuthStr}
      }).then(res => {console.log(res.data);
        this.users = res.data;
        this.selected_users = [];
      }).catch(err => {

      });
    },

    createUser() {
      axios({
        method: "post",
        url: `/api/users/`,
        params: {
          first_name: this.form.addUser.first_name,
          last_name: this.form.addUser.last_name,
          email: this.form.addUser.email,
          password: this.form.addUser.password,
          confirm_password: this.form.addUser.confirm_password,
          contact: this.form.addUser.contact,
          address: this.form.addUser.address,
          birthday: this.form.addUser.birthday,
          role: this.form.addUser.role
        },
        headers: {
          Authorization: `Bearer`.concat(userStore().user.access_token),
        },
      })
      .then((res) => {console.log(res.data);
        this.users.unshift(res.data);
        this.modal.add = false;
      })
      .catch((err) => {
        console.log(err.response.data);
      });
    },

    getAllUsers() {
      axios({
        method: "get",
        url: `/api/users`,
        headers: {
          Authorization: `Bearer`.concat(userStore().user.access_token),
        },
      })
      .then((res) => {
        this.users = res.data;
      })
      .catch((err) => {
        console.log(err.response.data);
      });
    },

    initEditModal(value, user) {
      this.modal.edit = value;
      this.edit_user = user;
    },

    initAddModal(value) {
      this.modal.add = value;
    },

    updateUser() {
      const AuthStr = "Bearer ".concat(userStore().user.access_token);
      axios({
        method: "patch",
        url: `/api/users/${this.edit_user.id}`,
        params: {
          first_name: this.$refs.first_name.value,
          last_name: this.$refs.last_name.value,
          email: this.$refs.email.value,
          password: this.$refs.password.value,
          confirm_password: this.$refs.confirm_password.value,
          address: this.$refs.address.value,
          contact: this.$refs.contact.value,
          birthday: this.$refs.birthday.value,
        },
        headers: { Authorization: AuthStr },
      })
        .then((res) => {
          this.modal.edit = false;
          this.users.forEach((user, index) => {
            if (user.id == this.edit_user.id) {
              this.users[index] = res.data;
            }
          });
          this.edit_user = "";
        })
        .catch((err) => {});
    },

    searchUser() {
      if (this.$refs.search.value == null) {
        this.getAllUsers();
      } else {
        const AuthStr = "Bearer ".concat(userStore().user.access_token);
        axios({
          method: "get",
          params: { query: this.$refs.search.value },
          url: `/api/users/search`,
          headers: { Authorization: AuthStr },
        })
          .then((res) => {
            this.users = res.data;
          })
          .catch((err) => {});
      }
    },

    selectAll(e) {
      if (e.target.checked) {
        this.users.forEach((user) => {
          if (!this.selected_users.includes(user.id)) {
            this.selected_users.push(user.id);
          }
        });
      } else {
        this.selected_users = [];
      }
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
    this.getAllUsers();
  },
};
</script>

<style scoped>
</style>
