<?php


namespace App\Models\Blog;


use App\Models\Tag\Tag;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    protected $fillable = ['title', 'authot','content'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function tags()
    {
        return $this->hasMany(Tag::class, 'blog_id', 'id');
    }
}
