
import Create from "./components/Post/Create" ;
import Post from "./components/Post/Post";
import One from "./components/Post/One";
import Edit from "./components/Post/Edit";

export const routes = [
    { path : '' , component :Post },

    {path : '/create' , component : Create },

    { path : '/search/:id' , component:One } ,

    {path : '/edit/:id', component: Edit} ,

    {path : '*' , component : Post}
]
