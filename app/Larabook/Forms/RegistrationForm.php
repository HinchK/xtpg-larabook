<?php namespace Larabook\Forms;

use Laracasts\Validation\FormValidator;
/*
 * Validation rules for registration form
 */

class RegistrationForm extends FormValidator{

    protected $rules = [
        'username' => 'required|unique:users',
        'email' => 'required|email|unique:users',
        'password' => 'required|confirmed'
    ];

}