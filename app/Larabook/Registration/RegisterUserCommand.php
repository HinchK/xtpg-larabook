<?php
/**
 * Created by PhpStorm.
 * User: Andrew
 * Date: 9/11/2014
 * Time: 9:13 AM
 */

namespace Larabook\Registration;


class RegisterUserCommand {

    public $username;

    public $email;

    public $password;

    function __construct($username, $email, $password)
    {
        $this->username = $username;
        $this->email = $email;
        $this->password = $password;
    }


} 