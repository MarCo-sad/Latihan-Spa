<template>
  <div class="_container">
    <div class="admin-page-title">Create New Post</div>

      <span v-if="successful" class="label label-success">
        <h4>Saved Successfully!</h4>
        <small>(Post baru berhasil dibuat dan dipublikasi!)</small>
      </span>

      <div class="_wrap-form">
        <form class="_bg-form">         
            <div class="form-group">
                <span v-if="errors.title" class="badge badge-danger">{{ errors.title[0] }}</span>
                <input type="title" class="form-control" ref="title" id="title" placeholder="Title">
            </div> 
            <div class="form-group">
                <span v-if="errors.category_id" class="badge badge-danger">
                    {{ errors.category_id[0] }}
                </span>
                <!-- sebeneranya v-for tidak eror sama saja denga >>:key=category.id<<, melainkan style menggunakan style lainya  -->
                <select class="form-control" ref="category_id">
                    <option value=""> Select Category  </option>
                    <option v-for="category in categories" v-bind:key="category.id" :value="category.id" >
                    {{category.name}} 
                    </option>
                </select>  
            </div>
            <div class="form-group">
                <span v-if="errors.body" class="badge badge-danger">{{ errors.body[0] }}</span>
                <textarea class="form-control" ref="body" id="body" placeholder="Body" rows="8"></textarea>
            </div>
            <div class="form-group">
                <span v-if="errors.image" class="badge badge-danger"> 
                {{ errors.image[0] }} 
                </span>
                <div class="custom-file mb-3">
                    <input type="file" ref="image" name="image" class="custom-file-input" id="image" required>
                <label class="custom-file-label" >Choose file...</label>
                </div>
            </div>
          <button type="submit" @click.prevent="create" class="btn btn-primary">
            Submit
          </button>   
        </form><br><br><br>
      </div>
    </div>
</template>

<script>
export default {
    props:{
        userId:{
            type: Number,
            required: true
        },
     
    },
    data:function(){
        return{
            successful: false,
            errors:[],
            categories:[]
        };
    },
    created:function(){
        this.getCategories();
    },
    methods:{
        create(){
            const formData = new FormData();
            formData.append('title', this.$refs.title.value);
            formData.append('body', this.$refs.body.value);
            formData.append('user_id', this.userId); 
            formData.append("image", this.$refs.image.files[0]);
            formData.append("category_id", this.$refs.category_id.value);

            axios.post('/api/posts', formData)
            .then(response => {
                console.log(response.data);
                this.successful = true;
                this.errors = false;
                this.$router.push({
                    name: "allposts",
                }); 
            })
            .catch(error => {
                console.log(error.response.data);
                this.errors = error.response.data.errors;
                this.successful = false;
            });
            this.$refs.title.value = "";
            this.$refs.body.value = "";
            this.$refs.image.value = "";
            this.$refs.category_id.value = "";
        },
        getCategories(){
            axios.get("/api/getCategories")
            .then(response =>{
                console.log(response.data);
                this.categories = response.data;
            });
        }
    }
}
</script>
<style scoped>
  .label-success{
    background-color: #4fca6b;
    display: inline-block;
    width: 100%;
    color: #fff;
    padding: 8px 15px;
    margin-bottom: 8px;
  }
  .label-success h4{
    margin-bottom: 0;
  }
</style>