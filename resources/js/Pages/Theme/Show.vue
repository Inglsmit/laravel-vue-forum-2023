<template>
    <div>
        <div class="flex items-center mb-4">
            <h3 class="text-xl mr-4">Theme: {{ theme.title }}</h3>
        </div>
        <div class="mb-8">
            <p>
                {{ theme.description }}
            </p>
        </div>
        <div class="bg-white border-gray-300 border p-4">
            <div class="mb-4">
                <h3 class="text-xl mr-4">Add message</h3>
            </div>
            <div class="mb-4">
                <div class="w-full border-gray-300 border p-2" ref="editor" contenteditable="true"></div>
            </div>
            <div>
                <a href="#" @click.prevent="store" class="block w-1/4 p-2 bg-sky-600 text-white text-center border border-sky-700">
                    Publish
                </a>
            </div>
        </div>
    </div>
</template>

<script>
import MainLayout from "@/Layouts/MainLayout.vue";
import {Link} from "@inertiajs/vue3";
export default {
    name: "Show",

    props: [
        'theme',
    ],

    components: {
        Link
    },

    methods: {
        store(){
            axios.post('/messages', {
                content: this.$refs.editor.innerText,
                theme_id: this.theme.id,
            }).then( res => {
                console.log(res);
                this.$refs.editor.innerText = ''
            })
        }
    },

    layout: MainLayout
}
</script>

<style scoped>

</style>
