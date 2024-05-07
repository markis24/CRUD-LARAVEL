import { createBrowserRouter } from "react-router-dom";
import Contacto from "./Componentes/Contacto/Contacto.jsx";
import Proyectos from "./Componentes/Proyectos/Proyectos.jsx";
import App from "./Componentes/Apps/App.jsx";

const routes = [
    {
        path: "/contacto",
        element: <Contacto/>
    },
    {
        path: "/App",
        element: <App/>
    },
    {
        path: "/proyectos",
        element: <Proyectos/>
    },
];

const router = createBrowserRouter({
  routes,
});

export default router;
