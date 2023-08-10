<template>
    <div>
        <div class="flex items-center mb-8">
            <h3 class="text-xl mr-4">Statistics</h3>
        </div>
    </div>
</template>

<script>
import {Link} from "@inertiajs/vue3";
import AdminLayout from "@/Layouts/AdminLayout.vue";
export default {
    name: "Index",

    props: [
        'sections'
    ],

    components: {
        Link
    },

    layout: AdminLayout
}
</script>

<style scoped>

</style>
