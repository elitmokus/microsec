<script setup>

import NavLink from "@/Pages/Shared/NavLink.vue";

</script>

<template>
	<!--
	TODO responsive toggle működjön
	-->
	<section class="fixed top-0 bg-blue-900 w-screen">
		<header>
			<nav class="border-gray-200 flex justify-between">
				<div class="max-w-screen-xl flex flex-wrap items-center p-2">
					<!-- Hamburger menu -->
					<button data-collapse-toggle="navbar-dropdown" type="button"
					        class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600"
					        aria-controls="navbar-dropdown" aria-expanded="false">
						<span class="sr-only">Open main menu</span>
						<svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 17 14">
							<path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
							      d="M1 1h15M1 7h15M1 13h15"/>
						</svg>
					</button>
					
					<div class="hidden w-full md:block md:w-auto" id="navbar-dropdown">
						<ul class="flex flex-col font-medium mt-4 md:flex-row md:mt-0">
							<li>
								<NavLink
									href="/"
									:active="$page.component.startsWith('Home')"
								>Home
								</NavLink>
							</li>
							<li>
								<NavLink
									href="/profile"
									:active="$page.component.startsWith('Profile')"
								>Profile
								</NavLink>
							</li>
						</ul>
					</div>
				</div>
				
				<div class="flex items-center">
					<NavLink href="/logout" method="post" as="button" class="mr-4">Log Out</NavLink>
				</div>
			</nav>
		</header>
	</section>
</template>

<style scoped>

</style>