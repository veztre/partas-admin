<script setup>
import { Link } from '@inertiajs/vue3';
</script>
<template>
  <nav class="bg-gradient-to-b from-[#a2a4d6] to-[#bac0e4]
            fixed top-0 z-50 w-full bg-white border-b border-[#a2a4d6]
            dark:bg-[#a2a4d6] dark:border-[#a2a4d6]drop-shadow-md">
    <div class="px-3 py-3 lg:px-5 lg:pl-3">
      <div class="flex items-center justify-between">
        <div class="flex items-center justify-start">
          <Link href="/dashboard" class="flex ml-2 md:mr-24">
          <img src="/omnibus.png" class="h-8 mr-3" alt="FlowBite Logo" />
          <span class="self-center text-xl text-white font-semibold sm:text-2xl whitespace-nowrap dark:text-white">Omnibus Transport</span>

          </Link>
          <span class="self-center text-xl text-white font-semibold sm:text-2xl whitespace-nowrap dark:text-white">Ticket
            Reservation System</span>
        </div>

        <div class="flex items-center">
          <div class="dropdown dropdown-end">
            <div tabindex="0" role="button"
              class="  flex px-4 py-2 text-sm active:bg-[#929abc]  text-white hover:bg-[#929abc] focus:bg-[#929abc] focus:outline-none focus:rounded-full hover:rounded-full">
              <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                stroke="currentColor" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round"
                  d="M17.982 18.725A7.488 7.488 0 0012 15.75a7.488 7.488 0 00-5.982 2.975m11.963 0a9 9 0 10-11.963 0m11.963 0A8.966 8.966 0 0112 21a8.966 8.966 0 01-5.982-2.275M15 9.75a3 3 0 11-6 0 3 3 0 016 0z" />
              </svg>
              <span class="px-2">Account</span>
            </div>

            <ul tabindex="0"
              class="dropdown-content menu p-2 mt-1 shadow bg-[#929abc] hover:rounded-ful hover:text-white text-white rounded-box w-52">
              <li>
                <Link href="/profile"
                  class="flex px-4 py-2 text-sm text-white hover:bg-[#929abc] hover:rounded-full dark:text-gray-300 dark:hover:bg-gray-600 dark:hover:text-white"
                  role="menuitem">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                  stroke="currentColor" class="w-6 h-6">
                  <path stroke-linecap="round" stroke-linejoin="round"
                    d="M17.982 18.725A7.488 7.488 0 0012 15.75a7.488 7.488 0 00-5.982 2.975m11.963 0a9 9 0 10-11.963 0m11.963 0A8.966 8.966 0 0112 21a8.966 8.966 0 01-5.982-2.275M15 9.75a3 3 0 11-6 0 3 3 0 016 0z" />
                </svg>
                <span class="px-2">
                  Profile
                </span>
                </Link>

              </li>
              <li>
                <Link :href="route('logout')" method="post"
                  class="flex px-4 py-2 text-sm text-white hover:rounded-full hover:bg-[#929abc] dark:text-gray-300 dark:hover:bg-gray-600 dark:hover:text-white"
                  role="menuitem">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                  stroke="currentColor" class="w-6 h-6">
                  <path stroke-linecap="round" stroke-linejoin="round"
                    d="M11.25 9l-3 3m0 0l3 3m-3-3h7.5M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>

                <span class="px-2">
                  Sign out
                </span>
                </Link>
            </li>
          </ul>
        </div>


      </div>
    </div>
  </div>

</nav></template>

