<template>
    <!-- Begin Page Content -->
    <div class="container-fluid">
        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Employee Management</h1>
        <!-- DataTales Example -->
        <div class="card shadow mb-4">

            <div class="card-header py-4">
                <div class="alert alert-success" role="alert" v-if="showMessage">
                    {{message}}
                </div>
                <div class="row">
                    <div class="col-4">
                        <h6 class="m-0 font-weight-bold text-primary">
                            <router-link :to="{name:'EmployeeCreate'}" class="btn btn-success"><i class="fas fa-plus"></i>Create</router-link>
                        </h6>
                    </div>
                    <div class="col-4 search">
                        <form method="GET" action="">
                                <label>Search:
                                    <select name="department_id" id="department_id" v-model="selectedDepartment" class="form-control form-control-sm">
                                        <option value="">Select a department</option>
                                        <option v-for="department in departments" :key="department.id" :value="department.id">
                                            {{ department.name }}</option>
                                    </select>
                                </label>
                                          </form>
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
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Address</th>
                            <th>Department</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>

                        <tr v-for="employee in employees" :key="employee.id">
                            <td>{{employee.id}}</td>
                            <td>{{employee.first_name}}</td>
                            <td>{{employee.last_name}}</td>
                            <td>{{employee.address}}</td>
                            <td>{{employee.department.name}}</td>
                            <td>
                                <router-link :to="{name:'EmployeeEdit',params:{id:employee.id}}" class="btn btn-primary">Edit</router-link>
                                <button class="btn btn-danger" @click="deleteEmployee(employee.id)">Delete</button>
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
export default{
    data(){
        return{
            employees:[],
            showMessage: false,
            search:null,
            selectedDepartment:null,
            departments:[],
            message:''
        }
    },
    watch:{
        search(){
            this.getEmployees();
        },
        selectedDepartment(){
            this.getEmployees();
        }
    },
    created(){
        this.getEmployees();
        this.getDepartment();
    },
    methods:{
        getEmployees(){
            axios.get('/api/employees',{params:{search:this.search,department_id:this.selectedDepartment}}).then(res=>{
                this.employees = res.data.data
            }).catch(error=>{
                console.log(error)
            })
        },
        getDepartment(){
            axios.get('/api/employees/departments').then(res=>{
                this.departments = res.data
            }).catch(error=>{
                console.log(console.error())
            });
        },
        deleteEmployee(id){
            axios.delete('api/employees/'+id).then(res=>{
                // console.log(res);
                this.showMessage =true;
                this.message = 'Employee succesfully deleted';
                this.getEmployees();
            })
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


