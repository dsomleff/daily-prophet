<script>
    export default {
        props: ['attributes'],

        data() {
            return {
                editing: false,
                body: this.attributes.body,
                show: true
            };
        },

        methods: {
            update() {
                axios.put(`/comment/${this.attributes.id}`, {
                    body: this.body
                });

                this.editing = false;
                flash('Your comment has been updated.');
            },

            destroy() {
                axios.delete(`/comment/${this.attributes.id}`);

                setTimeout(() => { this.show = false; }, 300);
                flash('Your comment has been deleted.');
            }
        }
    }
</script>
