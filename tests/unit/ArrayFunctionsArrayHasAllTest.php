<?php

class ArrayFunctionsArrayHasAllTest extends \PHPUnit\Framework\TestCase {

    protected $search = [
        'one'   => 'one-value',
        'two'   => 'two-value',
        'three' => 'three-value'
    ];


    public function test_return_true_if_all_are_present()
    {
        $this->assertTrue(array_has_all($this->search, ['one-value', 'three-value']));
    }

    public function test_return_false_if_one_is_not_present()
    {
        $this->assertFalse(array_has_all($this->search, ['one-value', 'four-value']));
    }

} 