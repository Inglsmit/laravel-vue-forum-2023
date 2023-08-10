<template>
    <div>
        <div class="bg-white border-b border-gray-300 py-4">
            <div class="w-1/2 mx-auto">
                <Link :href="route('sections.index')" class="mr-4">Forum</Link>
                <Link :href="route('users.personal')" class="mr-4">Personal</Link>
                <Link :href="route('admin.main.index')">Admin</Link>
            </div>
        </div>
        <div class="w-1/2 flex items-start mx-auto py-4">
            <div class="w-1/4 bg-white p-4 mr-4 border border-gray-300">
                <h3 class="text-xl mr-4">Menu</h3>
            </div>
            <div class="w-3/4 bg-white p-4 border border-gray-300">
                <slot/>
            </div>
        </div>
    </div>
</template>

<script>
import {Link} from "@inertiajs/vue3"

export default {
    name: "AdminLayout",

    components: {
        Link
    }
}
</script>

<style scoped>

</style>
