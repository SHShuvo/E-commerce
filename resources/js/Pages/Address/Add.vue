<template>
    <Head title="Address"></Head>
    <AuthenticatedLayout>
        <div class="mt-8"></div>
        <div class="w-[500px] mx-auto text-2xl font-extrabold">
            <div>Add a new Address</div> 

            <form @submit.prevent="submit">
                <div class="text-[15px] -mb-1.5 font-extrabold">Country</div>
                <select v-model="form.country" class="w-full border-gray-300 rounded-md shadow-md py-1.5 
                    bg-gray-200 hover:bg-gray-300 cursor-pointer focus:border-orange-400 
                    focus:ring-orange-400" name="country"
                    >
                    <option selected value="United Kingdom">United Kingdom</option>
                    <option value="United States">United States</option>
                    <option value="Germany">Germany</option>
                    <option value="France">France</option>
                </select>

                <div class="mt-4">
                    <InputLabel class="-mb-1.5" value="First Name"/>
                    <TextInput v-model="form.first_name" type="text" class="mt-1 block w-full"/>
                </div>
                <div class="mt-3">
                    <InputLabel class="-mb-1.5" value="Last Name"/>
                    <TextInput v-model="form.last_name" type="text" class="mt-1 block w-full" required/>
                </div>
                <div class="mt-3">
                    <InputLabel class="-mb-1.5" value="Address"/>
                    <TextInput v-model="form.addr1" type="text" class="mt-1 block w-full" placeholder="Address line 1" required/>
                    <TextInput v-model="form.addr2" type="text" class="mt-1 block w-full" placeholder="Address line 2" required/>
                </div>
                <div class="mt-3">
                    <div class="flex gap-2">
                        <div class="w-full">
                            <InputLabel class="-mb-1.5" value="City"/>
                            <TextInput v-model="form.city" type="text" class="mt-1 block w-full" placeholder="City" required/>
                        </div>
                        <div class="w-full">
                            <InputLabel class="-mb-1.5" value="Postcode"/>
                            <TextInput v-model="form.postcode" type="text" class="mt-1 block w-full" placeholder="Postcode" required/>
                        </div>
                    </div>
                </div>
                <div class="mt-6">
                    <button class="bg-yellow-400 px-3 font-bold text-[14px] rounded-md shadow-sm cursor-pointer">
                        Add address
                    </button>
                </div>
            </form>
        </div>
    </AuthenticatedLayout>
</template>

<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, Link, useForm, usePage } from '@inertiajs/vue3';
import { toRefs, ref } from 'vue';
import MapMarkerOutlineIcon from 'vue-material-design-icons/MapMarkerOutline.vue';
import PlusIcon from 'vue-material-design-icons/Plus.vue';
import InputLabel from '@/Components/InputLabel.vue';
import TextInput from '@/Components/TextInput.vue';
const form = useForm({
    country:'United Kingdom',
    first_name: usePage().props.auth.user.first_name,
    last_name: usePage().props.auth.user.last_name,
    addr1:'',
    addr2:'',
    city:'',
    postcode:'',
});
const submit = () => {
    form.post(route('address_options.store'), {
        onFinish: () => {

        },
    });
};
</script>