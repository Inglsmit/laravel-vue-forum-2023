<template>
    <div>
        <div class="flex items-center mb-4">
            <h3 class="text-xl mr-4">Add branch</h3>
        </div>
        <div>
            <div class="mb-4" v-if="sections.length > 0">
                <select v-model="section_id">
                    <option value="null" selected disabled>Choose section</option>
                    <option v-for="section in sections" :value="section.id">{{ section.title }}</option>
                </select>
            </div>
            <div>
                <input type="text" v-model="title" class="border-gray-300 p-2 w-1/2 mb-4">
            </div>
            <div>
                <a href="#" @click.prevent="store" class="block w-1/4 py-2 bg-sky-500 border border-sky-600 text-center">Add</a>
            </div>
        </div>
    </div>
</template>

<script>
import MainLayout from "@/Layouts/MainLayout.vue";
import {Link} from "@inertiajs/vue3";
export default {
    name: "create",

    props: [
        'sections'
    ],

    data(){
        return{
            title: '',
            section_id: null
        }
    },

    components: {
        Link
    },

    methods: {
        store(){
            this.$inertia.post('/branches', { section_id: this.section_id, title: this.title});
        }
    },

    layout: MainLayout
}
</script>

<style scoped>

</style>
