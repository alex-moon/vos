<?php

namespace Vos;

class CelestialObject
{
    public $id;
    public $name;
    public $size;

    public function __construct(string $id, string $name, Size $size)
    {
        $this->id = $id;
        $this->name = $name;
        $this->size = $size;
    }

    public function getSize(): Size
    {
        return $this->size;
    }

    /**
     * @param number $multiplier
     * @return CelestialObject
     * @throws VosException
     */
    public function scaled($multiplier)
    {
        $size = $this->size->scaled($multiplier)->toFriendly();
        return new self($this->id, $this->name, $size);
    }

    /**
     * @param int $width
     * @return string
     * @throws VosException
     */
    public function pad($width)
    {
        $stringLeft = '[' . $this->id . '] ' . $this->name . " ";
        $stringRight = " " . $this->size;
        $stringLength = strlen($stringLeft) + strlen($stringRight);
        $pad = $width - $stringLength;
        if ($pad < 0) {
            throw new VosException('Width must be larger than ' . $stringLength);
        }
        $pad = str_pad('', $pad, '.');
        return $stringLeft . $pad . $stringRight;
    }
}
