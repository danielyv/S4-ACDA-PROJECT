<?php

use PHPUnit\Framework\TestCase;

require_once "../../lib/File.php";
require_once "../../model/Model.php";
require_once "../../model/ModelAnecdote.php";

class TestModelAnecdote extends TestCase
{

    function testSelectAll()
    {
        $test = ModelAnecdote::selectAll();
        $this->assertTrue(is_array($test));
        $this->assertTrue(count($test) == 7, "le compte n'est bon");
    }

    function testSelectAll2()
    {
        $test = ModelAnecdote::selectAll();
        $bool = 0;
        foreach ($test as $item) {
            if (is_a($item, "ModelAnecdote")) $bool++;
        }
        $this->assertTrue(count($test) == $bool);
    }

    function testSelect1()
    {
        $test = ModelAnecdote::select("5a4d175425943");
        $this->assertInstanceOf("ModelAnecdote", $test);
    }

    function testSelect2()
    {
        $test = ModelAnecdote::select("oui");
        $this->assertFalse($test);
    }

    function testGetter1()
    {
        $test = ModelAnecdote::select("5a4d175425943");
        $this->assertEquals("5a4d175425943", $test->get("idAnecdote"));
        $this->assertEquals("uyuyzguc", $test->get("titre"));
        $this->assertEquals("positive", $test->get("categorie"));
        $this->assertEquals("27", $test->get("idJeu"));
        $this->assertEquals("user", $test->get("idLogin"));
        $this->assertEquals("1", $test->get("publie"));
        $this->assertEquals("1", $test->get("nbLike"));
        $this->assertEquals("0", $test->get("nbLove"));
        $this->assertEquals("0", $test->get("nbJpp"));
        $this->assertEquals("0", $test->get("nbOh"));
        $this->assertEquals("0", $test->get("nbSad"));
        $this->assertEquals("0", $test->get("nbGrr"));
        $this->assertEquals("2018-01-03 18:48:04", $test->get("date"));
        $this->assertEquals("89", $test->get("joie"));
        $this->assertEquals("30", $test->get("peur"));
        $this->assertEquals("100", $test->get("colere"));
        $this->assertEquals("48", $test->get("degout"));
        $this->assertEquals("98", $test->get("tristesse"));
        $this->assertEquals("50", $test->get("surprise"));
    }

    function testSetter()
    {
        $test = new ModelAnecdote();

        $properties = ["idAnecdote", "titre", "texte", "categorie", "idJeu", "idLogin", "joie", "peur", "colere", "degout", "tristesse", "surprise", "publie", "nbLike", "nbLove", "nbJpp", "nbOh", "nbSad", "nbGrr", "date"];

        foreach ($properties as $property) {
            $test->set($property, 1);
            $this->assertEquals(1, $test->get($property));
        }
    }

    function testSignalerAnec()
    {
        $bool = ModelAnecdote::signalerAnec(array(
            "user" => "user",
            "anec" => "5a4d175425943",
            "type" => "Lorem",
            "descAnec" => "Lorem Ipsum"
        ));

        $this->assertTrue($bool);
    }

    // Penser à remettre 32 comme id jeu pur l'anecdote selectionné
    function testUpdateJeu()
    {
        ModelAnecdote::updateJeu(32);
        $test = ModelAnecdote::select("5a6340a89a405");

        $this->assertEquals($test->get("idJeu"), 1);
    }

    function testSelectBrouillon()
    {
        $tab = ModelAnecdote::selectBrouillon("evilox");
        $this->assertEquals(2, count($tab));
    }

    function testSelectUser()
    {
        $tab = ModelAnecdote::selectUser("evilox");
        $this->assertEquals(7, count($tab));
    }

    function testGetTop()
    {
        $tab = ModelAnecdote::getTop();
        $this->assertEquals(3, count($tab));
    }

    function testSelectTop()
    {
        $tab = ModelAnecdote::selectTop();
        $this->assertEquals(7, count($tab));
    }

    function testGetAleatoire()
    {
        for ($i = 0; $i < 100; $i++) {
            $this->assertInstanceOf("ModelAnecdote", ModelAnecdote::getAleatoire());
        }
    }

    function testAddNbReact()
    {
        $before = ModelAnecdote::select("5a5e5a1a49871");
        ModelAnecdote::addNbReact("5a5e5a1a49871", "nbLike", 1);
        $after = ModelAnecdote::select("5a5e5a1a49871");
        $b = $before->get('nbLike');
        $a = $after->get('nbLike');
        $this->assertEquals((int)$b + 1, $a);
    }

    function testDejaSignale()
    {
        $this->assertTrue(ModelAnecdote::dejaSignale("user", "5a4d175425943"));
        $this->assertFalse(ModelAnecdote::dejaSignale("user", "5a5e5c8910da4"));
    }

    function testGetAllReport()
    {
        $tab = ModelAnecdote::getAllReport();
        $this->assertTrue(count($tab)==4);
    }

    function testGetTitleByID() {
        $title = ModelAnecdote::getTitleById("5a5e5c8910da4");
        var_dump($title);
        $expected = "Pire que le uno ! Ca brise des amitiés :)";
        $this->assertEquals($expected,$title);
    }

}