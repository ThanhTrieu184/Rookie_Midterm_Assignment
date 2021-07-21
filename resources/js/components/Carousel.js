import React, { Component } from 'react';
import Book from './Book'
export default class Carousel extends Component {
    
    state = {
        data: []
    }
    componentDidMount() {
        fetch("http://localhost:8012/api/books/filter/on-sale/10")
            .then(res => res.json())
            .then(
                (result) => {
                    this.setState({
                        // isLoaded: true,
                        data: result.data
                    });
                }
            )
        
    }

    render() {

        return (
            <>
                <div className="container">
                    <div className="row blog border">
                        <div className="col-lg-1 col-xs-1">
                            <a className="carousel-control-prev" href="#blogCarousel" role="button" data-slide="prev">
                                <i className="fas fa-angle-left" aria-hidden="true"></i>
                                <span className="sr-only">Previous</span>
                            </a>
                        </div>
                        <div className="col-md-10 col-xs-10">
                            <div id="blogCarousel" className="carousel slide carousel-dark" data-ride="carousel">
                                <div className="carousel-inner">
                                    <div className="carousel-item active">
                                        <div className="row">
                                            {this.state.data.slice(0, 4).map(book => (
                                                <Book key={book.id} book_id={book.id} book_title={book.book_title} book_author={book.author_name} book_price={book.book_price} book_photo={book.book_cover_photo} discount_price={book.discount_price} on_sale={book.on_sale}/>
                                            ))}
                                        </div>
                                    </div>
                                    <div className="carousel-item">
                                        <div className="row">
                                            {this.state.data.slice(4, 8).map(book => (
                                                <Book key={book.id} book_id={book.id} book_title={book.book_title} book_author={book.author_name} book_price={book.book_price} book_photo={book.book_cover_photo} discount_price={book.discount_price} on_sale={book.on_sale}/>
                                            ))}
                                        </div>
                                    </div>
                                    <div className="carousel-item">
                                        <div className="row">
                                            {this.state.data.slice(6, 10).map(book => (
                                                <Book key={book.id} book_id={book.id} book_title={book.book_title} book_author={book.author_name} book_price={book.book_price} book_photo={book.book_cover_photo} discount_price={book.discount_price} on_sale={book.on_sale}/>
                                            ))}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div className="col-md-1 col-xs-1">
                            <a className="carousel-control-next" href="#blogCarousel" role="button" data-slide="next">
                                <i className="fas fa-angle-right" aria-hidden="true"></i>
                                <span className="sr-only">Next</span>
                            </a>
                        </div>
                    </div>
                </div>
            </>
        )
    }
}
