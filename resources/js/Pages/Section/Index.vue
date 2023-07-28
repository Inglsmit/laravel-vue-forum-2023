<template>
    <div>
        <div class="flex items-center">
            <h3 class="text-xl mr-4">Sections</h3>
            <Link :href="route('sections.create')" class="block px-2 py-1 w-8 bg-white border border-gray-300 rounded-lg text-center">+</Link>
        </div>
    </div>
</template>

<script>
import MainLayout from "@/Layouts/MainLayout.vue";
import {Link} from "@inertiajs/vue3";
export default {
    name: "index",

    components: {
        Link
    },

    layout: MainLayout
}
</script>

<style scoped>

</style>
