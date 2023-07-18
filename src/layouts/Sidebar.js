import React, { useState } from 'react';
import { NavLink } from 'react-router-dom';
import SidebarRoutes from './SidebarRoutes';

const Sidebar = () => {
    const [isSidebarOpen, setIsSidebarOpen] = useState(true);

    const toggleSidebar = () => {
        setIsSidebarOpen(prevState => !prevState);
    };

    return (
        <aside className="flex-shrink-0 bg-gray-100 text-gray-700 shadow-xl">
            <div className="p-2 md:p-3">
                <div className="flex items-center justify-between md:hidden">
                    <button
                        className="text-gray-700 focus:outline-none"
                        onClick={toggleSidebar}
                    >
                        <svg
                            className="h-8 w-8 fill-current"
                            viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg"
                        >
                            {isSidebarOpen ? (
                                <path
                                    fillRule="evenodd"
                                    clipRule="evenodd"
                                    d="M19.2929 6.29289C19.6834 5.90237 20.3166 5.90237 20.7071 6.29289C21.0976 6.68342 21.0976 7.31658 20.7071 7.70711L7.70711 20.7071C7.31658 21.0976 6.68342 21.0976 6.29289 20.7071C5.90237 20.3166 5.90237 19.6834 6.29289 19.2929L19.2929 6.29289Z"
                                />
                            ) : (
                                <path
                                    fillRule="evenodd"
                                    clipRule="evenodd"
                                    d="M4 6C4 5.44772 4.44772 5 5 5H19C19.5523 5 20 5.44772 20 6C20 6.55228 19.5523 7 19 7H5C4.44772 7 4 6.55228 4 6ZM4 12C4 11.4477 4.44772 11 5 11H19C19.5523 11 20 11.4477 20 12C20 12.5523 19.5523 13 19 13H5C4.44772 13 4 12.5523 4 12ZM5 17C4.44772 17 4 17.4477 4 18C4 18.5523 4.44772 19 5 19H19C19.5523 19 20 18.5523 20 18C20 17.4477 19.5523 17 19 17H5Z"
                                />
                            )}
                        </svg>
                    </button>
                </div>
                <nav className={`mt-4 w-60 ${isSidebarOpen ? 'block' : 'hidden'} md:block`}>
                    <ul className="space-y-2">
                        {SidebarRoutes.map((route, index) => (
                            <li key={index}>
                                <NavLink
                                    to={route.path}
                                    className="text-xl font-bold flex px-4 py-2 rounded-md text-center hover:bg-gray-700 hover:text-gray-100 transition duration-300"
                                    onClick={toggleSidebar}
                                >
                                    <route.icon
                                    className="h-7 w-7 mx-2"
                                    />
                                    {route.label}
                                </NavLink>
                            </li>
                        ))}
                    </ul>
                </nav>
            </div>
        </aside>
    );
};

export default Sidebar;
