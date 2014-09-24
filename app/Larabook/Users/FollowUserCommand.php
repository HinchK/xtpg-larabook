<?php namespace Larabook\Users;

class FollowUserCommand {

    public $userId;
    public $userIdToFollow;

    /**
     * Constructor
     * @param $userId
     * @param $userIdToFollow
     */
    function __construct($userId, $userIdToFollow)
    {
        $this->userId = $userId;
        $this->userIdToFollow = $userIdToFollow;
    }


}