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
                    <div class="w-16 h-16 overflow-hidden bg-gray-300 rounded-full mx-auto">
                        <img class="w-24 h-24" v-if="message.user.avatar_url" :src="message.user.avatar_url" alt="">
                    </div>
                    <div>
                        <h3 class="text-center">
                            {{ message.user.name }}
                        </h3>
                    </div>
                </div>
                <div class="p-4 w-5/6">
                    <div class="mb-2">
                        <p class="text-sm">{{ message.time }}</p>
                    </div>
                    <div>
                        <div v-if="message.is_not_solved_complaint">
                            <p class="w-full bg-red-50 p-2">Your complain on review</p>
                        </div>
                        <div class="mb-4">
                            <p v-html="message.content"></p>
                        </div>
                        <div class="mb-4 flex items-center justify-end w-full">

                            <div class="mr-4">
                                <a href="#" @click.prevent="openComplaint(message)" class="text-sm text-red-600 rounded-lg border border-red-500 inline-block p-2 text-center text-red-500">
                                    Complain
                                </a>
                            </div>

                            <div class="mr-4">
                                <a href="#" @click.prevent="answer(message)" class="text-sm text-white rounded-lg bg-indigo-600 border border-indigo-700 inline-block p-2 text-center">
                                    Reply
                                </a>
                            </div>

                            <div class="mr-4">
                                <a href="#" @click.prevent="quote(message.content)" class="text-sm text-white rounded-lg bg-sky-600 border border-sky-700 inline-block p-2 text-center">
                                    Quote
                                </a>
                            </div>

                            <div class="flex items-center">
                                <span class="mr-2">
                                    {{ message.likes }}
                                </span>
                                <a @click.prevent="toggleLike(message)" href="#">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                         :class="[message.is_liked ? 'fill-sky-600' : '', 'w-6 h-6 stroke-sky-600']">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12z" />
                                    </svg>
                                </a>
                            </div>
                        </div>
                        <div class="flex items-center" v-if="message.is_complaint">
                            <input v-model="message.body" class="w-5/6 p-2 rounded-lg rounded-r-none border border-gray-300" placeholder="Your complain" type="text" name="" id="" />
                            <a @click.prevent="complaint(message)" href="#" class="block p-2 rounded-lg rounded-l-none w-1/6 text-center bg-red-800 border-gray-300 text-white">Send</a>
                        </div>
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
                content: this.$refs.editor.innerHTML,
                theme_id: this.theme.id,
            }).then( res => {
                this.$refs.editor.innerHTML = ''
                this.theme.messages.push(res.data)
            })
        },

        toggleLike(message){
            axios.post(`/messages/${message.id}/likes`)
                .then( () => {
                    message.is_liked ? message.likes-- : message.likes++
                    message.is_liked = !message.is_liked
                })
        },

        quote(content){
            if(window.getSelection().toString()) {
                content = window.getSelection().toString()
            }

            const editor = this.$refs.editor
            const oldText = editor.innerHTML
            editor.innerHTML = `${oldText}<br><blockquote> ${content} </blockquote><br>`
        },

        answer(message){
            const title = `<div class="w-full bg-gray-200 border border-gray-300 p-2">Reply to @${message.user.id} ${message.user.name} ${message.time}</div>`
            const editor = this.$refs.editor
            const oldText = editor.innerHTML
            editor.innerHTML = `${oldText} ${title}<blockquote> ${message.content} </blockquote><br>`
        },

        openComplaint(message){
            message.body = ''
            message.is_complaint = !message.is_complaint
        },

        complaint(message){
            axios.post(`/messages/${message.id}/complaints`, {
                body: message.body,
                theme_id: message.theme_id
            }).then( () => {
                message.is_not_solved_complaint = res.data.is_not_solved_complaint
            })
        },
    },

    layout: MainLayout
}
</script>

<style>
    blockquote{
        display: block;
        padding: 4px;
        padding-left: 6px;
        border-left: 4px solid #a0aec0;
        background-color: #f6f6f6;

    }
</style>
