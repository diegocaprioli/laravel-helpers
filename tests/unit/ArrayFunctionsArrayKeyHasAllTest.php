<?php

class ArrayFunctionsArrayKeyHasAllTest extends \PHPUnit\Framework\TestCase {

    protected $search = [
        'one'   => 'one-value',
        'two'   => 'two-value',
        'three' => 'three-value'
    ];


    public function test_return_true_if_all_are_present()
    {
        $this->assertTrue(array_key_has_all($this->search, ['one', 'three']));
    }

    public function test_return_false_if_one_is_not_present()
    {
        $this->assertFalse(array_key_has_all($this->search, ['one', 'four']));
    }

} 