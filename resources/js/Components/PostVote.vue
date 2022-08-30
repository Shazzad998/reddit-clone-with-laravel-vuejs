<template>
    <div class="flex flex-col items-center gap-y-4">
        <Link
            :href="route('post.upVote', post.slug)"
            method="post"
            as="button"
            type="button"
            preserve-scroll
            class="font-bold text-sm hover:text-indigo-500"
        >
            <i
                class="bx bx-upvote text-2xl"
                :class="{
                    'text-indigo-500':
                        post.postVotes[0] && post.postVotes[0].vote == 1,
                }"
            ></i>
        </Link>
        <span
            class="font-bold"
            :class="{
                'text-indigo-500':
                    post.postVotes[0] && post.postVotes[0].vote == 1,
                'text-rose-500':
                    post.postVotes[0] && post.postVotes[0].vote == -1,
            }"
            >{{ post.votes }}</span
        >

        <Link
            :href="route('post.downVote', post.slug)"
            method="post"
            as="button"
            type="button"
            preserve-scroll
            class="font-bold text-sm hover:text-rose-500"
        >
            <i
                class="bx bx-downvote text-2xl"
                :class="{
                    'text-rose-500':
                        post.postVotes[0] && post.postVotes[0].vote == -1,
                }"
            ></i>
        </Link>
    </div>
</template>

<script setup>
import { Link } from "@inertiajs/inertia-vue3";

defineProps({
    post: Object,
});
</script>
