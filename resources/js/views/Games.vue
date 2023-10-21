<template>
    <div>
        <Aside />

        <div class="pt-20 px-4 ml-16 sm:ml-64">
            <div
                class="relative overflow-x-auto overflow-y-clip shadow-md sm:rounded-lg p-8 border"
            >
                <div
                    class="flex items-center justify-between pb-4 bg-white"
                >
                    <Menu>
                        <MenuButton
                            class="text-white bg-indigo-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2.5 text-center inline-flex items-center"
                            >Action</MenuButton
                        >
                        <MenuItems class="z-10 bg-white absolute mt-32 divide-y divide-gray-100 shadow w-56">
                            <MenuItem>
                                <a
                                    class="block px-4 py-2 cursor-pointer hover:bg-indigo-50"
                                    role="button"
                                    @click="modal.addGames = true"
                                >
                                Add Games
                                </a>
                            </MenuItem>
                            <MenuItem>
                                <a
                                    role="button"
                                    class="block px-4 py-2 cursor-pointer hover:bg-indigo-50"
                                    @click="deleteGames"
                                    >Delete Games</a
                                >
                            </MenuItem>
                        </MenuItems>
                    </Menu>

                    <label for="table-search-games" class="sr-only"
                        >Search</label
                    >
                    <div class="relative">
                        <div
                            class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none"
                        >
                            <svg
                                class="w-5 h-5 text-gray-500"
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
                            class="block p-2 pl-10 text-sm text-gray-900 border border-gray-300 rounded-lg w-80 bg-gray-50 focus:ring-blue-500 focus:border-blue-500"
                            placeholder="Search games"
                            @keyup="searchGames"
                        />
                    </div>
                </div>
                <table
                    class="w-full text-sm text-left text-gray-500"
                >
                    <thead
                        class="text-xs text-gray-700 uppercase bg-gray-50"
                    >
                        <tr>
                            <th scope="col" class="p-4">
                                <div class="flex items-center">
                                    <input
                                        id="checkbox-all"
                                        ref="checkbox_all"
                                        @change="selectAll"
                                        type="checkbox"
                                        class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500"
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
                            class="bg-white border-b items-center hover:bg-gray-50"
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
                                        class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500"
                                    />
                                    <label :for="game.id" class="sr-only"
                                        >checkbox</label
                                    >
                                </div>
                            </td>
                            <td class="px-2 py-4">
                                <div class="text-base text-dark font-semibold">
                                    {{ game.id }}
                                </div>
                            </td>
                            <td class="px-6 py-4">
                                <div class="text-base text-dark font-semibold">
                                    {{ game.name }}
                                </div>
                            </td>
                            <td class="px-6 py-4">
                                <button
                                    class="font-medium text-blue-600"
                                    @click="
                                        setEditModal(true),
                                            (form.editGames.data = game)
                                    "
                                >
                                    Edit
                                </button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <Dialog
            :open="modal.addGames"
            @close="setAddGames"
            class="z-50 bg-opacity-50 absolute bg-black w-full p-4 overflow-x-hidden overflow-y-auto inset-0 h-[calc(100%-1rem)] max-h-full"
        >
            <DialogPanel
                class="relative w-full max-w-5xl max-h-full justify-center mx-auto mt-24"
            >
                <div class="relative bg-white rounded-lg shadow p-8">
                    <DialogTitle class="text-xl font-bold mb-4 border-b"
                        >Add Games</DialogTitle
                    >
                    <DialogDescription>
                        <div class="relative mb-4">
                            <label
                                for="name"
                                class="leading-7 text-sm text-gray-600"
                                >Name</label
                            >
                            <input
                                type="text"
                                id="name"
                                v-model="form.addGames.name"
                                class="w-full bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out"
                            />
                        </div>

                        <div class="flex flex-row gap-4 mb-4">
                            <div class="w-full">
                                <label
                                    for="genre"
                                    class="leading-7 text-sm text-gray-600"
                                    >Genre</label
                                >
                                <input
                                    type="text"
                                    id="genre"
                                    v-model="form.addGames.genre"
                                    class="w-full bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out"
                                />
                            </div>

                            <div class="w-full">
                                <label
                                    for="rating"
                                    class="leading-7 text-sm text-gray-600"
                                    >Rating</label
                                >
                                <input
                                    type="number"
                                    id="rating"
                                    min="1"
                                    max="5"
                                    v-model="form.addGames.rating"
                                    class="w-full bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out"
                                />
                            </div>
                        </div>

                        <div class="relative mb-4">
                            <label
                                for="link"
                                class="leading-7 text-sm text-gray-600"
                                >Trailer Link</label
                            >
                            <input
                                type="url"
                                v-model="form.addGames.trailer_link"
                                id="link"
                                class="w-full bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out"
                            />
                        </div>

                        <div class="flex flex-row gap-2 mb-8">
                            <div
                                class="flex items-center justify-center w-full"
                            >
                                <label
                                    for="dropzone-file"
                                    class="flex flex-col items-center justify-center w-full h-64 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 hover:bg-gray-100"
                                >
                                    <div
                                        class="flex flex-col items-center justify-center pt-5 pb-6"
                                    >
                                        <svg
                                            class="w-8 h-8 mb-4 text-gray-500"
                                            aria-hidden="true"
                                            xmlns="http://www.w3.org/2000/svg"
                                            fill="none"
                                            viewBox="0 0 20 16"
                                        >
                                            <path
                                                stroke="currentColor"
                                                stroke-linecap="round"
                                                stroke-linejoin="round"
                                                stroke-width="2"
                                                d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2"
                                            />
                                        </svg>
                                        <p
                                            class="mb-2 text-sm text-gray-500"
                                        >
                                            <span class="font-semibold"
                                                >Click to upload</span
                                            >
                                        </p>
                                        <p
                                            class="text-xs text-gray-500"
                                        >
                                            PNG or JPG
                                        </p>
                                    </div>
                                    <input
                                        id="dropzone-file"
                                        @change="dropzoneAddGames"
                                        type="file"
                                        class="hidden"
                                        accept="image/png, image/jpeg"
                                    />
                                </label>
                            </div>

                            <div
                                class="flex justify-center align-self-center text-center w-full p-3"
                                v-if="form.addGames.temp_img"
                            >
                                <img
                                    :src="form.addGames.temp_img"
                                    alt=""
                                    class="w-full h-64 border border-indigo-700 rounded"
                                />
                            </div>
                        </div>

                        <div class="flex flex-row gap-4 justify-center">
                            <button
                                class="inline-flex text-white bg-indigo-700 border-0 py-2 px-6 focus:outline-none hover:bg-indigo-600 rounded text-lg"
                                type="button"
                                @click="addNewGame"
                            >
                                Add Game
                            </button>

                            <button
                                type="button"
                                class="inline-flex text-white bg-red-700 border-0 py-2 px-6 focus:outline-none hover:bg-indigo-600 rounded text-lg"
                                @click="
                                    (modal.addGames = false),
                                        (form.addGames.temp_img = '')
                                "
                            >
                                Cancel
                            </button>
                        </div>
                    </DialogDescription>
                </div>
            </DialogPanel>
        </Dialog>

        <Dialog
            :open="modal.editGames"
            @close="setEditModal"
            class="z-50 bg-opacity-50 absolute bg-black w-full p-4 overflow-x-hidden overflow-y-auto inset-0 h-[calc(100%)] max-h-full"
        >
            <DialogPanel
                class="relative w-full max-w-5xl max-h-full justify-center mx-auto mt-16 bg-white rounded-lg shadow p-8"
            >
                <DialogTitle class="text-xl font-bold mb-4 border-b"
                    >Edit Game</DialogTitle
                >
                <DialogDescription>
                    <div class="relative mb-4">
                        <label
                            for="name"
                            class="leading-7 text-sm text-gray-600"
                            >Name</label
                        >
                        <input
                            type="text"
                            :placeholder="form.editGames.data.name"
                            v-model="form.editGames.name"
                            class="w-full bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out"
                        />
                    </div>

                    <div class="flex flex-row gap-4 mb-4">
                        <div class="w-full">
                            <label
                                for="genre"
                                class="leading-7 text-sm text-gray-600"
                                >Genre</label
                            >
                            <input
                                type="text"
                                :placeholder="form.editGames.data.genre"
                                v-model="form.editGames.genre"
                                class="w-full bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out"
                            />
                        </div>

                        <div class="w-full">
                            <label
                                for="rating"
                                class="leading-7 text-sm text-gray-600"
                                >Rating</label
                            >
                            <input
                                type="number"
                                min="1"
                                max="5"
                                :placeholder="form.editGames.data.rating"
                                v-model="form.editGames.rating"
                                class="w-full bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out"
                            />
                        </div>
                    </div>

                    <div class="relative mb-4">
                        <label
                            for="link"
                            class="leading-7 text-sm text-gray-600"
                            >Trailer Link</label
                        >
                        <input
                            type="url"
                            :placeholder="form.editGames.data.trailer_link"
                            v-model="form.editGames.trailer_link"
                            class="w-full bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out"
                        />
                    </div>

                    <div class="mb-4 p-4 bg-indigo-50">
                        <div
                            class="flex justify-center items-center opacity-50 mb-2"
                        >
                            <img
                                :src="form.editGames.data.image_url"
                                alt=""
                                class="w-1/2 h-80 rounded-md"
                                ref="game_image"
                            />
                        </div>
                    </div>

                    <div class="flex justify-center mb-4">
                        <button
                            @click="this.$refs.change_image.click()"
                            class="inline-flex text-white bg-indigo-700 border-0 py-1 px-6 focus:outline-none hover:bg-indigo-600 rounded text-lg"
                        >
                            Change Image
                        </button>
                        <input
                            type="file"
                            ref="change_image"
                            @change="editImage"
                            class="hidden"
                        />
                    </div>
                </DialogDescription>

                <div class="flex flex-row gap-4 justify-center">
                    <button
                        class="inline-flex text-white bg-indigo-700 border-0 py-2 px-6 focus:outline-none hover:bg-indigo-600 rounded text-lg"
                        type="button"
                        @click="updateGame"
                    >
                        Update
                    </button>

                    <button
                        type="button"
                        class="inline-flex text-white bg-red-700 border-0 py-2 px-6 focus:outline-none hover:bg-indigo-600 rounded text-lg"
                        @click="modal.editGames = false"
                    >
                        Cancel
                    </button>
                </div>
            </DialogPanel>
        </Dialog>
    </div>
