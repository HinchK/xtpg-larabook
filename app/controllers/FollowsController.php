<?php

use Illuminate\Support\Facades\Redirect;
use Larabook\Users\FollowUserCommand;
use Larabook\Users\UnfollowUserCommand;

class FollowsController extends \BaseController {


	/**
     * Follow a user
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{

        $input = array_add(Input::get(), 'userId', Auth::id());

        $this->execute(FollowUserCommand::class, $input);

        Flash::success('You are now following this user.');

        return Redirect::back();
	}


	/**
     * Unfollow a user
	 * Remove the specified resource from storage.
	 *
	 * @param  $idOfUserToUnfollow
	 * @return Response
	 */
	public function destroy($userIdToUnfollow)
	{
        $input = array_add(Input::all(), 'userId', Auth::id());
		$this->execute(UnfollowUserCommand::class, $input);

        Flash::success('You have now unfollowed this user.');

        return Redirect::back();


	}


}
