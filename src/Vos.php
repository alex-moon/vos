<?php

namespace Vos;

class Vos
{
    /** @var CelestialObject[] */
    private $objects;

    /**
     * @param string $target
     * @param string $measure
     * @param string $targetValue
     * @param string $targetUnit
     * @throws VosException
     */
    public function run(string $target, string $measure, string $targetValue, string $targetUnit): void
    {
        foreach ($this->get($target, $measure, $targetValue, $targetUnit) as $result) {
            echo $result->pad(100) . "\n";
        }

        echo "\nDone\n";
    }

    /**
     * @param string $target
     * @param string $measure
     * @param string $targetValue
     * @param string $targetUnit
     * @return CelestialObject[]
     * @throws VosException
     */
    public function get(string $target, string $measure, string $targetValue, string $targetUnit): array
    {
        if (!($target && $targetValue && $targetUnit)) {
            throw new VosException("Missing target or value or unit");
        }

        foreach (DataProvider::all() as $id => $rawObject) {
            list($name, $sizes) = $rawObject;
            $objectSizes = [];
            $subId = null;
            $subName = null;
            foreach ($sizes as $key => $size) {
                list($value, $unit) = $size;
                $size = new Size($value, $unit);
                $objectSizes[$key] = $size;
            }
            $this->objects[$id] = new CelestialObject($id, $name, $objectSizes);
        }

        if (!array_key_exists($target, $this->objects)) {
            throw new VosException("Invalid target: $target");
        }
        if (!in_array($measure, MeasureEnum::all())) {
            throw new VosException("Invalid size key: $measure");
        }
        /** @var Size $targetSize */
        $targetSize = $this->objects[$target]->$measure;

        $reference = new Size($targetValue, $targetUnit);
        $referenceMultiplier = $targetSize->calculateReferenceMultiplier($reference);

        $result = [];
        foreach ($this->objects as $object) {
            $result[] = $object->scaled($referenceMultiplier);
        }

        return $result;
    }

    /**
     * @param $url
     * @throws VosException
     */
    public function html($url): void
    {
        $controller = new HtmlController($this);
        $controller->handle($url);
    }

    public function json($url): void
    {
        $controller = new JsonController($this);
        $controller->handle($url);
    }
}
