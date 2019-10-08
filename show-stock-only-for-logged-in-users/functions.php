function hide_stock_if_user_not_logged_in()
{
    if ( !is_user_logged_in() )
    {
        //You may need to change the "style" part depending on your theme by checking the CSS attribute on HTML stock element
        echo "<style>p.stock.in-stock { display: none }</style>";
    }
}
add_action( 'wp_footer', 'hide_stock_if_user_not_logged_in' );
