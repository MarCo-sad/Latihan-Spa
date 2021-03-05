<template>
  <div class="_container">
    <div class="admin-page-title">Update Category</div>

      <span v-if="successful" class="label label-success">
        <h4>Saved Successfully!</h4>
        <small>(Category berhasil diupdate dan dipublikasi!)</small>
      </span>

      <div class="_wrap-form">
        <form class="_bg-form">
            <!-- input category -->
            <div class="form-group">
                <span v-if="errors.name" class="badge badge-danger">{{ errors.name[0] }}</span>
                <input type="title" v-model="name" class="form-control" ref="name" id="name" placeholder="Category">
            </div>
            <!-- end input Category -->

           
          <button type="submit" @click.prevent="updateCategory" class="btn btn-primary">
            Submit
          </button>   
        </form><br><br><br>
      </div>
    </div>
</template>

<script>
export default {
    props:{
        categoryId:{
            type: Number,
            required: true
        },
     
    },
    data:function(){
        return{
            successful: false,
            errors:[],
            name: '',
            
        };
    },
    created:function(){
        this.getCategories();
    },
    methods:{
        updateCategory(){
            const formData = new FormData();
            formData.append('name', this.$refs.name.value);
            formData.append('_method', 'PUT');

            axios.post('/api/categories/'+ this.categoryId, formData)
            .then(response => {
                console.log(response.data);
                this.successful = true;
                this.errors = false; 
            })
            .catch(error => {
                console.log(error.response.data);
                this.errors = error.response.data.errors;
                this.successful = false;
            });
            
        },
        getCategories(){
            axios.get("/api/categories/" + this.categoryId + '/edit')
            .then(response =>{
                console.log(response.data);
                this.name = response.data.name;
            });
        },
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