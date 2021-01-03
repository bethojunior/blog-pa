<?php


namespace App\Http\Controllers\Blog;


use App\Http\Controllers\Controller;
use App\Http\Requests\Blog\CreateBlog;
use App\Http\Responses\ApiResponse;
use App\Services\Blog\BlogService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class BlogController extends Controller
{

    private $service;

    /**
     * BlogController constructor.
     * @param BlogService $blogService
     */
    public function __construct(BlogService $blogService)
    {
        $this->service = $blogService;
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function create(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'authot' => 'required',
            'content' => 'required',
            'tags' => 'required'
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

}
