<?php


namespace App\Http\Controllers\Blog;


use App\Http\Controllers\Controller;
use App\Http\Responses\ApiResponse;
use App\Services\Blog\BlogService;
use App\Services\Tags\TagService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class BlogController extends Controller
{

    private $service;
    private $tagService;

    /**
     * BlogController constructor.
     * @param BlogService $blogService
     * @param TagService $tagService
     */
    public function __construct(BlogService $blogService , TagService $tagService)
    {
        $this->service = $blogService;
        $this->tagService = $tagService;
    }

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function list(Request $request)
    {
        $data = $request->all();

        if(isset($data['tag']))
            return $this->findByTag($data['tag']);

        try{
            $list = $this->service
                ->findAll();
        }catch (\Exception $exception){
            return ApiResponse::error('',$exception->getMessage());
        }
        return ApiResponse::success($list,'Listagem de posts');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function create(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title'   => 'required',
            'authot'  => 'required',
            'content' => 'required',
            'tags'    => 'required'
        ]);

        if ($validator->fails())
            return ApiResponse::error('',$validator->messages()->first());

        try{
            $create = $this->service
                ->create($request->all());
        }catch (\Exception $exception){
            return ApiResponse::error('',$exception->getMessage());
        }
        return ApiResponse::success($create,'Post inserido com sucesso');
    }

    /**
     * @param string $name
     * @return \Illuminate\Http\JsonResponse
     */
    public function findByTag(string $name)
    {
        try{
            $find = $this->tagService
                ->findByName($name);
        }catch (\Exception $exception){
            return ApiResponse::error('',$exception->getMessage());
        }
        return ApiResponse::success($find,'Listagem de post por tag');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(int $id)
    {
        try{
            $response = $this->service
                ->delete($id);
        }catch (\Exception $exception){
            return ApiResponse::error('',$exception->getMessage());
        }
        return ApiResponse::success($response,'Post excluido com sucesso');
    }

}
