<?php
namespace task\V1\Rest\SaveData;

class SaveDataResourceFactory
{
    public function __invoke($services)
    {
        return new SaveDataResource();
    }
}
