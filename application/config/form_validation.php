<?php 


$config = array(
        'signup' => array(
                array(
                     'field'   => 'login', 
                     'label'   => 'Login', 
                     'rules'   => 'trim|required|callback_login_exist'
                  ),
               array(
                     'field'   => 'password', 
                     'label'   => 'Password', 
                     'rules'   => 'trim|required'
                  ),
               array(
                     'field'   => 'email', 
                     'label'   => 'Email', 
                     'rules'   => 'trim|required|valid_email'
                  )
        ),
        'signin' => array(
                array(
                     'field'   => 'login', 
                     'label'   => 'Login', 
                     'rules'   => 'trim|required|callback_login_check'
                  ),
               array(
                     'field'   => 'password', 
                     'label'   => 'Password', 
                     'rules'   => 'trim|required'
                  )
        ),
        'create_article' => array(
                array(
                     'field'   => 'title', 
                     'label'   => 'Title', 
                     'rules'   => 'required'
                  ),
               array(
                     'field'   => 'description', 
                     'label'   => 'Description', 
                     'rules'   => 'required'
                  )
        )
);


 ?>