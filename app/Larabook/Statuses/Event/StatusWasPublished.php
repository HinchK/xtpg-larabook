<?php namespace Larabook\Statuses\Event;


class StatusWasPublished {

    public $body;

    function __construct($body)
    {
        $this->body = $body;
    }


} 