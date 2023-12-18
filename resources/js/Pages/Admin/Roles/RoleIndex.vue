<script setup>
import AdminLayout from "@/Layouts/AdminLayout.vue";
import { Head } from "@inertiajs/vue3";
import Table from "@/Components/Table.vue";
import TableRow from "@/Components/TableRow.vue";
import TableHeaderCell from "@/Components/TableHeaderCell.vue";
import TableDataCell from "@/Components/TableDataCell.vue";
import { Link } from "@inertiajs/vue3";

defineProps(["roles"]);
</script>

<template>
  <Head title="Role" />

  <AdminLayout>
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <div class="flex justify-between">
         <h1>Role Index Page</h1>
         <Link :href="route('roles.create')" class="px-3 py-2 text-white font-semibold bg-indigo-500 hover:bg-indigo-700 rounded">New Role</Link>
       </div>
         <div class="mt-6">
          <Table>
            <template #header>
              <TableRow>
                <TableHeaderCell>ID</TableHeaderCell>
                <TableHeaderCell>Name</TableHeaderCell>
                <TableHeaderCell>Action</TableHeaderCell>
              </TableRow>
            </template>
            <template #default>
              <TableRow v-for="role in roles" :key="role.id" class="border-t">
                <TableDataCell>{{ role.id }}</TableDataCell>
                <TableDataCell>{{ role.name }}</TableDataCell>
                <TableDataCell>
                  <Link :href="route('roles.edit', role.id)" class="text-green-400 hover:text-green-600">Edit</Link> /
                   <Link :href="route('roles.destroy', role.id)" method="delete" as="button" class="text-red-400 hover:text-red-600">Delete</Link>
                </TableDataCell>
              </TableRow>
            </template>
          </Table>
        </div>
      </div>
   
  </AdminLayout>
</template>