<?php

namespace App\GraphQL\Type;

use GraphQL;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Type as GraphQLType;

class PostLoginType extends GraphQLType
{
    protected $attributes = [
        'name' => 'postLogin',
        'description' => 'PostLogin',
    ];

    public function fields(): array
    {
        return [
            'user' => [
                'type' => GraphQL::type('user'),
                'description' => 'The user',
            ],
            'token' => [
                'type' => Type::string(),
                'description' => 'The logged in token of user',
            ],
        ];
    }
}
