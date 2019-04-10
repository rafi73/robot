<?php

return [

    /*
     * The output path for the generated documentation.
     */
    'output' => 'public/docs',

    /*
     * The router to be used (Laravel or Dingo).
     */
    'router' => 'laravel',

    /*
     * Generate a Postman collection in addition to HTML docs.
     */
    'postman' => [
        /*
         * Specify whether the Postman collection should be generated.
         */
        'enabled' => true,

        /*
         * The name for the exported Postman collection. Default: config('app.name')." API"
         */
        'name' => null,

        /*
         * The description for the exported Postman collection.
         */
        'description' => null,
    ],

    /*
     * The routes for which documentation should be generated.
     * Each group contains rules defining which routes should be included ('match', 'include' and 'exclude' sections)
     * and rules which should be applied to them ('apply' section).
     */
    'routes' => [
        [
            'match' => [
                'domains' => ['*'],
                'prefixes' => ['api/*'],
                'versions' => ['v1'],
            ],
            'include' => ['users.index', 'healthcheck*'],
            'exclude' => ['users.create', 'admin.*'],
            'apply' => [
                'headers' => [
                    'Authorization' => 'Bearer: {token}',
                    'Accept' => 'application/json'
                ],
            ],
        ],
    ],
    'logo' => resource_path('assets') . '/images/logo.png',

    /*
     * Custom logo path. Will be copied during generate command. Set this to false to use the default logo.
     *
     * Change to an absolute path to use your custom logo. For example:
     * 'logo' => resource_path('views') . '/api/logo.png'
     *
     * If you want to use this, please be aware of the following rules:
     * - size: 230 x 52
     */

    /*
     * Configure how responses are transformed using @transformer and @transformerCollection
     * Requires league/fractal package: composer require league/fractal
     *
     * If you are using a custom serializer with league/fractal,
     * you can specify it here.
     *
     * Serializers included with league/fractal:
     * - \League\Fractal\Serializer\ArraySerializer::class
     * - \League\Fractal\Serializer\DataArraySerializer::class
     * - \League\Fractal\Serializer\JsonApiSerializer::class
     *
     * Leave as null to use no serializer or return a simple JSON.
     */
    'fractal' => [
        'serializer' => null,
    ],
];
