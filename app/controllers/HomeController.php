<?php

use Illuminate\Support\Facades\Input;
use Larabook\Accounts\Providers\Contracts\Provider;

class HomeController extends BaseController {

    protected $provider;

    function __construct(Provider $provider)
    {
        $this->provider = $provider;
    }

    /**
     * @internal param $provider
     * @return mixed
     */
    public function authorize()
    {
        return $this->provider->authorize();
    }

    /**
     *
     */
    public function login()
    {
        $user = $this->provider->user(Input::get('code'));
        dd($user);
        Auth::login($user);
        return Redirect::home();
    }

}
