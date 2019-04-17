<?php 

class HomePageCest
{
    public function _before(AcceptanceTester $I)
    {
    }


    public function publicPagesWorking(AcceptanceTester $I){
        //HOME PAGE
        $I->amOnPage('/index.php');

        $I->see('This is the TU Dublin smartphone shop.');
        $I->seeLink("login");

        //ABOUT PAGE
        $I->amOnPage('/index.php?action=about');

        $I->see('About us');
        $I->seeLink("Email me");

        //LOGIN PAGE
        $I->amOnPage('/index.php?action=login');

        $I->see('Login Form');
        $I->seeLink("Login");

        //REGISTER PAGE
        $I->amOnPage('/index.php?action=register');

        $I->see('Register Form');
        $I->seeLink("Register");

        //STORE PAGE
        $I->amOnPage('/index.php?action=store');

        $I->see('Lists of Smartphones');
        $I->see("Name");
        //IF not logged in, cant buy
        $I->dontSee("Buy");
    }

    public function loginWorking(AcceptanceTester $I){
        //If not logged in, i cant buy
        $I->amOnPage('/index.php?action=store');
        $I->dontSee('Buy');

        //Now i log in and try to buy
        $I->amOnPage('/index.php');
        $I->seeLink("login");
        $I->click('login');
        $I->fillField('username','cristian');
        $I->fillField('password','cristian');
        $I->click('input[type=submit]');

        $I->amOnPage('index.php?action=store');
        $I->see("Buy");
    }


    public function failLogin(AcceptanceTester $I){

        //Attempt to login
        $I->amOnPage('/index.php');
        $I->seeLink("login");
        $I->click('login');
        $I->fillField('username','Acristian');
        $I->fillField('password','Acristian');
        $I->click('input[type=submit]');
        //I have been redirected to error page
        $I->see("Error page");

        $I->amOnPage('index.php?action=store');
        $I->dontSee("Buy");
    }

    public function adminLogin(AcceptanceTester $I){
        $I->amOnPage('/index.php');
        $I->seeLink("login");
        $I->click('login');
        $I->fillField('username','cristian');
        $I->fillField('password','cristian');
        $I->click('input[type=submit]');
        //Admin can manage users and modify smartphones
        $I->see("Manage Users");
        $I->amOnPage('index.php?action=store');
        $I->see("Buy");
        $I->see("Update");
        $I->see("Delete");
    }

    public function staffLogin(AcceptanceTester $I){
        $I->amOnPage('/index.php');
        $I->seeLink("login");
        $I->click('login');
        $I->fillField('username','miguel');
        $I->fillField('password','miguel');
        $I->click('input[type=submit]');
        //Staff can modify smartphones but cant manage users
        $I->dontSee("Manage Users");

        $I->amOnPage('index.php?action=store');
        $I->see("Buy");
        $I->see("Update");
        $I->see("Delete");
    }

    public function logoutCheck(AcceptanceTester $I){
        //Login
        $I->amOnPage('/index.php');
        $I->seeLink("login");
        $I->click('login');
        $I->fillField('username','cristian');
        $I->fillField('password','cristian');
        $I->click('input[type=submit]');
        //Logout
        $I->seeLink("logout");
        $I->click("logout");
        //Check if logout succeed
        $I->amOnPage('index.php?action=store');
        $I->dontSee("Buy");

    }
}
