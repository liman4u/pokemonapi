<?php

use PokemonAPI\PokemonAPI;
use PHPUnit\Framework\TestCase;

class PokemonTest extends TestCase
{
    public function testGetPokemon_ValidId(){
        $api = new PokemonAPI();
        $output = json_decode($api->getPokemon('1'),true);
        $this->assertArrayHasKey('id',$output);
        $this->assertArrayHasKey('name',$output);
        $this->assertArrayHasKey('types',$output);
        $this->assertArrayHasKey('stats',$output);

    }

    public function testGetPokemon_ValidName(){
        $api = new PokemonAPI();
        $output = json_decode($api->getPokemon('ditto'),true);
        $this->assertArrayHasKey('id',$output);
        $this->assertArrayHasKey('name',$output);
        $this->assertArrayHasKey('types',$output);
        $this->assertArrayHasKey('stats',$output);

    }

    public function testGetPokemon_InvalidName(){
        $api = new PokemonAPI();
        $output = json_decode($api->getPokemon('Liman'),true);
        $this->assertEquals('RESOURCE NOT FOUND',$output);

    }

    public function testGetPokemon_FormattedResponse(){
        $api = new PokemonAPI();
        $output = json_decode($api->getPokemon('ditto'),true);
        $this->assertEquals(132,$api->formatResponse($output)->getId());
        $this->assertNotNull($api->formatResponse($output)->getTypes());
        $this->assertNotNull($api->formatResponse($output)->getStats());
        
    }
}