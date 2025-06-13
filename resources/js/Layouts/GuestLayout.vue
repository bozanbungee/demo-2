<script setup>
import ApplicationLogo from '@/Components/ApplicationLogo.vue';
import { Link } from '@inertiajs/vue3';
</script>

<template>
    <div class="min-h-screen bg-gray-100 dark:bg-gray-900 text-gray-800 dark:text-gray-100 flex flex-col">
        <!-- Sticky Header -->
        <header class="bg-white dark:bg-gray-800 shadow sticky top-0 z-50">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-4 flex items-center justify-between">
                <div class="flex items-center space-x-3">
                    <Link href="/">
                        <ApplicationLogo class="w-10 h-10 text-indigo-600 dark:text-indigo-400" />
                    </Link>
                    <span class="text-xl font-semibold">My App</span>
                </div>
                <nav class="space-x-6">
                    <Link href="/" class="hover:text-indigo-600 dark:hover:text-indigo-400 transition">Home</Link>
                    <Link href="#" class="hover:text-indigo-600 dark:hover:text-indigo-400 transition">About</Link>
                    <Link href="#" class="hover:text-indigo-600 dark:hover:text-indigo-400 transition">Contact</Link>
                </nav>
            </div>
        </header>

        <!-- Page Content -->
        <main class="flex flex-1 items-center justify-center">
            <div class="w-full max-w-md bg-white dark:bg-gray-800 shadow-lg rounded-xl p-6 mt-10 mb-10">
                <slot />
            </div>
        </main>

        <!-- Footer -->
        <footer class="bg-white dark:bg-gray-800 border-t dark:border-gray-700 text-center py-4 text-sm">
            <p>
                © {{ new Date().getFullYear() }} My App. All rights reserved.
            </p>
        </footer>
    </div>
</template>
