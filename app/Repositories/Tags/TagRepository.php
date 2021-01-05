<?php


namespace App\Repositories\Tags;


use App\Contracts\Repository\AbstractRepository;
use App\Models\Tag\Tag;

class TagRepository extends AbstractRepository
{
    /**
     * TagRepository constructor.
     */
    public function __construct()
    {
        $this->setModel(Tag::class);
    }

    /**
     * @param string $name
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function findByName(string $name)
    {
        return $this->getModel()
            ::where('name','=',$name)
            ->with('blog')
            ->paginate(10);
    }


}
