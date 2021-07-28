import React, { Component } from 'react';
import Book from './Book'
import {LOCAL} from '../Helper'

export default class Feature extends Component {
    
    state = {
        data: []
    }
    componentDidMount() {
        if(this.props.type === "recommended") {
            fetch(LOCAL+"/api/books/recommended")
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
        else if (this.props.type === "popular") {
            fetch(LOCAL+"/api/books/popular")
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
    }

    render() {
        
        return (
            <>
                {this.state.data.map(book => (
                    <Book key={book.book_id}  book_title={book.book_title} book_author={book.author_name} book_price={book.book_price} book_id={book.book_id} book_photo={book.book_cover_photo} discount_price={book.discount_price} on_sale={book.on_sale} />
                ))}
            </>
        )
    }
}
