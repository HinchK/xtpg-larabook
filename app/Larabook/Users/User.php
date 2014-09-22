<?php namespace Larabook\Users;

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Larabook\Registration\Events\UserRegistered;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;
use Laracasts\Commander\Events\EventGenerator;
use Laracasts\Presenter\PresentableTrait;
use Eloquent, Hash;

class User extends Eloquent implements UserInterface, RemindableInterface {

	use UserTrait, RemindableTrait, EventGenerator, PresentableTrait, FollowableTrait;

    /**
     * Which fields may be mass assigned?
     *
     * @var array
     */
    protected $fillable = ['username','email','password'];

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';


    /**
     * Path to the presenter for a user
     *
     * @var string
     */
    protected $presenter = 'Larabook\Users\UserPresenter';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array('password', 'remember_token');


    /**
     * hashing passwords
     *
     * @param $password
     */
    public function setPasswordAttribute($password)
    {
        $this->attributes['password'] = Hash::make($password);
    }

    /**
     * a user has many statuses
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function statuses()
    {
        return $this->hasMany('Larabook\Statuses\Status')->orderBy('id','DESC');
    }


    /**
     * @param $username
     * @param $email
     * @param $password
     */
    public static function register($username, $email, $password)
    {
        $user = new static(compact('username','email','password'));


        $user->raise(new UserRegistered($user));

        return $user;
    }

    /** Check if $user passed to function is the currently logged in user
     * @param User $user
     * @return bool
     */
    public function is($user)
    {
        if (is_null($user)) return false;

        return $this->username == $user->username;
    }

}
