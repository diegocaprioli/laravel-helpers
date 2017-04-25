<?php

class StringFunctionsTruncateByTokenTest extends \PHPUnit\Framework\TestCase {


    public function test_truncates_the_string_considering_the_token()
    {
        $value = 'This is a long caption text with several words in it, not sure why.';
        
        $expected = 'This is a long...';
        $this->assertEquals($expected, truncate_by_token($value, 20));
        
        $expected = 'This is a long caption...';
        $this->assertEquals($expected, truncate_by_token($value, 25));
        
        $this->assertEquals($value, truncate_by_token($value, 100));
    }

}