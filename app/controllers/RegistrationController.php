<?php

use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\View;
use Larabook\Forms\RegistrationForm;
use Larabook\Registration\RegisterUserCommand;
use Laracasts\Flash\Flash;


class RegistrationController extends \BaseController {

    /*
     * @var RegistrationForm
     */
    private $registrationForm;

    /*
     * Constructor
     *
     * @param RegistrationForm $registrationForm
     */

    function __construct(RegistrationForm $registrationForm)
    {
        $this->registrationForm = $registrationForm;


        // Built-in filter for registered users (redirects to /)

        $this->beforeFilter('guest');
    }


    /**
	 * Show the form to register the user
	 *
	 * @return Response
	 */
	public function create()
    {
        return View::make('registration.create');
    }

    public function store()
    {
        $this->registrationForm->validate(Input::all());

        $user = $this->execute(RegisterUserCommand::class);

        Auth::login($user);

        Flash::overlay('WELCOME! Glad to have you as a new Larabook member!');

        return Redirect::home();
    }


}
