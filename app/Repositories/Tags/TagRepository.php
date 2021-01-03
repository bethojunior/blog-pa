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

}
