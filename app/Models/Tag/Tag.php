<?php


namespace App\Models\Tag;


use App\Models\Blog\Blog;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{

    protected $fillable = ['blog_id', 'name'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function blog()
    {
        return $this->belongsTo(Blog::class, 'blog_id', 'id');
    }
}
