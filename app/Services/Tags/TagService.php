<?php


namespace App\Services\Tags;


use App\Repositories\Tags\TagRepository;

class TagService
{

    private $repository;

    /**
     * TagService constructor.
     * @param TagRepository $tagRepository
     */
    public function __construct(TagRepository $tagRepository)
    {
        $this->repository = $tagRepository;
    }

    /**
     * @param string $name
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function findByName(string $name)
    {
        return $this->repository
            ->findByName($name);
    }

}
