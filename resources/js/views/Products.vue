<template>
    <div>
        <Aside />

        <div class="md:ml-64 ml-16 max-w-8xl pt-20 px-4">
            <div class="rounded" autocomplete="on">
                <div class="mb-4">
                    <button
                        class="text-white bg-indigo-700 border-0 py-0.5 px-6 focus:outline-none hover:bg-indigo-600 rounded text-lg"
                        @click="modal.addProduct = true"
                    >
                        <i class="fa-regular fa-plus mr-2 fa-lg"></i>Add Product
                    </button>
                </div>

                <div
                    class="grid grid-cols-3 gap-2"
                >
                    <div class="mb-4" v-for="product in products.data"
                    :key="product.id">
                        <div
                            class="flex flex-row max-w-md bg-white shadow-lg rounded-lg border overflow-hidden"
                        >
                            <div
                                class="w-44 h-44"
                            >
                                <img :src="product.image_url" alt="" class="w-full h-44">
                            </div>

                            <div class="w-full p-4 flex flex-col">
                                <h1 class="text-gray-900 font-bold text-xl">
                                    {{ product.name }}
                                </h1>

                                <div>
                                    <Stars :counts="product.rating" />
                                </div>

                                <p class="text-gray-600 text-sm">
                                    {{ product.description }}
                                </p>
                                <div
                                    v-for="variant in product.get_variants"
                                    :key="variant.id"
                                    class="flex flex-row item-center gap-2"
                                >
                                    <h1 class="text-gray-700 font-bold text-sm">
                                        ₱{{ variant.price }}
                                    </h1>
                                    <div class="text-gray-400 text-sm"> / {{ variant.stock }} stocks left</div>
                                </div>

                                <div class="flex flex-row gap-2 mt-auto">
                                    <button
                                        class="text-white bg-indigo-700 border-0 py-0.5 px-3 focus:outline-none hover:bg-indigo-600 rounded"
                                        @click="
                                            (modal.updateProduct = true),
                                                (modal.update_data = product)
                                        "
                                    >
                                        Update
                                    </button>
                                    <button
                                        class="text-white bg-red-700 border-0 py-0.5 px-3 focus:outline-none hover:bg-red-600 rounded"
                                        @click="
                                            (modal.deleteProduct = true),
                                                (modal.delete_data = product)
                                        "
                                    >
                                        Delete
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <Pagination :data="products" />
            </div>
        </div>

        <!-- add modal -->
        <Dialog
            :open="modal.addProduct"
            @close="setAddProductModal"
            class="z-50 bg-opacity-50 fixed bg-black w-full overflow-x-hidden overflow-y-auto inset-0 max-h-full"
        >
            <DialogPanel
                class="relative w-full max-w-5xl max-h-full justify-center mx-auto mt-24"
            >
                <div class="relative bg-white rounded-lg shadow p-8">
                    <DialogTitle class="text-xl font-bold mb-4 border-b"
                        >Add Product</DialogTitle
                    >
                    <DialogDescription>
                        <div class="flex flex-row gap-4 mb-4">
                            <div class="w-full">
                                <label class="leading-7 text-sm text-gray-600"
                                    >Name</label
                                >
                                <input
                                    type="text"
                                    v-model="form.addProduct.name"
                                    class="w-full bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out"
                                />
                            </div>

                            <div class="w-full">
                                <label class="leading-7 text-sm text-gray-600"
                                    >Rating</label
                                >
                                <input
                                    type="number"
                                    v-model="form.addProduct.rating"
                                    class="w-full bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out"
                                />
                            </div>
                        </div>

                        <div class="flex flex-row gap-4 mb-4">
                            <div class="w-full">
                                <label class="leading-7 text-sm text-gray-600"
                                    >Description</label
                                >
                                <textarea
                                    v-model="form.addProduct.description"
                                    class="w-full bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out"
                                />
                            </div>
                        </div>

                        <div class="mb-4">
                            <button
                                class="text-white bg-indigo-700 border-0 py-2 px-6 focus:outline-none hover:bg-indigo-600 rounded text-lg"
                                type="button"
                                @click="addVariant"
                            >
                                <i class="fa-solid fa-plus mr-1"></i>Add Variant
                            </button>
                        </div>

                        <div
                            class="flex flex-row items-center gap-4 mb-4"
                            v-for="variant in form.addProduct.variant"
                            :key="variant"
                        >
                            <div class="w-full">
                                <input
                                    :id="`variant_value_${variant}`"
                                    ref="variant_value"
                                    placeholder="Value"
                                    type="number"
                                    min="1"
                                    max="5"
                                    class="w-full bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out"
                                />
                            </div>

                            <div class="w-full">
                                <input
                                    :id="`variant_unit_${variant}`"
                                    ref="variant_unit"
                                    placeholder="Unit"
                                    type="text"
                                    class="w-full bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out"
                                />
                            </div>

                            <div class="w-full">
                                <input
                                    :id="`variant_price_${variant}`"
                                    ref="variant_price"
                                    placeholder="Price"
                                    type="number"
                                    min="1"
                                    max="5"
                                    class="w-full bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out"
                                />
                            </div>

                            <div class="w-full">
                                <input
                                    type="number"
                                    ref="variant_stock"
                                    :id="`variant_stock_${variant}`"
                                    placeholder="Stock"
                                    min="1"
                                    max="5"
                                    class="w-full bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out"
                                />
                            </div>

                            <div class="">
                                <button
                                    class="border py-0.5 px-2 rounded-full focus:outline-none hover:bg-red-600"
                                    type="button"
                                    @click="deleteVariantDetails(variant)"
                                >
                                    <i class="fa-solid fa-minus"></i>
                                </button>
                            </div>
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
                                        <p class="mb-2 text-sm text-gray-500">
                                            <span class="font-semibold"
                                                >Click to upload</span
                                            >
                                        </p>
                                        <p class="text-xs text-gray-500">
                                            PNG or JPG
                                        </p>
                                    </div>
                                    <input
                                        id="dropzone-file"
                                        @change="dropzoneAddProduct"
                                        type="file"
                                        class="hidden"
                                        accept="image/png, image/jpeg"
                                    />
                                </label>
                            </div>

                            <div
                                class="flex justify-center align-self-center text-center w-full p-3"
                                v-if="form.addProduct.temp_img"
                            >
                                <img
                                    :src="form.addProduct.temp_img"
                                    alt=""
                                    class="w-full h-64 border border-indigo-700 rounded"
                                />
                            </div>
                        </div>

                        <div class="flex flex-row gap-4 justify-center">
                            <button
                                class="inline-flex text-white bg-indigo-700 border-0 py-2 px-6 focus:outline-none hover:bg-indigo-600 rounded text-lg"
                                type="button"
                                @click="addProduct"
                            >
                                Add Product
                            </button>

                            <button
                                type="button"
                                class="inline-flex text-white bg-red-700 border-0 py-2 px-6 focus:outline-none hover:bg-indigo-600 rounded text-lg"
                                @click="modal.addProduct = false"
                            >
                                Cancel
                            </button>
                        </div>
                    </DialogDescription>
                </div>
            </DialogPanel>
        </Dialog>

        <!-- update modal -->
        <Dialog
            :open="modal.updateProduct"
            @close="setUpdateProductModal"
            class="z-50 bg-opacity-50 fixed bg-black w-full overflow-x-hidden overflow-y-auto inset-0 max-h-full"
        >
            <DialogPanel
                class="relative w-full max-w-5xl max-h-full justify-center mx-auto mt-24"
            >
                <div class="relative bg-white rounded-lg shadow p-8">
                    <DialogTitle class="text-xl font-bold mb-4 border-b"
                        >Update Product</DialogTitle
                    >
                    <DialogDescription>
                        <div class="flex flex-row gap-4 mb-4">
                            <div class="w-full">
                                <label class="leading-7 text-sm text-gray-600"
                                    >Name</label
                                >
                                <input
                                    :placeholder="modal.update_data.name"
                                    v-model="form.updateProduct.name"
                                    type="text"
                                    class="w-full bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out"
                                />
                            </div>

                            <div class="w-full">
                                <label class="leading-7 text-sm text-gray-600"
                                    >Rating</label
                                >
                                <input
                                    :placeholder="modal.update_data.rating"
                                    v-model="form.updateProduct.rating"
                                    type="number"
                                    class="w-full bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out"
                                />
                            </div>
                        </div>

                        <div class="flex flex-row gap-4 mb-4">
                            <div class="w-full">
                                <label class="leading-7 text-sm text-gray-600"
                                    >Description</label
                                >
                                <textarea
                                    v-model="form.updateProduct.description"
                                    :placeholder="modal.update_data.description"
                                    class="w-full bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out"
                                />
                            </div>
                        </div>

                        <div class="mb-4">
                            <button
                                class="text-white bg-indigo-700 border-0 py-2 px-6 focus:outline-none hover:bg-indigo-600 rounded text-lg"
                                type="button"
                            >
                                <i class="fa-solid fa-plus mr-1"></i>Add Variant
                            </button>
                        </div>

                        <div
                            class="flex flex-row items-center gap-4 mb-4"
                            v-for="variant in modal.update_data.get_variants"
                            :key="variant.id"
                        >
                            <div class="w-full">
                                <input
                                    :placeholder="variant.value"
                                    ref="variant_update_value"
                                    type="number"
                                    min="1"
                                    max="5"
                                    class="w-full bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out"
                                />
                            </div>

                            <div class="w-full">
                                <input
                                ref="variant_update_unit"
                                    :placeholder="variant.unit"
                                    type="text"
                                    class="w-full bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out"
                                />
                            </div>

                            <div class="w-full">
                                <input
                                    ref="variant_update_price"
                                    :placeholder="variant.price"
                                    type="number"
                                    min="1"
                                    max="5"
                                    class="w-full bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out"
                                />
                            </div>

                            <div class="w-full">
                                <input
                                    type="number"
                                    ref="variant_update_stock"
                                    :placeholder="variant.stock"
                                    min="1"
                                    max="5"
                                    class="w-full bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out"
                                />
                            </div>

                            <div class="">
                                <button
                                    class="border py-0.5 px-2 rounded-full focus:outline-none hover:bg-red-600"
                                    type="button"
                                >
                                    <i class="fa-solid fa-minus"></i>
                                </button>
                            </div>
                        </div>

                        <div class="flex flex-row gap-2 mb-8">
                            <div
                                class="flex items-center justify-center w-full"
                            >
                                <label
                                    for="dropzone-update-file"
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
                                        <p class="mb-2 text-sm text-gray-500">
                                            <span class="font-semibold"
                                                >Click to upload</span
                                            >
                                        </p>
                                        <p class="text-xs text-gray-500">
                                            PNG or JPG
                                        </p>
                                    </div>
                                    <input
                                        id="dropzone-update-file"
                                        @change="dropzoneUpdateProduct"
                                        type="file"
                                        class="hidden"
                                        accept="image/png, image/jpeg"
                                    />
                                </label>
                            </div>

                            <div
                                class="flex justify-center align-self-center text-center w-full p-3"
                                v-if="modal.update_data.image_url"
                            >
                                <img
                                    v-if="form.updateProduct.temp_img"
                                    :src="form.updateProduct.temp_img"
                                    alt=""
                                    class="w-full h-64 border border-indigo-700 rounded"
                                />
                                <img
                                    v-else
                                    :src="modal.update_data.image_url"
                                    alt=""
                                    class="w-full h-64 border border-indigo-700 rounded"
                                />
                            </div>
                        </div>

                        <div class="flex flex-row gap-4 justify-center">
                            <button
                                class="inline-flex text-white bg-indigo-700 border-0 py-2 px-6 focus:outline-none hover:bg-indigo-600 rounded text-lg"
                                type="button"
                                @click="updateProduct"
                            >
                                Update Product
                            </button>

                            <button
                                type="button"
                                class="inline-flex text-white bg-red-700 border-0 py-2 px-6 focus:outline-none hover:bg-indigo-600 rounded text-lg"
                                @click="modal.addProduct = false"
                            >
                                Cancel
                            </button>
                        </div>
                    </DialogDescription>
                </div>
            </DialogPanel>
        </Dialog>

        <!-- delete modal -->
        <Dialog
            :open="modal.deleteProduct"
            @close="setDeleteProductModal"
            class="z-50 bg-opacity-50 fixed bg-black w-full overflow-x-hidden overflow-y-auto inset-0 max-h-full"
        >
            <DialogPanel
                class="relative w-full max-w-5xl max-h-full justify-center mx-auto mt-24"
            >
                <div class="relative bg-white rounded-lg shadow p-8">
                    <DialogDescription>
                        <div class="flex flex-col gap-4 p-4 items-center">
                            <div class="text-5xl text-red-700 mb-4">
                                <i class="fa-regular fa-circle-xmark"></i>
                            </div>

                            <div class="text-3xl">Are you Sure?</div>

                            <div class="mb-4">
                                Do you really want to delete this product?
                            </div>

                            <div class="flex flex-row gap-4">
                                <button
                                    class="text-white bg-indigo-700 border-0 py-2 px-6 focus:outline-none hover:bg-indigo-600 rounded text-lg"
                                    type="button"
                                    @click="deleteProduct"
                                >
                                    Delete
                                </button>
                                <button
                                    type="button"
                                    class="text-white bg-red-700 border-0 py-2 px-6 focus:outline-none hover:bg-red-600 rounded text-lg"
                                    @click="modal.deleteProduct = false"
                                >
                                    Cancel
                                </button>
                            </div>
                        </div>
                    </DialogDescription>
                </div>
            </DialogPanel>
        </Dialog>
    </div>
