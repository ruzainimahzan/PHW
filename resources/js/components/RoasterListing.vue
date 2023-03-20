<template>
 <div class="row">
   
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
                                <th scope="col">Mont</th>
                                <th scope="col">Year</th>
                                 <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-bind:key="result" v-for="result in results">
                          
                                <th scope="row"></th>
                                <td>{{ result.category_roaster }}</td>
                                <td>{{ result.month_roaster }}</td>
                                <td>{{ result.month_roaster }}</td>
                                <td>
                                 <button class="btn btn-success"><i class="glyphicon glyphicon-pencil"></i></button>
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

</template>
<script>
export default {
    mounted() {
        this.getListRoaster();
        alert("here");
    },
    data:function(){
            return {
                results: []
            }
        },
     getListRoaster: function(){
            axios.get('api/getRoasterList')
            .then(function (response) {
                this.results = response.data;
        }.bind(this));
    },
}
</script>