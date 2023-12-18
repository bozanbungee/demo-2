<script setup>
import AdminLayout from "@/Layouts/AdminLayout.vue";
import { Head } from "@inertiajs/vue3";

import Table from "@/Components/Table.vue";
import TableRow from "@/Components/TableRow.vue";
import TableHeaderCell from "@/Components/TableHeaderCell.vue";
import TableDataCell from "@/Components/TableDataCell.vue";

defineProps(["users"]);
</script>

<template>
  <Head title="User" />

  <AdminLayout>
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <h1>User Index Page</h1>
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
                <TableDataCell>Edit/Delete</TableDataCell>
              </TableRow>
            </template>
          </Table>
        </div>
      </div>
    </div>
  </AdminLayout>
</template>