<template>
  <div>
    <div class="menu">
      <ul>
        <li>
          <router-link :to="{ name: 'dashboard' }"><i class="fa fa-home"/>
          <span class="text">Dashboard</span>
          </router-link>
        </li>
         <li>
          <router-link :to="{ name: 'allposts', params: {userId} }"><i class="fas fa-book-open"/>
          <span class="text">All Post</span>
          </router-link>
        </li>
        <li>
          <router-link :to="{ name: 'allcategories' }"><i class="fas fa-swatchbook"/>
          <span class="text">All Categories</span>
          </router-link>
        </li>
        <li>
          <router-link :to="{ name: 'createpost', params: {userId} }"><i class="fas fa-pen-square"/>
          <span class="text">New Post</span>
          </router-link>
        </li>
         <li>
          <router-link :to="{ name: 'createcategory', params: {userId} }"><i class="fas fa-pen-square"/>
          <span class="text">Create Category</span>
          </router-link>
        </li>       
      </ul>
    </div>
  </div>
</template>

<script>
export default {
    props:{
        userId:{}
        }
    }
</script>