</template>
<script>
import {
    Dialog,
    DialogPanel,
    DialogTitle,
    DialogDescription,
    Menu,
    MenuButton,
    MenuItems,
    MenuItem,
} from "@headlessui/vue";
import Aside from "../components/Aside.vue";
import { userStore } from "../stores/userStore";

export default {
    data() {
        return {
            games: "",
            selected_games: [],
            modal: {
                addGames: false,
                editGames: false,
            },
            form: {
                addGames: {
                    name: "",
                    genre: "",
                    trailer_link: "",
                    image: "",
                    rating: "",
                    temp_img: "",
                },

                editGames: {
                    data: "",
                    name: "",
                    genre: "",
                    rating: "",
                    trailer_link: "",
                    editGames: "",
                },
            },
        };
    },

    components: {
        Dialog,
        DialogPanel,
        DialogTitle,
        DialogDescription,
        Aside,
        Menu,
        MenuButton,
        MenuItems,
        MenuItem,
    },

    props: {},

    computed: {},

    methods: {
        setEditModal(condition) {
            this.modal.editGames = condition;
        },

        dropzoneAddGames(e) {
            this.form.addGames.image =
                e.target.files[0] || e.dataTransfer.files[0];
            this.form.addGames.temp_img = URL.createObjectURL(
                this.form.addGames.image
            );
        },

        editImage(e) {
            this.form.editGames.image =
                e.target.files[0] || e.dataTransfer.files[0];
            this.$refs.game_image.src = URL.createObjectURL(
                this.form.editGames.image
            );
        },

        addNewGame() {
            const formData = new FormData();
            formData.append("image", this.form.addGames.image);
            formData.append("name", this.form.addGames.name);
            formData.append("genre", this.form.addGames.genre);
            formData.append("trailer_link", this.form.addGames.trailer_link);
            formData.append("rating", this.form.addGames.rating);

            const AuthStr = "Bearer ".concat(userStore().user.access_token);
            axios
                .post(`/api/games`, formData, {
                    headers: {
                        Authorization: AuthStr,
                        "Content-Type": "multipart/form-data",
                    },
                })
                .then((res) => {
                    this.games.unshift(res.data);
                    // this.games = res.data;

                    this.modal.addGames = false;
                    this.form.addGames.name = "";
                    this.form.addGames.image = "";
                    this.form.addGames.genre = "";
                    this.form.addGames.trailer_link = "";
                    this.form.addGames.rating = "";
                    this.form.addGames.temp_img = "";
                })
                .catch((err) => {
                    console.log(err.response.data.message);
                });
        },

        setAddGames(value) {
            this.modal.addGames = value;
        },

        getGames() {
            const AuthStr = "Bearer ".concat(userStore().user.access_token);
            axios({
                method: "get",
                url: `/api/games`,
                headers: { Authorization: AuthStr },
            })
                .then((res) => {
                    this.games = res.data;
                })
                .catch((err) => {});
        },

        searchGames(e) {
            if (e.target.value) {
                const AuthStr = "Bearer ".concat(userStore().user.access_token);
                axios({
                    method: "get",
                    params: { query: e.target.value },
                    url: `/api/games/search`,
                    headers: { Authorization: AuthStr },
                })
                    .then((res) => {
                        this.games = res.data;
                    })
                    .catch((err) => {});
            } else {
                this.getGames();
            }
        },

        selectAll(e) {
            if (e.target.checked) {
                this.games.forEach((game) => {
                    if (!this.selected_games.includes(game.id)) {
                        this.selected_games.push(game.id);
                    }
                });
            } else {
                this.selected_games = [];
            }
        },

        deleteGames() {
            const AuthStr = "Bearer ".concat(userStore().user.access_token);
            axios({
                method: "delete",
                data: { id: this.selected_games },
                url: `/api/games`,
                headers: {
                    Authorization: AuthStr,
                },
            })
                .then((res) => {
                    // this.games = res.data;
                    this.games.forEach((game, index) => {
                        if (this.selected_games.includes(game.id)) {
                            this.games.splice(index, 1);
                        }
                    });

                    this.selected_games = [];
                    this.$refs.checkbox_all.checked = false;
                })
                .catch((err) => {
                    console.log(err);
                });
        },

        updateGame() {
            let formData = new FormData();
            if (this.form.editGames.image) {
                formData.append("image", this.form.editGames.image);
            }

            formData.append("id", this.form.editGames.data.id);
            formData.append("name", this.form.editGames.name);
            formData.append("genre", this.form.editGames.genre);
            formData.append("trailer_link", this.form.editGames.trailer_link);
            formData.append("rating", this.form.editGames.rating);

            const AuthStr = "Bearer ".concat(userStore().user.access_token);
            axios
                .post(`/api/games/update`, formData, {
                    headers: {
                        Authorization: AuthStr,
                        "Content-Type": "multipart/form-data",
                    },
                })
                .then((res) => {
                    this.games.map((game, index) => {
                        if (game.id == this.form.editGames.data.id) {
                            this.games[index] = res.data;
                        }
                    });

                    this.modal.editGames = false;
                    this.form.editGames.name = "";
                    this.form.editGames.image = "";
                    this.form.editGames.genre = "";
                    this.form.editGames.trailer_link = "";
                    this.form.editGames.rating = "";
                })
                .catch((err) => {
                    console.log(err.response.data.message);
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
