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
        <div v-if="theme.messages.length">
            <div v-for="message in theme.messages" class="flex bg-white border border-gray-300">
                <div class="p-4 w-1/6 border-r border-gray-300">
                    <div class="w-16 h-16 bg-gray-300 rounded-full mx-auto"></div>
                    <div>
                        <h3 class="text-center">
                            {{ message.user.name }}
                        </h3>
                    </div>
                </div>
                <div class="p-4 w-5/6">
                    <div>
                        <p class="text-sm">{{ message.time }}</p>
                    </div>
                    <div>
                        <p v-html="message.content"></p>
                    </div>
                </div>
            </div>
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
