import React, { Component } from 'react'
import { Link } from 'react-router-dom'
export default class Cart extends Component {
    state = {
        items: JSON.parse(localStorage.getItem('cart'))!==null?JSON.parse(localStorage.getItem('cart')):[],
        carts: [],
        amounts: [],
        total: 0
    }
    fetchBook = (bookId, amount) => {
        fetch('http://localhost:8012/api/books/' + bookId)
            .then(res => res.json())
            .then((res) => {
                this.setState({
                    carts: [...this.state.carts, res.data],
                    amounts: [...this.state.amounts, amount],
                    total: this.state.total + res.data[0].final_price*amount
                }, () => console.log(this.state.total))
            }
            )
    }
    componentDidMount() {
        this.state.items.map((book) => (this.fetchBook(book.bookId, book.amount)));
        
    }
    
    increaseValue = (idx, book_id)=>{
        if(this.state.amounts[idx]+1<= 8){
            
            let updateAmount = this.state.items.map(item => (
                (item.bookId == book_id)?{ ...item, amount: item.amount+1 } : item
            ))
            localStorage.removeItem('cart');
            localStorage.setItem('cart',JSON.stringify(updateAmount));
            this.setState({ items: updateAmount,amounts: [],total:0, carts: []}, ()=>this.state.items.map((book) => (this.fetchBook(book.bookId, book.amount))));
        }
        else{
            console.log('false');
        }
    }
    decreaseValue = (idx, book_id)=>{
        let updateAmount;
        if(this.state.amounts[idx]-1>0){
            
            updateAmount = this.state.items.map(item => (
                (item.bookId == book_id)?{ ...item, amount: item.amount-1 } : item
            ))
            localStorage.removeItem('cart');
            localStorage.setItem('cart',JSON.stringify(updateAmount));
            this.setState({ items: updateAmount,amounts: [],total:0, carts: []}, ()=>this.state.items.map((book) => (this.fetchBook(book.bookId, book.amount))));
        }
        else if (this.state.amounts[idx]-1==0){
            updateAmount = this.state.items.filter(item => (item.bookId != book_id));
            localStorage.removeItem('cart');
            localStorage.setItem('cart',JSON.stringify(updateAmount));
            this.setState({ items: updateAmount,amounts: [],total:0, carts: []}, ()=>this.state.items.map((book) => (this.fetchBook(book.bookId, book.amount))));
        }
        else {
            console.log('false');
        }
    }

    render() {
        
        return (
            <div className="container" style={{ marginTop: "80px" }}>
                <div className="row mb-5">
                    <div className="col-lg-12">
                        <h3><strong>Your cart: {this.state.carts!=null?this.state.carts.length:0} items</strong></h3>
                        <hr />
                    </div>
                    <div className="col-lg-8">
                        <div className="card">
                            <div className="table-responsive">
                                <table className="table">
                                    <tr className="text-center card-header">
                                        <th className="cart-img"></th>
                                        <th className="font-weight-bold">
                                            <strong>Book Title</strong>
                                        </th>
                                        <th className="font-weight-bold">
                                            <strong>Price</strong>
                                        </th>
                                        <th className="font-weight-bold">
                                            <strong>Quantity</strong>
                                        </th>
                                        <th className="font-weight-bold">
                                            <strong>Total</strong>
                                        </th>

                                    </tr>
                                    <tbody className="card-body">
                                        {this.state.carts.map((book, idx) => (
                                            
                                            <tr className="text-center" key={book[0].id}>
                                                
                                                <td>
                                                    <Link>
                                                        <img src={"./bookcover/"+book[0].book_cover_photo+".jpg"} alt="" className="img-fluid mx-auto d-block" />
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
                                                                onClick={()=>this.decreaseValue(idx,book[0].id)}><i
                                                                    className="fa fa-minus" aria-hidden="true"></i></button>
                                                        </div>
                                                        <div className="col-lg-6">
                                                            <input className="w-100 text-center"
                                                                value={this.state.amounts[idx]} min="0" max="8"/>
                                                        </div>
                                                        <div className="col-lg-3">
                                                            <button className="btn float-right" id="increase" onClick={()=>this.increaseValue(idx, book[0].id)}><i className="fa fa-plus" aria-hidden="true"></i>
                                                            </button>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <strong>${this.state.amounts[idx]*book[0].final_price}</strong>
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
                                <h1>${this.state.total}</h1>
                                <button className="btn theme-color mt-5 border btn-block"> Place order</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        )
    }
}
