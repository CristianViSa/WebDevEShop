<?php 

class CreateRecordsCest
{
    public function  testInitialRecordsInDatabase(AcceptanceTester $I){
        $I->seeNumRecords(5, 'Smartphone');
    }

    public function indexCreateOneRecord(AcceptanceTester $I)
    {
        //If not loged in, fail
        $I->amOnPage('index.php?action=store');
        $I->dontSee("Add new Smartphone");

        $I->amOnPage('/index.php');
        $I->click('login');
        $I->fillField('username','cristian');
        $I->fillField('password','cristian');
        $I->click('input[type=submit]');
        $I->amOnPage('index.php?action=store');
        $I->click("Add new Smartphone");
        $I->fillField('name','TestPhone');
        $I->fillField('store',288);
        $I->fillField('price',288);
        $I->fillField('photo','photo.jpg');
        $I->click('input[type=submit]');

        // Asserrt - one more record in DB !
        $I->seeNumRecords(6, 'Smartphone');  //executed on db_books database
    }

    public function indexDeleteOneRecord(AcceptanceTester $I)
    {
        //If not loged in, fail
        $I->amOnPage('index.php?action=store');
        $I->dontSee("Delete");

        $I->amOnPage('/index.php');
        $I->click('login');
        $I->fillField('username','cristian');
        $I->fillField('password','cristian');
        $I->click('input[type=submit]');
        $I->amOnPage('index.php?action=store');
        $I->click("Delete");


        // Asserrt - one less record in DB !
        $I->seeNumRecords(4, 'Smartphone');  //executed on db_books database
    }

    public function indexUpdateOneRecord(AcceptanceTester $I)
    {
        //If not loged in, fail
        $I->amOnPage('index.php?action=store');
        $I->dontSee("Update");

        $I->amOnPage('/index.php');
        $I->click('login');
        $I->fillField('username','cristian');
        $I->fillField('password','cristian');
        $I->click('input[type=submit]');
        $I->amOnPage('index.php?action=store');
        $I->click("Update");
        $I->fillField('stock',12344321);
        $I->click('Update Stock');

        // Asserrt - one  record updated in DB !
        $I->amOnPage('/index.php?action=store');
        $I->see('12344321');
    }

    public function indexSeeFirstRecord(AcceptanceTester $I)
    {
        //If not loged in, fail
        $I->amOnPage('index.php?action=store');
        $I->dontSee("Buy");

        $I->amOnPage('/index.php');
        $I->click('login');
        $I->fillField('username','cristian');
        $I->fillField('password','cristian');
        $I->click('input[type=submit]');
        $I->amOnPage('index.php?action=store');
        $I->click("Buy");

        $I->see('Huawei p10');
    }

    public function providerCreateSmartphone()
    {
        return [
            ['Smartphone1', 287, 200,"photo1.jpg", 6],
        ];
    }
}
