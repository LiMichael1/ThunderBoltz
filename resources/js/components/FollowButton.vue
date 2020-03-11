<template>
    <div>
        <button class="btn btn-primary ml-4 h-75" @click="followUser">Follow</button>
    </div>
</template>

<script>
    export default {
        props: ['userId'],
        mounted() {
            console.log('Follow Button Component mounted.')
        },
        methods: {
            followUser( e ){
                console.log( this.userId );
                axios.post('/ThunderBoltz/public/follow/' + this.userId )
                    .then( response => {
                        console.log(response.data)
                    })
            }
        }
    }

</script>
