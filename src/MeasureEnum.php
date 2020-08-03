<?php

namespace Vos;

class MeasureEnum
{
    const SIZE_WIDTH = 'width';
    const SIZE_LENGTH = 'length';
    const SIZE_DISTANCE = 'distance';
    const SIZE_APHELION = 'aphelion';
    const SIZE_PERIHELION = 'perihelion';

    /**
     * @return string[]
     */
    public static function all(): array
    {
        return [
            self::SIZE_WIDTH,
            self::SIZE_LENGTH,
            self::SIZE_DISTANCE,
            self::SIZE_APHELION,
            self::SIZE_PERIHELION,
        ];
    }
}
