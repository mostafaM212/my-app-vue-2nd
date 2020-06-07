<template>
    <div class="container">
        <div class="alert alert-success" role="alert" v-if="createdSuccess">
            Your Post Changed Successfully
        </div>
        <form v-on:submit.prevent="onSubmit">
            <div class="form-group">
                <label for="title">title</label>
                <input type="text" class="form-control" id="title" placeholder="title"
                       v-model.lazy="fromData.title = post.title"
                       v-on:keydown="rest('title')"
                >
                <span v-if="this.Errors.hasOwnProperty('title') " class="text-danger" v-text="this.Errors.title[0]"></span>

            </div>

            <div class="form-group">
                <label for="user name">User</label>
                <input type="text" class="form-control" id="user name" placeholder="name" v-model.lazy="fromData.user =post.user"
                       v-on:keydown="rest('user')"
                >
                <span v-if="this.Errors.hasOwnProperty('user') " class="text-danger" v-text="this.Errors.user[0]"></span>
            </div>

            <div class="form-group">
                <label for="content">Content</label>
                <textarea class="form-control" id="content" rows="3" v-model.lazy="fromData.content = post.content"
                          v-on:keydown="rest('content')"
                ></textarea>
                <span v-if="this.Errors.hasOwnProperty('content') " class="text-danger" v-text="this.Errors.content[0]"></span>
            </div>

            <button class="btn btn-success" type="submit" >Edit Post</button>
        </form>
    </div>
</template>

<script>
    export default {



        mounted() {
            console.log(this.$route.params.id)
            axios.get('/posts/' + this.$route.params.id).then((response)=>{
                this.post = response.data.data


            }).then((error)=>{
                console.log(error)
            })
        },
        data(){
            return {
                fromData : {
                    title : '' ,

                    content : '' ,

                    user : ''
                },
                Errors : {},

                createdSuccess : false,

                post : {}
            }
        },
        methods : {
            onSubmit(){

                axios.put('/posts/'+ this.post.id,this.fromData).then((response)=>{
                    setTimeout(()=>{
                        this.createdSuccess = true
                    },5000)
                    this.createdSuccess = false
                }).catch((error)=>{
                    this.Errors = error.response.data

                })


            },

            rest(field){
                delete this.Errors[field] ;
            }
        }
    }
</script>

<style scoped>

</style>
