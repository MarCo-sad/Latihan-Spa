<template>
<div>
  <div class="_container">
    <div class="admin-page-title">All Posts</div> 
    <span v-if="successfull" class="badge badge-success">
      <h4>Delete!!</h4>
      <p>(pos berhasil dihapus!)</p>
    </span>
    <div class="h_wrap">
        <table class="table table-bordered">
          <thead class="thead-dark">
            <tr>
              <th>Title</th>
              <th>Image</th>
              <th>Categories</th>
              <th>Actions</th>
            </tr>
          </thead>
          <tbody v-for="post in posts" :key="post.id">
            <tr>
              <td style="width:500px"><h5>{{ post.title }}</h5></td>
              <td style="width:100px"><img :src="'/images/'+ post.image" style="height: 100px; width: 100px"></td>
              <td>{{ post.category.name }}</td>
              <td> 
                <router-link :to="{ name: 'editposts' , params: { postId: post.id }}">
                <button type="button" class="btn btn-block btn-primary">Edit</button>
                </router-link>
                <button type="button" v-on:click="deletePost(post.id)" 
                class="btn btn-block btn-danger">Delete</button>
              </td>
            </tr>
          </tbody>
        </table>
        <pagination v-if="pagination.last_page > 1" :pagination="pagination" :offset="5"
          @paginate="getPosts()">
        </pagination>   
    </div>
  </div>
</div> 
</template>

<script>
import pagination from './Pagination.vue';
  export default {
  components: { 
    pagination 
    },
    data: function(){
      return{
        posts:[],
        successfull: false,
        pagination: {
          'current_page' : 1
        }
      }
    },
    created:function(){
      this.getPosts();
    },
    methods: {
      getPosts(){
        axios.get("/api/posts?page=" + this.pagination.current_page)
        .then(response =>{
          console.log(response.data);
          this.posts = response.data.data.data;
          this.pagination = response.data.pagination;
        })
      },
      deletePost(id){
        if(confirm('are you sure?')){
          axios.delete("/api/posts/" + id)
          .then(response =>{
          this.getPosts();
          this.successfull = true;
          console.log('delete!');
        })
        }        
      }
    }  
  };
</script>

<style scoped>
  tbody img{
    width: 200px;
    height: 200px;
  }
  .table-bordered{
    background-color: #ffffff;
  }
  .badge-success{
    width: 100%;
    text-align:  left;
    margin-bottom: 8px;
  }
</style>