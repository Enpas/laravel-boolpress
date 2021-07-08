<template>

  <main class="container mt-4">
    <h1>My Blog</h1>
    <div 
      class="card mb-4"
      v-for="post in posts" :key="'p'+post.id"
    >
      <div class="card-body">
        <h4 class="card-title">Title: {{post.title}}</h4>
        <h6 class="card-title">Category: {{post.category}}</h6>
        <h6 class="card-title">Date: {{formatDate(post.date)}}</h6>
        <p class="card-text">Content: {{post.content}}</p>
        <a href="#" class="btn btn-primary">Go..</a>
      </div>
    </div>

    <nav aria-label="Page navigation example">
      <ul class="pagination">
        <li 
          class="page-item"
        >
            <button 
              class="page-link"
              :class="{'disabled': pagination.current === 1}"
              @click="getPosts(pagination.current - 1)"
            >Previous
            </button>
        </li>

        <li 
          class="page-item"
          :class="{'active': pagination.current === i}"
          v-for="i in pagination.last" :key="'i'+i"
        >
          <button 
            class="page-link"
            @click="getPosts(i)"
          >{{i}}
          </button>
        </li>

        <li 
          class="page-item"
        >
            <button 
              class="page-link"
              :class="{'disabled': pagination.current === pagination.last}"
              @click="getPosts(pagination.current + 1)"
            >Next
            </button>
        </li>
      </ul>
    </nav>

  </main>

</template>

<script>
import axios from 'axios';

export default {
  name: 'Blog',
  data() {
    return {
      posts: [],
      pagination: {}
    }
  },

  methods: {
    getPosts(page = 1) {
      axios.get('http://127.0.0.1:8000/api/posts', {
        params: {
          page: page
        }
      })
        .then(res => {
          this.posts = res.data.data;
          this.pagination = {
            current: res.data.current_page,
            last: res.data.last_page
          }
        })
        .catch(err => {
          console.log(err);
        });
    },

    formatDate(date) {
    const d = new Date(date);
    let day = d.getDate();
    let month = d.getMonth() + 1;
    const year = d.getFullYear();
    if (day < 10) day = '0' + day;
    if (month < 10) month = '0' + month;
    return `${day}/${month}/${year}`
    }
  },

  created() {
    this.getPosts();
  }
}
</script>

<style lang="scss" scoped>

</style>