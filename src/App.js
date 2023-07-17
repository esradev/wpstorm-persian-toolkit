import React from 'react';
import { HashRouter, Route, Routes } from 'react-router-dom';
import Header from './layouts/Header';
import Sidebar from './layouts/Sidebar';
import Footer from './layouts/Footer';
import SidebarRoutes from './layouts/SidebarRoutes';

const App = () => {
    return (
        <HashRouter>
            <div className="flex flex-col min-h-screen">
                <Header />
                <div className="flex flex-grow">
                    <Sidebar />
                    <div className="flex-grow bg-green-50 p-4">
                        <Routes>
                                {SidebarRoutes.map((route, index) => (
                                    <Route
                                        key={index}
                                        path={route.path}
                                        element={<route.component />}
                                    />
                                ))}
                            </Routes>
                    </div>
                </div>
                <Footer />
            </div>
        </HashRouter>
    );
};

export default App;
