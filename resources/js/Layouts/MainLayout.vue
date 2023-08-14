<template>
    <div>
        <div class="bg-white border-b border-gray-300 py-4">
            <div class="w-5/6 mx-auto flex items-center justify-between">
                <div>
                    <Link :href="route('sections.index')" class="mr-4">Forum</Link>
                    <Link :href="route('users.personal')" class="mr-4">Personal</Link>
                    <Link :href="route('admin.main.index')">Admin</Link>
                </div>
                <div>
                    <div>
                        <a href="" class="flex items-center">
                            <p class="mr-2">Notification</p>
                            <span>0</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="w-5/6 mx-auto py-4">
            <slot />
        </div>
    </div>
</template>

<script>
import {Link} from "@inertiajs/vue3"
export default {
    name: "MainLayout",

    created(){
      window.Echo.channel('test-name')
          .listen('.test', res => {
              console.log(res);
          })
    },

    components: {
        Link
    }
}
</script>

<style scoped>

</style>
