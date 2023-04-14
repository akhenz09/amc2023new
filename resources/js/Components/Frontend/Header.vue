<script setup>
import { ref, onMounted } from "vue";
import { useDark, useToggle } from "@vueuse/core";
import DarkModeSwitch from '../DarkModeSwitch.vue';

const isDark = useDark()
const toggleDarkMode = useToggle(isDark)

const showMobileMenu = ref("true");
const scrollBg = ref(false);

const navigations = [
  { name: "Home", href: "#home" },
  { name: "About", href: "#about" },
  { name: "Program", href: "#portfolio" },
  { name: "Services", href: "#services" },
  { name: "Contact", href: "#contact" },
];

const setScrollBg = (value) => {
  scrollBg.value = value;
};

onMounted(() => {
  window.addEventListener("scroll", () => {
    return window.scrollY > 50 ? setScrollBg(true) : setScrollBg(false);
  });
});


</script>

<template>

<nav class="w-full fixed z-20 px-2 sm:px-4 py-2.5 rounded" :class="{'bg-light-primary dark:bg-dark-primary': scrollBg, ' dark:bg-slate-800': !scrollBg,}">
  <div class="container flex flex-wrap items-center justify-between mx-auto">
    <a href="http://127.0.0.1:8000/#home" class="flex items-center">
        <img src="img/amc black.png" alt="amc logo" class="h-[100px] -my-3.5 px-2">
        <span class="self-center text-xl font-semibold whitespace-nowrap dark:text-white">AMC PODCLASS</span>
    </a>
    <button @click="showMobileMenu = !showMobileMenu" data-collapse-toggle="navbar-default" type="button" class="inline-flex items-center p-2 ml-3 text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600" aria-controls="navbar-default" aria-expanded="false">
      <span class="sr-only">Open main menu</span>
      <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z" clip-rule="evenodd"></path></svg>
    </button>
    <div class="w-full md:block md:w-auto"
    :class="{ hidden : showMobileMenu }"
    id="navbar-default">
      <ul class="
            flex flex-col
            p-4
            mt-4
            rounded-lg
            border self-center text-xl font-semibold whitespace-nowrap
            md:flex-row md:space-x-8 md:mt-0 md:font-medium md:border-0
          ">
          <li v-for="(navigation, index) in navigations" :key="index">
            <a
              :href="navigation.href"
              class="block py-2 pr-4 pl-3 text-black rounded hover:text-light-tail-100 dark:text-white dark:hover:text-light-tail-100" aria-current="page">{{ navigation.name }}</a
            >
          </li>

          <li class=" block py-2 pr-4 pl-3 self-center text-xl font-semibold whitespace-nowrap dark:text-white  mt-[-5px]">

<button id="dropdownDefaultButton" data-dropdown-toggle="dropdown" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2.5 text-center inline-flex items-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="button">Login/Register <svg class="w-4 h-4 ml-2" aria-hidden="true" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg></button>
<!-- Dropdown menu -->
<div id="dropdown" class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700">
    <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownDefaultButton">
      <li>
        <a href="http://127.0.0.1:8000/login" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Login</a>
      </li>
      <li>
        <a href="http://127.0.0.1:8000/register" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Register</a>

      </li>
      <li>

    <DarkModeSwitch class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white" @toggle-dark-mode="toggleDarkMode" />
      </li>
    </ul>
</div>

        </li>

    </ul>
    </div>
  </div>
</nav>




</template>

<script>
export default {
  components: { DarkModeSwitch },
  methods: {
    toggleDarkMode(isDarkModeOn) {
      // Handle toggling of dark mode here
    },
  },
};

</script>

