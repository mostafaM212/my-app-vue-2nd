<template>
    <div class="container">
        <div class="card" style="width: 60rem;" >
            <div class="card-body text-center" >
                <h5 class="card-title " v-text="title"></h5>
                <h6 class="card-subtitle mb-2 text-muted" v-text="user"></h6>
                <p v-text="created"></p>
                <p class="card-text" v-text="content"></p>
                <a href="#" class="card-link">Card link</a>
                <a href="#" class="card-link">Another link</a>
            </div>
        </div>
    </div>
</template>

<script>
    export default {

        props : ['title' ,'content' , 'user','created']
    }
</script>

<style scoped>

</style>
