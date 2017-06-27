<?php namespace DiegoCaprioli\LaravelHelpers\Tests\Unit;

class HtmlFunctionsTest extends \PHPUnit\Framework\TestCase {


    public function test_human_number_tag()
    {        
        $this->assertNotEmpty(human_number_tag(123456));
    }
    

} 