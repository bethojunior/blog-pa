<?php


namespace App\Http\Controllers\Tag;


use App\Http\Controllers\Controller;
use App\Services\Tags\TagService;

class TagController extends Controller
{
    private $service;

    /**
     * TagController constructor.
     * @param TagService $tagService
     */
    public function __construct(TagService $tagService)
    {
        $this->service = $tagService;
    }

}
