<template>
  <div>
    <div class="row" style="margin-bottom: 4rem;">
      <div class="col-8">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"> 
            <router-link :to="{name: 'homepageposts'}">
              <span>Home</span> 
            </router-link>
          </li> 
          <li class="breadcrumb-item active">{{title}}</li>
        </ol>
    <div class="show-content">
      <h1>{{title}}</h1>  
        <div class="user-cat"> 
          <p><i class="fa fa-user"/> {{user}} | <span class="badge badge-dark">#{{category}}</span></p>
        </div>
      <div class="show-img">
        <img :src="'/images/' + image" style="width:40%" />
      </div><br>

      <p>{{body}}</p>
      
      <br><br>       
      <div class="comment-wrap">
        <p><i class="fa fa-comments"></i> Comment:</p>
          <form action="/action_page.php">
            <div class="form-group"> 
              <input type="" class="form-control" id="">
            </div> 
            <button type="submit" class="btn btn-secondary">Submit</button>
          </form>
        </div>
      </div>
    </div>
      <div class="col-4">
        <ul class="list-group">
          <li class="list-group-item list-group-item-success">Success item</li>
          <li class="list-group-item list-group-item-secondary">Secondary item</li>
          <li class="list-group-item list-group-item-info">Info item</li>
          <li class="list-group-item list-group-item-warning">Warning item</li>
          <li class="list-group-item list-group-item-danger">Danger item</li>
          <li class="list-group-item list-group-item-primary">Primary item</li>
          <li class="list-group-item list-group-item-dark">Dark item</li>
          <li class="list-group-item list-group-item-light">Light item</li>
        </ul>
      </div>
    </div> 
  </div>
</template>

<script>
  export default{
    data: function(){
      return {
        title: '',
        body: '',
        image: '',
        category: '',
        user: '',
      }
    },
    mounted (){
      let id = this.$route.params.slug;
      axios.get("/api/posts/" + id)
      .then(response => {
        console.log(response.data)
        this.title = response.data.title;
        this.body = response.data.body;
        this.image = response.data.image;
        this.category = response.data.category.name;
        this.user = response.data.user.name;
      })
    }
  }
</script>