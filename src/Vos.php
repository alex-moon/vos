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
    public function run(string $target, string $targetValue, string $targetUnit): void
    {
        foreach ($this->get($target, $targetValue, $targetUnit) as $result) {
            echo $result->pad(100) . "\n";
        }

        echo "\nDone\n";
    }

    /**
     * @param string $target
     * @param string $targetValue
     * @param string $targetUnit
     * @return CelestialObject[]
     * @throws VosException
     */
    public function get(string $target, string $targetValue, string $targetUnit): array
    {
        if (!($target && $targetValue && $targetUnit)) {
            throw new VosException("Missing target or value or unit");
        }

        foreach (DataProvider::all() as $id => $rawObject) {
            list($name, $sizes) = $rawObject;
            foreach ($sizes as $i => $size) {
                list($key, $value, $unit) = $size;
                $size = new Size($value, $unit);
                if ($i === 0) {
                    $this->objects[$id] = new CelestialObject($id, $name, $size);
                } else {
                    $subId = $id . '-' . $key;
                    $subName = $name . ' (' . $key . ')';
                    $this->objects[$subId] = new CelestialObject($subId, $subName, $size);
                }
            }
        }

        if (!array_key_exists($target, $this->objects)) {
            throw new VosException("Invalid target: $target");
        }
        $target = $this->objects[$target];

        $reference = new Size($targetValue, $targetUnit);
        $referenceMultiplier = $target->getSize()->calculateReferenceMultiplier($reference);

        $result = [];
        foreach ($this->objects as $object) {
            $result[] = $object->scaled($referenceMultiplier);
        }

        return $result;
    }
}
