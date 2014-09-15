<?php namespace Larabook\Forms;

use Laracasts\Validation\FormValidator;
/*
 * Validation rules for sign-in form
 */

class SignInForm extends FormValidator{

    protected $rules = [

        'email' => 'required',
        'password' => 'required'
    ];

}