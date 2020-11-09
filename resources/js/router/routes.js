import Home from '../pages/Home';
import About from '../pages/About';
import Contact from '../pages/Contact';
import Show from '../pages/posts/Show';
import CategoryPosts from '../pages/CategoryPosts';
import TagPosts from '../pages/TagPosts';
import Error404 from '../pages/errors/404'

const routes = [
    
    {
        path: '/',
        redirect: '/home'
    }, 
    {
        path: '/home',
        name: 'home',
        component: Home
    },
    {
        path: '/contacto',
        name: 'contact',
        component: Contact
    },
    {
        path: '/nosotros',
        name: 'about',
        component: About
    },
    {
        path: '/archivo',
        name: 'archive',
        component: {
            template: '<div>Pagina archivos</div>'
        }
    },
    {
        path: '/blog/:slug',
        name: 'posts.show',
        component: Show,
        props: true
    },
    {
        path: '/categorias/:slug',
        name: 'category.posts',
        component: CategoryPosts,
        props: true
    },
    {
        path: '/etiquetas/:slug',
        name: 'tag.posts',
        component: TagPosts,
        props: true
    },
    {
        path: '*',
        component: Error404
    },
];

export default routes;