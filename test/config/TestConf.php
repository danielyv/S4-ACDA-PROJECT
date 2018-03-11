<?php

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
        $this->assertEquals("thomast", Conf::getLogin());
    }

    // Test passed
    function testGetHostname()
    {
        $this->assertEquals("guiltycore.fr", Conf::getHostname());
    }

    // Test passed
    function testGetDatabase()
    {
        $this->assertEquals("Recueil", Conf::getDatabase());
    }

    // Test passed
    function testGetPassword()
    {
        $this->assertEquals("iuts4", Conf::getPassword());
    }

}