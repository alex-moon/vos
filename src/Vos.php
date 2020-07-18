<?php

namespace Vos;

class Vos
{
    /** @var CelestialObject[] */
    private $objects;

    /**
     * @param string $target
     * @param string $targetValue
     * @param string $targetUnit
     * @throws VosException
     */
    public function run(string $target, string $targetValue, string $targetUnit)
    {
        if (!($target && $targetValue && $targetUnit)) {
            throw new VosException("Missing target or value or unit");
        }

        foreach (DataProvider::all() as $rawObject) {
            list($id, $name, $value, $unit) = $rawObject;
            $size = new Size($value, $unit);
            $this->objects[$id] = new CelestialObject($id, $name, $size);
        }

        if (!array_key_exists($target, $this->objects)) {
            throw new VosException("Invalid target: $target");
        }
        $target = $this->objects[$target];

        $reference = new Size($targetValue, $targetUnit);
        $referenceMultiplier = $target->getSize()->calculateReferenceMultiplier($reference);

        foreach ($this->objects as $object) {
            echo $object->scaled($referenceMultiplier)->pad(100) . "\n";
        }

        echo "\nDone\n";
    }
}
