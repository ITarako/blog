<template>
    <span @click="addLike()" class="badge likesButton" :class="isLike ? 'bg-danger': 'bg-success'">{{ likesNumber }} <i class="far fa-thumbs-up"></i></span>
</template>

<script>
export default {
    computed: {
        isLike() {
            return this.$store.state.likeIt;
        },
        likesNumber() {
            return this.$store.getters.articleLikes;
        }
    },
    methods: {
        addLike() {
            this.$store.dispatch('addLike', {
                slug : this.$store.state.slug,
                increment: this.isLike
            })
        }
    }
}
</script>

<style scoped>

.likesButton {
    cursor: pointer;
}

</style>
