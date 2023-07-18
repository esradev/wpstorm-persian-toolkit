import React from 'react';
import {HashRouter, Route, Routes} from 'react-router-dom';
import {useImmerReducer} from "use-immer";

import StateContext from "./StateContext";
import DispatchContext from "./DispatchContext";
import Header from './layouts/Header';
import Sidebar from './layouts/Sidebar';
import Footer from './layouts/Footer';
import SidebarRoutes from './layouts/SidebarRoutes';

const App = () => {
    const initialState = {
        confirm: {
            show: false,
            text: "",
        },
        isFetching: true,
        isSaving: false,
        sendCount: 0,
    };

    function ourReducer(draft, action) {
        switch (action.type) {
            case "ShowConfirm":
                draft.confirm.show = true;
                draft.confirm.text = action.value;
                return;
            case "HideConfirm":
                draft.confirm.show = false;
                draft.confirm.text = action.value;
                return;
            case "saveRequestStarted":
                draft.isSaving = true;
                return;
            case "saveRequestFinished":
                draft.isSaving = false;
                return;
        }
    }

    const [state, dispatch] = useImmerReducer(ourReducer, initialState);

    return (
        <HashRouter>
            <StateContext.Provider value={state} >
                <DispatchContext.Provider value={dispatch}>
            <div className="flex flex-col min-h-screen">
                <Header/>
                <div className="flex flex-grow">
                    <Sidebar/>
                    <div className="flex-grow bg-gray-50 p-2 md:p-3 overflow-hidden">
                        <Routes>
                            {SidebarRoutes.map((route, index) => (
                                <Route
                                    key={index}
                                    path={route.path}
                                    element={<route.component label={route.label}/>}

                                />
                            ))}
                        </Routes>
                    </div>
                </div>
                <Footer/>
            </div>
                </DispatchContext.Provider>
            </StateContext.Provider>
        </HashRouter>
    );
};

export default App;
