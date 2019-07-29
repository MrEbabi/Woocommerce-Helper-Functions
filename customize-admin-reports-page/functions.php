//work on back-end of reports page - cannot echo/print anything

//define the wc_admin_reports_path callback 
function filter_wc_admin_reports_path( $reports_class_wc_report_name_php, $name, $class ) { 
    //run your code here
    return $reports_class_wc_report_name_php; 
}; 

//add the filter 
add_filter( 'wc_admin_reports_path', 'filter_wc_admin_reports_path', 10, 3 ); 

//work on both back-end and front-end of reports page - can print/echo something

// define the woocommerce_reports_charts callback 
function filter_woocommerce_reports_charts( $reports ) { 
    echo "test<br>";
    return $reports;
};

// add the filter 
add_filter( 'woocommerce_reports_charts', 'filter_woocommerce_reports_charts', 10, 1 );
