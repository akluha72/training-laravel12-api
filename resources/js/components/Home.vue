<template>
  <div class="p-4">
    <h1 class="text-2xl font-bold">Vue is working 🎉</h1>
    <p v-if="categories.length">Loaded {{ categories.length }} categories.</p>
  </div>
</template>

<script setup>
import { onMounted, ref } from "vue";
import axios from "axios";

const categories = ref([]);
const products = ref([]);

onMounted(() => {
  console.log("✅ Home.vue mounted!"); // You should now see this in the browser console
});
</script>
