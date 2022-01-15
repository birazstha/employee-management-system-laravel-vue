
import EmployeeIndex from './components/employee/index.vue'
import EmployeeCreate from './components/employee/create.vue'
import EmployeeEdit from './components/employee/edit.vue'
export const routes = [
    {
    path:'/employee',name:'EmployeeIndex',component:EmployeeIndex
    },
    {
        path:'/employee/create',name:'EmployeeCreate',component:EmployeeCreate
    },
    {
        path:'/employee/edit/:id',name:'EmployeeEdit',component:EmployeeEdit
    },

];
