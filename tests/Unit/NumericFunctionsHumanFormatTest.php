<?php namespace DiegoCaprioli\LaravelHelpers\Tests\Unit;

class NumericFunctionsHumanFormatTest extends \PHPUnit\Framework\TestCase {


    protected function humanFormatAssert($expected, $float)
    {
        $humanFormat = human_format($float);
        $this->assertEquals($expected, $humanFormat, 'Got ' . $humanFormat . ' when expecting ' . $expected . ' for human_format(' . $float . ')');
    }

    public function test_formats_to_2_decimals()
    {
        $this->humanFormatAssert('2.46', 2.4556);
        $this->humanFormatAssert('2.45', 2.449);
        $this->humanFormatAssert('2.44', 2.444);
        $this->humanFormatAssert('2.45', 2.445);
    }

    public function test_formats_less_than_1000_as_they_are()
    {
        $this->humanFormatAssert('123', 123);
        $this->humanFormatAssert('999', 999);
        $this->humanFormatAssert('999.99', 999.99);
    }

    public function test_format_between_1k_and_1m_as_rounded_k()
    {
        $this->humanFormatAssert('1k', 1000);
        $this->humanFormatAssert('1.1k', 1100);
        $this->humanFormatAssert('1.11k', 1110);
        $this->humanFormatAssert('1.11k', 1111);
        $this->humanFormatAssert('1.11k', 1114);
        $this->humanFormatAssert('1.12k', 1115);
        $this->humanFormatAssert('1.12k', 1119);
    }

    public function test_format_avobe_1m()
    {
        $this->humanFormatAssert('1m', 1000000);
        $this->humanFormatAssert('1m', 1000001);
        $this->humanFormatAssert('1.1m', 1100000);
        $this->humanFormatAssert('1.14m', 1140000);
        $this->humanFormatAssert('1.15m', 1149000);
        $this->humanFormatAssert('10m', 10000000);
    }

}