import React from "react";
import { BrowserRouter as Router, Routes, Route } from "react-router-dom";
import Proyectos from "./Componentes/Proyectos/Proyectos.jsx";
import App from "./Componentes/Apps/App.jsx";

const AppRouter = () => {
  return (
    <Router>
      <Routes>
        <Route path="/" element={<App />} />
        <Route path="/proyectos" element={<Proyectos />} />
      </Routes>
    </Router>
  );
};

export default AppRouter;
