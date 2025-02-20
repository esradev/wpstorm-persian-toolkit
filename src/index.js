import { createRoot } from "@wordpress/element";
import { HashRouter } from "react-router-dom";

import "./style.css";
import App from "./app";

const container = document.getElementById("wpstorm-pt-dashboard");
const root = createRoot(container);

root.render(
  <HashRouter>
    <App />
  </HashRouter>
);
