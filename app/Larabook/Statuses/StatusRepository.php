<?php namespace Larabook\Statuses;


use Larabook\Users\User;

class StatusRepository {

    /**
     * Get all Statuses associated witha a user
     *
     * @param $userId
     * @return mixed
     */

    public function getAllForUser(User $user)
    {
        return $user->statuses()->get();
    }

    /**
     * Save a user's status message
     *
     * @param Status $status
     * @param $userId
     * @return mixed
     */
    public function save(Status $status, $userId)
    {
        return User::findOrFail($userId)
            ->statuses()
            ->save($status);

    }

} 