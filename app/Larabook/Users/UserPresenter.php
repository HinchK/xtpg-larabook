<?php namespace Larabook\Users;

use Laracasts\Presenter\Presenter;

class UserPresenter extends Presenter {


    /**
     * Present gravatar link for user
     *
     * @param int $size
     * @return string
     */
    public function gravatar($size = 30)
    {
        $email = md5($this->email);

        return "//www.gravatar.com/avatar/{$email}?s={$size}";
    }


    //public function fullName()
    //{
        //return $this->first . ' ' . $this->last;
    //}
    //
    //public function accountAge()
    //{
        //return $this->created_at->diffForHumans();
    //}

}