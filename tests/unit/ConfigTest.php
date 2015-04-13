<?php
/**
 * @author @ct-jensschulze <jens.schulze@commercetools.de>
 * @created: 22.01.15, 10:30
 */

namespace Sphere\Core;

class ConfigTest extends \PHPUnit_Framework_TestCase
{
    protected function getConfig()
    {
        return [
                Config::CLIENT_ID => 'id',
                Config::CLIENT_SECRET => 'secret',
                Config::OAUTH_URL => 'oauthUrl',
                Config::PROJECT => 'project',
                Config::API_URL => 'apiUrl'
        ];
    }

    public function testSetCredentialsOnly()
    {
        $testConfig = $this->getConfig();
        unset($testConfig[Config::OAUTH_URL]);
        unset($testConfig[Config::API_URL]);
        $config = new Config();
        $this->assertInstanceOf('\Sphere\Core\Config', $config->fromArray($testConfig));

        $this->assertEquals($testConfig[Config::CLIENT_ID], $config->getClientId());
        $this->assertEquals($testConfig[Config::CLIENT_SECRET], $config->getClientSecret());
        $this->assertEquals('https://auth.sphere.io/oauth/token', $config->getOauthUrl());
        $this->assertEquals($testConfig[Config::PROJECT], $config->getProject());
        $this->assertEquals('https://api.sphere.io', $config->getApiUrl());
    }

    public function testFromArray()
    {
        $testConfig = $this->getConfig();
        $config = new Config();
        $this->assertInstanceOf('\Sphere\Core\Config', $config->fromArray($testConfig));

        $this->assertEquals($testConfig[Config::CLIENT_ID], $config->getClientId());
        $this->assertEquals($testConfig[Config::CLIENT_SECRET], $config->getClientSecret());
        $this->assertEquals($testConfig[Config::OAUTH_URL], $config->getOauthUrl());
        $this->assertEquals($testConfig[Config::PROJECT], $config->getProject());
        $this->assertEquals($testConfig[Config::API_URL], $config->getApiUrl());

    }


    public function testEmptyArray()
    {
        $config = new Config();
        $config->fromArray([]);

        $this->assertEmpty($config->getClientId());
        $this->assertEmpty($config->getClientSecret());
        $this->assertEmpty($config->getProject());
        $this->assertEquals('https://auth.sphere.io/oauth/token', $config->getOauthUrl());
        $this->assertEquals('https://api.sphere.io', $config->getApiUrl());
    }

    /**
     * @expectedException \InvalidArgumentException
     */
    public function testUnknownEntry()
    {
        $config = new Config();
        $config->fromArray(['key' => 'value']);
    }

    /**
     * @expectedException \InvalidArgumentException
     */
    public function testInvalidConfig()
    {
        $config = new Config();
        $config->fromArray([]);
        $config->check();
    }

    public function mandatoryConfig()
    {
        return [
            [Config::CLIENT_ID],
            [Config::CLIENT_SECRET],
            [Config::PROJECT],
        ];
    }

    /**
     * @dataProvider mandatoryConfig
     * @expectedException \InvalidArgumentException
     */
    public function testNoClientIdSet($mandatoryField)
    {
        $testConfig = $this->getConfig();
        unset($testConfig[$mandatoryField]);
        $config = new Config();
        $config->fromArray($testConfig);
        $config->check();
    }

    public function testValidConfig()
    {
        $testConfig = $this->getConfig();
        $config = new Config();
        $config->fromArray($testConfig);
        $this->assertTrue($config->check());
    }
}