<?php

namespace App\GraphQL\Query\User;

use Auth;
use Closure;
use Carbon\Carbon;
use App\Services\UserService;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Query;
use GraphQL\Type\Definition\ResolveInfo;
use Rebing\GraphQL\Support\Facades\GraphQL;

class UserQuery extends Query
{
    protected $attributes = [
        'name' => 'User info query',
    ];

    public function __construct(private UserService $userService)
    {
    }

    public function authorize($root, array $args, $ctx, ResolveInfo $resolveInfo = null, Closure $getSelectFields = null): bool
    {
        return true;
    }


    public function type(): Type
    {
        return GraphQL::type('user');
    }

    public function args(): array
    {
        return [
            'id' => [
                'name' => 'id',
                'alias' => 'id',
                'type' => Type::int(),
            ],
        ];
    }

    public function resolve($root, $args, $context, ResolveInfo $resolveInfo, Closure $getSelectFields)
    {
        // dd(Auth::id());die;
        $args['id'] = $args['id'] ?? Auth::id();
        $result = $this->userService->resource($args['id']);
        $result['args'] = $args;

        return $result;
    }
}
