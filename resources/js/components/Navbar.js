import React from "react";
import { Link, HashRouter } from 'react-router-dom';
class NavBar extends React.Component {
    
    handleActiveNav = (cur)=>{
        this.props.handleActive(cur)
    }

    render() {
        console.log(this.props.navActive)
        return (
            <HashRouter>
                <nav className="navbar navbar-expand-sm bg-light navbar-light fixed-top">
                    <Link className="navbar-brand" to="/">
                        <img src="bookworm_icon.svg" alt="icon" width="70%" />
                    </Link>
                    <button className="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
                        <span className="navbar-toggler-icon"></span>
                    </button>
                    <div className="collapse navbar-collapse justify-content-end" id="collapsibleNavbar">
                        <ul className="navbar-nav">
                            <li className="nav-item">
                                <Link to="/" onClick={()=>this.handleActiveNav("/")} className={this.props.navActive==="/"?"nav-link h5 font-weight-bold":"nav-link"}>Home</Link>
                            </li>
                            <li className="nav-item">
                                <Link onClick={()=>this.handleActiveNav("/shop")} className={this.props.navActive==="/shop"?"nav-link h5 font-weight-bold":"nav-link"} to="/shop">Shop</Link>
                            </li>
                            <li className="nav-item">
                                <Link onClick={()=>this.handleActiveNav("/about")} className={this.props.navActive==="/about"?"nav-link h5 font-weight-bold":"nav-link"} to="/about">About</Link>
                            </li>
                            <li className="nav-item">
                                <Link onClick={()=>this.handleActiveNav("/cart")} className={this.props.navActive==="/cart"?"nav-link h5 font-weight-bold":"nav-link"} to="/cart">Cart({this.props.cart_cnt})</Link>
                            </li>
                        </ul>
                    </div>
                </nav>
            </HashRouter>
        )
    }
}

export default NavBar;
