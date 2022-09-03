<template>
    <div>
        <h1
            class="text-lg bg-gray-800 px-4 py-4 text-gray-200 font-bold lg:px-8 rounded-t-lg"
        >
            <slot name="title"></slot>
        </h1>
        <ul
            role="list"
            class="divide-y divide-gray-300 bg-white px-4 lg:px-8 py-4 rounded-b-lg shadow-md flex flex-col"
        >
            <li class="py-3 sm:py-4" v-for="post in posts.data" :key="post.id">
                <div class="flex items-center space-x-4">
                    <Link
                        :href="
                            route('frontend.communities.posts.show', [
                                community_slug,
                                post.slug,
                            ])
                        "
                        class="text-gray-800 font-semibold truncate"
                    >
                        {{ post.title }}
                    </Link>

                    <div class="text-gray-500 text-sm font-semibold">
                        Votes(<span class="text-gray-800">{{ post.votes }}</span
                        >)
                    </div>
                </div>
            </li>
        </ul>
    </div>
</template>

<script setup>
import { Link } from "@inertiajs/inertia-vue3";

defineProps({
    posts: Object,
    community_slug: String,
});
</script>
