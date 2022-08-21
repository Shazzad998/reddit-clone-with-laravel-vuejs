<template>
    <Head title="All Communities" />

    <BreezeAuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                All ommunities
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                        <!-- With actions -->
                        <div class="flex mb-4 justify-between items-center">
                            <h1 class="text-lg font-semibold">
                                Communities List
                            </h1>
                            <Link
                                :href="route('communities.create')"
                                class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray transition ease-in-out duration-150"
                            >
                                Create Community</Link
                            >
                        </div>

                        <div
                            class="w-full overflow-hidden rounded-lg shadow-xs"
                        >
                            <div class="w-full overflow-x-auto">
                                <table class="w-full whitespace-no-wrap">
                                    <thead>
                                        <tr
                                            class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b bg-gray-50"
                                        >
                                            <th class="px-4 py-3">Name</th>
                                            <th class="px-4 py-3">Slug</th>

                                            <th class="px-4 py-3">Actions</th>
                                        </tr>
                                    </thead>

                                    <tbody class="bg-white divide-y">
                                        <tr
                                            class="text-gray-700"
                                            v-for="community in communities.data"
                                            :key="community.id"
                                        >
                                            <td class="px-4 py-3">
                                                <Link
                                                    :href="
                                                        route(
                                                            'frontend.communities.show',
                                                            community.slug
                                                        )
                                                    "
                                                >
                                                    {{ community.name }}
                                                </Link>
                                            </td>
                                            <td class="px-4 py-3 text-sm">
                                                {{ community.slug }}
                                            </td>

                                            <td class="px-4 py-3">
                                                <div
                                                    class="flex items-center space-x-4 text-sm"
                                                >
                                                    <Link
                                                        class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-gray-600 rounded-lg focus:outline-none focus:shadow-outline-gray"
                                                        aria-label="Edit"
                                                        :href="
                                                            route(
                                                                'communities.edit',
                                                                community.id
                                                            )
                                                        "
                                                    >
                                                        <svg
                                                            class="w-5 h-5"
                                                            aria-hidden="true"
                                                            fill="currentColor"
                                                            viewBox="0 0 20 20"
                                                        >
                                                            <path
                                                                d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z"
                                                            ></path>
                                                        </svg>
                                                    </Link>
                                                    <Link
                                                        class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-gray-600 rounded-lg focus:outline-none focus:shadow-outline-gray"
                                                        aria-label="Delete"
                                                        :href="
                                                            route(
                                                                'communities.destroy',
                                                                community.id
                                                            )
                                                        "
                                                        method="delete"
                                                        as="button"
                                                    >
                                                        <svg
                                                            class="w-5 h-5"
                                                            aria-hidden="true"
                                                            fill="currentColor"
                                                            viewBox="0 0 20 20"
                                                        >
                                                            <path
                                                                fill-rule="evenodd"
                                                                d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                                                                clip-rule="evenodd"
                                                            ></path>
                                                        </svg>
                                                    </Link>
                                                </div>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div
                                class="grid px-4 py-3 text-xs font-semibold tracking-wide text-gray-500 uppercase border-t bg-gray-50 sm:grid-cols-9"
                            >
                                <span class="flex items-center col-span-3">
                                    Showing {{ communities.from }}-{{
                                        communities.to
                                    }}
                                    of {{ communities.total }}
                                </span>
                                <span class="col-span-2"></span>
                                <!-- Pagination -->
                                <Pagination :links="communities.links" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </BreezeAuthenticatedLayout>
</template>

<script setup>
import { Head, Link } from "@inertiajs/inertia-vue3";
import BreezeAuthenticatedLayout from "@/Layouts/Authenticated.vue";
import Pagination from "@/Components/Pagination.vue";

defineProps({
    communities: Object,
});
</script>
