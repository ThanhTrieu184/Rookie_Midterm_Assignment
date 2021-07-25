import React, { Component } from 'react'
import Book from './Book'
import { Link } from 'react-router-dom'
export default class Shop extends Component {

    state = {
        filterType: 'on-sale',
        filterId: '',
        filterName: '',
        categories: [],
        authors: [],
        books: [],
        rating: [],
        currentPage: 1,
        booksPerPage: 20,
        links: [],
        totalPage: 1,
        firstLink: null,
        lastLink: null,
        fromPage: 1,
        toPage: 20,
        totalBooks: 0,
        sortBy: "on-sale"

    }
    fetchBooks(url) {
        fetch(url)
            .then(res => res.json())
            .then(
                (res) => {
                    this.setState({
                        books: res.data,
                        totalBooks: res.total,
                        links: res.links,
                        currentPage: res.current_page,
                        booksPerPage: res.per_page,
                        totalPage: res.last_page,
                        fromPage: res.from,
                        toPage: res.to,
                        firstLink: res.first_page_url,
                        lastLink: res.last_page_url,

                    });
                }
            )
    }
    componentDidMount() {
        fetch('http://localhost:8012/api/categories')
            .then(res => res.json())
            .then(
                (res) => {
                    this.setState({
                        categories: res.categories
                    });
                }
            )

        this.fetchBooks('http://localhost:8012/api/books/filter/on-sale/' + this.state.booksPerPage)


        fetch('http://localhost:8012/api/authors')
            .then(res => res.json())
            .then(
                (res) => {
                    this.setState({
                        authors: res.authors
                    });
                }
            )
        fetch('http://localhost:8012/api/comments')
            .then(res => res.json())
            .then(
                (res) => {
                    this.setState({
                        rating: res.data,
                    });
                }
            )
    }
    filter(type, fileterId, filterName) {
        fetch('http://localhost:8012/api/books/filter/' + type + '/' + fileterId + "/" + this.state.booksPerPage+'/'+this.state.sortBy)
            .then(res => res.json())
            .then(
                (res) => {
                    this.setState({
                        books: res.data,
                        currentPage: res.current_page,
                        booksPerPage: res.per_page,
                        links: res.links,
                        totalPage: res.last_page,
                        fromPage: res.from,
                        toPage: res.to,
                        firstLink: res.first_page_url,
                        lastLink: res.last_page_url,
                        totalBooks: res.total,
                        filterType: type,
                        filterId: fileterId,
                        filterName: filterName,

                    });
                }
            )
    }

    handlePaginate(url) {
        fetch(url)
            .then(res => res.json())
            .then(
                (res) => {
                    this.setState({
                        books: res.data,
                        currentPage: res.current_page,
                        booksPerPage: res.per_page,
                        links: res.links,
                        totalPage: res.last_page,
                        fromPage: res.from,
                        toPage: res.to,
                        totalBooks: res.total

                    });
                }
            )

    }
    showPerPage(pages) {
        this.setState({ booksPerPage: pages }, () => {
            if (this.state.filterType !== 'on-sale') {
                this.filter(this.state.filterType, this.state.filterId, this.state.filterName);
            }
            else {
                this.fetchBooks('http://localhost:8012/api/books/filter/on-sale/' + this.state.booksPerPage);
            }
        });
    }
    handleSort(cons) {
        if(this.state.filterType !== 'on-sale') {
            this.setState({sortBy: cons}, ()=>this.fetchBooks('http://localhost:8012/api/books/filter/' + this.state.filterType + '/' + this.state.filterId + "/" + this.state.booksPerPage+"/"+this.state.sortBy))
        }
        else{
            this.setState({sortBy: cons}, ()=>this.fetchBooks('http://localhost:8012/api/books/filter/' + this.state.filterType +  "/" + this.state.booksPerPage+"/"+this.state.sortBy))
        }
        
    }

