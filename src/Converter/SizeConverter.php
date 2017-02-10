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
                            if($this->keywordSearch(strtolower($gender), $genderCategory['gender_keywords'])) {
                                if(isset($genderCategory['sizes'][$size])) {
                                    return $genderCategory['sizes'][$size];
                                } else return '';
                            }
                        }
                        return '';
                }
                return '';
            case 'eu':
                switch($this->to) {
                    case 'us':
                        foreach($this->usTable as $genderCategory) {
                            if($this->keywordSearch(strtolower($gender), $genderCategory['gender_keywords'])) {
                                $size = array_search($size, @$genderCategory['sizes']);
                                return $size ? $size : '';
                            }
                        }
                        return '';
                    case 'eu':
                        return $size;
                }
                return '';
        }
        return '';
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
                '4'     => '36',
                '4.5'   => '36.5',
                '5'     => '37.5',
                '5.5'   => '38',
                '6'     => '38.5',
                '6.5'   => '39',
                '7'     => '40',
                '7.5'   => '40.5',
                '8'     => '41',
                '8.5'   => '42',
                '9'     => '42.5',
                '9.5'   => '43',
                '10'    => '44',
                '10.5'  => '44.5',
                '11'    => '45',
                '11.5'  => '45.5',
                '12'    => '46',
                '12.5'  => '47',
                '13'    => '47.5',
                '13.5'  => '48',
                '14'    => '48.5',
                '15'    => '49',
                '16'    => '49.5',
                '17'    => '50',
                '18'    => '50.5',
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
                '4'     => '34.5',
                '4.5'   => '35',
                '5'     => '35.5',
                '5.5'   => '36',
                '6'     => '36.5',
                '6.5'   => '37.5',
                '7'     => '38',
                '7.5'   => '38.5',
                '8'     => '39',
                '8.5'   => '40',
                '9'     => '40.5',
                '9.5'   => '41',
                '10'    => '42',
                '10.5'  => '42.5',
                '11'    => '43',
            ]
        ],
        'Children' => [
            'gender_keywords' => [
                'kids',
                'kid',
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
                'youth',
                'yng'
            ],
            'sizes' => [
                '0C' => '15',
                '1C' => '16',
                '2C' => '17',
                '2.5C' => '17.5',
                '3C' => '18',
                '3.5C' => '18.5',
                '4C' => '19',
                '4.5C' => '19.5',
                '5C' => '20',
                '5.5C' => '21.5',
                '6C' => '22',
                '6.5C' => '22.5',
                '7C' => '23.5',
                '7.5C' => '24',
                '8C' => '25',
                '8.5C' => '25.5',
                '9C' => '26',
                '9.5C' => '26.5',
                '10C' => '27',
                '10.5C' => '27.5',
                '11C' => '28',
                '11.5C' => '28.5',
                '12C' => '29',
                '12.5C' => '29.5',
                '13C' => '31',
                '13.5C' => '31.5',
                '11Y'  => '28',
                '11.5Y'  => '28.5',
                '12Y'  => '29',
                '12.5Y'  => '29.5',
                '13Y'  => '31',
                '13.5Y'  => '31.5',
                '1Y'  => '32',
                '1.5Y'  => '33',
                '2Y'  => '33.5',
                '2.5Y'  => '34',
                '3Y'  => '35',
                '3.5Y'  => '35.5',
                '4Y'    => '36',
                '4.5Y'  => '36.5',
                '5Y'    => '37.5',
                '5.5Y'  => '38',
                '6Y'    => '38.5',
                '6.5Y'  => '39',
                '7Y'    => '40',
            ]
        ],
    ];
}
