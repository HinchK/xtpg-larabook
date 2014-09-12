<?php 
$I = new FunctionalTester($scenario);
$I->am('a guest');
$I->wantTo('sign up for a larabook account');

$I->amOnPage('/');
$I->click('Sign up »');
$I->seeCurrentUrlEquals('/register');

$I->fillField('Username:','studentuser');
$I->fillField('Email:','studentuser@example.com');
$I->fillField('Password:','studentuser');
$I->fillField('Password Confirmation:','studentuser');
$I->click('Sign Up');

$I->seeCurrentUrlEquals('');
$I->see('Welcome to larabook-tpg!');
$I->seeRecord('users',[
   'username' => 'studentuser',
    'email' => 'studentuser@example.com'
]);

$I->assertTrue(Auth::check());