    render() {
        return (
            <div className="container" style={{ marginTop: "80px" }}>
                <div className="row">
                    <div className="col-lg-12">
                        <p><strong className="h3">Books</strong><i> (Filtered by {this.state.filterType} <strong> { this.state.filterName.slice(0, 1).toUpperCase() + this.state.filterName.slice(1, this.state.filterName.length)}</strong>)</i></p>
                    </div>
                </div>
                <hr />
                <div className="row">
                    <div className="col-lg-2">
                        <p className=" h3">Filter By </p>
                    </div>
                    <div className="col-lg-3 col-sm-">
                        <i>Showing {this.state.fromPage} - {this.state.toPage} of {this.state.totalBooks} books</i>
                    </div>
                    <div className="col-lg-7 text-right">
                        <div className="row">
                            <div className=" col-lg-10 my-1 dropdown">
                                <button className="btn theme-color dropdown-toggle btn-sm" type="button" id="dropdownMenuButton"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Sort by {this.state.sortBy}</button>
                                <div className="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                    <Link className="dropdown-item " onClick={() => this.handleSort("on-sale")} >Sort by on sale</Link>
                                    <Link className="dropdown-item" onClick={() => this.handleSort("popular")}>Sort by popularity</Link>
                                    <Link className="dropdown-item" onClick={() => this.handleSort("price-asc")}>Sort by price: low to high</Link>
                                    <Link className="dropdown-item" onClick={() => this.handleSort("price-desc")}>Sort by price: high to low</Link>
                                </div>
                            </div>
                            <div className="dropdown my-1 col-lg-2">
                                <button className="btn theme-color dropdown-toggle btn-sm" type="button" id="dropdownMenuButton"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Show {this.state.booksPerPage}
                                </button>
                                <div className="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                    <Link className="dropdown-item" onClick={() => this.showPerPage(5)}>Show 5</Link>
                                    <Link className="dropdown-item" onClick={() => this.showPerPage(15)}>Show 15</Link>
                                    <Link className="dropdown-item" onClick={() => this.showPerPage(20)}>Show 20</Link>
                                    <Link className="dropdown-item" onClick={() => this.showPerPage(25)}>Show 25</Link>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <br />
                <div className="row">
                    <div className="col-lg-2">
                        <div className="row">
                            <div className="col-md-6 col-lg-12 mb-3 border rounded">
                                <div className="panel-group">
                                    <div className="panel panel-default">
                                        <div className="panel-heading">
                                            <p className="panel-title h6" data-toggle="collapse" href="#collapse1">
                                                Category <span aria-hidden="true" className="float-right"><i className="fas fa-sort-down"></i></span>
                                            </p>
                                        </div>
                                        <div id="collapse1" className="panel-collapse collapse">
                                            <div className="list-group">
                                                <div className="divider">
                                                    <hr />
                                                </div>
                                                {this.state.categories.map(category => (
                                                    <p className="filter-item" key={"cate" + category.id}><span onClick={() => this.filter('category', category.id, category.category_name)}>{category.category_name.slice(0, 1).toUpperCase() + category.category_name.slice(1, category.category_name.length)}</span></p>
                                                ))}

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div className="col-md-6 col-lg-12 mb-3 border rounded">

                                <div className="panel-group">
                                    <div className="panel panel-default">
                                        <div className="panel-heading">
                                            <p className="panel-title h6" data-toggle="collapse" href="#collapse2">
                                                Author <span aria-hidden="true" className="float-right"><i className="fas fa-sort-down"></i></span>
                                            </p>
                                        </div>
                                        <div id="collapse2" className="panel-collapse collapse">
                                            <div className="list-group">
                                                <div className="divider">
                                                    <hr />
                                                </div>
                                                {this.state.authors.map(author => (
                                                    <p className="filter-item" key={"author" + author.id}><span onClick={() => this.filter('author', author.id, author.author_name)}>{author.author_name}</span></p>
                                                ))}

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div className="row">
                            <div className="col-md-6 col-lg-12 mb-3 border rounded">
                                <div className="panel-group">
                                    <div className="panel panel-default">
                                        <div className="panel-heading">
                                            <p className="panel-title h6" data-toggle="collapse" href="#collapse3">
                                                Rating Review <span aria-hidden="true" className="float-right"><i className="fas fa-sort-down"></i></span>
                                            </p>
                                        </div>
                                        <div id="collapse3" className="panel-collapse collapse">
                                            <div className="list-group">
                                                <div className="divider">
                                                    <hr />
                                                </div>
                                                {this.state.rating.map(r => (
                                                    <div key={"star" + r.star} className="row mb-3 filter-item" onClick={() => this.filter('rating-star', r.star, r.star + ' star')}>
                                                        <div className="col-4">{r.star} <i className="fas fa-star "></i></div>
                                                        <div className="col-8 text-right"><i className="badge theme-color">{r.cnt}</i></div>
                                                    </div>
                                                ))}

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div className="col-lg-10">
                        <div className="row">
                            {this.state.books.map(book => (
                                <Book key={"book" + book.id} book_id={book.id} book_title={book.book_title} book_author={book.author_name} book_price={book.book_price} book_photo={book.book_cover_photo} discount_price={book.discount_price} on_sale={book.on_sale} />
                            ))}
                        </div>

                        <div className="row justify-content-center mb-4">
                            <nav className="mb-4">
                                <ul className="pagination pagination-circle mb-0 panel-heading">

                                    <li className={this.state.currentPage === 1 ? "page-item clearfix d-none d-md-block disabled" : "page-item clearfix d-none d-md-block"}><Link onClick={() => this.handlePaginate(this.state.firstLink)}
                                        className="page-link waves-effect waves-effect">First</Link></li>
                                    {this.state.links.slice(0, 1).map(prev => (
                                        <li key={prev.label} className={(this.state.currentPage === 1) ? "page-item disabled" : "page-item"}>
                                            <Link onClick={() => this.handlePaginate(prev.url)} className="page-link waves-effect waves-effect" aria-label="Previous">
                                                <span aria-hidden="true">«</span>

                                                <span className="sr-only">Previous</span>
                                            </Link>
                                        </li>
                                    ))}

                                    {this.state.links.slice(1, this.state.links.length - 1).map(link => (
                                        <li key={link.label} className={(link.active === true) ? "page-item active" : "page-item"}><Link onClick={() => this.handlePaginate(link.url)} className="page-link waves-effect waves-effect">{link.label}</Link></li>
                                    ))}


                                    {this.state.links.slice(this.state.links.length - 1, this.state.links.length).map(next => (
                                        <li key={next.label} className={(this.state.currentPage === this.state.totalPage) ? "page-item disabled" : "page-item"}>
                                            <Link onClick={() => this.handlePaginate(next.url)} className="page-link waves-effect waves-effect" aria-label="Next">
                                                <span aria-hidden="true">»</span>

                                                <span className="sr-only">Next</span>
                                            </Link>
                                        </li>
                                    ))}
                                    <li className={(this.state.currentPage === this.state.totalPage) ? "page-item clearfix d-none d-md-block disabled" : "page-item clearfix d-none d-md-block"}>
                                        <Link className="page-link waves-effect waves-effect" onClick={() => this.handlePaginate(this.state.lastLink)}>Last</Link>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        )
    }
}
