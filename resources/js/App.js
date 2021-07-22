import '../../public/css/app.css'
import React from 'react'
import Navbar from './components/Navbar'
import Homepage from './components/Homepage'
import Footer from './components/Footer'
import Shop from './components/Shop'
import { Route, HashRouter } from 'react-router-dom'
import About from './components/About'
import Detail from './components/Detail'
import Cart from './components/Cart'
class App extends React.Component {
  state = {
    cart: JSON.parse(localStorage.getItem('cart'))!==null?JSON.parse(localStorage.getItem('cart')):[],
    cartCount: localStorage.getItem('cart_count')!==null?parseInt(localStorage.getItem('cart_count')):0,
    navActive: window.location.href.split("#")[1]
  }

  isBookAdded(bookId) {
    return this.state.cart.some(item => bookId === item.bookId);
  }

  handleActive = (cur) => {
    this.setState({
      navActive: cur
    })
  }
  handleCartRemove = ()=> {
    localStorage.setItem('cart_count',localStorage.getItem('cart')!==null?JSON.parse(localStorage.getItem('cart')).length:0);
    this.setState({cartCount: localStorage.getItem('cart_count')!==null?parseInt(localStorage.getItem('cart_count')):0})

  }
  handleAddToCart = (book_id, amount) => {
    let carts = JSON.parse(localStorage.getItem('cart'))!==null?JSON.parse(localStorage.getItem('cart')):[];
    if (this.isBookAdded(book_id)) {
      
      let newCart = carts.map(book => (
        (book.bookId === book_id && book.amount+amount<=8)?{ ...book, amount: book.amount+amount } : book
      ))
      this.setState({ cart: newCart }, ()=>{localStorage.setItem('cart', JSON.stringify(this.state.cart))
                                            localStorage.setItem('cart_count',this.state.cart.length)
                    });
      
    }
    else {
      this.setState({
        cart: [...carts, { "bookId": book_id, "amount": amount }], cartCount: this.state.cartCount+1
      },()=> {localStorage.setItem('cart', JSON.stringify(this.state.cart));
              localStorage.setItem('cart_count',this.state.cart.length)
              })
      
    }


  }

  render() {
    return (
      <HashRouter>
        <div className="App d-flex flex-column min-vh-100">
          <Navbar handleActive={this.handleActive} navActive={this.state.navActive} cart_cnt={this.state.cartCount} />
          <Route exact path="/">
            <Homepage handleActive={this.handleActive} />
          </Route>
          <Route path="/shop">
            <Shop />
          </Route>
          <Route path="/about">
            <About />
          </Route>
          <Route path="/detail/">
            <Detail handleAddToCart={this.handleAddToCart} handleActive={this.handleActive} />
          </Route>
          <Route path="/cart">
            <Cart handleCartRemove={this.handleCartRemove}/>
          </Route>

          <Footer />
        </div>
      </HashRouter>
    );
  }
}

export default App