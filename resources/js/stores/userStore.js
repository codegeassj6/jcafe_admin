import { defineStore } from "pinia";

export const userStore = defineStore('userStore', {
    state: () => ({
      user: null,
      loggedIn: false,
      // loading: false,
      // auth_error: null,
    }),

    getters: {
      authUser: (state) => {
        return state.user
      },
      // isLoading: (state) => {
      //   return state.loading
      // },
      isLoggedIn: (state) => {
        return state.loggedIn
      },
      // authError: (state) => {
      //   return state.auth_error
      // },
    },

    // persist: {
    //   storage: persistedState.localStorage,
    // },
    persist: true,
});
