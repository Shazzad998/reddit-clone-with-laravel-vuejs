<template>
    <span class="flex col-span-4 mt-2 sm:mt-auto sm:justify-end">
        <nav aria-label="Table navigation">
            <ul class="inline-flex items-center">
                <li v-for="link in links" :key="link.id">
                    <Link
                        class="px-3 py-1 rounded-md focus:outline-none focus:shadow-outline-gray disabled:text-gray-500"
                        :class="[
                            link.active
                                ? 'px-3 py-1 text-white transition-colors  duration-150 bg-gray-800 border border-r-0 border-gray-800 rounded-md focus:outline-none focus:shadow-outline-gray'
                                : '',
                        ]"
                        :href="link.url"
                        as="button"
                        :disabled="!link.url"
                        v-html="link.label"
                    >
                    </Link>
                </li>
            </ul>
        </nav>
    </span>
</template>

<script setup>
import { Link } from "@inertiajs/inertia-vue3";
defineProps({
    links: Array,
});
</script>
