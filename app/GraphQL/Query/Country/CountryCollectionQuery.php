<?php

namespace App\GraphQL\Query\Country;

use Closure;
use App\Models\Country;
use App\Services\CountryService;
use App\Traits\SelectFieldTrait;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Query;
use GraphQL\Type\Definition\ResolveInfo;
use Rebing\GraphQL\Support\Facades\GraphQL;

class CountryCollectionQuery extends Query
{
    use SelectFieldTrait;

    protected $attributes = [
        'name' => 'Country query',
    ];

    public function __construct(private CountryService $countryService)
    {
    }

    public function type(): Type
    {
        return GraphQL::paginate('country', 'Countries');
    }

    public function args(): array
    {
        return [
            'perPage' => [
                'name' => 'perPage',
                'alias' => 'limit',
                'type' => Type::int(),
            ],
            'page' => [
                'name' => 'page',
                'type' => Type::int(),
            ],
            'search' => [
                'name' => 'search',
                'type' => Type::string(),
            ],
        ];
    }

    public function resolve($root, $args, $context, ResolveInfo $resolveInfo, Closure $getSelectFields)
    {
        $fields = $getSelectFields();
        $args['select'] = $fields->getSelect();
       
        return $this->countryService->collection($args);
    }
}
