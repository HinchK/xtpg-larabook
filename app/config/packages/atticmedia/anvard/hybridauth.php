<?php
return array(

    // 'base_url' => URL::route(Config::get('anvard::routes.login')),

    'providers' => array (

        "Google" => array (
            "enabled" => true,
            "keys"    => array ( "id" => getenv('G_CLIENT_ID'), "secret" => getenv('G_CLIENT_SECRET') ),
            "scope"   => "https://www.googleapis.com/auth/userinfo.profile https://www.googleapis.com/auth/userinfo.email" // optional
        ),

        'Facebook' => array (
            'enabled' => true,
            'keys'    => array ( 'id' => '', 'secret' => '' ),
            "scope"   => "email, user_about_me, user_birthday, user_hometown, user_website, offline_access, read_stream, publish_stream, read_friendlists", // optional
        ),

        'Twitter' => array (
            'enabled' => true,
            'keys'    => array ( 'key' => '', 'secret' => '' )
        ),

        'LinkedIn' => array (
            'enabled' => true,
            'keys'    => array ( 'key' => '', 'secret' => '' )
        ),
    )







);