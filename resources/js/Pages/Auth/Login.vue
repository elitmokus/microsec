<script setup>
import {useForm} from "@inertiajs/vue3";

defineOptions({
	layout: null // Unset default layout for this page
});

let form = useForm({
	email: '',
	password: ''
});

let submit = () => {
	form.post("/login");
};
</script>

<template>
	<Head title="Login"></Head>
	
	<main class="grid place-items-center min-h-screen">
		<section class="bg-blue-900 text-white p-8 rounded-xl w-3/12 mx-auto border">
			<h1 class="text-3xl mb-6">Login</h1>
			
			<form @submit.prevent="submit" class=" mt-8">
				<div class="mb-6">
					<label for="email" class="block mb-2 uppercase font-bold text-xs ">Email</label>
					
					<input v-model="form.email"
					       class="border p-2 w-full rounded text-gray-800"
					       type="email"
					       name="email"
					       id="email"
					>
					<div v-if="form.errors.email" v-text="form.errors.email" class="text-red-500 text-xs mt-1"></div>
				</div>
				<div class="mb-6">
					<label for="password" class="block mb-2 uppercase font-bold text-xs">Password</label>
					
					<input v-model="form.password"
					       class="border p-2 w-full rounded text-gray-800"
					       type="password"
					       name="password"
					       id="password"
					>
					<div v-if="form.errors.password" v-text="form.errors.password" class="text-red-500 text-xs mt-1"></div>
				</div>
				<div class="mb-6 items-center text-center">
					<button type="submit"
					        class="bg-amber-600 text-white rounded py-2 px-4 mb-4 hover:opacity-90 w-full"
					        :disabled="form.processing"
					>
						Login
					</button>
					<Link
						href="/sign_up"
						class="text-amber-600 underline hover:opacity-90"
					>Don't have account? Sign up here</Link>
				</div>
			</form>
		</section>
	</main>
</template>

<style scoped>

</style>