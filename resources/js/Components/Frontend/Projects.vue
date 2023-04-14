<script setup>
import Project from './Project.vue';
import { ref } from "vue"

const props = defineProps({
  skills: Object,
  projects: Object,
});

</script>
<template>
  <div class="container mx-auto" v-motion :initial="{ opacity: 0, y: 100,}" :visible="{ opacity: 1, y: 0,}">

    <section class="grid gap-y-12 lg:grid-cols-3 lg:gap-8">
        <Project v-for="project in projects" :key="project.id" :project="project" />
    </section>
  </div>
</template>
