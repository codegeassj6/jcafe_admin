<template>
  <div>
    <Aside />

    <div class="ml-64 pt-20 px-4">
      <div class="mb-4">
        <div
          class="w-full mb-4 border border-gray-200 rounded-lg bg-gray-50 dark:bg-gray-700 dark:border-gray-600"
        >
          <div class="px-4 py-2 bg-white rounded-t-lg dark:bg-gray-800">
            <label for="comment" class="sr-only">Your comment</label>
            <textarea
              id="comment"
              rows="8"
              class="w-full px-0 text-sm text-gray-900 bg-white border-0 focus:outline-none dark:bg-gray-800 focus:ring-0 dark:text-white dark:placeholder-gray-400"
              placeholder="Write a comment..."
              required
              v-model="form.post.message"
            ></textarea>
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
                <input type="file" ref="attachFiles" class="hidden" @change="morphAttachFiles">
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
      <div class="border rounded mb-4" v-for="post in posts" :key="post.id">
        <div class="flex flex-row gap-4 p-4">
          <img
            src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80"
            alt=""
            width="50"
            height="50"
            class="rounded-full"
          />
          <div>
            <h4 class="text-xl font-bold text-indigo-700">{{ post.get_user_details.first_name + ' ' + post.get_user_details.last_name }}</h4>
            <p class="text-gray-400">Friday, May 12, 2020</p>
          </div>
          <div class="ms-auto">
            <i class="fa-solid fa-ellipsis-vertical"></i>
          </div>
        </div>
        <div class="px-4 mb-4">
          {{ post.message }}
        </div>
        <div class="flex flex-row px-4 gap-4 mb-4">
          <div class="text-indigo-700">
            <i class="fa-solid fa-thumbs-up mr-2"></i>3 likes
          </div>
          <div class="text-indigo-700">
            <i class="fa-regular fa-comments"></i> comments
          </div>
          <div class="ms-auto">
            <button
              class="inline-flex text-white bg-indigo-700 border-0 py-0.5 px-6 focus:outline-none hover:bg-indigo-600 rounded text-lg"
            >
              Latest comments
            </button>
          </div>
        </div>
        <div class="bg-indigo-50 py-4 px-12 flex flex-col gap-4 border" v-if="post.get_comments">
          <div class="flex flex-row gap-4">
            <img
              src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80"
              alt=""
              class="rounded-full w-12 h-12"
            />
            <div>
              <h4 class="text-lg text-indigo-700 font-bold">Jhon Rey Repuela</h4>
              <p class="text-gray-400">Friday, May 12, 2020</p>
            </div>
            <div class="ms-auto">
              <i class="fa-solid fa-ellipsis-vertical"></i>
            </div>
          </div>
          <div>
            {{ post.get_comments.message }}
          </div>
          <div class="">
            <a role="button"
              ><i class="fa-regular fa-thumbs-up mr-2"></i><span>4 likes</span></a
            >
          </div>
        </div>
        <div class="flex flex-row bg-gray-100 p-2 gap-4 items-end">
          <div
            class="relative w-full border border-indigo-400 rounded p-2 focus:outline-indigo-600"
            contenteditable="true"
          ></div>
          <div>
            <button
              class="inline-flex text-white bg-indigo-700 border-0 py-3 rounded px-6 focus:outline-none hover:bg-indigo-600 text-lg"
            >
              <i class="fa-solid fa-paper-plane"></i>
            </button>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>
<script>
import Aside from '../components/Aside.vue';
import { userStore } from '../stores/userStore';

export default {
  data() {
    return {
      posts: '',
      form: {
        post: {
          attachments: '',
          message: '',
          attachments: [],
        }
      }
    };
  },
  components: {
    Aside,
  },

  props: {},

  computed: {},

  methods: {
    initAttachFile() {
      this.$refs.attachFiles.click();
    },

    morphAttachFiles() {
      const formData = new FormData;
      formData.append('files', this.form.post.attachments);
    },

    getPost() {
      const AuthStr = 'Bearer '.concat(userStore().user.access_token);
      axios({
          method: 'get',
          url: `/api/posts`,
          headers: {Authorization: AuthStr}
      }).then(res => {
        this.posts = res.data
      }).catch(err => {

      });
    },

    createPost() {
      const AuthStr = 'Bearer '.concat(userStore().user.access_token);
      axios({
          method: 'post',
          params: {
            message: this.form.post.message,
            attachments: this.form.post.attachments,
          },
          url: `/api/posts`,
          headers: {Authorization: AuthStr}
      }).then(res => {console.log(res.data);
        this.posts.unshift(res.data);
        this.form.post.message = '';
        this.form.post.attachments = '';
      }).catch(err => {
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
