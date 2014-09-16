<?php namespace Larabook\Statuses;


use Larabook\Statuses\Event\StatusWasPublished;
use Laracasts\Commander\Events\EventGenerator;

class Status extends \Eloquent{

    use EventGenerator;

    /**
     *  fillable fields for new status
     *
     * @var array
     */
    protected $fillable =['body'];

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

} 