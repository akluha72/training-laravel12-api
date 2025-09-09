<template>
  <div class="max-w-lg mx-auto mt-10 mb-10 bg-stone-400 p-10">
    <h1 class="text-2xl font-bold mb-6">Create Category</h1>

    <form @submit.prevent="submitForm" class="space-y-4">
      <div>
        <label class="block text-sm font-medium">Name</label>
        <input
          v-model="form.name"
          type="text"
          class="w-full border rounded px-3 py-2"
          placeholder="Enter category name"
        />
      </div>

      <button
        type="submit"
        class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700"
      >
        Save
      </button>
    </form>
  </div>
</template>

<script setup>
import { ref } from "vue";
import axios from "axios";

// reactive form object
const form = ref({
  name: ""
});

const submitForm = async () => {
  try {
    const response = await axios.post("/api/categories", form.value);
    console.log("✅ New Category ID:", response.data.data.id);

    // reset form after success
    form.value = { name: ""};
  } catch (error) {
    console.error("❌ Error creating category:", error.response?.data || error);
  }
};
</script>
