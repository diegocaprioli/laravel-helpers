<?php

class StringFunctionsEmptyValTest extends \PHPUnit\Framework\TestCase {


    public function test_returns_the_default_value_when_empty()
    {
        $value = null;
        $default = "one";
        $this->assertEquals($default, emptyVal($value, $default));
    }

    public function test_returns_the_value_when_not_empty()
    {
        $value = "two";
        $default = "one";
        $this->assertEquals($value, emptyVal($value, $default));
    }

}