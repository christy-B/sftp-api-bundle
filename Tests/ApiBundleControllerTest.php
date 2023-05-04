<?php
namespace Wynd\ApiBundle\Tests;

use PHPUnit\Framework\TestCase;
use Wynd\ApiBundle\Tests\Mock\CheckFunction;

class ApiBundleControllerTest extends TestCase{
    public function test_sftp_connexion()
    {
        $test = CheckFunction::chechConnexion();  
        $this->assertTrue($test);
    }
    public function test_file_found(){
        $test = CheckFunction::fileFoundCheck("basic.php");
        $this->assertTrue($test);
    }
    public function test_directory_found(){
        $test = CheckFunction::directoryFoundCheck("basic");
        $this->assertTrue($test);
    }
    
} 

