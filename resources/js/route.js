
import EmployeeIndex from './components/employee/index.vue'
import EmployeeCreate from './components/employee/create.vue'
import EmployeeEdit from './components/employee/edit.vue'
import CountryIndex from './components/country/index.vue'
import CountryCreate from './components/country/create.vue'
import CountryEdit from  './components/country/edit.vue'
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
    {
        path:'/country',name:'CountryIndex',component:CountryIndex
    }, {
        path:'/country/create',name:'CountryCreate',component:CountryCreate
    },
    {
        path:'/country/edit/:id',name:'CountryEdit',component:CountryEdit
    },

];
