import React, { Component } from 'react'
import { Link } from 'react-router-dom';

export default class CustomerReview extends Component {

    state = {
        bookId: window.location.href.split("/").pop(),
        comments: [],
        currentPage: 1,
        commentsPerPage: 5,
        links: [],
        totalPage: 1,
        firstLink: null,
        lastLink: null,
        fromPage: 1,
        toPage: 20,
        totalComments: 0,
        cntEachStar: [],
        aveStar: 0,
        sortBy: 'desc',
        filterBy: 0,
        totalFilterComments: 0
    }
    fetchComments(url) {
        fetch(url)
            .then(res => res.json())
            .then(
                (res) => {
                    this.setState({
                        comments: res.comment.data,
                        currentPage: res.comment.current_page,
                        commentsPerPage: res.comment.per_page,
                        links: res.comment.links,
                        totalPage: res.comment.last_page,
                        fromPage: res.comment.from,
                        toPage: res.comment.to,
                        firstLink: res.comment.first_page_url,
                        lastLink: res.comment.last_page_url,
                        totalComments: res.ave[0].cnt,
                        cntEachStar: res.each_star_cnt,
                        aveStar: res.ave[0].avg,
                        totalFilterComments: res.comment.total,

                    });
                }
            )
    }
    componentDidMount() {
        this.fetchComments('http://localhost:8012/api/books/' + this.state.bookId + '/comments'+'/'+this.state.commentsPerPage+'/'+this.state.sortBy+'/'+this.state.filterBy)
    }
    handlePaginate(url) {
        fetch(url)
            .then(res => res.json())
            .then(
                (res) => {
                    this.setState({
                        comments: res.comment.data,
                        currentPage: res.comment.current_page,
                        commentsPerPage: res.comment.per_page,
                        links: res.comment.links,
                        totalPage: res.comment.last_page,
                        fromPage: res.comment.from,
                        toPage: res.comment.to,

                    });
                }
            )
    }
    showPerPage(comments) {
        this.setState({ commentsPerPage: comments }, () => {
            this.fetchComments('http://localhost:8012/api/books/' + this.state.bookId+'/comments/'+this.state.commentsPerPage+'/'+this.state.sortBy+'/'+this.state.filterBy);
        });
    }
    handleSort = (cons)=> {
        if(cons === 'asc') {
            this.setState({sortBy: 'asc'},()=>this.fetchComments('http://localhost:8012/api/books/' + this.state.bookId+'/comments/'+this.state.commentsPerPage+'/'+this.state.sortBy+'/'+this.state.filterBy))
        }
        else {
            if(this.state.sortBy !== 'desc') {
                this.setState({sortBy: 'desc'},()=>this.fetchComments('http://localhost:8012/api/books/' + this.state.bookId+'/comments/'+this.state.commentsPerPage+'/'+this.state.sortBy+'/'+this.state.filterBy))
            }
            else{}
        }
    }
    handleFilter(star) {
        this.setState({filterBy: star},()=>this.fetchComments('http://localhost:8012/api/books/' + this.state.bookId+'/comments/'+this.state.commentsPerPage+'/'+this.state.sortBy+'/'+this.state.filterBy))
    }

