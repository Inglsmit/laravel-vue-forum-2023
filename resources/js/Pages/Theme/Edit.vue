<template>
    <div>
        <div class="flex items-center mb-4">
            <h3 class="text-xl mr-4">Edit theme</h3>
        </div>
        <div>
            <div>
                <input type="text" placeholder="title" v-model="title" class="border-gray-300 p-2 w-1/2 mb-4">
            </div>
            <div>
                <textarea placeholder="description" v-model="description" class="border-gray-300 p-2 w-1/2 mb-4">
                    {{ description }}
                </textarea>
            </div>
            <div>
                <a href="#" @click.prevent="update" class="block w-1/4 py-2 bg-sky-500 border border-sky-600 text-center">Save</a>
            </div>
        </div>
    </div>
</template>

<script>
import MainLayout from "@/Layouts/MainLayout.vue";
import {Link} from "@inertiajs/vue3";
export default {
    name: "Create",

    props: [
        'theme',
    ],

    data(){
        return{
            title: this.theme.title,
            description: this.theme.description,
        }
    },

    components: {
        Link
    },

    methods: {
        update(){
            this.$inertia.patch(`/themes/${this.theme.id}`, {
                title: this.title,
                description: this.description,
            });
        }
    },

    layout: MainLayout
}
</script>

<style scoped>

</style>
