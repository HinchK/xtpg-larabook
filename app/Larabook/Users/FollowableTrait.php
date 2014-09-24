<?php namespace Larabook\Users;


trait FollowableTrait {

    /**
     * Get list of users the current user follows.
     * @return mixed
     */
    public function followedUsers()
    {
        //NOTE: php 5.5 self::class == 'Larabook\Users\User'

        return $this->belongsToMany(static::class, 'follows', 'follower_id', 'followed_id')->withTimestamps();
    }

    /**
     * Get the list of users who follow the current user.
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function followers()
    {
        //NOTE: php 5.5 self::class == 'Larabook\Users\User'

        return $this->belongsToMany(static::class, 'follows', 'followed_id', 'follower_id')->withTimestamps();
    }

    /**
     * Determine if a looked up user is being followed by logged in user
     * @param User $otherUser
     * @return bool
     */
    public function isFollowedBy(User $otherUser)
    {
        $idsWhoOtherUserFollows = $otherUser->followedUsers()->lists('followed_id');

        return in_array($this->id,$idsWhoOtherUserFollows);

    }

} 