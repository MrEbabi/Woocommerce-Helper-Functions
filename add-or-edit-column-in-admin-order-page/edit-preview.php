add_action( 'woocommerce_admin_order_preview_end', 'lets_show_something_in_preview' );
function lets_show_something_in_preview() {
    if ( order had this specification ) { 
       echo 'my custom text'; 
    }
}


// or

add_action( 'woocommerce_admin_order_preview_start', 'lets_show_something_in_preview' );
function lets_show_something_in_preview() {
    if ( order had this specification ) { 
        echo 'my custom text'; 
    }
}

//will add "My Custom Text" to preview of orders
