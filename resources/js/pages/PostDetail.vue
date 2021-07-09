<template>
  <div 
  v-if="!loaded" 
  class="loader-container">
      <Loader />
  </div>
  <div v-else class="card mb-4">
    <div class="card-body">
      <h4 class="card-title">Title: {{post.title}}</h4>
      <h6 class="card-title" v-if="post.category">Category: {{post.category.name}}</h6>
      <p class="card-text">Date: {{FormatDate.format(post.created_at)}}</p>
      <p class="card-text">Content: {{post.content}}</p>
    </div>
  </div>
</template>

<script>
import axios from 'axios';
import FormatDate from '../classes/FormatDate';
import Loader from '../components/Loader.vue';

export default {
  name: 'PostDetail',
   components:{
        Loader
    },
  data() {
    return {
      post: {},
      FormatDate,
      loaded: false
    }
  },
  mounted() {
    axios.get('http://127.0.0.1:8000/api/posts/' + this.$route.params.slug)
      .then(res => {
        if (res.data.success) {
          this.post = res.data.data;
        } else {
          this.$router.push({name:'error404'});
        }
        this.loaded = true;
      })
      .catch(err => {
        console.log(err);
      })
  }
}
</script>

<style>

</style>