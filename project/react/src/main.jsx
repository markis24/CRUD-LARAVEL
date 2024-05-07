import React from 'react';
import ReactDOM from 'react-dom';
import { BrowserRouter as Router } from "react-router-dom"; // Cambiado a BrowserRouter
import { RouterProvider } from "react-router-dom"; // Cambiado a RouterProvider
import router from "./router.jsx";
import App from "./Componentes/Apps/App.jsx";

ReactDOM.createRoot(document.getElementById('root')).render(
    <React.StrictMode>
        <RouterProvider router={router}> // Cambiado a RouterProvider
            <Router> // Agregado Router
                <App/>
            </Router> // Agregado Router
        </RouterProvider> // Cambiado a RouterProvider
    </React.StrictMode>
);
