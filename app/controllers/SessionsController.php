<?php

use Illuminate\Support\Facades\Auth;
use Larabook\Forms\SignInForm;
use Laracasts\Flash\Flash;

class SessionsController extends \BaseController {

    /**
     * @var SignInForm
     */
    private $signInForm;

    function __construct(SignInForm $signInForm)
    {
        $this->signInForm = $signInForm;

        $this->beforeFilter('guest',['except' => 'destroy']);
    }


    /**
	 * Show the form for creating a new resource.
	 * (Signing In)
	 * @return Response
	 */
	public function create()
	{
		return View::make('sessions.create');
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		// fetch form input
        $formData = Input::only('email','password');

        // validate form
        $this->signInForm->validate($formData);

        // if invalid, go back

        if ( ! Auth::attempt($formData))
        {
            //redirect to status
            Flash::message('Invalid Credentials');
            return Redirect::back()->withInput();
        }

        // we valid
        Flash::message('Welcome back!');
        return Redirect::to('statuses');

	}

    public function destroy()
    {
        Auth::logout();

        Flash::message('you have been logged out');

        return Redirect::home();
    }


}
