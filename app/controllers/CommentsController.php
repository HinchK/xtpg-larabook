<?php

use Larabook\Statuses\LeaveCommentOnStatusCommand;

class CommentsController extends \BaseController {


	/**
	 * Leave a new comment
	 * POST /comments
	 *
	 * @return Response
	 */
	public function store()
	{
		// fetch input

        $input = array_add(Input::get(), 'user_id', Auth::id());


        // execute a command leave a comment on status
        $this->execute(LeaveCommentOnStatusCommand::class, $input);

        // go back
        return Redirect::back();
	}


}