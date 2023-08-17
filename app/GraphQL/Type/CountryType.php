<?php

namespace App\GraphQL\Type;

use App\Models\Country;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Type as GraphQLType;

class CountryType extends GraphQLType
{
    protected $attributes = [
        'name' => 'country',
        'description' => 'Country',
        'model' => Country::class,
    ];

    public function fields(): array
    {
        return [
            'id' => [
                'type' => Type::id(),
                'description' => 'The id of the country',
            ],
            'name' => [
                'type' => Type::string(),
                'description' => 'The name of the country',
            ],
            'countryCode' => [
                'alias' => 'country_code',
                'type' => Type::string(),
                'description' => 'The code of the country',
            ],
            'regionCode' => [
                'alias' => 'region_code',
                'type' => Type::string(),
                'description' => 'The region code of the country',
            ],
            'iso' => [
                'alias' => 'iso_3166_2',
                'type' => Type::string(),
                'description' => 'The iso code of the country',
            ],
            'flag' => [
                'type' => Type::string(),
                'description' => 'The flag of the country',
            ],
        ];
    }
}
