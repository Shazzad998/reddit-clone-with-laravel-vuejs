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
            <li
                class="py-3 sm:py-4"
                v-for="community in communities.data"
                :key="community.id"
            >
                <div class="flex items-center space-x-4">
                    <Link
                        :href="
                            route('frontend.communities.show', community.slug)
                        "
                        class="text-gray-800 font-semibold truncate"
                    >
                        {{ community.name }}
                    </Link>

                    <div class="text-gray-500 text-sm font-semibold">
                        Posts(<span class="text-gray-800">{{
                            community.posts_count
                        }}</span
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
    communities: Object,
});
</script>
