import Settings from "../components/Settings"
import Login from "../components/Login"

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