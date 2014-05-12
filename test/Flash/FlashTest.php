<?php

namespace kalkih\Flash;

require_once(__DIR__ . '/../../src/Flash/Flash.php');

class FlashTest extends \PHPUnit_Framework_TestCase
{   

    public function setup() 
    {
        $this->flash = new Flash();
    }

    public function testClear()
    {
        $this->flash->clear();
        $this->assertEquals(null, $_SESSION["flash"]);
    }

    public function testAdd()
    {
        $this->flash->add('info', 'Info message');
        $this->flash->add('success', 'Success message');
        $this->flash->add('warning', 'Warning message');
        $this->flash->add('error', 'Error message');

        $this->flash->add('random inavlid type', 'This will become a info message as default');

        $this->assertEquals('info', $_SESSION['flash'][0]['type']);
        $this->assertEquals('success', $_SESSION['flash'][1]['type']);
        $this->assertEquals('warning', $_SESSION['flash'][2]['type']);
        $this->assertEquals('error', $_SESSION['flash'][3]['type']);

        $this->assertEquals('Info message', $_SESSION['flash'][0]['msg']);
        $this->assertEquals('Success message', $_SESSION['flash'][1]['msg']);
        $this->assertEquals('Warning message', $_SESSION['flash'][2]['msg']);
        $this->assertEquals('Error message', $_SESSION['flash'][3]['msg']);
    }

    public function testGetEmptyMessages() 
    {
        $output = $this->flash->get();
        $this->assertEquals(null, $output);
    }
}
