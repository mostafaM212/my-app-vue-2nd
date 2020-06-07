<template>
    <div class="container">
        <div class="alert alert-danger" role="alert" v-if="Deleted">
            the post deleted successfully
        </div>
        <div class="card" style="width: 60rem;" v-for="(post , index) in posts" :key="index">
            <div class="card-body text-center" >
                <h5 class="card-title " v-text="post.title"></h5>
                <h6 class="card-subtitle mb-2 text-muted" v-text="post.user"></h6>
                <p v-text="post.created"></p>
                <p class="card-text" v-text="post.content"></p>
                <div class="row mo">
                    <form action=""  v-on:submit.prevent="Delete(post.id)">
                        <button type="submit"  class="btn btn-danger">Delete</button>
                    </form>
                    <button v-on:click="Edit(post.id)" class="btn btn-success ma">Edit</button>
                </div>

            </div>
        </div>

        <div class="row">
            <button v-on:click="decreasePageNo" class="btn btn-success"> Previous</button>
            <button v-on:click="increasePageNo" class="btn btn-primary " style="margin-left:900px" >Next</button>

        </div>
    </div>
</template>

<script>


    export default {
        data(){
            return {
                posts : {},

                numberOfPage : 1,

                Deleted : false
            };
        },


        methods : {
            increasePageNo(){
                if (this.numberOfPage <= this.posts.length) {
                    this.numberOfPage = this.numberOfPage + 1;
                    this.getData()
                }


            } ,

            decreasePageNo(){
                if (this.numberOfPage > 0){
                    this.numberOfPage =this.numberOfPage -1 ;
                    this.getData()
                }
            },
            Edit(id){
                this.$router.push('/edit/'+id)
            },
            getData(){
                axios.get('posts?page='+this.numberOfPage).then((response)=>{
                    this.posts =response.data.data


                })
            },

            Delete(id){
                axios.delete('/posts/' + id).then((response)=>{
                    this.Deleted = true ;

                    setTimeout(()=>{
                        this.Deleted = false ;
                    },5000)
                }).catch((error)=>{
                    alert('there is some thing wrong')
                })
            }
        },

        mounted() {

            axios.get('posts?page='+this.numberOfPage).then((response)=>{
                this.posts =response.data.data


            })
        },

        updated() {

            axios.get('posts?page='+this.numberOfPage).then((response)=>{
                this.posts =response.data.data


            })
        }

    }
</script>

<style >

    .card{
        margin: 50px;
    }
    .mo{
        margin-left: 40%;
    }

    .ma{
        margin-left: 30px;
    }
</style>
