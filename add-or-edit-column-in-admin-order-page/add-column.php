add_filter( 'manage_edit-shop_order_columns', 'lets_add_a_new_column_to_admin_order_page' );

function lets_add_a_new_column_to_admin_order_page( $columns ) 
{
    $columns['another_column'] = 'Your Column';
    return $columns;
}

add_action( 'manage_shop_order_posts_custom_column', 'column_content_with_custom_text' );

function column_content_with_custom_text( $column )
{
    global $post;

    if ( 'another_column' === $column ) 
    {
        echo "Your Custom Text";
    }
}

//code goes to functions.php of your child theme (or active theme)
