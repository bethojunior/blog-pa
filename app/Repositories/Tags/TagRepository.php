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
     * @return \Illuminate\Database\Eloquent\Builder[]|\Illuminate\Database\Eloquent\Collection|\Illuminate\Database\Eloquent\Model[]
     */
    public function findByName(string $name)
    {
        return $this->getModel()
            ::where('name','=',$name)
            ->with('blog')
            ->get();
    }


}
