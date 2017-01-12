<?php

class StringFunctionsConcatenateTest extends \PHPUnit\Framework\TestCase {


    public function test_concatenates_words_using_default_glue()
    {
        $words = ['one', 'two', 'three'];
        $expected = "one two three";
        $this->assertEquals($expected, concatenate($words));
    }

    public function test_concatenates_words_using_specified_glue()
    {
        $words = ['one', 'two', 'three'];
        $expected = "one-two-three";
        $this->assertEquals($expected, concatenate($words, '-'));
    }

} 