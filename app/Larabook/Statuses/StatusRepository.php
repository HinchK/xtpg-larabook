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
        return $user->statuses()->with('user')->latest()->get();  //orderBy('created_at', 'desc')
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

    /**
     * Get the feed for a user
     * @param User $user
     * @return array|\Illuminate\Database\Eloquent\Collection|static[]
     */
    public function getFeedForUser(User $user)
    {
        $userIds = $user->followedUsers()->lists('followed_id');
        $userIds[] = $user->id;

        return Status::whereIn('user_id', $userIds)->latest()->get();
    }

} 