<template>
    <!-- Begin Page Content -->
    <div class="container-fluid">
        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Country Management</h1>
        <!-- DataTales Example -->
        <div class="card shadow mb-4">

            <div class="card-header py-4">
                <div class="row">
                    <div class="col-8">
                        <h6 class="m-0 font-weight-bold text-primary">
                            <router-link class="btn btn-warning" :to="{name:'CountryIndex'}"><i class="fas fa-list"></i>List</router-link>
                        </h6>
                    </div>

                </div>
            </div>

            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">

                        <div>
                        <form action="" @submit.prevent="storeCountry()">
                            <!--First Name-->
                            <div class="row mb-3">
                                <label class="col-md-4">Name</label>
                                <div class="col-md-6">
                                    <input id="name" v-model="form.name" type="text" class="form-control" name="name" required autocomplete="name" autofocus>
                                </div>
                            </div>

                            <!--Last Name--->
                            <div class="row mb-3">
                                <label class="col-md-4">Country Code</label>
                                <div class="col-md-6">
                                    <input id="country_code" v-model="form.country_code" type="text" class="form-control" name="country_code" required autocomplete="country_code" autofocus>
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
    export default {
        data(){
            return{
                countries: [],
                form:{
                    name:"",
                    country_code:"",
                }
            }
        },
        methods:{
            storeCountry(){
               axios.post("/api/countries",{
                   'name':this.form.name,
                   'country_code':this.form.country_code,
               }).then(res=>{
                   this.$router.push({name:'CountryIndex'});
               });
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

</style>


