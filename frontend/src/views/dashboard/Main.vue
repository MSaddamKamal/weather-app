<template>
  <div class="container-loader" v-show="loader">

    <svg class="loader" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 340 340">
      <circle cx="170" cy="170" r="160" stroke="#E2007C"/>
      <circle cx="170" cy="170" r="135" stroke="#404041"/>
      <circle cx="170" cy="170" r="110" stroke="#E2007C"/>
      <circle cx="170" cy="170" r="85" stroke="#404041"/>
    </svg>

  </div>
  <div v-show="!loader">
    <nav class="navbar navbar-expand-md navbar-light bg-secondary shadow-sm">
      <div class="container">
        <router-link class="navbar-brand text-white font-weight-bolder" to="/"><strong>Fullstack Challenge</strong></router-link>
       
      </div>
    </nav>
    <main class="py-4">
      <Users/>
    </main>

  </div>

  </template>
  
  <script>
 import Users from '@/views/dashboard/Users.vue'
  export default {
    components:{Users},
    data() {
      return {
        loader: false
      };
    },
    mounted() {

    },
    methods: {
      
    }
  }
  </script>
  
  