<script setup>
import { Link } from '@inertiajs/vue3';

defineProps({
  project: Object,
});
</script>
<template>
  <Link :href="project.project_url" class="group flex flex-col items-center text-center cursor-pointer ">
  <div class="mb-1">
    <img class="rounded-2xl h-56" :src="project.image" :alt="project.name" />
  </div>
  <span class="group-hover:text-light-tail-500 capitalize text-accent text-sm mb-1">
    {{ project.skill.name }}
  </span>
  <h3 class="group-hover:text-light-tail-500 text-2xl font-semibold capitalize mb-1">
    {{ project.name }}
  </h3>
  </Link>
</template>

