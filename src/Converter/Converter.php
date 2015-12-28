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

    public function from(string $standard)
    {
        $this->from = $standard;
    }

    public function to(string $standard)
    {
        $this->to = $standard;
    }

    public function convert($size = null, $gender = null)
    {
        switch($this->from) {
            case 'us':
                switch($this->to) {
                    case 'us':
                        return $size;
                    case 'eu':
                        if(strcasecmp($gender,'Men')==0 || strcasecmp($gender,'Unisex')==0){
                            return $this->usTable['Men'][$size];
                        }
                        if(strcasecmp($gender,'Women')==0){
                            return $this->usTable['Women'][$size];
                        }
                        if(strcasecmp($gender,'Girls')==0 || strcasecmp($gender,'Boys')==0){
                            return $this->usTable['Children'][$size];
                        }
                        break;
                }
                break;
            case 'eu':
                switch($this->to) {
                    case 'us':
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

        ],
        'Children' => [

        ],
    ];
}