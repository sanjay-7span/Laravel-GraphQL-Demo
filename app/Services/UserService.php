<?php

namespace App\Services;

use DB;
use Exception;
use App\Models\User;
use App\Traits\PaginationTrait;

class UserService
{
    private $creditProductId;

    public $relationships;

    use PaginationTrait;

    public function __construct(private User $userObj)
    {
    
    }

    
    public function resource($id, $inputs = null)
    {
        $select = $inputs['select'] ?? '*';
        $user = $this->userObj->select($select);
        if (isset($inputs['with'])) {
            $user = $user->with($inputs['with']);
        }

        return  $user->where('id', $id)->first();
    }

    
}
