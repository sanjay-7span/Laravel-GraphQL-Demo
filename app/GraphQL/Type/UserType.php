<?php

namespace App\GraphQL\Type;

use GraphQL;
use App\Models\User;
use App\Library\WAHelper;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Type as GraphQLType;

class UserType extends GraphQLType
{
    protected $attributes = [
        'name' => 'user',
        'description' => 'A user',
        'model' => User::class,
    ];

    public function fields(): array
    {
        return [
            'id' => [
                'type' => Type::int(),
                'description' => 'The id of the user',
            ],
            'name' => [
                'type' => Type::string(),
                'description' => 'The name of the user',
            ],
            'email' => [
                'type' => Type::string(),
                'description' => 'The email of user',
            ],
            'token' => [
                'type' => Type::string(),
                'description' => 'The token of user',
            ],
            'mobileNumber' => [
                'type' => Type::string(),
                'alias' => 'mobile_no',
                'description' => 'The mobile number of user',
            ],
        ];
    }
}
