<template>
  <div class="mt-20 px-4">
    <form class="mb-4">
      <div
        class="w-full mb-4 border border-gray-200 rounded-lg bg-gray-50 dark:bg-gray-700 dark:border-gray-600"
      >
        <div class="px-4 py-2 bg-white rounded-t-lg dark:bg-gray-800">
          <label for="comment" class="sr-only">Your comment</label>
          <textarea
            id="comment"
            rows="4"
            class="w-full px-0 text-sm text-gray-900 bg-white border-0 dark:bg-gray-800 focus:ring-0 dark:text-white dark:placeholder-gray-400"
            placeholder="Write a comment..."
            required
          ></textarea>
        </div>
        <div
          class="flex items-center justify-between px-3 py-2 border-t dark:border-gray-600"
        >
          <div class="flex pl-0 space-x-1 sm:pl-2">
            <button
              type="button"
              class="inline-flex justify-center p-2 text-gray-500 rounded cursor-pointer hover:text-gray-900 hover:bg-gray-100 dark:text-gray-400 dark:hover:text-white dark:hover:bg-gray-600"
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
            <button
              type="button"
              class="inline-flex justify-center p-2 text-gray-500 rounded cursor-pointer hover:text-gray-900 hover:bg-gray-100 dark:text-gray-400 dark:hover:text-white dark:hover:bg-gray-600"
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
                  d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z"
                  clip-rule="evenodd"
                ></path>
              </svg>
              <span class="sr-only">Set location</span>
            </button>
            <button
              type="button"
              class="inline-flex justify-center p-2 text-gray-500 rounded cursor-pointer hover:text-gray-900 hover:bg-gray-100 dark:text-gray-400 dark:hover:text-white dark:hover:bg-gray-600"
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
                  d="M4 3a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V5a2 2 0 00-2-2H4zm12 12H4l4-8 3 6 2-4 3 6z"
                  clip-rule="evenodd"
                ></path>
              </svg>
              <span class="sr-only">Upload image</span>
            </button>
          </div>

          <button
            type="submit"
            class="inline-flex items-center py-2.5 px-4 text-xs font-medium text-center text-white bg-indigo-700 rounded-lg focus:ring-4 focus:ring-blue-200 dark:focus:ring-blue-900 hover:bg-indigo-600"
          >
            Post comment
          </button>
        </div>
      </div>
    </form>

    <div class="border rounded">
      <div class="flex flex-row gap-4 p-4">
        <img
          src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80"
          alt=""
          width="50"
          height="50"
          class="rounded-full"
        />
        <div>
          <h4 class="text-xl font-bold text-indigo-700">Jhon Rey Repuela</h4>
          <p class="text-gray-400">Friday, May 12, 2020</p>
        </div>

        <div class="ms-auto">
          <i class="fa-solid fa-ellipsis-vertical"></i>
        </div>
      </div>

      <div class="px-4 mb-4">
        Consequat proident Lorem ad est amet labore incididunt amet incididunt
        excepteur dolore sint. Laborum in sint ut ipsum reprehenderit voluptate
        voluptate culpa non non aute dolore commodo. Exercitation laborum
        consectetur excepteur consequat fugiat labore aliquip culpa. Qui quis ad
        proident nostrud. Enim anim nulla fugiat id voluptate nulla sint
        adipisicing laborum velit. Commodo in commodo cillum tempor excepteur
        eiusmod. Nisi culpa nostrud magna esse anim mollit ullamco ullamco
        dolore laboris dolor minim. Excepteur aliqua laboris aliquip id qui
        aliqua minim exercitation amet laboris. Cillum pariatur reprehenderit
        irure consectetur velit enim ullamco esse anim ut in proident. Excepteur
        et mollit commodo eu. Pariatur quis duis in veniam sint incididunt
        exercitation excepteur ea dolor amet. Velit voluptate ea do officia
        irure quis.
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

      <div class="bg-indigo-50 py-4 px-12 flex flex-col gap-4 border">
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
          Deserunt incididunt pariatur ex incididunt velit ex irure anim
          adipisicing. Exercitation quis aute proident cupidatat anim. Eiusmod
          ex commodo in minim adipisicing incididunt laboris sint in occaecat
          Lorem ullamco id eu. Amet enim ad ut ipsum cupidatat eu veniam. Ut est
          irure ullamco sit sunt culpa aliqua ipsum veniam anim dolor ex in
          consectetur. Tempor Lorem laboris qui eu laboris do sit fugiat elit.
          Minim voluptate nostrud eiusmod velit nostrud cillum ad voluptate.
          Magna proident sint ut nostrud occaecat. Cillum anim veniam velit
          ipsum amet labore. Elit eu et qui laborum veniam quis fugiat deserunt
          enim.
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
</template>
<script>
export default {
  data() {
    return {};
  },
  components: {},

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
