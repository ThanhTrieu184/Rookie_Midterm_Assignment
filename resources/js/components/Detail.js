import React, { Component } from 'react'
import CustomerReview from './CustomerReview'
import {LOCAL} from '../Helper'

export default class Detail extends Component {
    constructor(props) {
        super(props);
        this.customerReviewElement = React.createRef();
    }
    state = {
        bookDetail: [],
        bookId: window.location.href.split("/").pop(),
        bookCover: "default",
        discount_price: null,
        book_price: 0,
        on_sale: 0,
        categoryName: "",
        amount: 1,
        msg: "",
        reviewMsg: "",
        review_title: "",
        review_detail: "",
        rating_star: 5,
    }
    componentDidMount() {
        fetch(LOCAL+'/api/books/' + this.state.bookId)
            .then(res => res.json())
            .then((res) => {
                this.setState({
                    bookDetail: res.data,
                    bookCover: res.data[0].book_cover_photo,
                    discount_price: res.data[0].discount_price,
                    on_sale: res.data[0].on_sale,
                    book_price: res.data[0].book_price,
                    categoryName: res.data[0].category_name,

                }, () => { if (this.state.bookCover === null) { this.setState({ bookCover: "default" }); } }
                );
            }
            )
    }
    addProduct = (bookId, amount) => {
        this.props.handleAddToCart(bookId, amount);
        this.setState({ msg: <div className="alert alert-success mb-5" role="alert">This book is successfully added!</div> },()=>setTimeout(()=>this.setState({msg: ""}),3000))
        
    }

    increaseValue = () => {
        if (this.state.amount < 8) {
            this.setState({
                amount: this.state.amount + 1
            })
        }
    }
    decreaseValue = () => {
        if (this.state.amount > 1) {
            this.setState({
                amount: this.state.amount - 1
            })
        }
    }
    handleSubmitReview = () => {
        const csrfToken = document.head.querySelector("[name~=csrf-token][content]").content;
        const requestOptions = {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                "X-CSRF-Token": csrfToken,
                "X-Requested-With": "XMLHttpRequest",
            },
            credentials: "same-origin",
            body: JSON.stringify({ 'book_id': this.state.bookId, 'review_title': this.state.review_title, 'review_detail': this.state.review_detail, 'rating_star': this.state.rating_star })
        };
        fetch(LOCAL+'/api/comments', requestOptions)
            .then(response => response.json())
            .then((response) => {
                if (response.data == 'success') {
                    console.log("success");
                    this.customerReviewElement.current.fetchComments(LOCAL+'/api/books/' + this.state.bookId + '/comments/5/desc/0');
                    this.setState({ reviewMsg: <div className="alert alert-success my-5" role="alert">Review is successfully added!</div> })

                }
                else if (response.data == 'failed') {
                    
                    this.setState({ reviewMsg: <div className="alert alert-warning my-5" role="alert">Review title is required!</div> })
                }
                else {
                    this.setState({ reviewMsg: <div className="alert alert-danger my-5" role="alert">Couldn't find book with id {this.state.bookId}</div> })
                }
            })
            .catch(error => console.error(error));
        
        setTimeout(()=>this.setState({reviewMsg: ""}),5000)

    }

    render() {
        var price;
        if (this.state.on_sale == 0) {
            price = <strong>${this.state.book_price}</strong>
        }
        else {
            price = <><del className="mr-3 text-muted"><small>${this.state.book_price}</small></del><strong>${this.state.discount_price}</strong></>
        }
        return (
            <div className="container" style={{ marginTop: "80px" }}>
                <div className="row">
                    <div className="col-lg-12">
                        <h3><strong>Category: {this.state.categoryName.slice(0, 1).toUpperCase() + this.state.categoryName.slice(1, this.state.categoryName.length)}</strong></h3>
                        <hr />
                    </div>
                </div>
                <div className="row">
                    <div className="col-lg-8">
                        <div className="card mb-3">
                            {this.state.bookDetail.map(detail => (
                                <div key={detail.id} className="row no-gutters">
                                    <div className="col-md-4">
                                        <img src={"bookcover/" + this.state.bookCover + ".jpg"} className="card-img img-fluid" alt="..." />
                                        <p className="card-text mb-5 text-center mt-3"><i className="text-muted"><small>By author:
                                        </small></i> <strong>{detail.author_name}</strong></p>
                                    </div>
                                    <div className="col-md-8">
                                        <div className="card-body">
                                            <h5 className="card-title font-weight-bold h3 pl-3">{detail.book_title}</h5>
                                            <div className="pl-3 card-text">
                                                <p className="">{detail.book_summary}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            ))}
                        </div>
                        <CustomerReview ref={this.customerReviewElement} />

                    </div>
                    <div className="col-lg-4">
                        <div className="row mb-5">
                            <div className="card col-lg-12">
                                <div className="card-header text-center font-weight-bold shadow">{price}</div>
                                <div className="card-body ">

                                    <div className="row text-center my-3">
                                        <button className="col-lg-2 col-sm-3 btn" id="decrease" onClick={() => this.decreaseValue()}><i
                                            className="fa fa-minus" aria-hidden="true"></i></button>
                                        <input className="col-lg-8 col-sm-6 text-center" id="number" value={this.state.amount} min="1"
                                            max="8" name="quantity" />
                                        <button className="col-lg-2 col-sm-3 btn" id="increase" onClick={() => this.increaseValue()}><i
                                            className="fa fa-plus" aria-hidden="true"></i></button>
                                    </div>
                                </div>
                                <div className="text-center">
                                    <button onClick={() => this.addProduct(this.state.bookId, this.state.amount)} className="btn theme-color my-3 border btn-block">Add to cart</button>
                                </div>
                            </div>

                        </div>
                        {this.state.msg}
                        <div className="row">
                            <div className=" col-lg-12 card">
                                <div className="card-header text-center font-weight-bold shadow">Write a review</div>
                                <div className="card-body">
                                    <div className="form-group">
                                        <label for="review_title"><small>Add a title</small></label>
                                        <input type="text" className="form-control" name="review_title" placeholder="Enter title" onChange={(title) => this.setState({ review_title: title.target.value })} required/>
                                    </div>
                                    <div className="form-group">
                                        <label for="review_detail"><small>Details please! Your review help other
                                            shoppers</small></label>
                                        <input type="text" className="form-control" name="review_detail" placeholder="Detail review" onChange={(detail) => this.setState({ review_detail: detail.target.value })} />
                                    </div>
                                    <div className="form-group">
                                        <label for="rating_start"><small>Select a rating star</small></label>
                                        <select className="form-control" name="rating_start" onChange={(star) => this.setState({ rating_star: star.target.value })}>
                                            <option value="5">5 star</option>
                                            <option value="4">4 star</option>
                                            <option value="3">3 star</option>
                                            <option value="2">2 star</option>
                                            <option value="1">1 star</option>
                                        </select>
                                    </div>
                                    <div className="text-center">
                                        <button className="btn theme-color my-3 border btn-block" onClick={() => this.handleSubmitReview()}>Submit
                                            Review</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {this.state.reviewMsg}
                    </div>
                </div>
            </div>
        )
    }
}
