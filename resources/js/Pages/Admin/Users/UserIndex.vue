<script setup>
import AdminLayout from "@/Layouts/AdminLayout.vue";
import { Head } from "@inertiajs/vue3";

import Table from "@/Components/Table.vue";
import TableRow from "@/Components/TableRow.vue";
import TableHeaderCell from "@/Components/TableHeaderCell.vue";
import TableDataCell from "@/Components/TableDataCell.vue";
import { Link } from "@inertiajs/vue3";

defineProps(["users"]);
</script>

<template>
  <Head title="Users Index" />

  <AdminLayout>
  
    <div class="max-w-7xl mx-auto my-10 sm:px-6 lg:px-8">
      <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="flex justify-between">
         <h1>User Index Page</h1>
         <Link :href="route('users.create')" class="px-3 py-2 text-white font-semibold bg-indigo-500 hover:bg-indigo-700 rounded">New User</Link>
       </div>
        <div class="mt-6">
          <Table>
            <template #header>
              <TableRow>
                <TableHeaderCell>ID</TableHeaderCell>
                <TableHeaderCell>Name</TableHeaderCell>
                <TableHeaderCell>Email</TableHeaderCell>
                <TableHeaderCell>Action</TableHeaderCell>
              </TableRow>
            </template>
            <template #default>
              <TableRow v-for="user in users" :key="user.id" class="border-t">
                <TableDataCell>{{ user.id }}</TableDataCell>
                <TableDataCell>{{ user.name }}</TableDataCell>
                <TableDataCell>{{ user.email }}</TableDataCell>
                <TableDataCell>
                  <Link :href="route('users.edit', user.id)" class="text-green-400 hover:text-green-600">Edit</Link> /
                   <Link :href="route('users.destroy', user.id)" method="delete" as="button" class="text-red-400 hover:text-red-600">Delete</Link>
                </TableDataCell>
              </TableRow>
            </template>
          </Table>
        </div>
      </div>
    </div>
  </AdminLayout>
</template>