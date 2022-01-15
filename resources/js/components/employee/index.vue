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
                            <router-link :to="{name:'EmployeeCreate'}" class="btn btn-success"><i class="fas fa-plus"></i>Create</router-link>
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
                        <thead>
                        <tr>
                            <th>S.No</th>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Address</th>
                            <th>Department</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td>
                                <button class="btn btn-primary">Edit</button>
                                <button class="btn btn-danger">Delete</button>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
    <!-- /.container-fluid -->


</template>

<script>
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


