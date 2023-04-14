<script setup>
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import DashboardLayout from '@/Layouts/DashboardLayout.vue';
import { Head, Link, useForm, router } from '@inertiajs/vue3';


const props = defineProps ({
    aboutheaders: Object,
});

const form = useForm({
  name: props.aboutheader?.name,
  image: null,
});

const submit = () => {
  router.post(`/AboutHeaders/${props.aboutheader.id}`, {
    _method: "put",
    name: form.name,
    image: form.image,
  });
};


</script>

<template>
    <Head title="Edit About Header" />

    <DashboardLayout>
        <div class="flex justify-between">
                <h1>About Header Index Page</h1>
                <Link :href="route('aboutheaders.index')" class="px-3 py-2 text-white font-semibold bg-indigo-500 hover:bg-indigo-700 rounded">Back</Link>
            </div>
        <div class="py-12">
            <div class="max-w-md mx-auto sm:px-6 lg:px-8 bg-white">
                                <form class="p-4" @submit.prevent="submit">
                                    <div>
                                        <InputLabel for="name" value="Name" />

                                        <TextInput
                                            id="name"
                                            type="text"
                                            class="mt-1 block w-full"
                                            v-model="form.name"
                                            autofocus
                                            autocomplete="username"
                                        />

                                        <InputError class="mt-2" :message="$page.props.errors.name" />
                                    </div>
                                    <div class="mt-2">
                                        <InputLabel for="image" value="Image" />

                                        <TextInput
                                            id="image"
                                            type="file"
                                            class="mt-1 block w-full"
                                            @input="form.image = $event.target.files[0]"
                                        />

                                        <InputError class="mt-2" :message="$page.props.errors.image" />
                                    </div>

                                    <div class="flex items-center justify-end mt-4">
                                        <PrimaryButton class="ml-4" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                                            Update
                                        </PrimaryButton>
                                    </div>
                                </form>
                        </div>
                    </div>
    </DashboardLayout>
</template>
