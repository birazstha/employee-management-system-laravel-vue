<template>
    <!-- Begin Page Content -->
    <div class="container-fluid">
        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Employee Management</h1>
        <!-- DataTales Example -->
        <div class="card shadow mb-4">

            <div class="card-header py-4">
                <div class="row">
                    <div class="col-8">
                        <h6 class="m-0 font-weight-bold text-primary">
                            <router-link class="btn btn-warning" :to="{name:'EmployeeIndex'}"><i class="fas fa-list"></i>List</router-link>
                        </h6>
                    </div>

                </div>
            </div>

            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">

                        <div>
                        <form action="" @submit.prevent="storeEmployee()">
                            <!--First Name-->
                            <div class="row mb-3">
                                <label class="col-md-4">First Name</label>
                                <div class="col-md-6">
                                    <input id="first_name" v-model="form.first_name" type="text" class="form-control" name="first_name" required autocomplete="first_name">
                                </div>
                            </div>

                            <!--Last Name--->
                            <div class="row mb-3">
                                <label class="col-md-4">Last Name</label>
                                <div class="col-md-6">
                                    <input id="last_name" v-model="form.last_name" type="text" class="form-control" name="last_name" required autocomplete="last_name">
                                </div>
                            </div>

                            <!--Middle Name-->
                            <div class="row mb-3">
                                <label class="col-md-4">Middle Name</label>
                                <div class="col-md-6">
                                    <input id="middle_name" v-model="form.middle_name" type="text" class="form-control" name="middle_name" autocomplete="middle_name" placeholder="Optional">
                                </div>
                            </div>

                            <!--Address-->
                            <div class="row mb-3">
                                <label class="col-md-4">Address</label>
                                <div class="col-md-6">
                                    <input id="address" v-model="form.address" type="text" class="form-control" name="address" required autocomplete="address">
                                </div>
                            </div>

                            <!--Country-->
                            <div class="row mb-3">
                                <label class="col-md-4">Country</label>
                                <div class="col-md-6">
                                    <select name="country_id" id="country_id" class="form-control" v-model="form.country_id" @change="getState()">
                                        <option value="">Please select a country</option>
                                        <option value="test" v-for="country in countries" :key="country.id" :value="country.id">{{country.name}}</option>
                                    </select>
                                </div>
                            </div>
                            <!--State-->
                            <div class="row mb-3">
                                <label class="col-md-4">State</label>
                                <div class="col-md-6">

                                    <select name="state_id" id="state_id" class="form-control" v-model="form.state_id" @change="getCities()">
                                        <option value="">Please select a state</option>
                                        <option value="test" v-for="state in states" :key="state.id" :value="state.id">
                                            {{ state.name }}</option>
                                    </select>
                                </div>
                            </div>

                            <!--City-->
                            <div class="row mb-3">
                                <label class="col-md-4">City</label>
                                <div class="col-md-6">

                                    <select name="state_id" id="city_id" class="form-control" v-model="form.city_id">
                                        <option value="">Please select a city</option>
                                        <option value="test" v-for="city in cities" :key="city.id" :value="city.id">{{ city.name }}</option>
                                    </select>
                                </div>
                            </div>

                            <!--Department-->
                            <div class="row mb-3">
                                <label class="col-md-4">Department</label>
                                <div class="col-md-6">
                                    <select name="department_id" id="department_id" class="form-control" v-model="form.department_id">
                                        <option value="">Please select a department</option>
                                        <option value="test" v-for="department in departments" :key="department.id" :value="department.id">
                                            {{ department.name }}</option>
                                    </select>
                                </div>
                            </div>

                            <!--Zip Code-->
                            <div class="row mb-3">
                                <label class="col-md-4">Zip Code</label>
                                <div class="col-md-6">
                                    <input id="zip_code" v-model="form.zip_code" type="text" class="form-control" name="zip_code" required autocomplete="middle_name">
                                </div>
                            </div>

                            <!--Birth Date-->
                            <div class="row mb-3">
                                <label class="col-md-4">Birth Date</label>
                                <div class="col-md-6">
                                    <datepicker input-class="form-control" v-model="form.birthdate"></datepicker>
                                </div>
                            </div>

                            <!--Date Hired-->
                            <div class="row mb-3">
                                <label class="col-md-4">Date Hired</label>
                                <div class="col-md-6">
                                    <datepicker input-class="form-control" v-model="form.date_hired"></datepicker>
                                </div>
                            </div>


                            <div class="row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        Register
                                    </button>
                                </div>
                            </div>
                        </form>
                        </div>
                    </table>
                </div>
            </div>
        </div>

    </div>
    <!-- /.container-fluid -->


</template>

<script>
    import Datepicker from 'vuejs-datepicker';
    import moment from 'moment';

    export default {
        components:{
            Datepicker
        },
        data(){
            return{
                countries: [],
                states:[],
                departments:[],
                cities:[],
                form:{
                    first_name:"",
                    last_name:"",
                    middle_name:"",
                    address:"",
                    country_id:"",
                    state_id:"",
                    department_id:"",
                    city_id:"",
                    zip_code:"",
                    birthdate:null,
                    date_hired:null,

                }
            }
        },
        created(){
            this.getCountries(),
            this.getDepartment()
        },
        methods:{
            getCountries(){
                axios.get('/api/employees/countries').then(res=>{
                    this.countries = res.data
                }).catch(error=>{
                    console.log(console.error())
                });
            },
            getState(){
                axios.get("/api/employees/"+this.form.country_id+"/states").then(res=>{
                    this.states = res.data
                }).catch(error=>{
                    console.log(console.error())
                })
            },
            getCities(){
                axios.get("/api/employees/"+this.form.state_id+"/cities").then(res=>{
                    this.cities = res.data
                }).catch(error=>{
                    console.log(console.error())
                })
            },
            getDepartment(){
                axios.get('/api/employees/departments').then(res=>{
                    this.departments = res.data
                }).catch(error=>{
                    console.log(console.error())
                });
            },
            storeEmployee(){
               axios.post("/api/employees",{
                   'first_name':this.form.first_name,
                   'middle_name':this.form.middle_name,
                   'address':this.form.address,
                   'last_name':this.form.last_name,
                   'country_id':this.form.country_id,
                   'state_id':this.form.state_id,
                   'city_id':this.form.city_id,
                   'zip_code':this.form.zip_code,
                   'department_id':this.form.department_id,
                   'date_hired':this.format_date(this.form.date_hired),
                   'birthdate':this.format_date(this.form.birthdate),
               }).then(res=>{
                   // console.log(res)
                   this.$router.push({name:'EmployeeIndex'});
               });
            },
            format_date(value){
                if(value){
                    return moment(String(value)).format('YYYYMMDD')
                }
            }
        }
    }

</script>

<style scoped>
    .container-fluid{
        width: 80vw;
    }
    .row{
        display: flex;
        align-items: center;
        /*border: 1px solid red;*/
    }

</style>


