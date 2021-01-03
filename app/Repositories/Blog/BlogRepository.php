<?php


namespace App\Repositories\Blog;


use App\Contracts\Repository\AbstractRepository;
use App\Models\Blog\Blog;
use Illuminate\Support\Facades\DB;
use PhpParser\Node\Expr\Cast\Int_;

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
}
