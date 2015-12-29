<?php
/**
 * Created by PhpStorm.
 * User: lejla
 * Date: 2015.12.28.
 * Time: 18:24
 */

namespace ShoeMagick\Converter;


class SizeConverter
{
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
                        foreach($this->usTable as $genderCategory) {
                            if($this->keywordSearch($gender, $genderCategory['gender_keywords'])) {
                                return @$genderCategory['sizes'][$size];
                            }
                        }
                        break;
                }
                break;
            case 'eu':
                switch($this->to) {
                    case 'us':
                        foreach($this->usTable as $genderCategory) {
                            if($this->keywordSearch($gender, $genderCategory['gender_keywords'])) {
                                return array_search($size, @$genderCategory['sizes']);
                            }
                        }
                        break;
                    case 'eu':
                        return $size;
                }
                break;
        }
    }

    private function keywordSearch($needle, $haystack)
    {
        foreach($haystack as $piece) {
            if(stripos($piece, $needle) !== false || stripos($needle, $piece) !== false) {
                return true;
            }
        }
        return false;
    }

    private $usTable = [
        'Men' => [
            'gender_keywords' => [
                'men',
                'mens',
                'unisex',
                'none'
            ],
            'sizes' => [
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
            ]
        ],
        'Women' => [
            'gender_keywords' => [
                'women',
                'womens',
                'lady',
                'ladies'
            ],
            'sizes' => [
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
            ]
        ],
        'Children' => [
            'gender_keywords' => [
                'girl',
                'girls',
                'boy',
                'boys',
                'child',
                'children',
                'chld',
                'chd',
                'cld',
                'young',
                'yng'
            ],
            'sizes' => [
                '3.5Y'  => 35.5,
                '4Y'    => 36,
                '4.5Y'  => 36.5,
                '5Y'    => 37.5,
                '5.5Y'  => 38,
                '6Y'    => 38.5,
                '6.5Y'  => 39,
                '7Y'    => 40,
            ]
        ],
    ];
}
