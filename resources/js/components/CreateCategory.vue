<template>
  <div class="_container">
    <div class="admin-page-title">Create New Post</div>

      <span v-if="successful" class="label label-success">
        <h4>Saved Successfully!</h4>
        <small>(Category baru berhasil dibuat dan dipublikasi!)</small>
      </span>

      <div class="_wrap-form">
        <form class="_bg-form">
            <!-- Input Category         -->
            <div class="form-group">
                <span v-if="errors.name" class="badge badge-danger">{{ errors.name[0] }}</span>
                <input type="text" class="form-control" ref="name" id="name" placeholder="Name Category">
            </div> 
            <!-- End Input Category         -->
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
            errors:[]
        };
    },
    methods:{
        create(){
            const formData = new FormData();
            formData.append('name', this.$refs.name.value);
            formData.append('user_id', this.userId); 

            axios.post('/api/categories', formData)
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
            this.$refs.name.value = "";
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