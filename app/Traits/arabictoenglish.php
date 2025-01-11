<?php
// ModifyDataTrait.php

namespace App\Traits;

trait arabictoenglish
{
    /**
     * Modify the data passed from the controller.
     *
     * @param array $data
     * @return array
     */
    public function modifyData($string) {
        return strtr($string, array('۰'=>'0', '۱'=>'1', '۲'=>'2', '۳'=>'3', '۴'=>'4', '۵'=>'5', '۶'=>'6', '۷'=>'7', '۸'=>'8', '۹'=>'9', '٠'=>'0', '١'=>'1', '٢'=>'2', '٣'=>'3', '٤'=>'4', '٥'=>'5', '٦'=>'6', '٧'=>'7', '٨'=>'8', '٩'=>'9'));
    }
}
