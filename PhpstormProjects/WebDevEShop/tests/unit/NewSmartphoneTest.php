<?php 
class NewSmartphoneTest extends \Codeception\Test\Unit
{

    /**
     * @dataProvider providerBuyData
     */
    public function testBuyWithProvider($store, $expectedResult)
    {
        $smartphone = new \Tudublin\Smartphone();
        $smartphone->setStore($store);
        $smartphone->buyPhone();
        $result = $smartphone->getStore();

        $this->assertEquals($result,$expectedResult);
    }
    public function providerBuyData()
    {
        return [
            [288, 287],
            [2, 1],
            [100, 99],
        ];
    }
}