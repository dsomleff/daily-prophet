<template>
    <div class="flex items-center mx-3">
        <button :class="like_classes" @click="toggleLike()">
            <i class="bi bi-hand-thumbs-up-fill"></i>
        </button>
        <span :class="likesCountColor" v-text="likesCount"></span>

        <button :class="dislike_classes"  @click="toggleDislike()">
            <i class="bi bi-hand-thumbs-down-fill"></i>
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
            return ['btn', this.isLiked ? "btn-info btn-sm mr-2" :  "btn-secondary btn-sm mr-2"];
        },

        likeEndpoint() {
            return `/posts/${this.post.id}/like`;
        },

        dislikeEndpoint() {
            return `/posts/${this.post.id}/dislike`;
        },

        likesCountColor() {
            return [this.isLiked ? "text-info auto mr-2" :  "text-muted mr-2"];
        },

        dislike_classes() {
            return ['btn', this.isDisliked ? "btn-danger btn-sm mr-2" :  "btn-secondary btn-sm mr-2"];
        },

        dislikesCountColor(){
            return [this.isDisliked ? "text-danger mr-2" :  "text-muted mr-2"];
        },
    },

    methods: {
        toggleLike() {
            this.isLiked ? this.unlike() : this.like();
        },

        like() {
            if (this.isDisliked === true) {
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
            if (this.isLiked === true) {
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
