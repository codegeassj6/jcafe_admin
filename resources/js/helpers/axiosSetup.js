import { userStore } from "../stores/userStore";

axios.create({
  baseURL: `${import.meta.env.VITE_BASE_URL}/api`,
})

axios.interceptors.response.use(function (response) {
  return response;
}, function (error) {
  // Check your token for validity, and if needed, refresh the token / force re-login etc.
  if(error.response.status == 401 && window.location.href != window.location.origin + '/#/') {
      userStore().$reset();
      window.location.href = '/';
  }
  return Promise.reject(error);
});
