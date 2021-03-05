<template>
<div>
  <div class="_container">
    <div class="admin-page-title">All Categories</div> 
    <!-- <span v-if="successfull" class="badge badge-success">
      <h4>Delete!!</h4>
      <p>(pos berhasil dihapus!)</p>
    </span> -->
    <div class="h_wrap">
        <table class="table table-bordered">
          <thead class="thead-dark">
            <tr>
              <th>Category</th>
              <!-- <th>Image</th>
              <th>Categories</th> -->
              <th>Actions</th>
            </tr>
          </thead>
          <tbody v-for="category in categories" :key="category.id">
            <tr>
              <td style="width:500px"><h5>{{ category.name }}</h5></td>
              <!-- <td style="width:100px"><img :src="'/images/'+ post.image"></td>
              <td>{{ post.category.name }}</td> -->
              <td> 
                <router-link :to="{ name: 'editcategory' , params: { categoryId: category.id }}">
                <button type="button" class="btn btn-block btn-primary">Edit</button>
                </router-link>
                <!-- <button type="button" v-on:click="deletePost(post.id)" 
                class="btn btn-block btn-danger">Delete</button> -->
              </td>
            </tr>
          </tbody>
        </table>   
    </div>
  </div>
</div> 
</template>

<script>
  export default {
    data: function(){
      return{
        categories:[],
        successfull: false,
      }
    },
    created:function(){
      this.getCategories();
    },
    methods: {
      getCategories(){
        axios.get("/api/categories")
        .then(response =>{
          console.log(response.data);
          this.categories = response.data;
        })
        .catch(error => {
          console.log(error.response.data);
          this.errors = error.response.data.errors;
          this.successful = false;
        });
      },
     
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