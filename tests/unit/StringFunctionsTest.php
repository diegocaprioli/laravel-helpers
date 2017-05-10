<?php

class StringFunctionsTest extends \PHPUnit\Framework\TestCase {


    public function test_concatenate_concatenates_words_using_default_glue()
    {
        $words = ['one', 'two', 'three'];
        $expected = "one two three";
        $this->assertEquals($expected, concatenate($words));
    }

    public function test_concatenate_concatenates_words_using_specified_glue()
    {
        $words = ['one', 'two', 'three'];
        $expected = "one-two-three";
        $this->assertEquals($expected, concatenate($words, '-'));
    }

    public function test_tokenize_search_terms_it_separates_words_by_spaces()
    {
        $string = "one two three";
        $expected = ['one', 'two', 'three'];
        $this->assertEquals($expected, tokenize_search_terms($string));
    }

    public function test_tokenize_search_terms_it_separates_words_by_double_quotes()
    {
        $string = '"one two" "three four" five';
        $expected = ['one two', 'three four', 'five'];
        $this->assertEquals($expected, tokenize_search_terms($string));
    }

    public function test_tokenize_search_terms_quotes_without_words_inside_are_removed()
    {
        $string = '"one two" "" "three four" "   " five';
        $expected = ['one two', 'three four', 'five'];
        $this->assertEquals($expected, tokenize_search_terms($string));
    }

    public function test_tokenize_search_terms_not_balanced_quotes_are_closed_at_the_end_of_string()
    {
        $string = '"one two" "" "three four" "   " five "six seven';
        $expected = ['one two', 'three four', 'five', 'six seven'];
        $this->assertEquals($expected, tokenize_search_terms($string));
    }

    public function test_tokenize_search_terms_multiple_spaces_are_replaced_by_only_one_space()
    {
        $string = '   one   two  three "  four five six  "   ';
        $expected = ['one', 'two', 'three', 'four five six'];
        $this->assertEquals($expected, tokenize_search_terms($string));
    }

    public function test_tokenize_search_terms_empty_space_returns_empty_array()
    {
        $string = "      ";
        $expected = [];
        $this->assertEquals($expected, tokenize_search_terms($string));
    }

    public function test_tokenize_search_terms_words_with_apostrophe_are_correctly_processed()
    {
        $string = "rosemary's willoughby";
        $expected = ["rosemary's", "willoughby"];
        $this->assertEquals($expected, tokenize_search_terms($string));

        $string = "willoughby rosemary's";
        $expected = ["willoughby", "rosemary's"];
        $this->assertEquals($expected, tokenize_search_terms($string));
    }

    public function test_truncate_by_token_truncates_the_string_considering_the_token()
    {
        $value = 'This is a long caption text with several words in it, not sure why.';
        
        $expected = 'This is a long...';
        $this->assertEquals($expected, truncate_by_token($value, 20));
        
        $expected = 'This is a long caption...';
        $this->assertEquals($expected, truncate_by_token($value, 25));
        
        $this->assertEquals($value, truncate_by_token($value, 100));
    }

    public function test_generate_guid_returns_a_random_guid_formated_string()
    {
        $guid = generate_guid(true);
        $this->assertFalse(empty($guid));
        $this->assertTrue(strpos($guid, '{') !== false, 'No { was found');
        $this->assertTrue(strpos($guid, '}') !== false, 'No } was found');
        $this->assertTrue(strpos($guid, '-') !== false, 'No - was found');        
    }

    public function test_generate_guid_returns_a_random_formated_string()
    {
        $guid = generate_guid();
        $this->assertFalse(empty($guid));
        $this->assertTrue(strpos($guid, '{') === false, '{ was found');
        $this->assertTrue(strpos($guid, '}') === false, '} was found');
        $this->assertTrue(strpos($guid, '-') === false, '- was found');        
    }

} 