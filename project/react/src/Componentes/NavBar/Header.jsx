import React from 'react';
import './Header.css';
import LogoGRICS from './LogoGRICS.png';
import { Link } from 'react-scroll';

function Header() {
    return (
        <nav>
            <input type="checkbox" id="check" />
            <label htmlFor="check" className="checkbtn">
                <i className="fas fa-bars"></i>
            </label>
            <label className="logo">
                <img src={LogoGRICS} alt="Logo GRICS" className="LogoGRICS" />
                <p>Ref. AGAUR SGR2017-1500 - SGR2021-00233</p>
            </label>
            <ul>
                <li><Link to="mainPageId" smooth={true} duration={1000}>Inici</Link></li>
                <li><Link to="Membres" smooth={true} duration={1000}>Membres</Link></li>
                <li><Link to="Projectes" smooth={true} duration={1000}>Projectes</Link></li>
                <li><Link to="Publicaciones" smooth={true} duration={1000}>Publicacions</Link></li>
                <li><Link to="info-uni" smooth={true} duration={1000}>Contactos</Link></li>
                <li><button><a href={"  http://localhost:8000/login"}>Accedir</a></button></li>
            </ul>
        </nav>
    );
}


export default Header;
