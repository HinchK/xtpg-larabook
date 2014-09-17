<?php 
$I = new FunctionalTester($scenario);
$I->am('a larabook member');
$I->wantTo('review all users who are registered for the book');


$I->haveAnAccount(['username' => 'Foo']);
$I->haveAnAccount(['username' => 'Bar']);

$I->amOnPage('/users');
$I->see('Foo');
$I->see('Bar');
