<?php namespace Larabook\Accounts\Providers;

use GuzzleHttp\ClientInterface;
use Illuminate\Routing\Redirector;

abstract class Provider {


    /**
     * @var Redirector
     */
    protected  $redirector;
    /**
     * @var string
     */
    protected $clientId;
    /**
     * @var string
     */
    protected $clientSecret;
    /**
     * @var ClientInterface
     */
    protected  $http;


    /**
     * @param Redirector $redirector
     * @param ClientInterface $http
     * @param $clientId
     * @param $clientSecret
     */
    public  function __construct (Redirector $redirector, ClientInterface $http, $clientId, $clientSecret)
    {
        $this->redirector = $redirector;
        $this->clientId = $clientId;
        $this->clientSecret = $clientSecret;
        $this->http = $http;
    }

    /**
     * @return mixed
     */
    public function authorize()
    {
        return $this->redirector->to($this->getAuthorizationURL());
    }

    /**
     * @return mixed
     */
    abstract protected  function getAuthorizationURL();

    /**
     * @return mixed
     */
    abstract protected function getAccessTokenUrl();

    /**
     * @param $token
     * @return mixed
     */
    abstract protected function getUserByToken($token);

    /**
     * @param $response
     * @return mixed
     */
    abstract protected function parseUserDataResponse($response);

    /**
     * @param array $user
     * @return mixed
     */
    abstract protected function mapToUser(array $user);

    /**
     * @param $code
     * @return mixed
     */
    public function user($code)
    {
        // request that access token
        $token = $this->requestAccessToken($code);

        $user = $this->getUserByToken($token);

        return $this->mapToUser($user->json());

        //link to user eloquent model
        //$this->authenticator->login($user);
        // OR fetch the user and rename the parent function to user(){} and then handle it in the route
        // $user = $this->authenticator->login($user);
        // Auth::login($user);
    }


    /**
     * @param $code
     * @return mixed
     */
    protected function requestAccessToken($code)
    {
        $response = $this->http->post($this->getAccessTokenUrl(), [
            'body' => [
                'code' => $code,
                'client_id' => $this->clientId,
                'client_secret' => $this->clientSecret,
                'redirect_uri' => 'http://localhost:8000/google/login',
                'grant_type' => 'authorization_code'
            ],
            'headers' => [
                'Accept' => 'application/json'
            ]
        ]);
        return $response->json()['access_token'];
    }


}