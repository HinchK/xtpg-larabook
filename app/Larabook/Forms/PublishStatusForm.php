<?php namespace Larabook\Forms;


use Laracasts\Validation\FormValidator;

/**
 * Simple input (body) validator for status post
 *
 * Class PublishStatusForm
 * @package Larabook\Forms
 */
class PublishStatusForm extends FormValidator{

    /**
     * @var array
     */
    protected $rules = [
        'body' => 'required'
    ];

} 