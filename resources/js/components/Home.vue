<template>
  <div class="grid grid-cols-4 gap-4">
    <div class="space-y-2" v-for="product in products.data" :key="product.id">
      <a href="#">
        <img src="https://placehold.co/300x400" :alt="product.name" />
      </a>
      <a class="text-slate-500 text-xl font-semibold hover:underline">
        {{ product.name }}
      </a>
      <p>${{ product.price }}</p>
      <p class="prose-slate">{{ product.description }}</p>
    </div>
  </div>

  <TailwindPagination :data="products" @pagination-change-page="getProducts"  class="mt-8 mb-8 flex justify-center w-full"/>
  <!-- <Bootstrap5Pagination :data="products" @pagination-change-page="getProducts" /> -->
</template>

<script setup>
import { onMounted, ref } from "vue";
import { TailwindPagination } from "laravel-vue-pagination";
// import { Bootstrap5Pagination } from "laravel-vue-pagination";
// console.log("TailwindPagination component:", TailwindPagination);

const categories = ref({});
const products = ref({});

const getCategories = async () => {
  try {
    const { data } = await axios.get("/api/categories");
    categories.value = data;
  } catch (error) {
    console.error(error);
  }
};

const getProducts = async (page = 1) => {
  try {
    const { data } = await axios.get(`/api/products?page=${page}`);
    products.value = data;
  } catch (error) {
    console.error(error);
  }
};

onMounted(() => {
  getCategories();
  getProducts();
});
</script>
