<?php

namespace App\Domain\Users\Repositories;

use App\Domain\Users\Entities\User;
use Spatie\QueryBuilder\QueryBuilder;
use App\Infrastructure\Abstracts\EloquentRepository;
use App\Domain\Users\Contracts\UserRepositoryInterface;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class UserRepository extends EloquentRepository implements UserRepositoryInterface
{
    private string $defaultSort = '-created_at';

    private array $defaultSelect = [
        'id',
        'email',
        'name',
        'created_at',
        'updated_at',
    ];

    private array $allowedFilters = [
       
    ];

    private array $allowedSorts = [
        'updated_at',
        'created_at',
    ];

    private array $allowedIncludes = [
      
    ];

    public function __construct(User $user)
    {
        parent::__construct($user);
    }

    public function findByFilters(): LengthAwarePaginator
    {
        $perPage = (int)request()->get('limit', 10);
        $perPage = $perPage >= 1 && $perPage <= 100 ? $perPage : 20;

        return QueryBuilder::for(User::class)
            ->select($this->defaultSelect)
            ->allowedFilters($this->allowedFilters)
            ->allowedIncludes($this->allowedIncludes)
            ->allowedSorts($this->allowedSorts)
            ->defaultSort($this->defaultSort)
            ->paginate($perPage);
    }
}