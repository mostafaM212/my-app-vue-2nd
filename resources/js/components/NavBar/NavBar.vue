<template>
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <router-link class="navbar-brand" to="/">Posts</router-link>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <router-link class="nav-link" to="/create">Create Post <span class="sr-only">(current)</span></router-link>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Edit Post</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Dropdown
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="#">Action</a>
                            <a class="dropdown-item" href="#">Another action</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#">Something else here</a>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
                    </li>
                </ul>
                <form class="form-inline my-2 my-lg-0" v-on:submit.prevent="Submit">
                    <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" v-model.lazy="searchData.search">
                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit" >Search</button>
                </form>
            </div>
        </nav>
        <app-one  v-if="post.hasOwnProperty('title')"
            :title="post.title" :content="post.content" :user="post.user" :created="post.created"></app-one>
    </div>
</template>

<script>

    import One from "../Post/One";

    export default {
        name: "NavBar",

        data(){
            return {
                searchData : {
                    search : ''
                },

                post : {}
            }
        },

        methods : {
            Submit(){
                console.log('welcome')
                axios.post('/posts/search',this.searchData).then((response)=>{
                    this.post = response.data.data

                    setTimeout(()=>{
                        this.post ={}
                    },10000)
                }).catch((error)=>{
                    console.log(error.response.data)
                })
            }
        },

        components : {
            'app-one' : One
        }
    }
</script>

<style scoped>

</style>
