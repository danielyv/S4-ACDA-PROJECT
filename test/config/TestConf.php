<?php

require_once "../../phpunit.phar";
require_once "../../config/Conf.php";

use PHPUnit\Framework\TestCase;

class TestConf extends TestCase
{
    // Test passed
    function testGetDebug()
    {
        $this->assertTrue(Conf::getDebug());
    }

    // Test passed
    function testGetLogin()
    {
        $this->assertEquals("phunvongm", Conf::getLogin());
    }

    // Test passed
    function testGetHostname()
    {
        $this->assertEquals("webinfo", Conf::getHostname());
    }

    // Test passed
    function testGetDatabase()
    {
        $this->assertEquals("phunvongm", Conf::getDatabase());
    }

    // Test passed
    function testGetPassword()
    {
        $this->assertEquals("Nani?!", Conf::getPassword());
    }
    
}