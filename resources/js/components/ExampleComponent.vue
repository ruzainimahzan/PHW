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
                                <div class="col-md-11">
                                    <form @submit.prevent="submit">
                                    <div class="card">
                                        <div>
                                        <!-- <div class="form-group col-md-5"> -->
                                            <label class="control-label">Category</label>
                                            <input v-model="category" class="form-control" readonly>
                                            <input type="hidden" v-model="categorynotread" />
                                        <!-- </div>
                                        <div class="form-group col-md-5"> -->
                                            <label class="control-label">Roster's Month</label>
                                            <input v-model="month" class="form-control" readonly>
                                            <div v-show="isShowing">
                                        <!-- </div>
                                        <div class="form-group"> -->
                                            <label class="control-label">Patient Name</label>
                                            <multiselect v-model="patient" label="fullname_patients" @input="getAllRoasterByPatient" :options="patientlist" >
                                            </multiselect>
                                            </div>
                                            <notifications group="foo" />
                                            <br>
                                            <div v-show="isShowingBTN">
                                                <button class="btn btn-primary" @click.prevent="addRow" >Add Row</button>
                                            </div>
                                            <br>
                                            <table class="table" style="width:100%;">
                                                <thead>
                                                    <tr>
                                                        <th scope="col">Date</th>
                                                        <th scope="col" style="width:100%;">Staff</th>
                                                        <th scope="col">Clock In</th>
                                                        <th scope="col">Clock Out</th>
                                                        <th scope="col">Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr v-for="(result,index) in results" :key="result.id">
                                                        <td><input type="date" v-model="result.day"><input type="hidden" v-model="result.id_patients" ></td>
                                                        <td style="width:100%;">
                                                        <select class='form-control' v-model='result.id_staff'>
                                                            <option value='0' >Select Staff</option>
                                                            <option value='999' >OFF DAY</option>
                                                            <option v-for='data in stafflist' :value='data.id'>{{ data.fullname }}({{ data.staff_no }} )</option>
                                                        </select>
                                                        </td>
                                                        <td><input type="time" v-model="result.clockin"></td>
                                                        <td><input type="time" v-model="result.clockout"></td>
                                                        <td>
                                                        <a @click.prevent="removeRow(result.id,index)"><button class="btn btn-xs btn-danger"><i class="fa fa-trash"></i></button></a>
                                                        </td>

                                                    </tr>
                                                </tbody>
                                            </table>
                                            <div align="right" v-show="isShowingbtnSaveRoaster">
                                                <!-- <button class="btn btn-primary" @click.prevent="addRow" >Add Row</button> -->
                                                <button  class="btn btn-md btn-success">Save Roster</button>
                                            </div>
                                        </div>
                                        <div>
                                        </div>
                                    </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
    import Multiselect from 'vue-multiselect'
    Vue.use(require('vue-moment'));

    export default {
        props: ['roasterListing', 'roasterfindRoute'],
        mounted() {

           this.getStaffList();
           this.getRoasterListing();
   

        },
        components: {
            Multiselect
        },
        data: function() {
            return {
                isShowingBTN:false,
                isShowingbtnSaveRoaster:false,
                isShowing:true,
                category: '',
                month: '',
                patient: 0,
                patientlist: [],
                categorynotread: '',
                results: [],
                stafflist:[],
          
               
            }
        },
      methods: {
           submit() {
            // alert("masuk sini");
              
             axios.post('/api/submitroaster',{
                roasters : this.results
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
           },
      getStaffList:function(){
      axios.get('/api/getStaff')
      .then(function(response)
        {
        
          this.stafflist = response.data;
        }.bind(this)
      );
    },
            addRow: function(){
                  var i = this.results.length;
                  var new_date = moment().format('YYYY-MM-DD');
             
                  if (i == 0){
                     i = 1;
                  }
                  else{
                     i = i + 1;
                  }
  
                  this.results.push({ day: moment(new_date).add(i, 'days').format('YYYY-MM-DD'),id_staff: '' , clockin:'' , clockout:'',id_patients:this.patient.id_patients,id_roaster_list:this.$props.roasterListing});
                    
            },
             removeRow: function(id,index){
                 alert(index)
             if (id == null){
                 if(index == 0){
                      this.results.splice(index,1);
                 }
                 else{
                      this.results.splice(index,index);
                 }
               
             }
             else{
                         axios.get('/api/removeroaster',{
                   params: {
                    id : id
                    }
           
         }).then(response => {
                this.getAllRoasterByPatient();   
           this.$notify({
               group: 'foo',
               title: 'Success',
               type:'success',
               text: 'Your Roaster Has Been Remove Successfully!'
           });
          
         }).catch(error => {
           if (error.response.status === 422) {
             this.errors = error.response.data.errors || {};
           }
         });
             }
                 
    
            },

           
            getRoasterListing: function(routeFind) {
                var myId = this.$props.roasterListing;
                axios.get(this.$props.roasterfindRoute)
                    .then(function(response) {
                        this.category = response.data.name;
                        var monthyear = response.data.month_roaster + ' - ' + response.data.year_roaster;
                        this.month = monthyear;
                        this.categorynotread = response.data.name;

                        if (response.data.name == "Patients") {
                            this.getPatientListing();
                            this.isShowing = true;
                        }
                        else{
                           this.getAllRoasterByPatient();
                            this.isShowing = false;
                        }
                    }.bind(this));
            },

            getPatientListing: function() {

                axios.get('/api/getPatient')
                    .then(function(response) {
                        this.patientlist = response.data;
                    }.bind(this));

            },


            getAllRoasterByPatient: function() {
                     this.isShowingBTN =true;
                         this.isShowingbtnSaveRoaster = true;
                axios.get('/api/getRoasterListPatient', {
                    params: {
                        id_patients: this.patient.id_patients,
                        id_roaster_listing: this.$props.roasterListing

                    }
                }).then(function(response) {

                    if (response.data.length != 0) {  
                        
                        this.results = response.data;
                   
                    } else {
                        this.results = [];
                        this.$notify({
                            group: 'foo',
                            title: 'Warning',
                            type: 'warn',
                            text: 'Sorry , No Data Found Please Add !'
                        });
                    }

                }.bind(this));

            }

        },

    }
</script>
<style src="vue-multiselect/dist/vue-multiselect.min.css"></style>