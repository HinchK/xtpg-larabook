<?php namespace Larabook\Users;



class UserRepository {


    /**
     * Persist a user
     *
     * @param User $user
     * @return mixed
     */
    public function save(User $user)
    {
        return $user->save();
    }

    /**
     * Get a paginated list of all users
     * @param int $howMany
     * @return \Illuminate\Pagination\Paginator
     * @internal param int $howMany
     */
    public function getPaginated($howMany = 25)
    {
        return User::orderBy('username', 'asc')->simplePaginate($howMany);
    }

    /**
     * Get user object for given username
     * @param $username
     * @return mixed
     */
    public function findByUsername($username){

        return User::whereUsername($username)->first();

    }

}