<script setup>
defineProps({
	active: Boolean
});
</script>

<template>
	<Link
		class="bg-transparent text-white hover:bg-amber-600 px-2 py-1"
		:class="{
		'border-b-2 border-b-amber-600' : active,
		}"
	>
		<slot />
	</Link>
</template>

<style scoped>

</style>