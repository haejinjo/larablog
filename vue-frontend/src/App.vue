<script setup lang="ts">
// This starter template is using Vue 3 <script setup> SFCs
// Check out https://vuejs.org/api/sfc-script-setup.html#script-setup
import HelloWorld from './components/HelloWorld.vue'
import { onMounted, ref } from 'vue'

const posts = ref([]);

onMounted(() => {
  fetch('http://localhost/graphql', {
    method: 'POST',
    headers: {
      'Content-Type': 'application/json',
    },
    body: JSON.stringify({
      query: `
        query {
          posts(page:1){
            data {
              created_at
              id
              title
              body
            }
          }
        }
      `
    }),
  })
    .then(res => res.json())
    .then(result => {
      console.log(result);
      posts.value = result.data.posts.data
    });
});

const handleMutation = () => {
  fetch('http://localhost/graphql', {
    method: 'POST',
    headers: {
      'Content-Type': 'application/json',
    },
    body: JSON.stringify({
      query: `
        mutation {
          createPost(user_id: 1, title: "Hello from Vue", body: "Nail tech knows how to keep a lil secret"){
              id
              title
              body
          }
        }
      `
    }),
  })
    .then(res => res.json())
    .then(result => {
      alert("Post created!")
    });
}
</script>

<template>
  <div>
    <a href="https://vitejs.dev" target="_blank">
      <img src="/vite.svg" class="logo" alt="Vite logo" />
    </a>
    <a href="https://vuejs.org/" target="_blank">
      <img src="./assets/vue.svg" class="logo vue" alt="Vue logo" />
    </a>
  </div>
  <HelloWorld msg="Vite + Vue" />
  <ul>
    <li v-for="post in posts" :key="post.id">{{ post.title }}</li>
  </ul>
  <button @click="handleMutation">Create hardcoded post</button>
</template>

<style scoped>
.logo {
  height: 6em;
  padding: 1.5em;
  will-change: filter;
}

.logo:hover {
  filter: drop-shadow(0 0 2em #646cffaa);
}

.logo.vue:hover {
  filter: drop-shadow(0 0 2em #42b883aa);
}
</style>