</template>
<script>
import Pagination from "../components/Pagination.vue";
import Stars from "../components/Stars.vue";
import Aside from "../components/Aside.vue";
import {
    Dialog,
    DialogPanel,
    DialogTitle,
    DialogDescription,
} from "@headlessui/vue";
import { userStore } from "../stores/userStore";

export default {
    data() {
        return {
            modal: {
                addProduct: false,
                deleteProduct: false,
                delete_data: "",
                updateProduct: false,
                update_data: "",
            },
            collection: {
                products: [],
            },
            form: {
                addProduct: {
                    name: "",
                    stock: "",
                    image: "",
                    temp_img: "",
                    variant_count: 1,
                    variant: [1],
                    // variant_details: [],
                    description: "",
                    rating: "",
                },
                updateProduct: {
                    name: "",
                    stock: "",
                    image: "",
                    description: "",
                    rating: "",
                    temp_img: "",
                },
            },
            products: "",
        };
    },
    components: {
        Aside,
        Dialog,
        DialogPanel,
        DialogTitle,
        DialogDescription,
        Pagination,
        Stars,
    },

    props: {},

    computed: {},

    methods: {
        nextPage(url) {
            const AuthStr = "Bearer ".concat(userStore().user.access_token);
            axios({
                method: "get",
                url: url,
                headers: { Authorization: AuthStr },
            })
                .then((res) => {
                    this.products = res.data;
                })
                .catch((err) => {});
        },

        prevPage(url) {
            const AuthStr = "Bearer ".concat(userStore().user.access_token);
            axios({
                method: "get",
                url: url,
                headers: { Authorization: AuthStr },
            })
                .then((res) => {
                    this.products = res.data;
                })
                .catch((err) => {});
        },

        goToPage(url, page) {
            const AuthStr = "Bearer ".concat(userStore().user.access_token);
            axios({
                method: "get",
                url: `${url}?page=${page}`,
                headers: { Authorization: AuthStr },
            })
                .then((res) => {
                    this.products = res.data;
                })
                .catch((err) => {});
        },

        deleteVariantDetails(data) {
            if (this.form.addProduct.variant_count > 1) {
                this.form.addProduct.variant.forEach((variant, index) => {
                    if (variant == data) {
                        this.form.addProduct.variant.splice(index, 1);
                    }
                });
            }
        },

        addVariant() {
            this.form.addProduct.variant.push(
                (this.form.addProduct.variant_count += 1)
            );
        },

        getProducts() {
            const AuthStr = "Bearer ".concat(userStore().user.access_token);
            axios({
                method: "get",
                url: `/api/products`,
                headers: { Authorization: AuthStr },
            })
                .then((res) => {
                    this.products = res.data;
                })
                .catch((err) => {});
        },

        updateProduct() {
            const formData = new FormData();
            formData.append('name', this.form.updateProduct.name);
            formData.append('rating', this.form.updateProduct.rating);
            formData.append('description', this.form.updateProduct.description);
            formData.append('image', this.form.updateProduct.image);

            this.$refs.variant_update_value.forEach(data => {
                formData.append('variant_update_value[]', data.value);
            });
            this.$refs.variant_update_price.forEach(data => {
                formData.append('variant_update_price[]', data.value);
            });
            this.$refs.variant_update_stock.forEach(data => {
                formData.append('variant_update_stock[]', data.value);
            });
            this.$refs.variant_update_unit.forEach(data => {
                formData.append('variant_update_unit[]', data.value);
            });

            const AuthStr = "Bearer ".concat(userStore().user.access_token);
            axios({
                method: "post",
                data: formData,
                url: `/api/products/update`,
                headers: { Authorization: AuthStr },
            })
                .then((res) => {
                    console.log(res.data);
                })
                .catch((err) => {
                    console.log(err.response.data.message);
                });
        },

        deleteProduct() {
            const AuthStr = "Bearer ".concat(userStore().user.access_token);
            axios({
                method: "delete",
                params: { id: this.modal.delete_data.id },
                url: `/api/products`,
                headers: { Authorization: AuthStr },
            })
                .then((res) => {
                    this.products.data.forEach((product, index) => {
                        if (product.id == this.modal.delete_data.id) {
                            this.products.data.splice(index, 1);
                        }
                    });
                    this.modal.deleteProduct = false;
                    this.modal.delete_data = "";
                })
                .catch((err) => {
                    console.log(err.response.data.message);
                });
        },

        addProduct() {
            // for (
            //     let index = 0;
            //     index < this.form.addProduct.variant.length;
            //     index++
            // ) {
            //     let value = document.getElementById(
            //         `variant_value_${this.form.addProduct.variant[index]}`
            //     ).value;

            //     let unit = document.getElementById(
            //         `variant_unit_${this.form.addProduct.variant[index]}`
            //     ).value;

            //     let stock = document.getElementById(
            //         `variant_stock_${this.form.addProduct.variant[index]}`
            //     ).value;

            //     let price = document.getElementById(
            //         `variant_price_${this.form.addProduct.variant[index]}`
            //     ).value;

            //     if (value && unit && stock) {
            //         this.form.addProduct.variant_details.push({
            //             value: value,
            //             unit: unit,
            //             stock: stock,
            //             price: price,
            //         });
            //     }
            // }

            const formData = new FormData();
            formData.append("name", this.form.addProduct.name);
            formData.append("rating", this.form.addProduct.rating);
            formData.append("description", this.form.addProduct.description);
            formData.append("image", this.form.addProduct.image);

            this.$refs.variant_value.forEach(data => {
               formData.append('variant_value[]', data.value);
            });

            this.$refs.variant_unit.forEach(data => {
               formData.append('variant_unit[]', data.value);
            });

            this.$refs.variant_stock.forEach(data => {
               formData.append('variant_stock[]', data.value);
            });

            this.$refs.variant_price.forEach(data => {
               formData.append('variant_price[]', data.value);
            });

            const AuthStr = "Bearer ".concat(userStore().user.access_token);
            axios({
                method: "post",
                data: formData,
                // params: {
                //     variant_details: this.form.addProduct.variant_details,
                // },
                url: `/api/products`,
                headers: { Authorization: AuthStr },
            })
                .then((res) => {
                    this.form.addProduct.name = "";
                    this.form.addProduct.rating = "";
                    this.form.addProduct.description = "";
                    // this.form.addProduct.variant_details = [];
                    this.form.addProduct.image = "";
                    this.form.addProduct.variant_count = 0;
                    this.form.addProduct.variant = [];
                    this.modal.addProduct = false;
                    this.form.addProduct.temp_img = "";
                    this.products.data.push(res.data);
                })
                .catch((err) => {
                    console.log(err.response);
                });
        },

        setAddProductModal(condition) {
            this.modal.addProduct = condition;
        },

        setUpdateProductModal(condition) {
            this.modal.updateProduct = condition;
        },

        setDeleteProductModal(condition) {
            this.modal.deleteProduct = condition;
        },

        dropzoneAddProduct(e) {
            this.form.addProduct.image =
                e.target.files[0] || e.dataTransfer.files[0];
            this.form.addProduct.temp_img = URL.createObjectURL(
                this.form.addProduct.image
            );
        },

        dropzoneUpdateProduct(e) {
            this.form.updateProduct.image =
                e.target.files[0] || e.dataTransfer.files[0];
            this.form.updateProduct.temp_img = URL.createObjectURL(
                this.form.updateProduct.image
            );
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
        this.getProducts();
    },
};
</script>

<style scoped>
</style>
