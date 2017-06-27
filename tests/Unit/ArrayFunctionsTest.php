<?php namespace DiegoCaprioli\LaravelHelpers\Tests\Unit;

class ArrayFunctionsTest extends \PHPUnit\Framework\TestCase {

    protected $search = [
        'one'   => 'one-value',
        'two'   => 'two-value',
        'three' => 'three-value'
    ];


    public function test_array_has_all_return_true_if_all_are_present()
    {
        $this->assertTrue(array_has_all($this->search, ['one-value', 'three-value']));
    }

    public function test_array_has_all_return_false_if_one_is_not_present()
    {
        $this->assertFalse(array_has_all($this->search, ['one-value', 'four-value']));
    }

    public function test_array_has_any_return_true_if_any_are_present()
    {
        $this->assertTrue(array_has_any($this->search, ['one-value', 'three-value', 'four-value']));
    }

    public function test_array_has_any_return_false_if_none_are_present()
    {
        $this->assertFalse(array_has_any($this->search, ['six-value', 'four-value']));
    }

    public function test_array_key_has_all_return_true_if_all_are_present()
    {
        $this->assertTrue(array_key_has_all($this->search, ['one', 'three']));
    }

    public function test_array_key_has_all_return_false_if_one_is_not_present()
    {
        $this->assertFalse(array_key_has_all($this->search, ['one', 'four']));
    }

    public function test_array_key_has_any_return_true_if_any_are_present()
    {
        $this->assertTrue(array_key_has_any($this->search, ['one', 'three', 'four']));
    }

    public function test_array_key_has_any_return_false_if_none_are_present()
    {
        $this->assertFalse(array_key_has_any($this->search, ['six', 'four']));
    }

    public function test_array_key_has_any_value_return_true_if_at_least_one_key_has_value() 
    {    	
    	$this->assertTrue(array_key_has_any_value($this->search, ['two']));
    }

    public function test_array_key_has_any_value_return_false_if_none_isset() 
    {    	
    	$this->assertFalse(array_key_has_any_value($this->search, ['five', 'six']));
    }

    public function test_array_key_has_any_value_return_false_if_all_are_empty() 
    {    	
    	$array = [
    		'one' => '',
    		'two' => '',
    	];
    	$this->assertFalse(array_key_has_any_value($array, ['one', 'two']));
    }

} 