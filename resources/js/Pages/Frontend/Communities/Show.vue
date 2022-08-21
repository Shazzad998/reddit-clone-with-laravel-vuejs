<template>
    <Head :title="community.name" />
    <GuestLayout>
        <div class="flex justify-end p-2 m-2">
            <Link
                class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray transition ease-in-out duration-150"
                v-if="$page.props.auth.is_logged_in"
                :href="route('communities.posts.create', community.slug)"
            >
                Create Post
            </Link>
        </div>
        <h1 class="font-semibold text-2xl">
            Community {{ community.name }} Show Page
        </h1>
    </GuestLayout>
</template>

<script setup>
import GuestLayout from "@/Layouts/Guest.vue";
import { Link, Head } from "@inertiajs/inertia-vue3";

defineProps({
    community: Object,
});
</script>
