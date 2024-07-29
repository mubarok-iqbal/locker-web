<?php

namespace App\Enums;

use MyCLabs\Enum\Enum;

/**
 * @method static self EMPTY()
 * @method static self OPEN()
 * @method static self OCCUPIED()
 * @method static self DISABLED()
 * @method static self ERROR()
 * @method static self NOTHING()
 */
class LockerStatusEnum extends Enum
{
    private const EMPTY = 'empty';
    private const OPEN = 'open';
    private const OCCUPIED = 'occupied';
    private const DISABLED = 'disabled';
    private const ERROR = 'error';
    private const NOTHING = 'nothing';

    public function getColor(): string
    {
        switch ($this->getValue()) {
            case self::EMPTY:
                return 'rgb(105, 105, 105)';
            case self::OPEN:
                return 'rgb(3, 255, 0)';
            case self::OCCUPIED:
                return 'rgb(2, 131, 4)';
            case self::DISABLED:
                return 'rgb(122, 4, 122)';
            case self::ERROR:
                return 'rgb(241, 1, 1)';
            case self::NOTHING:
                return 'rgb(0, 0, 0)';
            default:
                throw new \UnexpectedValueException("Invalid status value");
        }
    }

    public static function random(): self
    {
        $values = self::values();
        return $values[array_rand($values)];
    }
}
