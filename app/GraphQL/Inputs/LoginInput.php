<?php

namespace App\GraphQL\Inputs;

use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\InputType;

class LoginInput extends InputType
{
    protected $attributes = [
        'name' => 'loginInput',
        'description' => 'Login Input',
    ];

    public function fields(): array
    {
        return [
            'email' => [
                'type' => Type::string(),
                'rules' => 'required',
            ],
            'password' => [
                'type' => Type::string(),
                'rules' => 'required',
            ],
        ];
    }
}
