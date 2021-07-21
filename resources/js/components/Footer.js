import React, { Component } from 'react'
import { Link } from 'react-router-dom';
export default class Footer extends Component {
    render() {
        return (
            <div className="text-left bg-light mt-auto py-3 px-3">
                <Link className="navbar-brand" to="/">
                    <img src="bookworm_icon.svg" alt="icon" width="100%"/>
                </Link>
                    <p className="mb-0">Address</p>
                    <p>Phone</p>
            </div>
        );
    }
}
