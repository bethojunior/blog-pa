<?php


namespace App\Repositories\Blog;


use App\Contracts\Repository\AbstractRepository;
use App\Models\Blog\Blog;
use Illuminate\Support\Facades\DB;

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
     * @param $request
     * @return Blog
     * @throws \Exception
     */
    public function insert($request)
    {
        try{
            DB::beginTransaction();

            DB::commit();

        }catch (\Exception $exception){
            DB::rollBack();
            throw $exception;
        }

        return $timeline;
    }

}
