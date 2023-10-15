<template>
    <div>
        <div
            class="bg-indigo-50 py-4 px-12 flex flex-col gap-4 border"
            v-for="comment in comments.data"
            :key="comment.id"
        >
            <div class="flex flex-row gap-4">
                <img
                    src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80"
                    alt=""
                    class="rounded-full w-12 h-12"
                />
                <div>
                    <div class="flex flex-row gap-2 items-center">
                        <h4 class="text-lg text-indigo-700 font-bold">
                            Jhon Rey Repuela
                        </h4>
                        <p class="text-gray-400"></p>
                    </div>
                    <p class="text-gray-400">
                        {{ comment.message }}
                    </p>
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
                            <div class="flex flex-col gap-1">
                                <div class="w-full">
                                    <a
                                        role="button"
                                        class="hover:bg-indigo-50 block px-2 py-1"
                                        >Edit</a
                                    >
                                </div>
                                <div class="w-full">
                                    <a
                                        role="button"
                                        class="hover:bg-indigo-50 block px-2 py-1"
                                        @click="deleteComment(comment)"
                                        >Delete</a
                                    >
                                </div>
                            </div>
                        </PopoverPanel>
                    </Popover>
                </div>
            </div>
            <div class="text-indigo-700">
                <a role="button" @click="storeLike(comment)"
                    ><i
                        class="fa-thumbs-up mr-1"
                        :class="comment.authLikes ? 'fa-solid' : 'fa-regular'"
                    ></i
                ></a>
                <span class="mr-1">{{ comment.get_likes.length }}</span>
                <span v-if="comment.get_likes.length < 2">like</span>
                <span v-else>likes</span>
            </div>
        </div>

        <div class="text-indigo-700 mt-2 mx-4">
            <a
                role="button"
                v-if="comments.next_page_url"
                @click="commentNextPage(comments)"
                >show more...</a
            >
        </div>

        <div class="flex flex-row mx-4 my-4 gap-4 items-end">
            <div
                class="relative w-full border border-indigo-400 rounded p-2 focus:outline-indigo-600"
                contenteditable="true"
                :id="'comment_message_' + post.id"
            ></div>
            <div>
                <button
                    class="inline-flex text-white bg-indigo-700 border-0 py-3 rounded px-6 focus:outline-none hover:bg-indigo-600 text-lg"
                    @click="storeComment(post.id)"
                >
                    <i class="fa-solid fa-paper-plane"></i>
                </button>
            </div>
        </div>
    </div>
</template>
<script>
import { userStore } from "../stores/userStore";
import { Popover, PopoverButton, PopoverPanel } from "@headlessui/vue";

export default {
    data() {
        return {
            comments: "",
            collection: {
                comments_id: [],
            }
        };
    },
    components: {
        Popover,
        PopoverButton,
        PopoverPanel,
    },

    props: {
        post: {
            type: Object,
        },
    },

    computed: {
        commentIds() {

        },
    },

    methods: {
        deleteComment(comment) {
            const AuthStr = 'Bearer '.concat(userStore().user.access_token);
            axios({
                method: 'delete',
                params: {comment_id: comment.id},
                url: `/api/posts/${comment.post_id}/comment`,
                headers: {Authorization: AuthStr}
            }).then(res => {
                this.collection.comments_id.forEach((id, index) => {
                   if(id == comment.id) {
                       this.collection.comments_id.splice(index, 1);
                   }
                });
                this.comments.data.forEach((data, index) => {
                    if(data.id == comment.id) {
                        this.comments.data.splice(index, 1);
                    }
                });
                this.post.comment_counts--;
            }).catch(err => {
                console.log(err.response.data.message);
            });
        },

        storeLike(comment) {
            const AuthStr = "Bearer ".concat(userStore().user.access_token);
            axios({
                method: "post",
                url: `/api/posts/${comment.post_id}/comment/${comment.id}/like`,
                headers: { Authorization: AuthStr },
            })
                .then((res) => {
                    if (res.data.message == "like") {
                        comment.get_likes.unshift(res.data.data);
                        comment.authLikes = 1;
                    } else {
                        comment.authLikes = 0;
                        comment.get_likes.forEach((like, index) => {
                            if (like.user_id == comment.user_id) {
                                comment.get_likes.splice(index, 1);
                            }
                        });
                    }
                })
                .catch((err) => {
                    console.log(err.response);
                });
        },

        commentNextPage(comments) {
            if (comments.next_page_url) {
                const AuthStr = "Bearer ".concat(userStore().user.access_token);
                axios({
                    method: "get",
                    params: { id: 1 },
                    url: `${comments.next_page_url}`,
                    headers: { Authorization: AuthStr },
                })
                    .then((res) => {
                        this.comments.current_page = res.data.current_page;
                        this.comments.next_page_url = res.data.next_page_url;
                        res.data.data.forEach((data) => {
                            if(!this.collection.comments_id.includes(data.id)) {
                                this.comments.data.push(data);
                                this.collection.comments_id.push(data.id);
                            }
                        });
                    })
                    .catch((err) => {
                        console.log(err.response.data.message);
                    });
            }
        },

        getComments() {
            const AuthStr = "Bearer ".concat(userStore().user.access_token);
            axios({
                method: "get",
                url: `/api/posts/${this.post.id}/comment`,
                headers: { Authorization: AuthStr },
            })
                .then((res) => {
                    this.comments = res.data;
                    this.comments.data.forEach((comment) => {
                        if(!this.collection.comments_id.includes(comment.id)) {
                            this.collection.comments_id.push(comment.id);
                        }
                    });
                    this.post.comment_counts = this.comments.total;
                })
                .catch((err) => {
                    console.log(err.response.data.message);
                });
        },

        storeComment(id) {
            const AuthStr = "Bearer ".concat(userStore().user.access_token);
            axios({
                method: "post",
                params: {
                    message: document.getElementById(`comment_message_${id}`)
                        .textContent,
                },
                url: `/api/posts/${id}/comment`,
                headers: { Authorization: AuthStr },
            })
                .then((res) => {
                    this.comments.data.unshift(res.data);
                    this.collection.comments_id.push(res.data.id);
                    this.post.comment_counts++;
                    document.getElementById(
                        `comment_message_${id}`
                    ).textContent = "";
                })
                .catch((err) => {
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
        this.getComments();
    },
};
</script>

<style scoped>
</style>
