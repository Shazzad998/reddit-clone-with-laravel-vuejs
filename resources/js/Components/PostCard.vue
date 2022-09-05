<template>
    <div class="flex gap-6 px-2 lg:px-6 py-4 bg-white rounded-lg shadow-md">
        <PostVote :post="post" />
        <div class="py-4">
            <h3 class="pl-4">
                <Link
                    :href="route('frontend.communities.show', community.slug)"
                    class="font-bold mr-3"
                    >r/{{ community.name }}</Link
                >
                Posted by
                <span class="font-bold">{{ post.username }}</span>
                <span class="ml-3 text-xs font-semibold text-gray-500">{{
                    post.created_at
                }}</span>
            </h3>
            <div class="mt-4">
                <Link
                    :href="
                        route('frontend.communities.posts.show', [
                            community.slug,
                            post.slug,
                        ])
                    "
                    class="text-xl lg:text-2xl font-bold"
                >
                    {{ post.title }}
                </Link>
                <p class="font-medium text-gray-700">
                    {{ post.description }}
                </p>
            </div>
            <div class="pl-4 mt-4 flex gap-6 items-center">
                <span class="font-semibold">Comments({{ post.comments }})</span>
                <Link
                    :href="
                        route('frontend.communities.posts.show', [
                            community.slug,
                            post.slug,
                        ])
                    "
                    class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray transition ease-in-out duration-150"
                >
                    Read more
                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        class="h-5 w-5 ml-2"
                        viewBox="0 0 20 20"
                        fill="currentColor"
                    >
                        <path
                            fill-rule="evenodd"
                            d="M12.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-2.293-2.293a1 1 0 010-1.414z"
                            clip-rule="evenodd"
                        />
                    </svg>
                </Link>
            </div>
        </div>
    </div>
</template>

<script setup>
import { Link } from "@inertiajs/inertia-vue3";
import PostVote from "@/Components/PostVote.vue";
defineProps({
    post: Object,
    community: Object,
});
</script>
