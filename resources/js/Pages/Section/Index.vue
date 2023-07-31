<template>
    <div>
        <div class="flex items-center mb-8">
            <h3 class="text-xl mr-4">Sections</h3>
            <Link :href="route('sections.create')" class="block mr-4 w-1/6 px-2 py-1 bg-white border border-gray-300 rounded-lg text-center">+ section</Link>
            <Link :href="route('branches.create')" class="block w-1/6 px-2 py-1 bg-white border border-gray-300 rounded-lg text-center">+ branch</Link>
        </div>
        <div v-if="sections">
            <div v-for="section in sections" class="mb-8">
                <div v-if="section.branches.length">
                    <div class="mb-4 flex items-center">
                        <h3 class="text-lg mr-4">{{ section.title }}</h3>
                        <Link :href="route('sections.edit', section.id)">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L6.832 19.82a4.5 4.5 0 01-1.897 1.13l-2.685.8.8-2.685a4.5 4.5 0 011.13-1.897L16.863 4.487zm0 0L19.5 7.125" />
                            </svg>
                        </Link>
                    </div>
                    <div v-for="branch in section.branches">
                        <Link :href="route('branches.show', branch.id)" class="block bg-white p-4 border border-gray-300">
                            <h4>{{ branch.title }}</h4>
                        </Link>
                    </div>
                </div>

            </div>
        </div>
    </div>
</template>

<script>
import MainLayout from "@/Layouts/MainLayout.vue";
import {Link} from "@inertiajs/vue3";
export default {
    name: "index",

    props: [
        'sections'
    ],

    components: {
        Link
    },

    layout: MainLayout
}
</script>

<style scoped>

</style>
