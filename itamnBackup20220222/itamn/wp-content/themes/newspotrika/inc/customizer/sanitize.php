<?php 
//checkbox sanitization function
function newspotrika_sanitize_checkbox( $input ){
    //returns true if checkbox is checked
    return ( ( isset( $input ) && true == $input ) ? true : false );
}