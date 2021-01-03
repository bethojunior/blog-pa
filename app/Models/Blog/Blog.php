<?php


namespace App\Models\Blog;


use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    protected $fillable = ['title', 'authot','content'];

}
