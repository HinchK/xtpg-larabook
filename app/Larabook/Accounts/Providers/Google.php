<?php namespace Larabook\Accounts\Providers;


use Larabook\Accounts\Providers\Contracts\Provider as ProviderInterface;
use Larabook\Users\User;

class Google extends Provider implements ProviderInterface
{

    protected $accessTokenUrl = 'https://accounts.google.com/o/oauth2/token';
    protected $userDataUrl = "https://www.googleapis.com/userinfo/v2/me";
    protected $scopes = array(
        'https://www.googleapis.com/auth/userinfo.profile',
        'https://www.googleapis.com/auth/userinfo.email'
    );

    protected function getAuthorizationURL()
    {
        $url =  'https://accounts.google.com/o/oauth2/auth?';
        $scope = implode(', ',$this->scopes);

        // 'scope' => 'https://www.googleapis.com/auth/userinfo.profile https://www.googleapis.com/auth/userinfo.email',
        return $url . http_build_query([
            'client_id' => $this->clientId,
            'scope' => 'https://www.googleapis.com/auth/userinfo.profile https://www.googleapis.com/auth/userinfo.email',
            'response_type' => 'code',
            'redirect_uri' => 'http://localhost:8000/google/login'

        ]);
    }

    protected  function getAccessTokenUrl()
    {
        return $this->accessTokenUrl;
    }

    protected function getUserByToken($token)
    {
        return $this->http->get($this->userDataUrl, [
            'headers' => ['Authorization' => "Bearer {$token}"]
        ]);
    }

    protected function mapToUser(array $user)
    {
        return new User([
            'username' => $user['id'],
            'email' => $user['email'],
            'avatar' => $user['picture']
        ]);

    }

    protected function parseUserDataResponse($response)
    {
        return json_decode($response);
    }

}