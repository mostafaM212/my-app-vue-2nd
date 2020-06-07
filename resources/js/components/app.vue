<template>
    <div class="container" >

            <app-nav ></app-nav>

        <router-view>

        </router-view>


    </div>

</template>

<script>
    import NavBar from "./NavBar/NavBar";
    import Post from "./Post/Post";
    import Create from "./Post/Create";
    export default {



        components : {
            'app-nav' : NavBar,

            'app-post': Post ,

            'app-create': Create
        },


    }
</script>

<style >

</style>
