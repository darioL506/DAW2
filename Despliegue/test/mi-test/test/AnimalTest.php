<?php

use PHPUnit\Framework\TestCase;

require __DIR__ . "/../src/Animal.php";
class AnimalTest extends TestCase
{
   
    private $animal;
    
    protected function setUp(): void
    {
        $this->animal = new Animal('','','',11);
    }

    protected function tearDown():void
    {
    }
    /**
     * @covers Test de la funcion sonido
     */
    public function testSonido() {        
        $this->assertEquals($this->animal->sonido(),'Guau');
    } 
    
    /**
     * @covers Test de la funcion de suma
     */
    public function testSuma(){
        $this->assertEquals(4, $this->animal->suma(1, 3));
    }

    /**
     * @covers Test de poner especie
     */
    public function testSetEspecie() {
        $this->assertEquals("es un perro", $this->animal->setEspecie('perro'));
    }

    /**
     * @covers Test en el que se prueban varias funciones
     */
    public function testMultiple() {
        $this->assertEquals($this->animal->sonido(),'Guau');
        $this->assertEquals(4, $this->animal->suma(1, 3));    
        $this->assertEquals("es un perro", $this->animal->setEspecie('perro'));
    }
}
