import { Route, Routes } from "react-router-dom";
import { useImmerReducer } from "use-immer";

import StateContext from "./StateContext";
import DispatchContext from "./DispatchContext";

import Layout from "@/layout";
import { items } from "./lib/utils";

const App = () => {
  const initialState = {
    confirm: {
      show: false,
      text: ""
    },
    isFetching: true,
    isSaving: false,
    sendCount: 0
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
    <StateContext.Provider value={state}>
      <DispatchContext.Provider value={dispatch}>
        <Layout
          children={
            <div className="p-2">
              <Routes>
                {items.map((route, index) => (
                  <Route key={index} path={route.url} element={<route.component label={route.title} />} />
                ))}
                <Route key="not_found" path="*" element={""} />
              </Routes>
            </div>
          }
        />
      </DispatchContext.Provider>
    </StateContext.Provider>
  );
};

export default App;
