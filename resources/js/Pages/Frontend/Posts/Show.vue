<template>
    <Head :title="post.title" />
    <GuestLayout>
        <section class="grid grid-cols-1 lg:grid-cols-12 gap-4">
            <div class="flex flex-col gap-6 lg:col-span-8">
                <div>
                    <h1
                        class="font-semibold text-gray-800 text-lg bg-white px-4 py-2 inline-block rounded"
                    >
                        <Link
                            :href="
                                route(
                                    'frontend.communities.show',
                                    community.slug
                                )
                            "
                            class="flex items-center gap-3 text-gray-700 hover:text-gray-900 transition-colors duration-200"
                        >
                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                class="h-5 w-5"
                                viewBox="0 0 20 20"
                                fill="currentColor"
                            >
                                <path
                                    fill-rule="evenodd"
                                    d="M7.707 14.707a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 1.414L5.414 9H17a1 1 0 110 2H5.414l2.293 2.293a1 1 0 010 1.414z"
                                    clip-rule="evenodd"
                                />
                            </svg>
                            r/{{ community.name }}
                        </Link>
                    </h1>
                </div>
                <div class="px-2 lg:px-6 py-4 bg-white rounded-lg">
                    <div class="flex gap-2 md:gap-6">
                        <PostVote />

                        <div class="p-4 w-full">
                            <div
                                class="text-gray-500 text-sm flex justify-between items-center"
                            >
                                <div>
                                    Posted by
                                    <span
                                        class="text-gray-800 font-semibold cursor-pointer"
                                        >{{ post.data.username }}</span
                                    >
                                </div>

                                <div
                                    class="flex gap-2"
                                    v-if="
                                        $page.props.auth.is_logged_in &&
                                        post.data.owner
                                    "
                                >
                                    <Link
                                        :href="
                                            route('communities.posts.edit', [
                                                community.slug,
                                                post.data.slug,
                                            ])
                                        "
                                        >Edit</Link
                                    >
                                    <Link
                                        :href="
                                            route('communities.posts.destroy', [
                                                community.slug,
                                                post.data.slug,
                                            ])
                                        "
                                        method="delete"
                                        as="button"
                                        >Delete</Link
                                    >
                                </div>
                            </div>
                            <h1 class="text-2xl md:text-3xl font-semibold">
                                {{ post.data.title }}
                            </h1>
                            <p class="text-gray-700">
                                {{ post.data.description }}
                            </p>
                            <a
                                :href="post.data.url"
                                class="text-blue-500 hover:text-blue-700 block font-medium"
                                >{{ post.data.url }}</a
                            >
                        </div>
                    </div>

                    <hr />
                    <div>
                        <ul role="list" class="divide-y divide-gray-200">
                            <li
                                class="py-4 flex flex-col"
                                v-for="(comment, index) in post.data.comments"
                                :key="index"
                            >
                                <div class="text-sm text-zinc-500">
                                    Commented by
                                    <span
                                        class="font-semibold ml-1 text-zinc-700"
                                    >
                                        {{ comment.username }}</span
                                    >
                                </div>
                                <div class="text-lg font-medium ml-4 p-2">
                                    {{ comment.content }}
                                </div>
                            </li>
                        </ul>
                    </div>
                    <hr class="my-6" />
                    <div class="mt-8" v-if="$page.props.auth.is_logged_in">
                        <form @submit.prevent="submit">
                            <div>
                                <label
                                    for="#comment"
                                    class="font-medium text-sm"
                                    >Your Comment</label
                                >
                            </div>
                            <div>
                                <textarea
                                    v-model="form.content"
                                    id="comment"
                                    rows="3"
                                    cols="50"
                                    class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
                                    placeholder="Your Comment"
                                ></textarea>
                            </div>

                            <button
                                type="submit"
                                class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray transition ease-in-out duration-150"
                            >
                                Comment
                            </button>
                        </form>
                    </div>
                </div>
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
import { Link, Head, useForm } from "@inertiajs/inertia-vue3";
import PostVote from "@/Components/PostVote.vue";

const props = defineProps({
    community: Object,
    post: Object,
});

const form = useForm({
    content: "",
});

const submit = () => {
    form.post(
        route("frontend.posts.comments", [
            props.community.slug,
            props.post.data.slug,
        ]),
        {
            onSuccess: () => form.reset("content"),
        }
    );
};
</script>
