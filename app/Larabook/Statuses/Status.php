<?php namespace Larabook\Statuses;


use Larabook\Statuses\Event\StatusWasPublished;
use Laracasts\Commander\Events\EventGenerator;
use Laracasts\Presenter\PresentableTrait;

class Status extends \Eloquent{

    use EventGenerator, PresentableTrait;

    /**
     *  fillable fields for new status
     *
     * @var array
     */
    protected $fillable =['body'];


    /**
     * Path to the presenter for a status
     * @var string
     */
    protected $presenter = 'Larabook\Statuses\StatusPresenter';

    /**
     * Publish a status
     *
     * @param $body
     *
     * @return static
     */
    public static function publish($body)
    {
        $status = new static(compact('body'));

        $status->raise(new StatusWasPublished($body));

        return $status;
    }

    /**
     * A status belongs to a user
     */
    public function user()
    {
        return $this->belongsTo('Larabook\Users\User');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function comments()
    {
        return $this->hasMany('Larabook\Statuses\Comment');
    }

} 