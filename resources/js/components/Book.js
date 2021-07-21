import React, { Component } from 'react'
import { Link } from 'react-router-dom'

export default class Book extends Component {
    
    
    render() {
        var price;
        if(this.props.on_sale == 0) {
            price = <strong>${this.props.book_price}</strong>
        }
        else {
            price = <><del className="mr-3 text-muted"><small>${this.props.book_price}</small></del><strong>${this.props.discount_price}</strong></>
        }
        
        var book_cover = "default";
        if(this.props.book_photo != null) {
            book_cover = this.props.book_photo
        }
        
        return (
            
            <div className="col-lg-3 col-md-6 col-sm-12 my-3">
                <div className="card h-100">
                    <div className="view overlay">
                        <img src={"./bookcover/"+book_cover+".jpg"} className="img-fluid card-img-fit" alt="" />
                    </div>
                    <div className="card-body">
                        <p className="card-title h6"><strong><Link to={"/detail/"+this.props.book_id} className="book-title">{this.props.book_title}</Link></strong>
                        </p>
                        <i ><small>{this.props.book_author}</small></i>
                    </div>
                    <div className="card-footer">
                        
                        <span className="float-left">{price} </span>

                    </div>
                </div>
            </div>
        )
    }
}
