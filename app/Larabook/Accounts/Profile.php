<?php namespace Larabook\Accounts;


use Eloquent;

class Profile extends Eloquent{

    protected $fillable = ['provider', 'user_id'];

    public function user()
    {
        return $this->belongsTo('User');
    }

} 