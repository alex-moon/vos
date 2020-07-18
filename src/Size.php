<?php

namespace Vos;

class Size
{
    const UNIT_MM = 'mm';
    const UNIT_M = 'm';
    const UNIT_KM = 'km';
    const UNIT_AU = 'au';
    const UNIT_LY = 'ly';
    const UNIT_PC = 'pc';
    const UNIT_MPC = 'mpc';

    static $units = [
        self::UNIT_MM,
        self::UNIT_M,
        self::UNIT_KM,
        self::UNIT_AU,
        self::UNIT_LY,
        self::UNIT_PC,
        self::UNIT_MPC,
    ];

    private $value;
    private $unit;

    private function getConversions(string $unit)
    {
        return [
            self::UNIT_MM => [
                self::UNIT_MM => 1,
                self::UNIT_M => 1e3,
                self::UNIT_KM => 1e6,
                self::UNIT_AU => 1.496e14,
                self::UNIT_LY => 9.461e18,
                self::UNIT_PC => 3.086e19,
                self::UNIT_MPC => 3.086e25,
            ],
            self::UNIT_M => [
                self::UNIT_MM => 1e-3,
                self::UNIT_M => 1,
                self::UNIT_KM => 1e3,
                self::UNIT_AU => 1.496e11,
                self::UNIT_LY => 9.461e15,
                self::UNIT_PC => 3.086e16,
                self::UNIT_MPC => 3.086e12,
            ],
            self::UNIT_KM => [
                self::UNIT_MM => 1e-6,
                self::UNIT_M => 1e-3,
                self::UNIT_KM => 1,
                self::UNIT_AU => 1.496e8,
                self::UNIT_LY => 9.461e12,
                self::UNIT_PC => 3.086e13,
                self::UNIT_MPC => 3.086e19,
            ],
            self::UNIT_AU => [
                self::UNIT_MM => 6.68459e-15,
                self::UNIT_M => 6.68459e-12,
                self::UNIT_KM => 6.68459e-9,
                self::UNIT_AU => 1,
                self::UNIT_LY => 63241.1,
                self::UNIT_PC => 2.06264e5,
                self::UNIT_MPC => 2.06264e11,
            ],
            self::UNIT_LY => [
                self::UNIT_MM => 1.057e-19,
                self::UNIT_M => 1.057e-16,
                self::UNIT_KM => 1.057e-13,
                self::UNIT_AU => 1.58125e-5,
                self::UNIT_LY => 1,
                self::UNIT_PC => 3.26156,
                self::UNIT_MPC => 3.26156e6,
            ],
            self::UNIT_PC => [
                self::UNIT_MM => 3.24078e-20,
                self::UNIT_M => 3.24078e-17,
                self::UNIT_KM => 3.24078e-14,
                self::UNIT_AU => 4.84814e-6,
                self::UNIT_LY => 0.306601,
                self::UNIT_PC => 1,
                self::UNIT_MPC => 1e6,
            ],
            self::UNIT_MPC => [
                self::UNIT_MM => 3.24078e-26,
                self::UNIT_M => 3.24078e-23,
                self::UNIT_KM => 3.24078e-20,
                self::UNIT_AU => 4.84814e-12,
                self::UNIT_LY => 0.306601e-6,
                self::UNIT_PC => 1e-6,
                self::UNIT_MPC => 1,
            ],
        ][$unit];
    }

    /**
     * @param $value
     * @param string $unit
     * @throws VosException
     */
    public function __construct($value, string $unit)
    {
        if (!in_array($unit, self::$units)) {
            throw new VosException('Unrecognised unit "' . $unit . '"');
        }
        $this->value = $value;
        $this->unit = $unit;
    }

    /**
     * @param string $unit
     * @return Size
     * @throws VosException
     */
    public function to(string $unit): Size
    {
        $value = $this->value / $this->getConversionMultiplier($unit);
        return new self($value, $unit);
    }

    /**
     * Return a size with the most "human" value
     * @return Size
     * @throws VosException
     */
    public function toFriendly(): Size
    {
        $bestExponent = null;
        $bestUnit = null;
        $bestValue = null;
        foreach ($this->getConversions($this->unit) as $unit => $multiplier) {
            $value = $this->value / $multiplier;
            $exponent = log10($value);
            if ($bestExponent === null || abs($exponent) < $bestExponent) {
                $bestExponent = $exponent;
                $bestUnit = $unit;
                $bestValue = $value;
            }
        }
        return new self($bestValue, $bestUnit);
    }

    public function calculateReferenceMultiplier(Size $targetSize)
    {
        $sizeInTargetUnit = $this->to($targetSize->getUnit());
        return $targetSize->getValue() / $sizeInTargetUnit->getValue();
    }

    /**
     * @param float $multiplier
     * @return Size
     * @throws VosException
     */
    public function scaled(float $multiplier)
    {
        return new self($this->value * $multiplier, $this->unit);
    }

    public function getValue(): float
    {
        return $this->value;
    }

    public function getUnit(): string
    {
        return $this->unit;
    }

    private function getConversionMultiplier(string $unit): float
    {
        return $this->getConversions($this->unit)[$unit];
    }

    public function __toString(): string
    {
        return round($this->value, 4) . ' ' . $this->unit;
    }
}
