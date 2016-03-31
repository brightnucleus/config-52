<?php
/**
 * BrightNucleus_Config_Test test.
 *
 * @package   brightnucleus/config-52
 * @author    Alain Schlesser <alain.schlesser@gmail.com>
 * @license   MIT
 * @link      http://www.brightnucleus.com/
 * @copyright 2016 Alain Schlesser, Bright Nucleus
 */

/**
 * Class BrightNucleus_Config_Test.
 *
 * @since   0.1.0
 *
 * @package brightnucleus/config-52
 * @author  Alain Schlesser <alain.schlesser@gmail.com>
 */
class BrightNucleus_Config_Test extends \PHPUnit_Framework_TestCase
{

    /*
     * Don't use an array const to avoid bumping PHP requirement to 5.6.
     */
    protected static $test_array = array(
        'random_string'    => 'test_value',
        'positive_integer' => 42,
        'negative_integer' => -256,
        'positive_boolean' => true,
        'negative_boolean' => false,
    );

    protected static $test_multi_array = array(
        'level1' => array(
            'level2' => array(
                'level3' => array(
                    'level4_key' => 'level4_value',
                ),
            ),
        ),
    );

    /**
     * Test creation and value retrieval.
     *
     * @covers BrightNucleus_Config::__construct
     *
     * @since  1.0.0
     */
    public function testConfigFileCreation()
    {
        $config = new BrightNucleus_Config(BrightNucleus_Config_Test::$test_array);

        $this->assertInstanceOf('BrightNucleus_ConfigInterface', $config);
        $this->assertInstanceOf('BrightNucleus_Config', $config);
    }

    /**
     * @covers BrightNucleus_Config::hasKey
     */
    public function testHasKey()
    {
        $config = new BrightNucleus_Config(BrightNucleus_Config_Test::$test_array);
        $this->assertTrue($config->hasKey('random_string'));
        $this->assertTrue($config->hasKey('positive_integer'));
        $this->assertTrue($config->hasKey('negative_integer'));
        $this->assertTrue($config->hasKey('positive_boolean'));
        $this->assertTrue($config->hasKey('negative_boolean'));
        $this->assertFalse($config->hasKey('some_other_key'));
    }

    /**
     * @covers BrightNucleus_Config::getKeys
     */
    public function testGetKeys()
    {
        $config = new BrightNucleus_Config(BrightNucleus_Config_Test::$test_array);
        $this->assertEquals(array_keys(BrightNucleus_Config_Test::$test_array), $config->getKeys());
    }

    /**
     * @covers BrightNucleus_Config::getKey
     */
    public function testGetKey()
    {
        $config = new BrightNucleus_Config(BrightNucleus_Config_Test::$test_array);
        $this->assertEquals('test_value', $config->getKey('random_string'));
        $this->assertEquals(42, $config->getKey('positive_integer'));
        $this->assertEquals(-256, $config->getKey('negative_integer'));
        $this->assertTrue($config->getKey('positive_boolean'));
        $this->assertFalse($config->getKey('negative_boolean'));
    }
}
