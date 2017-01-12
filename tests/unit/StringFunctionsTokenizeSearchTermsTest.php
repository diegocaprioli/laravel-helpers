<?php

class StringFunctionsTokenizeSearchTermsTest extends \PHPUnit\Framework\TestCase {


    public function test_it_separates_words_by_spaces()
    {
        $string = "one two three";
        $expected = ['one', 'two', 'three'];
        $this->assertEquals($expected, tokenize_search_terms($string));
    }

    public function test_it_separates_words_by_single_quotes()
    {
        $string = "'one two' 'three four' five";
        $expected = ['one two', 'three four', 'five'];
        $this->assertEquals($expected, tokenize_search_terms($string));
    }

    public function test_it_separates_words_by_double_quotes()
    {
        $string = '"one two" "three four" five';
        $expected = ['one two', 'three four', 'five'];
        $this->assertEquals($expected, tokenize_search_terms($string));
    }

    public function test_it_separates_words_by_single_and_double_quotes()
    {
        $string = "'one two\" \"three four' five";
        $expected = ['one two', 'three four', 'five'];
        $this->assertEquals($expected, tokenize_search_terms($string));
    }

    public function test_quotes_without_words_inside_are_removed()
    {
        $string = "'one two' '' 'three four' '   ' five";
        $expected = ['one two', 'three four', 'five'];
        $this->assertEquals($expected, tokenize_search_terms($string));
    }

    public function test_not_balanced_quotes_are_closed_at_the_end_of_string()
    {
        $string = "'one two' '' 'three four' '   ' five 'six seven";
        $expected = ['one two', 'three four', 'five', 'six seven'];
        $this->assertEquals($expected, tokenize_search_terms($string));
    }

    public function test_multiple_spaces_are_replaced_by_only_one_space()
    {
        $string = "   one   two  three '  four five six  '   ";
        $expected = ['one', 'two', 'three', 'four five six'];
        $this->assertEquals($expected, tokenize_search_terms($string));
    }

    public function test_empty_space_returns_empty_array()
    {
        $string = "      ";
        $expected = [];
        $this->assertEquals($expected, tokenize_search_terms($string));
    }

} 