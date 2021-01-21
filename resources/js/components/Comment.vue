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
                flash('Updated!');
            },

            destroy() {
                axios.delete(`/comment/${this.attributes.id}`);

                setTimeout(() => { this.show = false; }, 300);
                flash('Your reply has been deleted.');
            }
        }
    }
</script>
