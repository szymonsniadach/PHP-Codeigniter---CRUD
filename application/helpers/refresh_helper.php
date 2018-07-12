<?php 


function refresh()
{
    $CI=&get_instance();
    return redirect($CI->uri->uri_string(), 'refresh');
}


 ?>