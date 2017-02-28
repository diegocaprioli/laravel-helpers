<?php

class ArrayFunctionsArrayHasAnyTest extends \PHPUnit\Framework\TestCase {

    protected $search = [
        'one'   => 'one-value',
        'two'   => 'two-value',
        'three' => 'three-value'
    ];


    public function test_return_true_if_any_are_present()
    {
        $this->assertTrue(array_has_any($this->search, ['one-value', 'three-value', 'four-value']));
    }

    public function test_return_false_if_none_are_present()
    {
        $this->assertFalse(array_has_any($this->search, ['six-value', 'four-value']));
    }

} 