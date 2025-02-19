import { createRoot } from "@wordpress/element";
import { StrictMode } from "react";
import { HashRouter } from "react-router-dom";

import "./style.css";

import App from "./app";

const container = document.getElementById("wpstorm-pt-dashboard");
if (container) {
  const root = createRoot(container);

  root.render(
    <HashRouter>
      <StrictMode>
        <App />
      </StrictMode>
    </HashRouter>
  );
} else {
  console.error("Failed to find the container element.");
}
