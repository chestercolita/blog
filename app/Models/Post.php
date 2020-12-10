<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $dates = ['deleted_at'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title',
        'content'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function photo()
    {
        return $this->morphOne(Photo::class, 'imageable');
    }

    public function tags()
    {
        return $this->morphToMany(Tag::class, 'taggable');
    }

}
