<?php
return [
    'service_manager' => [
        'factories' => [
            \University\V1\Rest\University\UniversityResource::class => \University\V1\Rest\University\UniversityResourceFactory::class,
            \University\V1\Rest\Faculty\FacultyResource::class => \University\V1\Rest\Faculty\FacultyResourceFactory::class,
            \University\V1\Rest\Major\MajorResource::class => \University\V1\Rest\Major\MajorResourceFactory::class,
            \University\V1\Rest\Room\RoomResource::class => \University\V1\Rest\Room\RoomResourceFactory::class,
        ],
        'abstract_factories' => [
            0 => \University\Mapper\AbstractMapperFactory::class,
        ],
    ],
    'router' => [
        'routes' => [
            'university.rest.university' => [
                'type' => 'Segment',
                'options' => [
                    'route' => '/api/v1/university[/:uuid]',
                    'defaults' => [
                        'controller' => 'University\\V1\\Rest\\University\\Controller',
                    ],
                ],
            ],
            'university.rest.faculty' => [
                'type' => 'Segment',
                'options' => [
                    'route' => '/api/v1/faculty[/:uuid]',
                    'defaults' => [
                        'controller' => 'University\\V1\\Rest\\Faculty\\Controller',
                    ],
                ],
            ],
            'university.rest.major' => [
                'type' => 'Segment',
                'options' => [
                    'route' => '/api/v1/major[/:uuid]',
                    'defaults' => [
                        'controller' => 'University\\V1\\Rest\\Major\\Controller',
                    ],
                ],
            ],
            'university.rest.room' => [
                'type' => 'Segment',
                'options' => [
                    'route' => '/api/v1/room[/:uuid]',
                    'defaults' => [
                        'controller' => 'University\\V1\\Rest\\Room\\Controller',
                    ],
                ],
            ],
        ],
    ],
    'zf-versioning' => [
        'uri' => [
            0 => 'university.rest.university',
            1 => 'university.rest.faculty',
            2 => 'university.rest.major',
            3 => 'university.rest.room',
        ],
    ],
    'zf-rest' => [
        'University\\V1\\Rest\\University\\Controller' => [
            'listener' => \University\V1\Rest\University\UniversityResource::class,
            'route_name' => 'university.rest.university',
            'route_identifier_name' => 'uuid',
            'collection_name' => 'university',
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
            'entity_class' => 'University\\Entity\\University',
            'collection_class' => \University\V1\Rest\University\UniversityCollection::class,
            'service_name' => 'University',
        ],
        'University\\V1\\Rest\\Faculty\\Controller' => [
            'listener' => \University\V1\Rest\Faculty\FacultyResource::class,
            'route_name' => 'university.rest.faculty',
            'route_identifier_name' => 'uuid',
            'collection_name' => 'faculty',
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
            'entity_class' => 'University\\Entity\\Faculty',
            'collection_class' => \University\V1\Rest\Faculty\FacultyCollection::class,
            'service_name' => 'Faculty',
        ],
        'University\\V1\\Rest\\Major\\Controller' => [
            'listener' => \University\V1\Rest\Major\MajorResource::class,
            'route_name' => 'university.rest.major',
            'route_identifier_name' => 'uuid',
            'collection_name' => 'major',
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
            'entity_class' => 'University\\Entity\\Major',
            'collection_class' => \University\V1\Rest\Major\MajorCollection::class,
            'service_name' => 'Major',
        ],
        'University\\V1\\Rest\\Room\\Controller' => [
            'listener' => \University\V1\Rest\Room\RoomResource::class,
            'route_name' => 'university.rest.room',
            'route_identifier_name' => 'uuid',
            'collection_name' => 'room',
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
            'entity_class' => 'University\\Room\\RoomEntity',
            'collection_class' => \University\V1\Rest\Room\RoomCollection::class,
            'service_name' => 'Room',
        ],
    ],
    'zf-content-negotiation' => [
        'controllers' => [
            'University\\V1\\Rest\\University\\Controller' => 'HalJson',
            'University\\V1\\Rest\\Faculty\\Controller' => 'HalJson',
            'University\\V1\\Rest\\Major\\Controller' => 'HalJson',
            'University\\V1\\Rest\\Room\\Controller' => 'HalJson',
        ],
        'accept_whitelist' => [
            'University\\V1\\Rest\\University\\Controller' => [
                0 => 'application/hal+json',
                1 => 'application/json',
                2 => 'multipart/form-data',
            ],
            'University\\V1\\Rest\\Faculty\\Controller' => [
                0 => 'application/hal+json',
                1 => 'application/json',
                2 => 'multipart/form-data',
            ],
            'University\\V1\\Rest\\Major\\Controller' => [
                0 => 'application/hal+json',
                1 => 'application/json',
                2 => 'multipart/form-data',
            ],
            'University\\V1\\Rest\\Room\\Controller' => [
                0 => 'application/hal+json',
                1 => 'application/json',
                2 => 'multipart/form-data',
            ],
        ],
        'content_type_whitelist' => [
            'University\\V1\\Rest\\University\\Controller' => [
                0 => 'application/json',
                1 => 'multipart/form-data',
            ],
            'University\\V1\\Rest\\Faculty\\Controller' => [
                0 => 'application/json',
                1 => 'multipart/form-data',
            ],
            'University\\V1\\Rest\\Major\\Controller' => [
                0 => 'application/json',
                1 => 'multipart/form-data',
            ],
            'University\\V1\\Rest\\Room\\Controller' => [
                0 => 'application/json',
                1 => 'multipart/form-data',
            ],
        ],
    ],
    'zf-hal' => [
        'metadata_map' => [
            \University\V1\Rest\University\UniversityEntity::class => [
                'entity_identifier_name' => 'uuid',
                'route_name' => 'university.rest.university',
                'route_identifier_name' => 'uuid',
                'hydrator' => \Zend\Hydrator\ArraySerializable::class,
            ],
            \University\V1\Rest\University\UniversityCollection::class => [
                'entity_identifier_name' => 'uuid',
                'route_name' => 'university.rest.university',
                'route_identifier_name' => 'uuid',
                'is_collection' => true,
            ],
            \University\V1\Rest\Faculty\FacultyEntity::class => [
                'entity_identifier_name' => 'id',
                'route_name' => 'university.rest.faculty',
                'route_identifier_name' => 'faculty_id',
                'hydrator' => \Zend\Hydrator\ArraySerializable::class,
            ],
            \University\V1\Rest\Faculty\FacultyCollection::class => [
                'entity_identifier_name' => 'id',
                'route_name' => 'university.rest.faculty',
                'route_identifier_name' => 'faculty_id',
                'is_collection' => true,
            ],
            \University\V1\Rest\Major\MajorEntity::class => [
                'entity_identifier_name' => 'uuid',
                'route_name' => 'university.rest.major',
                'route_identifier_name' => 'uuid',
                'hydrator' => \Zend\Hydrator\ArraySerializable::class,
            ],
            \University\V1\Rest\Major\MajorCollection::class => [
                'entity_identifier_name' => 'uuid',
                'route_name' => 'university.rest.major',
                'route_identifier_name' => 'uuid',
                'is_collection' => true,
            ],
            'University\\Entity\\University' => [
                'entity_identifier_name' => 'uuid',
                'route_name' => 'university.rest.university',
                'route_identifier_name' => 'uuid',
                'hydrator' => \Zend\Hydrator\ArraySerializable::class,
            ],
            'University\\Entity\\Faculty' => [
                'entity_identifier_name' => 'uuid',
                'route_name' => 'university.rest.faculty',
                'route_identifier_name' => 'uuid',
                'hydrator' => \Zend\Hydrator\ArraySerializable::class,
            ],
            'University\\Entity\\Major' => [
                'entity_identifier_name' => 'uuid',
                'route_name' => 'university.rest.major',
                'route_identifier_name' => 'uuid',
                'hydrator' => \Zend\Hydrator\ArraySerializable::class,
            ],
            \University\V1\Rest\Room\RoomEntity::class => [
                'entity_identifier_name' => 'id',
                'route_name' => 'university.rest.room',
                'route_identifier_name' => 'room_id',
                'hydrator' => \Zend\Hydrator\ArraySerializable::class,
            ],
            \University\V1\Rest\Room\RoomCollection::class => [
                'entity_identifier_name' => 'uuid',
                'route_name' => 'university.rest.room',
                'route_identifier_name' => 'room_id',
                'is_collection' => true,
            ],
            'University\\Room\\RoomEntity' => [
                'entity_identifier_name' => 'uuid',
                'route_name' => 'university.rest.room',
                'route_identifier_name' => 'uuid',
                'hydrator' => \Zend\Hydrator\ArraySerializable::class,
            ],
        ],
    ],
    'zf-content-validation' => [
        'University\\V1\\Rest\\University\\Controller' => [
            'input_filter' => 'University\\V1\\Rest\\University\\Validator',
        ],
        'University\\V1\\Rest\\Faculty\\Controller' => [
            'input_filter' => 'University\\V1\\Rest\\Faculty\\Validator',
        ],
        'University\\V1\\Rest\\Major\\Controller' => [
            'input_filter' => 'University\\V1\\Rest\\Major\\Validator',
        ],
        'University\\V1\\Rest\\Room\\Controller' => [
            'input_filter' => 'University\\V1\\Rest\\Room\\Validator',
        ],
    ],
    'input_filter_specs' => [
        'University\\V1\\Rest\\University\\Validator' => [
            0 => [
                'required' => true,
                'validators' => [],
                'filters' => [],
                'name' => 'name',
            ],
            1 => [
                'required' => false,
                'validators' => [],
                'filters' => [],
                'name' => 'address',
            ],
            2 => [
                'required' => false,
                'validators' => [
                    0 => [
                        'name' => \Zend\Validator\File\MimeType::class,
                        'options' => [
                            'mimeType' => 'image/png, image/jpeg',
                            'message' => 'File type extension not match',
                        ],
                    ],
                    1 => [
                        'name' => \Zend\Validator\File\Extension::class,
                        'options' => [
                            'extension' => 'png, jpg, jpeg',
                            'message' => 'File extension not match',
                        ],
                    ],
                ],
                'filters' => [
                    0 => [
                        'name' => \Zend\Filter\File\RenameUpload::class,
                        'options' => [
                            'randomize' => true,
                            'target' => 'data/photo/university/logo',
                            'use_upload_extension' => true,
                        ],
                    ],
                ],
                'name' => 'logo',
            ],
            3 => [
                'required' => false,
                'validators' => [],
                'filters' => [],
                'name' => 'description',
            ],
        ],
        'University\\V1\\Rest\\Faculty\\Validator' => [
            0 => [
                'required' => true,
                'validators' => [],
                'filters' => [],
                'name' => 'name',
            ],
            1 => [
                'required' => true,
                'validators' => [],
                'filters' => [],
                'name' => 'university',
            ],
            2 => [
                'required' => false,
                'validators' => [],
                'filters' => [],
                'name' => 'description',
            ],
        ],
        'University\\V1\\Rest\\Major\\Validator' => [
            0 => [
                'required' => true,
                'validators' => [],
                'filters' => [],
                'name' => 'name',
            ],
            1 => [
                'required' => true,
                'validators' => [],
                'filters' => [],
                'name' => 'faculty',
            ],
            2 => [
                'required' => false,
                'validators' => [],
                'filters' => [],
                'name' => 'description',
            ],
        ],
        'University\\V1\\Rest\\Room\\Validator' => [
            0 => [
                'required' => true,
                'validators' => [],
                'filters' => [],
                'name' => 'major',
            ],
            1 => [
                'required' => true,
                'validators' => [],
                'filters' => [],
                'name' => 'code',
            ],
            2 => [
                'required' => true,
                'validators' => [],
                'filters' => [],
                'name' => 'isClassroom',
            ],
        ],
    ],
    'zf-mvc-auth' => [
        'authorization' => [
            'University\\V1\\Rest\\University\\Controller' => [
                'collection' => [
                    'GET' => true,
                    'POST' => true,
                    'PUT' => false,
                    'PATCH' => false,
                    'DELETE' => false,
                ],
                'entity' => [
                    'GET' => true,
                    'POST' => false,
                    'PUT' => true,
                    'PATCH' => true,
                    'DELETE' => true,
                ],
            ],
            'University\\V1\\Rest\\Faculty\\Controller' => [
                'collection' => [
                    'GET' => true,
                    'POST' => true,
                    'PUT' => false,
                    'PATCH' => false,
                    'DELETE' => false,
                ],
                'entity' => [
                    'GET' => true,
                    'POST' => false,
                    'PUT' => true,
                    'PATCH' => true,
                    'DELETE' => true,
                ],
            ],
            'University\\V1\\Rest\\Major\\Controller' => [
                'collection' => [
                    'GET' => true,
                    'POST' => true,
                    'PUT' => false,
                    'PATCH' => false,
                    'DELETE' => false,
                ],
                'entity' => [
                    'GET' => true,
                    'POST' => false,
                    'PUT' => true,
                    'PATCH' => true,
                    'DELETE' => true,
                ],
            ],
        ],
    ],
];
