<template>
   <div class="box">
      <div class="row">
         <!-- /.col -->
         <div class="col-md-12">
            <div class="box box-primary">
               <div class="box-body no-padding">
                  <!-- THE CALENDAR -->
                  <div class="response"></div>
                  <div class="panel-body" >
                     <div class="container">
                        <div class="row justify-content-center">
                           <div class="col-md-4">
                              <div class="card">
                                 <form @submit.prevent="submit">
                                    <div class="form-group">
                                       <label class="control-label">Select Category</label>
                                       <select class='form-control' v-model='categoryroaster'>
                                          <option value='0' >Select Category</option>
                                          <option v-for='data in categoriesroaster' :value='data.id'>{{ data.name }}</option>
                                       </select>
                                       <div v-if="errors && errors.categoryroaster" class="text-danger">{{ errors.categoryroaster[0] }}</div>
                                    </div>
                                    <div class="form-group">
                                       <label>Month & Year</label>
                                       <input type="month" class="form-control" v-model="myDate">
                                       <div v-if="errors && errors.myDate" class="text-danger">{{ errors.myDate[0] }}</div>
                                    </div>
                                    <div class="form-group" >
                                       <button class="form-control btn-md btn-primary">Add Roaster</button>
                                       <notifications group="foo" />
                                    </div>
                                 </form>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <!-- /.box-body -->
            </div>
            <!-- /. box -->
         </div>
         <!-- /.col -->
      </div>
      <div class="row">
         <!-- /.col -->
         <div class="col-md-12">
            <div class="box box-primary">
               <div class="box-body no-padding">
                  <!-- THE CALENDAR -->
                  <div class="response"></div>
                  <div class="panel-body" >
                     <div class="container">
                        <div class="row justify-content-center">
                           <div class="col-md-11">
                              <div class="card">
                                 <table class="table">
                                    <thead>
                                       <tr>
                                          <th scope="col">#</th>
                                          <th scope="col">Category</th>
                                          <th scope="col">Month</th>
                                          <th scope="col">Year</th>
                                          <th scope="col">Action</th>
                                       </tr>
                                    </thead>
                                    <tbody>
                                       <tr v-for="(result,index) in results" :key="result.id_roaster_list">
                                          <th scope="row">{{ index + 1}}</th>
                                          <td>{{ result.name }}</td>
                                          <td>{{ result.month_roaster }}</td>
                                          <td>{{ result.year_roaster }}</td>
                                          <td>
                                             <a :href="'/roaster_edit/' + result.id_roaster_list" class="btn btn-success"><i class="glyphicon glyphicon-pencil"></i></a>
                                            <!-- <a href="{{ route('roaster_edit') }}/@{{ result.id }}">My post @{{ result.id }}</a> -->
                                           <!-- <a :href=" {{ route('roaster_edit', ['id' => result.id]) }}">edit</a> -->
                                              <!-- <a v-bind:href="{{ route('roaster_edit') }}?course_id=@{{ result.id }}" class="btn btn-success"><i class="glyphicon glyphicon-pencil"></i></a>
                                             <button class="btn btn-success"><i class="glyphicon glyphicon-pencil"></i></button> -->
                                          </td>
                                       </tr>
                                    </tbody>
                                 </table>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <!-- /.box-body -->
            </div>
            <!-- /. box -->
         </div>
         <!-- /.col -->
      </div>
   </div>
</template>
<script>
   Vue.use(require('vue-moment'));
   export default {

       mounted() {
            this.getCategories();
            this.callFunction();
            this.getListRoaster();
       },

       data:function(){
       return {
         errors: {},
         categoryroaster:0,
         categoriesroaster:[],
         myDate : '',
         results: []
       }
     }, 
    
     methods: {
       

         submit() {
         this.errors = {};
         axios.post('api/submit',{
             categoryroaster: this.categoryroaster,
             myDate : this.myDate
         }).then(response => {
             
           this.$notify({
               group: 'foo',
               title: 'Success',
               type:'success',
               text: 'Your Roaster Has Been Add Successfully!'
           });
          
         }).catch(error => {
           if (error.response.status === 422) {
             this.errors = error.response.data.errors || {};
           }
         });
          this.getListRoaster();
       },
           getCategories: function(){
               axios.get('api/getCategoryRoaster')
               .then(function (response) {
                   this.categoriesroaster = response.data;
           }.bind(this));
       },
          callFunction: function () {
        var date = new Date().toISOString().slice(0,10);
   
       var new_date = moment().format('YYYY-MM');
   
       this.myDate = new_date;
   
           },
             getListRoaster: function(){
            axios.get('api/getRoasterList')
            .then(function (response) {
                this.results = response.data;
        }.bind(this));
    },


     },


   }
</script>