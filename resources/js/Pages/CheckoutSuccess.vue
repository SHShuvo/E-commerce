<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, Link, useForm, usePage } from '@inertiajs/vue3';
import { computed, onMounted, ref, toRefs } from 'vue';
import CheckIcon from 'vue-material-design-icons/Check.vue';

import {useCartStore} from '@/store/cart';
import { storeToRefs } from 'pinia';
const cartStore = useCartStore();
const {cart} = storeToRefs(cartStore);

const props = defineProps({ intent: Object, order: Object});
const {intent} = toRefs(props);

let stripe = null;
let elements = null;
let card = null;
let form = null;
let isProcessing = ref(false);
const data = useForm({ payment_intent: null})


onMounted(()=>{
    cart.value = [];
});
</script>

<template>
    <Head title="Checkout Success"/>

    <AuthenticatedLayout>
        <div class="mt-10 mb-6 max-w-xl mx-auto text-3xl font-extrabold">
            Checkout Success
        </div>
        <div class="max-w-xl mx-auto">
            <div class="flex flex-col items-center text-center">
                <div class="inline-block p-4 bg-green-100 rounded-full">
                    <CheckIcon :size="100" fillColor="#7CFC00" />
                </div>
                <h2 class="mt-2 font-semibold text-2xl text-gray-800">
                    Success
                </h2>
                <p class="mt-2 text-lg font-bold text-gray-600 leading-relaxed">
                    Your order is on it's way!!!
                </p>
            </div>
            <Link :href="route('dashboard')" class="flex items-center mt-3">
                <button class="flex-1 px-4 py-2 ml-2 bg-yellow-500 hover:bg-yellow-500 text-gray-900 
                    font-bold rounded-md">
                    Home
                </button>
            </Link>
        </div>
    </AuthenticatedLayout>
</template>
<style>

</style>
