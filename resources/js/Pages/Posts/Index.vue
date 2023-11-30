<template>
  <div>
    <h1>Hello posts</h1>
    <Link href="about">About | </Link>
    <Link href="post">Post |</Link>
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
</style>