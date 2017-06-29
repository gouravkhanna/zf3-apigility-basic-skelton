<?php
return [
    'service_manager' => [
        'factories' => [
            \Api\V1\Rest\Test\TestResource::class => \Api\V1\Rest\Test\TestResourceFactory::class,
        ],
    ],
    'router' => [
        'routes' => [
            'api.rest.test' => [
                'type' => 'Segment',
                'options' => [
                    'route' => '/tests[/:test_id]',
                    'defaults' => [
                        'controller' => 'Api\\V1\\Rest\\Test\\Controller',
                    ],
                ],
            ],
        ],
    ],
    'zf-versioning' => [
        'uri' => [
            0 => 'api.rest.test',
        ],
    ],
    'zf-rest' => [
        'Api\\V1\\Rest\\Test\\Controller' => [
            'listener' => \Api\V1\Rest\Test\TestResource::class,
            'route_name' => 'api.rest.test',
            'route_identifier_name' => 'test_id',
            'collection_name' => 'test',
            'entity_http_methods' => [
                0 => 'GET',
                1 => 'PATCH',
                2 => 'PUT',
                3 => 'DELETE',
            ],
            'collection_http_methods' => [
                0 => 'GET',
                1 => 'POST',
            ],
            'collection_query_whitelist' => [],
            'page_size' => 25,
            'page_size_param' => null,
            'entity_class' => \Api\V1\Rest\Test\TestEntity::class,
            'collection_class' => \Api\V1\Rest\Test\TestCollection::class,
            'service_name' => 'test',
        ],
    ],
    'zf-content-negotiation' => [
        'controllers' => [
            'Api\\V1\\Rest\\Test\\Controller' => 'HalJson',
        ],
        'accept_whitelist' => [
            'Api\\V1\\Rest\\Test\\Controller' => [
                0 => 'application/vnd.api.v1+json',
                1 => 'application/hal+json',
                2 => 'application/json',
            ],
        ],
        'content_type_whitelist' => [
            'Api\\V1\\Rest\\Test\\Controller' => [
                0 => 'application/vnd.api.v1+json',
                1 => 'application/json',
            ],
        ],
    ],
    'zf-hal' => [
        'metadata_map' => [
            \Api\V1\Rest\Test\TestEntity::class => [
                'entity_identifier_name' => 'id',
                'route_name' => 'api.rest.test',
                'route_identifier_name' => 'test_id',
                'hydrator' => \DoctrineModule\Stdlib\Hydrator\DoctrineObject::class,
            ],
            \Api\V1\Rest\Test\TestCollection::class => [
                'entity_identifier_name' => 'id',
                'route_name' => 'api.rest.test',
                'route_identifier_name' => 'test_id',
                'is_collection' => true,
            ],
        ],
    ],
];
