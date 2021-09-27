<template>
    <span @click="addLike()" class="badge likesButton" :class="isLike ? 'bg-danger': 'bg-success'">{{ articleLikes }} <i class="far fa-thumbs-up"></i></span>
</template>

<script>
import {mapGetters} from 'vuex';
export default {
    computed: {
        isLike() {
            // return this.$store.state.likeIt;
            return this.$store.state.article.likeIt;
        },
        ...mapGetters('article', ['articleLikes'])
        // likesNumber() {
        //     return this.$store.getters.articleLikes;
        // }

    },
    methods: {
        addLike() {
            this.$store.dispatch('article/addLike', {
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
