import Settings from "../pages/Settings"
import Login from "../pages/Login"

import {TbSettings2, TbLogin} from "react-icons/tb"

const SidebarRoutes = [
    {
        path: '/',
        label: 'General Settings',
        component: Settings,
        icon: TbSettings2,
    },
    {
        path: '/login',
        label: 'Login Settings',
        component: Login,
        icon: TbLogin,
    },
]

export default SidebarRoutes;