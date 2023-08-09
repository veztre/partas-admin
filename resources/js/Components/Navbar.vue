<script setup>
import { Link } from '@inertiajs/vue3';
</script>
<template>
<nav class="fixed top-0 z-50 w-full bg-gradient-to-b from-green-400 to-blue-400">
  <div class="px-3 py-3 lg:px-5 lg:pl-3">
    <div class="flex items-center justify-between">
      <div class="flex items-center justify-start">
        <Link href="/dashboard" class="flex ml-2 md:mr-24">
          <img src="/storage/partas_logo.png" class="h-8 mr-3" alt="FlowBite Logo" />
          <span class="self-center text-xl font-semibold sm:text-2xl whitespace-nowrap dark:text-white">Partas Bus Inc</span>
        </Link>
        <span class="self-center text-xl text-green-800 font-semibold sm:text-2xl whitespace-nowrap dark:text-white">Ticket Reservation System</span>
      </div>
      <div class="flex items-center">
          <div class="flex items-center ml-3">
            <div>
              <button type="button" class="flex text-white px-2 bg-blue-400 rounded-full focus:ring-4 focus:ring-gray-300 dark:focus:ring-gray-600" aria-expanded="false" data-dropdown-toggle="dropdown-user">
                <span>{{$page.props.auth.user.name}}</span>
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class=" ml-2 w-5 h-5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 5.25l-7.5 7.5-7.5-7.5m15 6l-7.5 7.5-7.5-7.5" />
                </svg>

                </button>
            </div>
            <div class="z-50 hidden my-4 text-base list-none bg-white divide-y divide-gray-100 rounded shadow dark:bg-gray-700 dark:divide-gray-600" id="dropdown-user">
              <div class="px-4 py-3" role="none">

                <p class="text-sm font-medium text-gray-900 truncate dark:text-gray-300" role="none">
                  Email: {{$page.props.auth.user.email}}
                </p>
              </div>
              <ul class="py-1" role="none">
                <li>
                  <Link href="/profile" class="flex px-4 py-2  text-sm text-gray-700 hover:bg-gray-100 dark:text-gray-300 dark:hover:bg-gray-600 dark:hover:text-white" role="menuitem">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M17.982 18.725A7.488 7.488 0 0012 15.75a7.488 7.488 0 00-5.982 2.975m11.963 0a9 9 0 10-11.963 0m11.963 0A8.966 8.966 0 0112 21a8.966 8.966 0 01-5.982-2.275M15 9.75a3 3 0 11-6 0 3 3 0 016 0z" />
                    </svg>
                     <span class="px-2">
                      Profile
                      </span>
                  </Link>
                </li>
                <li>
                  <Link :href="route('logout')"  method="post" class="flex px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:text-gray-300 dark:hover:bg-gray-600 dark:hover:text-white" role="menuitem">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M11.25 9l-3 3m0 0l3 3m-3-3h7.5M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
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
  </div>
</nav>

</template>

