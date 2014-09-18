<?php

$I = new FunctionalTester($scenario);
$I->am('a Larabook member');
$I->wantTo('view my profile');

$I->signIn();
$I->postAStatus('My new status.');

$I->click('My Profile');
$I->seeCurrentUrlEquals('/@FooBar');

$I->see('My new status.');

