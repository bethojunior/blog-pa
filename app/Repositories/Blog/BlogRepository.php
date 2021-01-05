<?php


namespace App\Repositories\Blog;


use App\Contracts\Repository\AbstractRepository;
use App\Models\Blog\Blog;

class BlogRepository extends AbstractRepository
{
    /**
     * BlogRepository constructor.
     */
    public function __construct()
    {
        $this->setModel(Blog::class);
    }

    /**
     * @param int $id
     * @return \Illuminate\Database\Eloquent\Builder[]|\Illuminate\Database\Eloquent\Collection|\Illuminate\Database\Eloquent\Model[]
     */
    public function findById(int $id)
    {
        return $this->getModel()
            ::where('id','=',$id)
            ->with('tags')
            ->get();
    }

    /**
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function findAll()
    {
        return $this->getModel()
            ::with('tags')
            ->orderByDesc('id')
            ->paginate(10);
    }
}
