import Settings from "../pages/Settings"
import Login from "../pages/Login"

const SidebarRoutes = [
    {
        path: '/',
        label: 'Settings',
        component: Settings,
    },
    {
        path: '/login',
        label: 'Login',
        component: Login,
    },
]

export default SidebarRoutes;