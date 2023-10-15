<template>
    <div>
        <Aside />

        <div class="md:ml-64 ml-16 xl:max-w-7xl pt-20 px-4">
            <div class="mb-4">
                <div
                    class="w-full mb-4 border border-gray-200 rounded-lg bg-gray-50 dark:bg-gray-700 dark:border-gray-600"
                >
                    <div
                        class="px-4 py-2 bg-white rounded-t-lg dark:bg-gray-800"
                    >
                        <label for="comment" class="sr-only"
                            >Your comment</label
                        >
                        <textarea
                            id="comment"
                            rows="8"
                            class="w-full mb-2 px-0 text-sm text-gray-900 bg-white border-0 focus:outline-none dark:bg-gray-800 focus:ring-0 dark:text-white dark:placeholder-gray-400"
                            placeholder="Write a comment..."
                            required
                            v-model="form.post.message"
                        ></textarea>

                        <div
                            class="grid grid-cols-5 gap-4 mb-4"
                            v-if="form.post.attachments.images.temp_link.length"
                        >
                            <div
                                class="relative"
                                v-for="(image, index) in form.post.attachments
                                    .images.temp_link"
                                :key="index"
                            >
                                <div class="absolute right-0 top-0 z-10">
                                    <button
                                        class="inline-flex text-indigo-700 border-0 focus:outline-none bg-gray-400 p-1 hover:text-indigo-300 rounded"
                                        @click="removeAttachFiles(image)"
                                    >
                                        <i class="fa-solid fa-xmark"></i>
                                    </button>
                                </div>
                                <img
                                    :src="image"
                                    class="h-32 w-full rounded"
                                    alt=""
                                />
                            </div>
                        </div>

                        <div v-if="form.post.attachments.files.name.length">
                            <div
                                class="flex flex-row justify-between border rounded p-2 w-full mb-2"
                                v-for="(name, index) in form.post.attachments
                                    .files.name"
                                :key="index"
                            >
                                <div class="text-indigo-700">
                                    {{ name }}
                                </div>
                                <div>
                                    <button
                                        class="inline-flex text-indigo-700 border-0 focus:outline-none hover:text-indigo-300 rounded"
                                        @click="removeAttachFiles(name)"
                                    >
                                        <i class="fa-solid fa-xmark"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div
                        class="flex items-center justify-between px-3 py-2 border-t dark:border-gray-600"
                    >
                        <div class="flex pl-0 space-x-1 sm:pl-2">
                            <div>
                                <button
                                    type="button"
                                    class="inline-flex justify-center p-2 text-gray-500 rounded cursor-pointer hover:text-gray-900 hover:bg-gray-100 dark:text-gray-400 dark:hover:text-white dark:hover:bg-gray-600"
                                    @click="initAttachFile"
                                >
                                    <svg
                                        aria-hidden="true"
                                        class="w-5 h-5"
                                        fill="currentColor"
                                        viewBox="0 0 20 20"
                                        xmlns="http://www.w3.org/2000/svg"
                                    >
                                        <path
                                            fill-rule="evenodd"
                                            d="M8 4a3 3 0 00-3 3v4a5 5 0 0010 0V7a1 1 0 112 0v4a7 7 0 11-14 0V7a5 5 0 0110 0v4a3 3 0 11-6 0V7a1 1 0 012 0v4a1 1 0 102 0V7a3 3 0 00-3-3z"
                                            clip-rule="evenodd"
                                        ></path>
                                    </svg>
                                    <span class="sr-only">Attach file</span>
                                </button>
                                <input
                                    type="file"
                                    ref="attachFiles"
                                    class="hidden"
                                    @change="morphAttachFiles"
                                    multiple
                                />
                            </div>
                        </div>
                        <button
                            type="button"
                            @click="createPost"
                            class="inline-flex items-center py-1 px-12 font-medium text-center text-white bg-indigo-700 rounded-lg focus:ring-4 focus:ring-blue-200 dark:focus:ring-blue-900 hover:bg-indigo-600"
                        >
                            Post
                        </button>
                    </div>
                </div>
            </div>
            <div
                class="border rounded mb-4"
                v-for="post in posts"
                :key="post.id"
            >
                <div class="flex flex-row gap-4 pl-4 pr-4 pt-4 pb-2">
                    <img
                        src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80"
                        alt=""
                        width="50"
                        height="50"
                        class="rounded-full"
                    />
                    <div>
                        <h4 class="text-xl font-bold text-indigo-700">
                            {{
                                post.get_user_details.first_name +
                                " " +
                                post.get_user_details.last_name
                            }}
                        </h4>
                        <p class="text-gray-400">Friday, May 12, 2020</p>
                    </div>
                    <div class="ms-auto">
                        <Popover class="relative">
                            <PopoverButton
                                class="w-8 h-8 hover:bg-indigo-50 hover:rounded-full"
                                ><i class="fa-solid fa-ellipsis-vertical"></i
                            ></PopoverButton>

                            <PopoverPanel
                                class="absolute right-0 z-10 w-48 origin-top-right rounded-md bg-white py-1 shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none"
                            >
                                <div class="flex flex-col gap-1 p-2">
                                    <a
                                        role="button"
                                        @click="
                                            (modal.post.edit.state = true),
                                                (modal.post.edit.data = post)
                                        "
                                        class="hover:bg-indigo-50"
                                        >Edit</a
                                    >
                                    <span><hr /></span>
                                    <a
                                        role="button"
                                        @click="deletePost(post)"
                                        class="hover:bg-indigo-50"
                                        >Delete</a
                                    >
                                </div>
                            </PopoverPanel>
                        </Popover>
                    </div>
                </div>

                <div class="px-4 mb-2">
                    {{ post.message }}
                </div>

                <div
                    class="px-4 mb-2 text-indigo-700"
                    v-if="post.get_post_attachment_images"
                >
                    <div v-if="post.get_post_attachment_images.length == 1">
                        <div
                            class="grid grid-cols-1 mb-4 px-24 rounded bg-indigo-50"
                        >
                            <img
                                :src="attachment.image_url"
                                alt=""
                                class="w-full h-96"
                                v-for="attachment in post.get_post_attachment_images"
                                :key="attachment.id"
                            />
                        </div>
                    </div>

                    <div
                        class="flex flex-row mb-4 rounded bg-indigo-50"
                        v-if="post.get_post_attachment_images.length == 2"
                    >
                        <div
                            v-for="attachment in post.get_post_attachment_images"
                            :key="attachment.id"
                        >
                            <img
                                :src="attachment.image_url"
                                class="w-full h-96 border border-indigo-700"
                            />
                        </div>
                    </div>

                    <div
                        class="flex flex-row mb-4 rounded bg-indigo-50"
                        v-if="post.get_post_attachment_images.length == 3"
                    >
                        <div
                            v-for="attachment in post.get_post_attachment_images"
                            :key="attachment.id"
                            class="w-1/3"
                        >
                            <img
                                :src="attachment.image_url"
                                alt=""
                                class="h-96 w-full border border-indigo-700"
                            />
                        </div>
                    </div>

                    <div
                        class="grid grid-cols-2 mb-4 rounded bg-indigo-50"
                        v-if="post.get_post_attachment_images.length == 4"
                    >
                        <div
                            v-for="attachment in post.get_post_attachment_images"
                            :key="attachment.id"
                        >
                            <img
                                :src="attachment.image_url"
                                alt=""
                                class="w-full h-96 border border-indigo-700"
                            />
                        </div>
                    </div>

                    <div
                        class="grid grid-cols-2 mb-4 rounded bg-indigo-50"
                        v-if="post.get_post_attachment_images.length >= 5"
                    >
                        <div
                            v-for="(
                                attachment, index
                            ) in post.get_post_attachment_images"
                            :key="attachment.id"
                        >
                            <div>
                                <img
                                    :src="attachment.image_url"
                                    :alt="index"
                                    class="w-full h-96 border border-indigo-700"
                                    v-if="index <= 2"
                                />
                            </div>
                            <div class="opacity-50 relative" v-if="index == 3">
                                <img
                                    :src="attachment.image_url"
                                    alt=""
                                    class="w-full h-96 border border-indigo-700"
                                />
                                <div
                                    class="absolute left-1/2 top-1/2 w-64 flex flex-col"
                                >
                                    <i class="fa-solid fa-plus fa-2x"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div v-if="post.get_post_attachment_files">
                    <div
                        class="flex flex-row justify-between border px-4 py-1 rounded bg-indigo-50 text-indigo-700 mb-4"
                        v-for="file in post.get_post_attachment_files"
                        :key="file.id"
                    >
                        <h3>{{ file.name }}</h3>
                        <div>
                            <a :href="file.file_url" target="_blank"
                                ><i class="fa-solid fa-download"></i
                            ></a>
                        </div>
                    </div>
                </div>

                <div class="flex flex-row px-4 gap-4 mb-4">
                    <div class="text-indigo-700 flex flex-row gap-1">
                        <a role="button" @click="storeLike(post)">
                            <i
                                :class="
                                    post.authLikes ? 'fa-solid' : 'fa-regular'
                                "
                                class="fa-thumbs-up"
                            ></i
                        ></a>
                        <span v-if="post.get_likes">{{
                            post.get_likes.length
                        }}</span>
                        <span v-if="post.get_likes.length < 2">Like</span>
                        <span v-else>Likes</span>
                    </div>
                    <div class="text-indigo-700 flex flex-row gap-1">
                        <span><i class="fa-regular fa-comments"></i></span>
                        <span>{{
                            post.comment_counts
                        }}</span>
                        <span v-if="post.comment_counts < 2">comment</span>
                        <span v-else>Comments</span>
                    </div>
                    <div class="ms-auto">
                        <button
                            class="inline-flex text-white bg-indigo-700 border-0 py-0.5 px-6 focus:outline-none hover:bg-indigo-600 rounded text-lg"
                        >
                            Latest comments
                        </button>
                    </div>
                </div>

                <Comment :post="post" />
            </div>
        </div>

        <Dialog
            :open="modal.post.edit.state"
            @close="modal.post.edit.state = false"
            class="z-50 bg-opacity-50 fixed bg-black w-full overflow-x-hidden overflow-y-auto inset-0 max-h-full"
        >
            <DialogPanel
                class="relative w-full max-w-5xl max-h-full justify-center mx-auto mt-24"
            >
                <div class="relative bg-white rounded-lg shadow p-8">
                    <DialogTitle class="text-xl font-bold mb-4 border-b"
                        >Edit Post</DialogTitle
                    >
                    <DialogDescription class="border-b mb-4">
                        <div
                            contenteditable="true"
                            class="focus:outline-none px-2 mb-4"
                            ref="edit_post_message"
                        >
                            {{ modal.post.edit.data.message }}
                        </div>
                    </DialogDescription>

                    <div class="flex flex-row-reverse gap-2">
                        <button
                            @click="updatePost"
                            class="inline-flex text-white bg-indigo-700 border-0 py-1 px-4 focus:outline-none hover:bg-indigo-500 rounded text-lg"
                        >
                            Update
                        </button>
                        <button
                            @click="modal.post.edit.state = false"
                            class="inline-flex text-white bg-red-700 border-0 py-1 px-4 focus:outline-none hover:bg-red-500 rounded text-lg"
                        >
                            Close
                        </button>
                    </div>
                </div>
            </DialogPanel>
        </Dialog>
    </div>
