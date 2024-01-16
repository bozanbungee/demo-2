<script setup>
import AdminLayout from "@/Layouts/AdminLayout.vue";
import { Head } from "@inertiajs/vue3";
import { Link } from "@inertiajs/vue3";
import { useForm } from "@inertiajs/vue3";

import InputError from "@/Components/InputError.vue";
import InputLabel from "@/Components/InputLabel.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import TextInput from "@/Components/TextInput.vue";
import VueMultiselect from "vue-multiselect";
import Table from "@/Components/Table.vue";
import TableRow from "@/Components/TableRow.vue";
import TableHeaderCell from "@/Components/TableHeaderCell.vue";
import TableDataCell from "@/Components/TableDataCell.vue";

const props = defineProps({
  role: {
    type: Object,
    requered: true,
  },
  permissions: Array
});
const form = useForm({
  name: props.role?.name,
  permissions: []
});
</script>

<template>
  <Head title="Update role" />

  <AdminLayout>
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <div class="flex justify-between">
        <Link
          :href="route('roles.index')"
          class="px-3 py-2 text-white font-semibold bg-indigo-500 hover:bg-indigo-700 rounded"
          >Back to the Role</Link
        >
      </div>
      <div class="mt-6 max-w-md mx-auto bg-slate-100 shadow-lg rounded-lg p-3">
        <form @submit.prevent="form.put(route('roles.update', role.id))">
          <div class="mt-4">
            <InputLabel for="name" value="Name" />

            <TextInput
              id="name"
              type="text"
              class="mt-1 block w-full"
              v-model="form.name"
              autofocus
              autocomplete="username"
            />

            <InputError class="mt-2" :message="form.errors.name" />
          </div>

          <div class="mt-4">
            <InputLabel for="permissions" value="Permissions" />
            <VueMultiselect
              v-model="form.permissions"
              :options="permissions"
              :multiple="true"
              :close-on-select="true"
              placeholder="Pick some permiisions"
              label="name"
              track-by="id"
            />
          </div>

          <div class="flex items-center mt-4">
            <PrimaryButton
              class="ms-4"
              :class="{ 'opacity-25': form.processing }"
              :disabled="form.processing"
            >
              Update
            </PrimaryButton>
          </div>
        </form>
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
              <TableRow v-for="RolePermission in role.permissions" :key="RolePermission.id" class="border-t">
                <TableDataCell>{{ RolePermission.id }}</TableDataCell>
                <TableDataCell>{{ RolePermission.name }}</TableDataCell>
                <TableDataCell>
                    <Link :href="route('permissions.destroy', RolePermission.id)" method="delete" as="button" class="text-red-400 hover:text-red-600">Revoke</Link>
                </TableDataCell>
              </TableRow>
            </template>
          </Table>
        </div>
    </div>
  </AdminLayout>
</template>
<style src="vue-multiselect/dist/vue-multiselect.css"></style>