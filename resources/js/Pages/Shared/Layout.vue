<script setup>
import Nav from "@/Pages/Shared/Nav.vue";
</script>

<template>
	<Nav/>
	
	<section class="mt-10 p-6">
		
		<div class="p-4 mx-auto min-h-[calc(90vh-2rem)]">
			<slot/>
		</div>
	</section>
</template>

<style scoped>
</style>