</template>
<script>
import Aside from "../components/Aside.vue";
import { userStore } from "../stores/userStore";
import Comment from "../components/Comment.vue";
import {
    Popover,
    PopoverButton,
    PopoverPanel,
    Dialog,
    DialogPanel,
    DialogTitle,
    DialogDescription,
} from "@headlessui/vue";

export default {
    data() {
        return {
            posts: "",
            form: {
                post: {
                    attachments: {
                        files: {
                            name: [],
                        },
                        images: {
                            temp_link: [],
                        },
                        isExist: false,
                    },
                    message: "",
                    formData: "",
                },
            },

            modal: {
                post: {
                    edit: {
                        state: false,
                        data: "",
                        form: {
                            message: "",
                        },
                    },
                },
            },
        };
    },
    components: {
        Aside,
        Comment,
        Popover,
        PopoverButton,
        PopoverPanel,
        Dialog,
        DialogPanel,
        DialogTitle,
        DialogDescription,
    },

    props: {},

    computed: {},

    methods: {
        deletePost(post) {
            const AuthStr = "Bearer ".concat(userStore().user.access_token);
            axios({
                method: "delete",
                params: {
                    id: post.id,
                },
                url: `/api/posts`,
                headers: { Authorization: AuthStr },
            })
                .then((res) => {
                    this.posts.forEach((post_each, index) => {
                        if(post_each.id == post.id) {
                            this.posts.splice(index, 1);
                        }
                    })
                })
                .catch((err) => {
                    console.log(err.response);
                });
        },

        updatePost() {
            const AuthStr = "Bearer ".concat(userStore().user.access_token);
            axios({
                method: "patch",
                params: {
                    id: this.modal.post.edit.data.id,
                    message: this.$refs.edit_post_message.textContent,
                },
                url: `/api/posts`,
                headers: { Authorization: AuthStr },
            })
                .then((res) => {
                    this.posts.forEach((post, index) => {
                        if (post.id == this.modal.post.edit.data.id) {
                            this.posts[index].message = res.data.message;
                        }
                    });
                    this.modal.post.edit.state = false;
                })
                .catch((err) => {
                    console.log(err.response);
                });
        },

        storeLike(post) {
            const AuthStr = "Bearer ".concat(userStore().user.access_token);
            axios({
                method: "post",
                url: `/api/posts/${post.id}/like`,
                headers: { Authorization: AuthStr },
            })
                .then((res) => {
                    if (res.data.message == "like") {
                        post.authLikes = 1;
                        post.get_likes.unshift(res.data.data);
                    } else {
                        post.authLikes = 0;
                        this.posts.forEach((post_data, post_index) => {
                            if (post_data.id == post.id) {
                                post_data.get_likes.forEach(
                                    (post_like, post_like_index) => {
                                        if (post_like.user_id == post.user_id) {
                                            post_data.get_likes.splice(
                                                post_like_index,
                                                1
                                            );
                                        }
                                    }
                                );
                            }
                        });
                    }
                })
                .catch((err) => {
                    console.log(err.response.data.message);
                });
        },

        initAttachFile() {
            this.$refs.attachFiles.click();
        },

        getFileFormat(fileName) {
            var re = /(?:\.([^.]+))?$/;
            var ext = re.exec(fileName)[1];
            return ext.trim();
        },

        removeAttachFiles(params) {
            this.form.post.attachments.images.temp_link.forEach(
                (link, index) => {
                    if (link == params) {
                        this.form.post.attachments.images.temp_link.splice(
                            index,
                            1
                        );
                    }
                }
            );

            this.form.post.attachments.files.name.forEach((name, index) => {
                if (name == params) {
                    this.form.post.attachments.files.name.splice(index, 1);
                }
            });
        },

        morphAttachFiles() {
            if (!this.$refs.attachFiles.files.length) {
                return false;
            }

            this.form.post.attachments.images.temp_link = [];
            this.form.post.attachments.files.name = [];

            let formData = new FormData();
            for (
                let index = 0;
                index < this.$refs.attachFiles.files.length;
                index++
            ) {
                if (
                    this.getFileFormat(
                        this.$refs.attachFiles.files[index].name
                    ) == "png" ||
                    this.getFileFormat(
                        this.$refs.attachFiles.files[index].name
                    ) == "jpeg" ||
                    this.getFileFormat(
                        this.$refs.attachFiles.files[index].name
                    ) == "jpg"
                ) {
                    this.form.post.attachments.images.temp_link.push(
                        URL.createObjectURL(this.$refs.attachFiles.files[index])
                    );
                } else {
                    this.form.post.attachments.files.name.push(
                        this.$refs.attachFiles.files[index].name
                    );
                }

                formData.append("files[]", this.$refs.attachFiles.files[index]);
            }
            this.form.post.attachments.isExist = true;
            this.form.post.formData = formData;
        },

        getPost() {
            const AuthStr = "Bearer ".concat(userStore().user.access_token);
            axios({
                method: "get",
                url: `/api/posts`,
                headers: { Authorization: AuthStr },
            })
                .then((res) => {
                    this.posts = res.data;
                })
                .catch((err) => {
                    console.log(err.response.data.message);
                });
        },

        createPost() {
            const AuthStr = "Bearer ".concat(userStore().user.access_token);
            axios({
                method: "post",
                params: {
                    message: this.form.post.message,
                },
                data: this.form.post.formData,
                url: `/api/posts`,
                headers: { Authorization: AuthStr },
            })
                .then((res) => {
                    this.posts.unshift(res.data);
                    this.form.post.message = "";
                    this.form.post.attachments.files.name = [];
                    this.form.post.attachments.images.temp_link = [];
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
        this.getPost();
    },
};
</script>

<style scoped>
</style>
