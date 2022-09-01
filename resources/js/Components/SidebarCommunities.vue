<template>
    <div>
        <ul role="list" class="divide-y divide-gray-300">
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
