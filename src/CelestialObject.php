<?php

namespace Vos;

class CelestialObject
{
    public $id;
    public $name;

    public $width;
    public $length;

    public $distance;
    public $aphelion;
    public $perihelion;

    /**
     * @param string $id
     * @param string $name
     * @param Size[] $sizes
     * @throws VosException
     */
    public function __construct(string $id, string $name, array $sizes)
    {
        $this->id = $id;
        $this->name = $name;
        foreach ($sizes as $key => $size) {
            if (!in_array($key, MeasureEnum::all())) {
                throw new VosException('Unrecognised size key: ' . $key);
            }
            $this->$key = $size;
        }
    }

    /**
     * @param number $multiplier
     * @return CelestialObject
     * @throws VosException
     */
    public function scaled($multiplier)
    {
        $sizes = [];
        foreach (MeasureEnum::all() as $key) {
            if ($this->$key !== null) {
                $sizes[$key] = $this->$key->scaled($multiplier)->toFriendly();
            }
        }
        return new self($this->id, $this->name, $sizes);
    }

    /**
     * @param int $width
     * @return string
     * @throws VosException
     */
    public function pad($width)
    {
        $strings = [];
        foreach (MeasureEnum::all() as $measure) {
            if ($this->$measure !== null) {
                $stringLeft = '[' . $this->id . '.' . $measure . '] ' . $this->name . " (" . $measure . ") ";
                $stringRight = " " . $this->$measure;
                $stringLength = strlen($stringLeft) + strlen($stringRight);
                $pad = $width - $stringLength;
                if ($pad < 0) {
                    throw new VosException('Width must be larger than ' . $stringLength);
                }
                $pad = str_pad('', $pad, '.');
                $strings[] = $stringLeft . $pad . $stringRight;
            }
        }
        return implode("\n", $strings);
    }
}
