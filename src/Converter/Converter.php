<?php
/**
 * Created by PhpStorm.
 * User: lejla
 * Date: 2015.12.28.
 * Time: 18:24
 */

namespace ShoeMagick\Converter;


class Converter
{
    private $conversionTable = 'Nike'; // Conversion Table to use
    private $from;
    private $to;
    
    public function __construct(){
        return $this;
    }

    public function from($standard)
    {
        $this->from = $standard;
        return $this;
    }

    public function to($standard)
    {
        $this->to = $standard;
        return $this;
    }

    public function convert($size = null, $gender = null)
    {
        switch($this->from) {
            case 'us':
                switch($this->to) {
                    case 'us':
                        return $size;
                    case 'eu':
                        if(in_array(strtolower($gender), ['men', 'mens', 'unisex', 'none']) {
                                return @$this->usTable['Men'][$size];
                        }
                        if(in_array(strtolower($gender), ['women', 'womens', 'lady', 'ladies']) {
                            return @$this->usTable['Women'][$size];
                        }
                        if(in_array(strtolower($gender), ['girl', 'girls', 'boy', 'boys', 'children', 'child', 'chld', 'chd', 'cld', 'young', 'yng']) {
                            return @$this->usTable['Children'][$size];
                        }
                        break;
                }
                break;
            case 'eu':
                switch($this->to) {
                    case 'us':
                        return array_search($size, @$this->usTable[$gender]);
                        break;
                    case 'eu':
                        return $size;
                }
                break;
        }
    }

    private $usTable = [
        'Men' => [
            '4'     => 36,
            '4.5'   => 36.5,
            '5'     => 37.5,
            '5.5'   => 38,
            '6'     => 38.5,
            '6.5'   => 39,
            '7'     => 40,
            '7.5'   => 40.5,
            '8'     => 41,
            '8.5'   => 42,
            '9'     => 42.5,
            '9.5'   => 43,
            '10'    => 44,
            '10.5'  => 44.5,
            '11'    => 45,
            '11.5'  => 45.5,
            '12'    => 46,
            '12.5'  => 47,
            '13'    => 47.5,
            '13.5'  => 48,
            '14'    => 48.5,
            '15'    => 49,
            '16'    => 49.5,
            '17'    => 50,
            '18'    => 50.5,
        ],
        'Women' => [
            '4'     => 34.5,
            '4.5'   => 35,
            '5'     => 35.5,
            '5.5'   => 36,
            '6'     => 36.5,
            '6.5'   => 37.5,
            '7'     => 38,
            '7.5'   => 38.5,
            '8'     => 39,
            '8.5'   => 40,
            '9'     => 40.5,
            '9.5'   => 41,
            '10'    => 42,
            '10.5'  => 42.5,
            '11'    => 43,
        ],
        'Children' => [
            '3.5Y'  => 35.5,
            '4Y'    => 36,
            '4.5Y'  => 36.5,
            '5Y'    => 37.5,
            '5.5Y'  => 38,
            '6Y'    => 38.5,
            '6.5Y'  => 39,
            '7Y'    => 40,
        ],
    ];
}
