<template>
    <div>
        <button class="blank-donut" @click="likePost" :class="{'pink-donut':liked}">

        </button>
    </div>
</template>

<script>
    export default {
        props: ['postId', 'liked'],

        mounted() {

        },

        data: function () {
            return {
                status: this.liked,
            }
        },

        methods: {
            likePost() {
                axios.post('/like/' + this.postId)
                    .then(response=> {
                        this.liked = ! this.liked;
                    
                        console.log(response.data);
                    })
                    .catch(error => {
                        if (errors.data.status == 401){
                            window.location = '/login';
                        }
                        console.log(error);
                    })
            }
        },
        // computed: {
        //     whichbutton() {
        //         console.log(this.liked);
        //         return ( this.liked ) ? 'liked' : 'not liked';
        //     }
        // }
    }
</script>
