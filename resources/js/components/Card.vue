<template>
  <div class="card mb-4">
    <div class="card-body">
      <h4 class="card-title">Title: {{title}}</h4>
      <h6 class="card-title">Category: {{category}}</h6>
      <p class="card-text">Date: {{FormatDate.format(date)}}</p>
      <p class="card-text">Content: {{truncateText}}</p>
      <router-link class="btn btn-primary" :to="{name: 'postDetail', params:{slug}}">Go to post</router-link>
    </div>
  </div>
</template>

<script>
import FormatDate from '../classes/FormatDate';
export default {
  name: 'Card',
  data() {
    return {
      FormatDate,
      maxTextLength: 100
    }
  },
  props: [
    'title',
    'category',
    'date',
    'content',
    'slug'
  ],
  computed: {
    truncateText() {
      let text = this.content;
      if (text.length > this.maxTextLength) {
        return text.substr(0, this.maxTextLength) + '...'
      }
      return text
    }
  }
}
</script>

<style>
</style>