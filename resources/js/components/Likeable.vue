<template>
    <div class="flex items-center mx-3">
        <button :class="like_classes" @click="toggleLike()">
            +
        </button>
        <span :class="likesCountColor" v-text="likesCount"></span>

        <button :class="dislike_classes"  @click="toggleDislike()">
            -
        </button>
        <span :class="dislikesCountColor" v-text="dislikesCount"></span>
    </div>
</template>

<script>
export default {
    props: ['post'],

    data() {
        return {
            likesCount: this.post.likes_count,
            isLiked: this.post.isLiked,

            dislikesCount: this.post.dislikes_count,
            isDisliked: this.post.isDisliked,
        }
    },

    computed: {
        like_classes() {
            return ['btn', this.isLiked ? "btn-info btn-sm" :  "btn-secondary btn-sm"];
        },

        likeEndpoint() {
            return `/posts/${this.post.id}/like`;
        },

        dislikeEndpoint() {
            return `/posts/${this.post.id}/dislike`;
        },

        likesCountColor() {
            return [this.isLiked ? "text-info" :  "text-muted"];
        },

        dislike_classes() {
            return ['btn', this.isDisliked ? "btn-danger btn-sm" :  "btn-secondary btn-sm"];
        },

        dislikesCountColor(){
            return [this.isDisliked ? "text-danger" :  "text-muted"];
        },
    },

    methods: {
        toggleLike() {
            this.isLiked ? this.unlike() : this.like();
        },

        like() {
            if (this.dislikesCount > 0) {
                this.dislikesCount --;
                this.isDisliked = false;
            }
                axios.post(this.likeEndpoint).then(() => {
                    this.isLiked = true
                    this.likesCount ++
                });
        },

        unlike() {
            axios.delete(this.likeEndpoint);

            this.isLiked = false;
            this.likesCount --;
        },

        toggleDislike() {
            this.isDisliked ? this.unDislike() : this.dislike();
        },

        dislike() {
            if (this.likesCount > 0) {
                this.likesCount --;
                this.isLiked = false;
            }
                axios.post(this.dislikeEndpoint);
                this.isDisliked = true;
                this.dislikesCount ++;
        },

        unDislike() {
            axios.delete(this.dislikeEndpoint);
            this.isDisliked = false;
            this.dislikesCount --;
        },
    }
}
</script>
