<template>
    <div>SUbreddit show page</div>

    <h1>{{ subreddit.name }}</h1>
</template>

<script setup>
defineProps({
    subreddit: Object,
});
</script>
