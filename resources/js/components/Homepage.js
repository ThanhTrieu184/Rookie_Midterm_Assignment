import React, { Component } from 'react';
import Carousel from './Carousel';
import Feature from './Feature';
import { Link } from 'react-router-dom';

export default class Homepage extends Component {

    handleActiveNav = (cur)=>{
        this.props.handleActive(cur)
    }
    render() {
        return (
            <div className="container" style={{marginTop: "80px"}} >
                <div className="row">
                    <div className="col-lg-12 ">
                        <div className="row mb-2">
                            <div className="col-lg-3">
                                <h3>On Sale</h3>
                            </div>
                            <div className="col-lg-9">
                                <button className="view-all-btn theme-color float-right"><span><Link className="link-without-color" to="/shop" onClick={()=>this.handleActiveNav('/shop')}>View All</Link></span></button>
                            </div>
                        </div>
                    </div>
                    <div className="col-lg-12">
                        <Carousel/>
                    </div>
                </div>
                <br/>
                <div className="row mb-5">
                    <div className="col-md-12">
                        <h2 className="text-center">Featured Books</h2>
                        <section id="tabs" className="project-tab">
                            <nav>
                                <div className="nav nav-tabs nav-fill" id="nav-tab" role="tablist">
                                    <a className="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home"
                                        role="tab" aria-controls="nav-home" aria-selected="true">Recommended</a>
                                    <a className="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile"
                                        role="tab" aria-controls="nav-profile" aria-selected="false">Popular</a>
                                </div>
                            </nav>
                            <div className="container border">
                                <div className="row">
                                    <div className="col-md-1"></div>
                                    <div className="col-md-10">
                                        <div className="tab-content" id="nav-tabContent">
                                            <div className="tab-pane fade show active" id="nav-home" role="tabpanel"
                                                aria-labelledby="nav-home-tab">
                                                <div className="row">
                                                    <Feature type="recommended"/>
                                                </div>
                                            </div>
                                            <div className="tab-pane fade" id="nav-profile" role="tabpanel"
                                                aria-labelledby="nav-profile-tab">
                                                <div className="row">
                                                    <Feature type="popular"/>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div className="col-md-1"></div>
                                </div>
                            </div>
                        </section>
                    </div>
                </div>
            </div>
        )
    }
}
