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
                <SidebarCommunities :communities="communities">
                    <template #title> Top Communities</template>
                </SidebarCommunities>
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
