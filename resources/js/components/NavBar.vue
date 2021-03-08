<template>
        <div class="header-menu">
            <a v-for="list in lists" :href="list.url"> {{ list.title }} </a>
        </div>
</template>

<script>
    export default {
        data(){
            return{
                lists:[
                    {
                        title:'Home',
                        url:'/'
                    },
                    {
                        title:'Serials',
                        url:'#'
                    },
                    {
                        title:'Movies',
                        url:'/post'
                    },
                    {
                        title:'Favorites',
                        url:'#'
                    },
                    {
                        title:'My List',
                        url:'#'
                    },
                ]
            }
        }
    }
</script>

<style scoped>

</style>
