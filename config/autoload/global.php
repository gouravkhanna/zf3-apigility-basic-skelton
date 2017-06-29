<?php
return [
    'zf-content-negotiation' => [
        'selectors' => [],
    ],
    'db' => [
        'adapters' => [
            'dummy' => [],
            'db' => [],
        ],
    ],
    'ZfcDatagrid' => [
        'settings' => [
            'default' => [
                'renderer' => [
                    'http' => 'bootstrapTable',
                    'console' => 'zendTable',
                ],
            ],
            'export' => [
                'enabled' => true,
                'papersize' => 'A4',
                'orientation' => 'landscape',
                'formats' => [
                    'PHPExcel' => 'Excel',
                    'tcpdf' => 'PDF',
                ],
                'path' => 'data',
                'mode' => 'direct',
            ],
        ],
        'cache' => [
            'adapter' => [
                'name' => 'Filesystem',
                'options' => [
                    'ttl' => 720000,
                    'cache_dir' => '/tmp',
                ],
            ],
            'plugins' => [
                'exception_handler' => [
                    'throw_exceptions' => false,
                ],
                0 => 'Serializer',
            ],
        ],
        'renderer' => [
            'bootstrapTable' => [
                'parameterNames' => [
                    'method' => 'GET',
                ],
            ],
        ],
    ],
];