    render() {
        return (
            <>
                <div className="card">
                    <div className="m-3">
                        <p><strong className="h3 font-weight-bold">Customer Reviews</strong><i> (Filtered by {this.state.filterBy==0?"all":this.state.filterBy} star)</i></p>
                    </div>
                    <div className="mx-3">
                        <p><strong className="h2 font-weight-bold">{this.state.aveStar} <i className="fas fa-star "></i></strong></p>
                        <p><small className="mr-5"><i className="filter-item" onClick={()=>this.handleFilter(0)}>{this.state.totalComments} reviews</i></small>
                            <small>
                                {this.state.cntEachStar.map(star => (
                                    <span className="filter-item" key={star.rating_start} onClick={()=>this.handleFilter(star.rating_start)}>
                                        <u> {star.rating_start} star</u> (<u>{star.cnt}</u>) |
                                    </span>
                                ))}

                            </small>
                        </p>
                    </div>
                    <div className="row mt-3 mb-5">
                        <div className="col-lg-6 col-sm-5">
                            <small className="ml-3"><i>Showing {this.state.fromPage} to {this.state.toPage} of {this.state.totalFilterComments} reviews</i></small>
                        </div>
                        <div className="col-lg-6 col-sm-7 text-center">
                            <div className="row">
                                <div className="col-lg-6 col-sm-8 dropdown">
                                    <button className="btn theme-color dropdown-toggle btn-sm float-right" type="button"
                                        id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true"
                                        aria-expanded="false">
                                        Sort by date: {this.state.sortBy==='desc'?'newest to oldest':'oldest to newest'}
                                    </button>
                                    <div className="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                        <Link className="dropdown-item " onClick={()=> this.handleSort('desc')}>Sort by date: newest to oldest</Link>
                                        <Link className="dropdown-item" onClick={()=> this.handleSort('asc')}>Sort by date: oldest to newest</Link>
                                    </div>
                                </div>
                                <div className="dropdown col-lg-6 col-sm-4">
                                    <button className="btn theme-color dropdown-toggle btn-sm" type="button"
                                        id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true"
                                        aria-expanded="false">
                                        Show {this.state.commentsPerPage}
                                    </button>
                                    <div className="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                        <Link className="dropdown-item" onClick={()=>this.showPerPage(5)}>Show 5</Link>
                                        <Link className="dropdown-item" onClick={()=>this.showPerPage(15)}>Show 15</Link>
                                        <Link className="dropdown-item" onClick={()=>this.showPerPage(20)}>Show 20</Link>
                                        <Link className="dropdown-item" onClick={()=>this.showPerPage(25)}>Show 25</Link>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div className="comments-list text-center text-md-left">
                        {this.state.comments.map(comment => (
                            <div key={comment.id} className="row mx-3">
                                <div className="col-sm-12 col-12">
                                    <p><strong className="h5 font-weight-bold">{comment.review_title}</strong> | {comment.rating_start} <i className="fas fa-star"></i>
                                    </p>
                                    <div className="card-data">
                                        <p className="text-muted article"><small>{comment.review_details}</small></p>
                                        <p className="float-right"><small><i className="fa fa-clock"></i> {comment.review_date.split(" ")[0]}</small></p>
                                    </div>
                                </div>
                            </div>
                        ))}
                    </div>
                </div>
                <div className="row justify-content-center my-4">
                    <nav className="mb-4">
                        <ul className="pagination pagination-circle mb-0">
                            <li key="first" className={this.state.currentPage === 1 ? "page-item clearfix d-none d-md-block disabled" : "page-item clearfix d-none d-md-block"}><i onClick={() => this.handlePaginate(this.state.firstLink)}
                                className="page-link waves-effect waves-effect">First</i></li>
                            {this.state.links.slice(0, 1).map(prev => (
                                <li key={prev.label} className={(this.state.currentPage === 1) ? "page-item disabled" : "page-item"}>
                                    <p onClick={() => this.handlePaginate(prev.url)} className="page-link waves-effect waves-effect" aria-label="Previous">
                                        <span aria-hidden="true">«</span>

                                        <span className="sr-only">Previous</span>
                                    </p>
                                </li>
                            ))}
                            {this.state.links.slice(1, this.state.links.length - 1).map(link => (
                                <li key={link.label} className={(link.active === true) ? "page-item active" : "page-item"}><p onClick={() => this.handlePaginate(link.url)} className="page-link waves-effect waves-effect">{link.label}</p></li>
                            ))}
                            {this.state.links.slice(this.state.links.length - 1, this.state.links.length).map(next => (
                                <li key={next.label} className={(this.state.currentPage === this.state.totalPage) ? "page-item disabled" : "page-item"}>
                                    <p onClick={() => this.handlePaginate(next.url)} className="page-link waves-effect waves-effect" aria-label="Next">
                                        <span aria-hidden="true">»</span>

                                        <span className="sr-only">Next</span>
                                    </p>
                                </li>
                            ))}
                            <li key="last" className={(this.state.currentPage === this.state.totalPage) ? "page-item clearfix d-none d-md-block disabled" : "page-item clearfix d-none d-md-block"}>
                                <Link className="page-link waves-effect waves-effect" onClick={() => this.handlePaginate(this.state.lastLink)}>Last</Link>
                            </li>
                        </ul>
                    </nav>
                </div>
            </>
        )
    }
}
