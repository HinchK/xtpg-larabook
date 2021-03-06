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

    public function followerCount()
    {
        $count = $this->entity->followers()->count();
        $plural = str_plural('Follower', $count);
        return "{$count} {$plural}";
    }

    public function statusCount()
    {
        $count = $this->entity->statuses()->count();
        $plural = str_plural('Status', $count);
        return "{$count} {$plural}";
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