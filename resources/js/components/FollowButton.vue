<template>
    <div>
        <button class="btn btn-primary ml-4 h-75" @click="followUser" v-text="buttonText" :class="{'btn-secondary':status}"></button>
    </div>
</template>

<script>
    export default {
        props: ['userId', 'follows'],
        mounted() {

        },
        data: function(){
            return{
                status: this.follows,
                appUrl: process.env.MIX_APP_URL,
            }
        },
        methods: {
            followUser( e ){
                axios.post( this.appUrl + '/follow/' + this.userId )
                    .then( response => {
                        this.status = response.data ? true : false;
                        console.log(response.data)
                    })
                    .catch( error => {
                        if( error.response.status == 401 ){
                            window.location = this.appUrl + '/login/'; 
                        }
                        console.log(error);
                    } )
            }
        },
        computed:{
            buttonText(){
                return ( this.status ) ? 'Unfollow' : "Follow";
            }
        }
    }

</script>
