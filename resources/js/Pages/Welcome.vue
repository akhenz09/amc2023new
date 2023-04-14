<script setup>
import { Head, Link } from '@inertiajs/vue3';
import { useDark, useToggle  }  from '@vueuse/core'
import Frontend from '@/Layouts/Frontend.vue';
import Skills from '@/Components/Frontend/Skills.vue';
import Heroes from '@/Components/Frontend/Heroes.vue';
import Promote from '@/Components/Frontend/Promote.vue';
import About from '@/Components/Frontend/About.vue';
import Portfolio from '@/Components/Frontend/Portfolio.vue';
import Services from '@/Components/Frontend/Services.vue';
import ContactMe from '@/Components/Frontend/ContactMe.vue';

const isDark = useDark()
const toggleDark = useToggle(isDark)

defineProps({
  skills: Object,
  projects: Object,
  heroes: Object,
});


</script>

<template>
    <Head title="Welcome" />

    <Frontend>
    <!-- Hero primary -->
    <Heroes :heroes="heroes"/>
    <!-- Promote tail-100 -->
    <Skills :skills="skills" />
    <!-- About secondary -->
    <About />
    <!-- Skills tail-100 -->
    <Promote />
    <!-- Portfolio primary -->
    <Portfolio :skills="skills" :projects="projects" />
    <!-- Services secondary -->
    <Services />
    <!-- Contact primary -->
    <ContactMe />
  </Frontend>

</template>
