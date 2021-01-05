<?php


namespace App\Services\Blog;

use App\Models\Blog\Blog;
use App\Models\Tag\Tag;
use App\Repositories\Blog\BlogRepository;
use App\Repositories\Tags\TagRepository;

class BlogService
{

    private $repository;
    private $tagRepository;

    /**
     * BlogService constructor.
     * @param BlogRepository $blogRepository
     * @param TagRepository $tagRepository
     */
    public function __construct(BlogRepository $blogRepository , TagRepository $tagRepository)
    {
        $this->repository = $blogRepository;
        $this->tagRepository = $tagRepository;
    }

    /**
     * @param array $data
     * @return \Illuminate\Database\Eloquent\Builder[]|\Illuminate\Database\Eloquent\Collection|\Illuminate\Database\Eloquent\Model[]
     * @throws \Exception
     */
    public function create(array $data)
    {
        try{
            $blog = new Blog($data);
            $blog->save();

            foreach ($data['tags'] as $tags){
                $timeline = new Tag([
                    'name' => $tags,
                    'blog_id' => $blog->id
                ]);
                $timeline->save();
            }
        }catch (\Exception $exception){
            Throw new \Exception($exception->getMessage());
        }

        return $this->findById($blog->id);
    }

    /**
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function findAll()
    {
        return $this->repository
            ->findAll();
    }

    /**
     * @param int $id
     * @return \Illuminate\Database\Eloquent\Builder[]|\Illuminate\Database\Eloquent\Collection|\Illuminate\Database\Eloquent\Model[]
     */
    public function findById(int $id)
    {
        return $this->repository
            ->findById($id);
    }

}
