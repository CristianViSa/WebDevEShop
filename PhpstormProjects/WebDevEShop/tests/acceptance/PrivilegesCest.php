<?php 

class PrivilegesCest
{
    //Only admin can manage users
    public function adminFunction(AcceptanceTester $I){
        //If no login
        $I->amOnPage('/index.php?action=updatePersonnel');
        $I->see("Sorry, you need special privileges to do this");
        //If login as staff
        $I->click('login');
        $I->fillField('username','miguel');
        $I->fillField('password','miguel');
        $I->click('input[type=submit]');
        $I->amOnPage('/index.php?action=updatePersonnel');
        $I->see("Sorry, you need special privileges to do this");

        //Admin can manage users 
        $I->click('logout');
        $I->click('login');
        $I->fillField('username','cristian');
        $I->fillField('password','cristian');
        $I->click('input[type=submit]');
        $I->amOnPage('/index.php?action=updatePersonell');
        $I->dontSee("Sorry, you need special privileges to do this");
    }
    //Staff and admin can add smartphones
    public function staffFunction(AcceptanceTester $I){
        //If no login
        $I->amOnPage('/index.php?action=addSmartphone');
        $I->see("Sorry, you need special privileges to do this");
        //If login as staff
        $I->click('login');
        $I->fillField('username','miguel');
        $I->fillField('password','miguel');
        $I->click('input[type=submit]');
        $I->amOnPage('/index.php?action=addSmartphone');
        $I->dontSee("Sorry, you need special privileges to do this");

        //Admin
        $I->click('logout');
        $I->click('login');
        $I->fillField('username','cristian');
        $I->fillField('password','cristian');
        $I->click('input[type=submit]');
        $I->amOnPage('/index.php?action=addSmartphone');
        $I->dontSee("Sorry, you need special privileges to do this");
    }


}
