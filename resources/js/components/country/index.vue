<template>
    <!-- Begin Page Content -->
    <div class="container-fluid">
        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Country Management</h1>
        <!-- DataTales Example -->

        <div class="card">

            <div class="card-header">
                <div class="alert alert-success" role="alert" v-if="showMessage">
                    {{message}}
                </div>
                <div class="row">
                    <div class="col-8">
                        <h6 class="m-0 font-weight-bold text-primary">
                            <router-link :to="{name:'CountryCreate'}" class="btn btn-success"><i class="fas fa-plus"></i>Create</router-link>
                        </h6>
                    </div>

                    <div class="col-4 search">
                        <form method="GET" action="">
                            <label>Search:
                                <input type="search" name="search" v-model="search" class="form-control form-control-sm" placeholder="">
                            </label>
                            <button type="submit" class="btn btn-success">Search</button>
                        </form>
                    </div>
                </div>
            </div>

            <div class="card-body">
                <table class="table-responsive" v-if="!loading">
                    <table class="table table-bordered rounded" id="dataTable" width="100%" cellspacing="0">
                        <thead class="table-dark">
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Country Code</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>

                        <tr v-for="country in countries" :key="country.id">

                            <td>{{country.id}}</td>
                            <td>{{country.name}}</td>
                            <td>{{country.country_code}}</td>
                            <td>
                                <router-link :to="{name:'CountryEdit',params:{id:country.id}}" class="btn btn-primary">Edit</router-link>
                                <button class="btn btn-danger" @click="deleteCountry(country.id)">Delete</button>
                            </td>
                        </tr>

                        </tbody>
                    </table>
                    </table>
                    <div class="loading">
                        <half-circle-spinner
                            :animation-duration="1000"
                            :size="100"
                            color="#0a0a0a"
                            v-if="loading"


                        />
                    </div>
            </div>
        </div>


    </div>
    <!-- /.container-fluid -->


</template>

<script>
import {HalfCircleSpinner} from 'epic-spinners';

export default{
    components:{
        HalfCircleSpinner
    },
    data(){
        return{
            countries:[],
            showMessage: false,
            search:null,
            selectedDepartment:null,
            message:'',
            loading:true

        }
    },
    created(){
        this.getCountries();

    },
    methods:{
        getCountries(){
            axios.get('/api/countries',).then(res=>{
                this.loading =false;
                this.countries = res.data.data
            }).catch(error=>{
                console.log(error)
            })
        },
        deleteCountry(id){
            axios.delete('api/countries/'+id).then(res=>{
                // console.log(res);
                this.showMessage =true;
                this.message = 'Employee succesfully deleted';
                this.getCountries();
            })
        },


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
    .loading{
        /*border: 5px solid blue;*/
        display: flex;
       justify-content: center;
        align-items: center;
        padding: 25px;
    }
    .custom_table{
        border: 1px solid red;
        width: 100%;
    }

</style>


