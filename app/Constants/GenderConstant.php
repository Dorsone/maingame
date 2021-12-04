<?php

namespace App\Constants;

/**
 * Class GenderConstant
 * @package App\Constants
 */
class GenderConstant
{
    /** @var string Male */
    const MALE = "male";

    /** @var string Female */
    const FEMALE = "female";

    /**
     * Returns gender list
     * @return array
     */
    public static function genderList()
    {
        return [
            self::MALE,
            self::FEMALE,
        ];
    }

    /**
     * Returns gender list with translations
     * @return array
     */
    public static function translateList()
    {
        return [
            self::MALE => __("Мужской"),
            self::FEMALE => __("Женский"),
        ];
    }
}