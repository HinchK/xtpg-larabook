<?php 
$I = new FunctionalTester($scenario);
$I->am('a larabook user');
$I->wantTo('follow other larabook members');

//setup
$I->haveAnAccount(['username'=>'OtherUser']);
$I->signIn();


//action
$I->click('Browse Users');
$I->click('OtherUser');

$I->seeCurrentUrlEquals('/@OtherUser');

//when i follow a user
$I->click('Follow OtherUser');
$I->seeCurrentUrlEquals('/@OtherUser');
$I->see('Unfollow OtherUser');

//when i unfollow that same user
$I->click('Unfollow OtherUser');
$I->seeCurrentUrlEquals('/@OtherUser');
$I->see('Follow OtherUser');