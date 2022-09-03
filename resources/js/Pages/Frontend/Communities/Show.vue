<template>
    <Head :title="community.name" />
    <GuestLayout>
        <template #header>
            <div class="flex justify-between items-center">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    r/{{ community.name }}
                </h2>
                <Link
                    class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray transition ease-in-out duration-150"
                    v-if="$page.props.auth.is_logged_in"
                    :href="route('communities.posts.create', community.slug)"
                >
                    Create Post
                </Link>
            </div>
        </template>
        <section class="grid grid-cols-1 lg:grid-cols-12 gap-4">
            <div class="flex flex-col gap-6 lg:col-span-8">
                <PostCard
                    v-for="post in posts.data"
                    :key="post.id"
                    :post="post"
                    :community="community"
                />

                <div class="my-4">
                    <Pagination :links="posts.meta.links" />
                </div>
            </div>
            <div class="lg:col-span-4">
                <div class="mb-6">
                    <h1
                        class="text-lg bg-gray-800 px-4 py-4 text-gray-200 font-bold lg:px-8 rounded-t-lg"
                    >
                        About {{ community.name }}
                    </h1>

                    <div
                        class="bg-white px-4 lg:px-8 py-4 rounded-b-lg shadow-md flex flex-col"
                    >
                        {{ community.description }}
                    </div>
                </div>

                <SidebarCommunities :communities="communities">
                    <template #title> Latest Communities</template>
                </SidebarCommunities>
            </div>
        </section>
    </GuestLayout>
</template>

<script setup>
import GuestLayout from "@/Layouts/Guest.vue";
import { Link, Head } from "@inertiajs/inertia-vue3";
import PostCard from "@/Components/PostCard.vue";
import Pagination from "@/Components/Pagination.vue";
import SidebarCommunities from "@/Components/SidebarCommunities.vue";

defineProps({
    community: Object,
    posts: Object,
    communities: Object,
});
</script>
