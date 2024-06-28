<script setup>
import ProductComponent from '@/Components/ProductComponent.vue';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, usePage } from '@inertiajs/vue3';
// console.log(usePage().props.category_name);
</script>

<template>
    <Head title="Dashboard" />

    <AuthenticatedLayout>
        <div class="w-full p-1 pt-2 md-6">
            <div class="text-[27px] font-extrabold">{{ $page.props.category_name.name }}</div>
            <div class="text-sm font-bold">
                Shop home entertainment, TVs, home audio, headphones, cameras, accessories and more
            </div>
        </div>
        <div class="border border-gray-300 rounded-lg text-sm py-3.5 px-10 mb-4">
            1-{{ $page.props.products_by_category.length }} of over {{ $page.props.products_by_category.length }} results for {{ $page.props.category_name.name }}
        </div>
        <div class="grid grid-cols-4 gap-1">
            <div v-for="(product, index) in $page.props.products_by_category" :key="'cat_by_pro'+index" class="m-1">
                <ProductComponent :product="product"/>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
<style>

</style>
