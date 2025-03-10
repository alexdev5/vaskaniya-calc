<?php

namespace App\Resources;

class JsonResource
{
    public static function collection($resources)
    {
        if (!is_array($resources)) {
            $resources = [$resources];
            $isSingleResource = true;
        }

        $result = array_map(function ($resource) {
            $instance = new static();
            foreach ($resource as $property => $value) {
                $instance->$property = static::transform($value);
            }
            return $instance->toArray();
        }, $resources);

        return isset($isSingleResource) && count($result) === 1 ? $result[0] : $result;
    }

    protected static function transform($resource)
    {
        if (is_array($resource)) {
            return json_decode(json_encode($resource), false);
        }
        return $resource;
    }

    public function toArray()
    {
        return get_object_vars($this);
    }

    public function __get($name)
    {
        return $this->$name ?? null;
    }

    public function __isset($name)
    {
        return isset($this->$name);
    }
}
