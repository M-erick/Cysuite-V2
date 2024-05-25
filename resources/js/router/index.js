import { createRouter, createWebHistory } from 'vue-router';
import AdminList from '../Pages/Admin/List.vue';
import AdminCreate from '../Pages/Admin/Create.vue';
import AdminEdit from '../Pages/Admin/Edit.vue';



const routes = [
  { path: '/admins',
   component: AdminList
},

  {
    path: '/admins/create',
     component: AdminCreate
    },
  {
     path: '/admins/edit/:id',
     component: AdminEdit, props: true
     },
];

const router = createRouter({
  history: createWebHistory(),
  routes,
});

export default router;
