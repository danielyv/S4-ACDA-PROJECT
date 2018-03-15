<?php

use PHPUnit\Framework\TestCase;

	require_once "../../lib/File.php";
	require_once "../../model/Model.php";
	require_once "../../model/ModelJeuVideo.php";
class TestModelJeuVideo extends TestCase
{
	function testSelectAll()
	{
		$test = ModelJeuVideo::selectAll();
		$this->assertTrue(is_array($test));
		$this->assertTrue(count($test) == 9, "le compte n'est bon");
	}
	function testGet(){
		$get =ModelJeuVideo::select("2");
		$this->assertEquals("2", $get->get("idJeu"));
		$this->assertEquals("drgre", $get->get("nomJeu"));
		$this->assertEquals("<p>ergerg</p>", $get->get("descriptifJeu"));
		$this->assertEquals("RPG", $get->get("categorieJeu"));
		$this->assertEquals("gameDefault.jpg", $get->get("image"));
		$this->assertEquals("1", $get->get("valide"));
	}
	function testSet(){
		$test = new ModelJeuVideo();

		$properties = ["idJeu", "nomJeu", "descriptifJeu", "categorieJeu", "image", "valide"];

		foreach ($properties as $property) {
			$test->set($property, 1);
			$this->assertEquals(1, $test->get($property));
		}
	}
	function testAutocomplete(){
		$test=ModelJeuVideo::autocomplete("rh");
		$this->assertTrue(is_array($test));
		$this->assertTrue(count($test) == 2, "le compte n'est bon");
	}
	function testSelectNom(){
		$get =ModelJeuVideo::selectNom("drgre");
		$this->assertEquals("2", $get->get("idJeu"));

	}
	function testGetNameById(){
		$this->assertEquals("drgre", ModelJeuVideo::getNameById(2));
	}
	function testJsonSerialize(){
		$get =ModelJeuVideo::select("2");
		$test=$get->jsonSerialize();
		$this->assertEquals( $get->get("idJeu"),$test["idJeu"]);
		$this->assertEquals( $get->get("nomJeu"),$test["nomJeu"]);
		$this->assertEquals( $get->get("descriptifJeu"),$test["descriptifJeu"]);
		$this->assertEquals($get->get("categorieJeu"),$test["categorieJeu"]);
		$this->assertEquals( $get->get("image"),$test["image"]);
		$this->assertEquals($get->get("valide"),$test["valide"]);
	}
}