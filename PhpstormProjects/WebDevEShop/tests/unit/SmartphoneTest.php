<?php

class SmartphoneTest extends \Codeception\Test\Unit
{
    /**
     * @var \UnitTester
     */
    protected $tester;
    private $Smartphone;
    protected function _before()
    {
        $this->Smartphone = new \Tudublin\Smartphone();
    }

    protected function _after()
    {
    }

    // tests
    public function testCreation()
    {
        $aNewSmartphone = new \Tudublin\Smartphone();
        $this->assertNotNull($aNewSmartphone);
    }

    public function testGettersAndSetters(){
        $this->Smartphone->setId(1);
        $this->Smartphone->setName("Test");
        $this->Smartphone->setStore(2);
        $this->Smartphone->setPhoto("TestPhoto.jpg");
        $this->Smartphone->setPrice(3);

        $this->assertEquals(1,$this->Smartphone->getId());
        $this->assertEquals("Test",$this->Smartphone->getName());
        $this->assertEquals(2,$this->Smartphone->getStore());
        $this->assertEquals("TestPhoto.jpg",$this->Smartphone->getPhoto());
        $this->assertEquals(3,$this->Smartphone->getPrice());

    }

    public function testBuyPhone(){
        $this->Smartphone->setId(1);
        $this->Smartphone->setName("Test");
        $this->Smartphone->setStore(2);
        $this->Smartphone->setPhoto("TestPhoto.jpg");
        $this->Smartphone->setPrice(3);

        $expected = 1;

        $this->Smartphone->buyPhone();
        $this->assertEquals($expected, $this->Smartphone->getStore());
    }
}