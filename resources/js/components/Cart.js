import React, { Component } from 'react'
import { Link } from 'react-router-dom'



export default class Cart extends Component {
    state = {
        items: JSON.parse(localStorage.getItem('cart')) !== null ? JSON.parse(localStorage.getItem('cart')) : [],
        carts: [],
        amounts: [],
        total: 0,
        msg: "",
    }
    fetchBook = (bookId, amount) => {
        fetch('http://localhost:8012/api/books/' + bookId)
            .then(res => res.json())
            .then((res) => {
                this.setState({
                    carts: [...this.state.carts, res.data],
                    amounts: [...this.state.amounts, amount],
                    total: this.state.total + res.data[0].final_price * amount
                })
            }
            )
    }
    componentDidMount() {
        this.state.items.map((book) => (this.fetchBook(book.bookId, book.amount)));

    }

    increaseValue = (idx, book_id) => {
        if (this.state.amounts[idx] + 1 <= 8) {

            let updateAmount = this.state.items.map(item => (
                (item.bookId == book_id) ? { ...item, amount: item.amount + 1 } : item
            ))
            localStorage.removeItem('cart');
            localStorage.setItem('cart', JSON.stringify(updateAmount));
            this.setState({ items: updateAmount, amounts: [], total: 0, carts: [] }, () => this.state.items.map((book) => (this.fetchBook(book.bookId, book.amount))));
        }
        else {
            console.log('false');
        }
    }
    decreaseValue = (idx, book_id) => {
        let updateAmount;
        if (this.state.amounts[idx] - 1 > 0) {

            updateAmount = this.state.items.map(item => (
                (item.bookId == book_id) ? { ...item, amount: item.amount - 1 } : item
            ))
            localStorage.removeItem('cart');
            localStorage.setItem('cart', JSON.stringify(updateAmount));
            this.setState({ items: updateAmount, amounts: [], total: 0, carts: [] }, () => this.state.items.map((book) => (this.fetchBook(book.bookId, book.amount))));
        }
        else if (this.state.amounts[idx] - 1 == 0) {
            updateAmount = this.state.items.filter(item => (item.bookId != book_id));
            localStorage.setItem('cart', JSON.stringify(updateAmount));
            this.setState({ items: updateAmount, amounts: [], total: 0, carts: [] }, () => this.state.items.map((book) => (this.fetchBook(book.bookId, book.amount))));
            this.props.handleCartRemove();
        }
        else {
            console.log('false');
        }
    }

    placeOrder = () => {
        const csrfToken = document.head.querySelector("[name~=csrf-token][content]").content;
        const requestOptions = {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                "X-CSRF-Token": csrfToken,
                "X-Requested-With": "XMLHttpRequest",
            },
            credentials: "same-origin",
            body: JSON.stringify({ 'items': this.state.items, 'total': this.state.total, 'carts': this.state.carts, 'amounts': this.state.amounts })
        };
        fetch('http://localhost:8012/api/orders', requestOptions)
            .then(response => response.json())
            .then((response) => {
                if (response.data == 'success') {
                    localStorage.clear();
                    this.setState({ items: [], carts: [], total: 0, amounts: [] }, () => this.alertMsg(response.data))
                }
                else if (response.data == 'empty') {
                    this.alertMsg(response.data)
                }
                else {
                    this.alertMsg(response.data)
                }
            })
            .catch(error => console.error(error));
    }
    alertMsg = (msg) => {
        if (msg == 'success') {
            this.props.handleCartRemove();
            this.setState({msg: <div className="alert alert-success" role="alert">Order successful! Redirect in 10s...</div>},()=> window.setTimeout(function() {
                window.location.href = '/';
            }, 10000))
        }
        else if (msg == 'empty') {
            this.setState({msg: <div className="alert alert-warning" role="alert">Cart is empty!</div>})
        }
        else {
            let invalidBookRemoved = JSON.parse(localStorage.getItem('cart')).filter((item)=>item.bookId != msg)
            localStorage.setItem('cart',JSON.stringify(invalidBookRemoved));
            this.setState({msg: <div className="alert alert-danger" role="alert">Book with id {msg} is not available!</div>,items: invalidBookRemoved,amounts: [], total: 0, carts: []},() => this.state.items.map((book) => (this.fetchBook(book.bookId, book.amount))))
            this.props.handleCartRemove();
        }
    }

    render() {

        return (
            <div className="container" style={{ marginTop: "80px" }}>
                <div className="row mb-5">
                    <div className="col-lg-12">
                        <h3><strong>Your cart: {this.state.carts != null ? this.state.carts.length : 0} items</strong></h3>
                        <hr />
                    </div>
                    <div className="col-lg-8">
                        <div className="card">
                            <div className="table-responsive">
                                <table className="table">
                                    <thead className="text-center card-header">
                                        <tr>
                                            <td className="cart-img"></td>
                                            <td className="font-weight-bold">
                                                <strong>Book Title</strong>
                                            </td>
                                            <td className="font-weight-bold">
                                                <strong>Price</strong>
                                            </td>
                                            <td className="font-weight-bold">
                                                <strong>Quantity</strong>
                                            </td>
                                            <td className="font-weight-bold">
                                                <strong>Total</strong>
                                            </td>
                                        </tr>
                                    </thead>
                                    <tbody className="card-body">
                                        {this.state.carts.map((book, idx) => (

                                            <tr className="text-center" key={book[0].id}>

                                                <td>
                                                    <Link>
                                                        <img src={book[0].book_cover_photo != null?"./bookcover/"+book[0].book_cover_photo+".jpg":"./bookcover/default.jpg"} alt="" className="img-fluid mx-auto d-block" />
                                                    </Link>
                                                </td>
                                                <td>
                                                    <p className="h6">{book[0].book_title}</p>
                                                </td>
                                                <td>${book[0].final_price}</td>
                                                <td>
                                                    <div className="row">
                                                        <div className="col-lg-3">
                                                            <button className="btn float-left" id="decrease"
                                                                onClick={() => this.decreaseValue(idx, book[0].id)}><i
                                                                    className="fa fa-minus" aria-hidden="true"></i></button>
                                                        </div>
                                                        <div className="col-lg-6">
                                                            <input className="w-100 text-center"
                                                                value={this.state.amounts[idx]} min="0" max="8" />
                                                        </div>
                                                        <div className="col-lg-3">
                                                            <button className="btn float-right" id="increase" onClick={() => this.increaseValue(idx, book[0].id)}><i className="fa fa-plus" aria-hidden="true"></i>
                                                            </button>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <strong>${this.state.amounts[idx] * book[0].final_price}</strong>
                                                </td>

                                            </tr>
                                        ))}

                                    </tbody>
                                </table>

                            </div>
                        </div>
                    </div>
                    <div className="col-lg-4">
                        <div className="card text-center">
                            <div className="card-header">Cart Totals</div>
                            <div className="card-body">
                                <h1>${Number((this.state.total).toFixed(2))}</h1>
                                <button className="btn theme-color mt-5 border btn-block" onClick={() => this.placeOrder()}> Place order</button>
                            </div>
                        </div>
                        <br />
                        {this.state.msg}
                    </div>
                </div>
            </div>
        )
    }
}
