<?php namespace Larabook\Accounts\Providers\Contracts;


interface Provider {

    public function authorize();

    public function user($code);
} 