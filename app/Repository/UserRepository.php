<?php

namespace App\Repository;

use App\Interfaces\IUserRepository;
use App\Models\User;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;

class UserRepository extends BaseRepository
{
    public $model;
    public function __construct(User $model)
    {
        $this->model = $model;
    }
    public function findUser($id) :Collection
    {
        return $this->model->findOrFail($id);
    }

    // public function paginate($page): Request
    // {
    //     return $this->model->paginate($page);
    // }

    // public function create($data) : Collection
    // {
    //     return $this->model->create($data);
    // }
}
