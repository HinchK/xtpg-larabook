<?php

use Illuminate\Support\Facades\Auth;

$I = new FunctionalTester($scenario);
$I->am('larabook member/user');
$I->wantTo('login');

$I->signIn();

$I->seeInCurrentUrl('/statuses');
$I->see('Welcome Back!');

$I->assertTrue(Auth::check());

