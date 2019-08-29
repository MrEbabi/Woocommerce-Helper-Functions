add_filter( 'woocommerce_checkout_fields' , 'real_dob' );

function real_dob( $fields ) {

    //if(cart DOES NOT contain any DOB products \\OR// any if statement)
    if(true)
    {
        return $fields;
    }
    //if(cart contains DOB products \\OR// any else statement)
    else
    {
        $fields['shipping']['real_dob'] = array(
            'type' => 'text',
            'class'=> array( 'form_right_half', 'req'),
            'label' => __('Birthdate'),
            'required' => true,
         );
       return $fields; 
    }  
} 
