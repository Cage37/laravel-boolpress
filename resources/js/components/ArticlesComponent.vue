<template>
        <div class="container d-flex flex-wrap">
              <div class="card text-left m-3" v-for="article in articles" v-bind:key="article.id">  
              <img width="100" height="250" class="card-img-top" :src="'storage/' + article.image" alt="">
              <div class="card-body">
                <h4 class="card-title">{{article.title}}</h4>
              </div>
            </div>
            </div>
</template>

<script>
    const { default: Axios } = require('axios');
    export default {
        data(){
            return {
                articles: null,
            }
        },
        mounted() {
            console.log('Component mounted.');
            Axios.get('api/articles').then(resp => {
            this.articles = resp.data.data;
            }).catch(e => {
            console.error('Sorry! ' + e);
        })
        }
    }
</script>
