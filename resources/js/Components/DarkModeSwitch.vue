<template>
    <button @click="toggleDarkMode">
      <span v-if="isDarkModeOn">Light Mode</span>
      <span v-else>Dark Mode</span>
    </button>
  </template>

  <script>
  export default {
    data() {
      return {
        isDarkModeOn: false,
      };
    },
    mounted() {
      this.isDarkModeOn = localStorage.getItem("isDarkModeOn") === "true";
      this.updateDarkModeClass(this.isDarkModeOn);
    },
    methods: {
      toggleDarkMode() {
        this.isDarkModeOn = !this.isDarkModeOn;
        localStorage.setItem("isDarkModeOn", this.isDarkModeOn.toString());
        this.updateDarkModeClass(this.isDarkModeOn);
        this.$emit("toggle-dark-mode", this.isDarkModeOn);
      },
      updateDarkModeClass(isDarkModeOn) {
        document.body.classList.toggle("dark-mode", isDarkModeOn);
      },
    },
  };
  </script>
