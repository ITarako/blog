<template>
    <span class="badge bg-primary">{{ viewsNumber }} <i class="far fa-eye"></i></span>
</template>

<script>
export default {
    computed: {
        viewsNumber() {
            // return this.$store.getters.articleViews;
            return this.$store.getters['article/articleViews'];
        }
    },
}
</script>
