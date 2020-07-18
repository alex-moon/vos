<?php

namespace Vos;

class CelestialObject
{
    private $id;
    private $name;
    private $size;

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

    public function scaled($multiplier)
    {
        $size = $this->size->scaled($multiplier);
        return new self($this->id, $this->name, $size);
    }

    public function pad($width)
    {
        $stringLeft = '[' . $this->id . '] ' . $this->name . " ";
        $stringRight = " " . $this->size->toFriendly();
        $stringLength = strlen($stringLeft) + strlen($stringRight);
        $pad = $width - $stringLength;
        if ($pad < 0) {
            throw new VosException('Width must be larger than ' . $stringLength);
        }
        $pad = str_pad('', $pad, '.');
        return $stringLeft . $pad . $stringRight;
    }
}
