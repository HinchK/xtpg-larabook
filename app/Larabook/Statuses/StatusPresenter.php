<?php namespace Larabook\Statuses;

use Laracasts\Presenter\Presenter;

class StatusPresenter extends Presenter
{
    public function timeSincePublished()
    {
        return $this->created_at->diffForHumans();
    }
} 