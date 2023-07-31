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
                    <div class="mb-4">
                        <h3 class="text-lg">{{ section.title }}</h3>
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
