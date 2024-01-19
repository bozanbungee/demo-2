<!-- <template>
  <div>
    <h1>Hello posts</h1>
   
    <table>
      <tbody class="bg-white divide-y divide-gray-200 divide-solid">
        <tr v-for="post in posts" :key="post.id">
          <td
            class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-gray-900"
          >
            {{ post.id }}
          </td>
          <td
            class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-gray-900"
          >
            {{ post.title }}
          </td>
          <td
            class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-gray-900"
          >
            {{ post.content }}
          </td>
          <td
            class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-gray-900"
          >
            {{ post.created_at }}
          </td>
          
        </tr> 
       
      </tbody>
    </table>
  </div>
</template>
  
  <script>
import {Link} from "@inertiajs/vue3";

export default {
  components: {
   Link
  },
  props: {
    posts: Object,
  },
};
</script>
  
  <style>
</style> -->
<script setup>
import AdminLayout from "@/Layouts/AdminLayout.vue";
import { Head, Link, useForm } from "@inertiajs/vue3";
import Table from "@/Components/Table.vue";
import TableRow from "@/Components/TableRow.vue";
import TableHeaderCell from "@/Components/TableHeaderCell.vue";
import TableDataCell from "@/Components/TableDataCell.vue";
import { ref } from "vue";
import Modal from "@/Components/Modal.vue";
import DangerButton from "@/Components/DangerButton.vue";
import SecondaryButton from "@/Components/SecondaryButton.vue";

defineProps(["posts"]);
const form = useForm({});

const showConfirmDeletedModal = ref(false);

const confirmDeletePost = () => {
  showConfirmDeletedModal.value = true;
};

const closeModal = () => {
  showConfirmDeletedModal.value = false;
};


</script>

<template>
  <Head title="Post" />

  <AdminLayout>
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <div class="flex justify-between">
         <h1>Post Index Page</h1>
         <Link :href="route('post.create')" class="px-3 py-2 text-white font-semibold bg-indigo-500 hover:bg-indigo-700 rounded">New Post</Link>
       </div>
         <div class="mt-6">
          <Table>
            <template #header>
              <TableRow>
                <TableHeaderCell>ID</TableHeaderCell>
                <TableHeaderCell>Title</TableHeaderCell>
                <TableHeaderCell>Content</TableHeaderCell>
                <TableHeaderCell>Action</TableHeaderCell>
              </TableRow>
            </template>
            <template #default>
              <TableRow v-for="post in posts" :key="post.id" class="border-t">
                <TableDataCell>{{ post.id }}</TableDataCell>
                <TableDataCell>{{ post.title }}</TableDataCell>
                <TableDataCell>{{ post.content }}</TableDataCell>
                <TableDataCell>
                 /
                  <button
                    class="text-red-400 hover:text-green-600"
                    @click="confirmDeletePost"
                  >
                    delete
                  </button>
                  <Modal :show="showConfirmDeletedModal" @close="closeModal">
                    <div class="p-6">
                      <h2 class="text-lg font-semibold text-slate-800">
                        Are you shore whant to delete post ?
                      </h2>
                      <div class="mt-6 flex space-x-4">
                        <DangerButton @click="deletePost(post.id)"
                          >Delete</DangerButton
                        >
                        <SecondaryButton @click="closeModal"
                          >Cancel</SecondaryButton
                        >
                      </div>
                    </div>
                  </Modal>
                </TableDataCell>
              </TableRow>
            </template>
          </Table>
        </div>
      </div>
   
  </AdminLayout>
</template>
