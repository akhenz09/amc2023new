<script setup>
import AdminLayout from '@/Layouts/AdminLayout.vue';
import { Head, Link, useForm } from '@inertiajs/vue3';
import PrimaryButton from "@/Components/PrimaryButton.vue";
import InputLabel from "@/Components/InputLabel.vue";
import InputError from "@/Components/InputError.vue";
import TextInput from "@/Components/TextInput.vue";

const  props =  defineProps({
    post: {
        type: Object,
        required: true,
    },
});
const form = useForm({
    title: props.post?.title,
});

</script>

<template>
    <Head title="Update post" />

    <AdminLayout>
        <div class="max-w-7xl mx-auto py-4">
            <div class="flex justify-between">
                <h1>Roles Index Page</h1>
                <Link :href="route('posts.index')" class="px-3 py-2 text-white font-semibold bg-indigo-500 hover:bg-indigo-700 rounded">Back</Link>
            </div>
            <div class="max-w-md mx-auto mt-6 p-6 bg-slate-100">
                <h1 class="text-2xl p-4">Update post</h1>
                <form @submit.prevent="form.put(route('posts.update', post.id))">
            <div class="mt-4">
                <InputLabel for="title" value="Title" />

                <TextInput
                    id="title"
                    type="text"
                    class="mt-1 block w-full"
                    v-model="form.title"
                    autofocus
                    autocomplete="Title"
                />

                <InputError class="mt-2" :message="form.errors.title" />
            </div>
            <div class="flex items-center mt-4">

                <PrimaryButton class="ml-4" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                    Update
                </PrimaryButton>
            </div>
        </form>
            </div>
        </div>
    </AdminLayout>
</template>
