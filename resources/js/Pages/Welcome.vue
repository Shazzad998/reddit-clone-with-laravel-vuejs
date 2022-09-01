<template>
    <Head title="Reddit" />
    <GuestLayout>
        <section class="grid grid-cols-1 lg:grid-cols-12 gap-4">
            <div class="flex flex-col gap-6 lg:col-span-8">
                <PostCard
                    v-for="post in posts.data"
                    :key="post.id"
                    :post="post"
                    :community="post.community"
                />
            </div>
            <div class="lg:col-span-4">
                <h1
                    class="text-lg bg-gray-800 px-4 py-4 text-gray-200 font-bold lg:px-8 rounded-t-lg"
                >
                    Top Communities
                </h1>
                <div
                    class="bg-white px-4 lg:px-8 py-4 rounded-b-lg shadow-md flex flex-col"
                >
                    <SidebarCommunities :communities="communities" />
                </div>
            </div>
        </section>
    </GuestLayout>
</template>

<script setup>
import GuestLayout from "@/Layouts/Guest.vue";
import { Link, Head } from "@inertiajs/inertia-vue3";
import PostCard from "@/Components/PostCard.vue";
import SidebarCommunities from "../Components/SidebarCommunities.vue";

defineProps({
    communities: Object,
    posts: Object,
});
</script>
