<template>
    <div>
        <div class="flex items-center mb-4">
            <h3 class="text-xl mr-4">Edit section</h3>
        </div>
        <div>
            <div>
                <input type="text" v-model="title" class="border-gray-300 p-2 w-1/2 mb-4">
            </div>
            <div>
                <a href="#" @click.prevent="store" class="block w-1/4 py-2 bg-sky-500 border border-sky-600 text-center">Save</a>
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
        'section'
    ],

    data(){
        return{
            title: this.section.title
        }
    },

    components: {
        Link
    },

    methods: {
        store(){
            this.$inertia.patch(`/sections/${this.section.id}`, {title: this.title});
        }
    },

    layout: MainLayout
}
</script>

<style scoped>

</style>
