<template>
    <div class="container">
         <button class="btn btn-primary ml-3" @click="followUser()">Follow</button>
    </div>
</template>

<script>
    export default {
        props: ['userId'],

        mounted() {
            console.log('Component mounted.')
        },

        methods: {
            followUser() {
               // alert("am clicked");
               axios.post('/follow/' + this.userId)
                    .then(response => {
                        alert(response.data);
                });
            }
        }
    }
</script>
