<?php

require_once '../../lib/File.php';
require_once '../../model/Model.php';
require_once '../../model/ModelReactionAnec.php';

use PHPUnit\Framework\TestCase;

class TestModelReactionAnec extends TestCase
{

    function testSelect()
    {
        $test = ModelReactionAnec::select(array(
            'idLogin' => "evilox",
            'idAnecReac' => "5a5e5c8910da4"
        ));
        $this->assertInstanceOf("ModelReactionAnec",$test);
    }

    function testSelect1() {
        $test = ModelReactionAnec::select(array(
            'idLogin' => "evilox",
            'idAnecReac' => "5qsda5e5c8910da4"
        ));
        $this->assertFalse($test);
    }

    function testGet() {
        $test = ModelReactionAnec::select(array(
            'idLogin' => "evilox",
            'idAnecReac' => "5a5e5c8910da4"
        ));
        $this->assertEquals("evilox",$test->get("idLogin"));
        $this->assertEquals("5a5e5c8910da4",$test->get("idAnecReac"));
        $this->assertEquals("0",$test->get("typeReacAnec"));
    }

    function testSet() {
        $test = ModelReactionAnec::select(array(
            'idLogin' => "evilox",
            'idAnecReac' => "5a5e5c8910da4"
        ));
        $test->set('idLogin','1');
        $this->assertEquals("1",$test->get("idLogin"));
        $test->set('idAnecReac',"1");
        $this->assertEquals("1",$test->get("idAnecReac"));
        $test->set('typeReacAnec',"1");
        $this->assertEquals("1",$test->get("typeReacAnec"));
    }
}