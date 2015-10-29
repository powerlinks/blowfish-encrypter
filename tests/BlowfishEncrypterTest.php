<?php
/**
 * BlowfishEncrypterTest.php
 *
 * @copyright PowerLinks
 * @author Manuel Kanah <manuel@powerlinks.com>
 * Date: 28/10/15 - 17:07
 */

namespace PowerLinks\Encrypter\Tests;

use PHPUnit_Framework_TestCase;
use PowerLinks\Encrypter\BlowfishEncrypter;
use Faker\Factory;

class BlowfishEncrypterTest extends PHPUnit_Framework_TestCase
{
    /**
     * @var BlowfishEncrypter
     */
    private $encrypter;

    /**
     * @var Generator
     */
    private $faker;

    public function setUp()
    {
        $this->faker = Factory::create();
        $this->encrypter = new BlowfishEncrypter($this->faker->uuid);
    }

    public function test()
    {
        for ($i = 0; $i < 10; $i++) {
            $sentence = $this->faker->sentence(30);
            $encrypted = $this->encrypter->encryptToString($sentence);
            $planString = $this->encrypter->decryptFromString($encrypted);
            $this->assertEquals($sentence, $planString);
        }
    }
}