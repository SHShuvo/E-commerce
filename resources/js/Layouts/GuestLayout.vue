<script setup>
import ApplicationLogo from '@/Components/ApplicationLogo.vue';
import { Link } from '@inertiajs/vue3';
</script>

<template>
    <div class="min-h-screen flex flex-col items-center pt-6">
        <div>
            <Link href="/">
                <img class="h-12 fill-current" src="/images/logo/AMAZON_LOGO_DARK.png" alt="">
            </Link>
        </div>

        <div
            class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white border border-gray-300 overflow-hidden rounded-md"
        >
            <slot />
        </div>
        <div v-if="$page.url === '/login'" class="w-full">
            <div class="sm:max-w-md mt-3 mx-auto p-2 text-center">
                New to Amazon?
            </div>
            <div class="sm:max-w-md mt-1 mx-auto p-2 border border-gray-500 bg-gray-200 text-sm font-extrabold hover:bg-gray-300 text-center">
                <Link :href="route('register')">
                    Create Your Amazon Account
                </Link>
            </div>
        </div>
    </div>
</template>
