<template>
    <Head :title="post.title" />
    <GuestLayout>
        <section class="grid grid-cols-1 lg:grid-cols-12 gap-4">
            <div class="flex flex-col gap-6 lg:col-span-8">
                <h1>{{ post.title }}</h1>
                Post details
            </div>
            <div class="lg:col-span-4">
                <div
                    class="bg-white px-4 lg:px-8 py-6 rounded-lg flex flex-col"
                >
                    <h1 class="font-semibold text-lg">
                        r/{{ community.name }}
                    </h1>
                    <p class="mt-2">
                        People conforming to the letter, but not the spirit, of
                        a request.
                    </p>
                    <button
                        class="mt-4 text-center py-3 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray transition ease-in-out duration-150"
                    >
                        Join Community
                    </button>
                </div>
            </div>
        </section>
    </GuestLayout>
</template>

<script setup>
import GuestLayout from "@/Layouts/Guest.vue";
import { Link, Head } from "@inertiajs/inertia-vue3";
import PostCard from "@/Components/PostCard.vue";
import Pagination from "@/Components/Pagination.vue";

defineProps({
    community: Object,
    post: Object,
});
</script>
