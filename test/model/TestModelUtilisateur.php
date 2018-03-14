<?php

use PHPUnit\Framework\TestCase;

require_once '../../lib/File.php';
require_once '../../lib/Security.php';
require_once '../../model/Model.php';
require_once '../../model/ModelUtilisateur.php';

class TestModelUtilisateur extends TestCase
{

    function testCheckPassword()
    {
        $this->assertTrue(ModelUtilisateur::checkPassword("evilox",Security::chiffrer("oui")));
        $this->assertFalse(ModelUtilisateur::checkPassword("evilox",Security::chiffrer("ouzi")));
    }

    function testGetNameByLogin()
    {
        $name = ModelUtilisateur::getNameByLogin("evilox");
        $this->assertEquals("password", $name);
    }

    function testGetNameByLogin1() {
        $name = ModelUtilisateur::getNameByLogin("eviloxqs");
        $this->assertFalse($name);
    }

    function testGetter()
    {
        $test = ModelUtilisateur::select("evilox");
        $this->assertEquals("evilox",$test->get('login'));
        $this->assertEquals("cd0eb7716aab9d4e4910b50a4438264030aacb9474661ed7639472208e985d75",$test->get('mdp'));
        $this->assertEquals("password",$test->get('pseudo'));
        $this->assertEquals("ev@yopmail.com",$test->get('email'));
        $this->assertEquals("0",$test->get('admin'));
        $this->assertEquals(null,$test->get('nonce'));
        $this->assertEquals("zegf",$test->get('sexe'));
        $this->assertEquals("ef",$test->get('profession'));
    }

    function testSetter()
    {
        $test = new ModelUtilisateur();
        $properties = array(
            "login",
            "mdp",
            "pseudo",
            "email",
            "nonce",
            "admin",
            "sexe",
            "profession"
        );
        foreach ($properties as $property) {
            $test->set($property,"1");
            $this->assertEquals("1",$test->get($property));
        }
    }
}