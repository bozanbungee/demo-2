<script setup>
import AdminLayout from "@/Layouts/AdminLayout.vue";
import InputError from "@/Components/InputError.vue";
import InputLabel from "@/Components/InputLabel.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import TextInput from "@/Components/TextInput.vue";
import { Head, Link, useForm } from "@inertiajs/vue3";

const props = defineProps({
  post: {
    type: Object,
    required: true,
  }
});

const form = useForm({
  title: props.post?.title,
  content: props.post?.content,
});

const submit = () => {
  form.put(route("post.update"), props.post?.id);
};


</script>

<template>
  <AdminLayout>
    <div class="max-w-7xl mx-auto my-10 sm:px-6 lg:px-8">
      <Head title="Edit Post" />
      <div class="flex justify-between">
        <Link
          :href="route('post.index')"
          class="px-3 py-2 text-white font-semibold bg-indigo-500 hover:bg-indigo-700 rounded"
          >Back to the Posts</Link
        >
      </div>
      <div class="max-w-6xl mx-auto mt-6 p-6 bg-slate-100">
        <form @submit.prevent="form.put(route('post.update', post.id))">
          <div>
            <InputLabel for="name" value="Name" />

            <TextInput
              id="title"
              type="text"
              class="mt-1 block w-full"
              v-model="form.title"
              required
              autofocus
              autocomplete="title"
            />

            <InputError class="mt-2" :message="form.errors.title" />
          </div>

          <div class="mt-4">
            <InputLabel for="content" value="Content" />

            <TextInput
              id="content"
              type="text"
              class="mt-1 block w-full"
              v-model="form.content"
              required
              autocomplete="content"
            />

            <InputError class="mt-2" :message="form.errors.content" />
          </div>

       
          <div class="flex items-center justify-end mt-4">
            <PrimaryButton
              class="ms-4"
              :class="{ 'opacity-25': form.processing }"
              :disabled="form.processing"
            >
              Update Post
            </PrimaryButton>
          </div>
        </form>
      </div>
      

    </div>
  </AdminLayout>
</template>

