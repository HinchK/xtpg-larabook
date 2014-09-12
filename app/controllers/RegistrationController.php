<?php

use Larabook\Core\CommandBus;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\View;
use Larabook\Forms\RegistrationForm;
use Larabook\Registration\RegisterUserCommand;
use Laracasts\Flash\Flash;


class RegistrationController extends \BaseController {

    use Commandbus;
    /*
     * @var CommandBus
     */
    private $commandBus;

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

        extract(Input::only('username','email','password'));

        $user = $this->execute(
            new RegisterUserCommand($username, $email, $password)
        );

        Auth::login($user);

        Flash::overlay('Glad to have you as a new Larabook member!');

        return Redirect::home();
    }


}
