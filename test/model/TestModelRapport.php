<?php

use PHPUnit\Framework\TestCase;

	require_once "../../lib/File.php";
	require_once "../../model/Model.php";
	require_once "../../model/ModelRapport.php";
class TestModelRapport extends TestCase
{
	function testSelectAll()
	{
		$test = ModelRapport::selectAll();
		$this->assertTrue(is_array($test));
		$this->assertTrue(count($test) == 17, "le compte n'est bon");
	}
}