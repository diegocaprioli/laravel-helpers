<?php namespace DiegoCaprioli\LaravelHelpers\Tests\Unit;

class CollectionFunctionsConvertToOptionsTest extends \PHPUnit\Framework\TestCase {

    public function test_it_returns_options_from_an_array_of_objects()
    {
        $collection = [
            new MyObject(1), new MyObject(2), new MyObject(3)
        ];
        $expected = [
            1 => 'String 1',
            2 => 'String 2',
            3 => 'String 3',
        ];
        $this->assertEquals($expected, convertToOptions($collection));
    }

    /**
     * @expectedException PHPUnit_Framework_Error_Warning
     */
    public function test_it_throws_warning_when_converting_objects_without_id()
    {
        $collection = [
            new MyObjectWithoutId()
        ];
        convertToOptions($collection);
    }

    /**
     * @expectedException PHPUnit_Framework_Error_Warning
     */
    public function test_it_throws_warning_when_converting_objects_without_to_string()
    {
        $collection = [
            new MyObjectWithoutToString(1)
        ];
        convertToOptions($collection);
    }

    public function test_it_returns_only_options_for_the_specified_class()
    {
        $collection = [
            new MyObject(1), new MyObject(2), new MyObject(3), new MyOtherObject(4)
        ];
        $expected = [
            1 => 'String 1',
            2 => 'String 2',
            3 => 'String 3',
        ];
        $this->assertEquals($expected, convertToOptions($collection, MyObject::class));
    }


}

class MyObject {
    public $id;

    public function __construct($id) {
        $this->id = $id;
    }

    public function __toString() {
        return 'String ' . $this->id;
    }
}

class MyOtherObject {
    public $id;

    public function __construct($id) {
        $this->id = $id;
    }

    public function __toString() {
        return 'String ' . $this->id;
    }
}

class MyObjectWithoutId {
    public function __toString() {
        return 'String';
    }
}

class MyObjectWithoutToString {
    public $id;

    public function __construct($id) {
        $this->id = $id;
    }
}