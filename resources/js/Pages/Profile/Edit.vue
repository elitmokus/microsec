<script setup>
import {useForm} from "@inertiajs/vue3";

let props = defineProps({
	user: Object,
});

let form = useForm({
	nickname: props.user.nickname,
	date_of_birth: props.user.date_of_birth,
	email: props.user.email,
	password: ''
});

let submit = () => {
	form.patch("/profile");
};
</script>

<template>
	<Head>
		<title>Edit User</title>
	</Head>
	
	<h1 class="text-3xl">Edit User</h1>
	
	<form @submit.prevent="submit" class="max-w-md  mt-8">
		
		<!-- Database is offline -->
		<div v-if="form.errors.offline" v-text="form.errors.offline" class="text-red-500 text-lg my-2"></div>
		
		<div class="mb-6">
			<label for="nickname" class="block mb-2 uppercase font-bold text-xs text-gray-700">Nickname</label>
			
			<input v-model="form.nickname"
			       class="border border-gray-400 rounded p-2 w-full"
			       type="text"
			       name="nickname"
			       id="nickname"
			>
			<div v-if="form.errors.nickname" v-text="form.errors.nickname" class="text-red-500 text-xs mt-1"></div>
		</div>
		
		<div class="mb-6">
			<label for="date_of_birth" class="block mb-2 uppercase font-bold text-xs text-gray-700">Date of birth</label>
			
			<input v-model="form.date_of_birth"
			       class="border border-gray-400 p-2 w-full rounded text-gray-800"
			       type="date"
			       name="date_of_birth"
			       id="date_of_birth"
			>
			<div v-if="form.errors.date_of_birth" v-text="form.errors.date_of_birth" class="text-red-500 text-xs mt-1"></div>
		</div>
		
		<div class="mb-6">
			<label for="email" class="block mb-2 uppercase font-bold text-xs text-gray-700">Email</label>
			
			<input v-model="form.email"
			       class="border border-gray-400 rounded p-2 w-full"
			       type="email"
			       name="email"
			       id="email"
			>
			<div v-if="form.errors.email" v-text="form.errors.email" class="text-red-500 text-xs mt-1"></div>
		</div>
		<div class="mb-6">
			<label for="password" class="block mb-2 uppercase font-bold text-xs text-gray-700">Password</label>
			
			<input v-model="form.password"
			       class="border border-gray-400 rounded p-2 w-full"
			       type="password"
			       name="password"
			       id="password"
			>
			<div v-if="form.errors.password" v-text="form.errors.password" class="text-red-500 text-xs mt-1"></div>
		</div>
		
		<div class="mb-6">
			<button type="submit"
			        class="bg-blue-800 text-white rounded py-2 px-4 hover:bg-blue-500 disabled:bg-gray-600"
			        :disabled="form.processing"
			>
				Save changes
			</button>
		</div>
	</form>
</template>

<style scoped>

</style>