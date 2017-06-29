<?php
namespace Api\V1\Rest\Test;

class TestResourceFactory
{
    public function __invoke($services)
    {
        return new TestResource($services);
    }
}
