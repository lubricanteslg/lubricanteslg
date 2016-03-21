<?php

return [
    /*
     |--------------------------------------------------------------------------
     | Laravel CORS
     |--------------------------------------------------------------------------
     |

     | allowedOrigins, allowedHeaders and allowedMethods can be set to array('*')
     | to accept any value.
     |
     */
    'supportsCredentials' => false,
    'allowedOrigins' => array('*'),
    'allowedHeaders' => array('*'),
    'allowedMethods' => array('*'),
    'exposedHeaders' => [],
    'maxAge' => 0,
    'hosts' => [],
];
