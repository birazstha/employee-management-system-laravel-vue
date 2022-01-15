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
                            <router-link class="btn btn-success" :to="{name:'EmployeeIndex'}"><i class="fas fa-plus"></i>List</router-link>
                        </h6>
                    </div>
                    <div class="col-4 search">

                        <form method="GET" action="">
                            <label>Search:
                                <input type="search" name="search" class="form-control form-control-sm" placeholder="">
                            </label>
                            <button type="submit" class="btn btn-success">Search</button>
                        </form>

                    </div>
                </div>
            </div>

            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">

                        <div>
                        <form method="POST" action="">
                            <!--First Name-->
                            <div class="row mb-3">
                                <label class="col-md-4">First Name</label>
                                <div class="col-md-6">
                                    <input id="first_name" type="text" class="form-control" name="first_name" required autocomplete="first_name" autofocus>
                                </div>
                            </div>

                            <!--Last Name--->
                            <div class="row mb-3">
                                <label class="col-md-4">Last Name</label>
                                <div class="col-md-6">
                                    <input id="last_name" type="text" class="form-control" name="last_name" required autocomplete="last_name" autofocus>
                                </div>
                            </div>

                            <!--Middle Name-->
                            <div class="row mb-3">
                                <label class="col-md-4">Middle Name</label>
                                <div class="col-md-6">
                                    <input id="middle_name" type="text" class="form-control" name="middle_name" required autocomplete="middle_name" autofocus>
                                </div>
                            </div>

                            <!--Address-->
                            <div class="row mb-3">
                                <label class="col-md-4">Address</label>
                                <div class="col-md-6">
                                    <input id="address" type="text" class="form-control" name="address" required autocomplete="address" autofocus>
                                </div>
                            </div>

                            <!--Country-->
                            <div class="row mb-3">
                                <label class="col-md-4">Country</label>
                                <div class="col-md-6">

                                    <select name="country_id" id="country_id" class="form-control">
                                        <option value="">Please select a country</option>
                                        <option value="test">Test</option>
                                    </select>
                                </div>
                            </div>

                            <!--State-->
                            <div class="row mb-3">
                                <label class="col-md-4">State</label>
                                <div class="col-md-6">

                                    <select name="state_id" id="state_id" class="form-control">
                                        <option value="">Please select a state</option>
                                        <option value="test">Test</option>
                                    </select>
                                </div>
                            </div>

                            <!--Department-->
                            <div class="row mb-3">
                                <label class="col-md-4">Department</label>
                                <div class="col-md-6">
                                    <select name="department_id" id="department_id" class="form-control">
                                        <option value="">Please select a department</option>
                                        <option value="test">Test</option>
                                    </select>
                                </div>
                            </div>

                            <!--Zip Code-->
                            <div class="row mb-3">
                                <label class="col-md-4">Zip Code</label>
                                <div class="col-md-6">
                                    <input id="zip_code" type="text" class="form-control" name="zip_code" required autocomplete="middle_name" autofocus>
                                </div>
                            </div>

                            <!--Birth Date-->
                            <div class="row mb-3">
                                <label class="col-md-4">Birth Date</label>
                                <div class="col-md-6">
                                    <datepicker input-class="form-control"></datepicker>
                                </div>
                            </div>

                            <!--Date Hired-->
                            <div class="row mb-3">
                                <label class="col-md-4">Date Hired</label>
                                <div class="col-md-6">
                                    <datepicker input-class="form-control"></datepicker>
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
    export default {
        components:{
            Datepicker
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


