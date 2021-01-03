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
     * @return \App\Models\Blog\Blog
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

        return true;
    }

}
