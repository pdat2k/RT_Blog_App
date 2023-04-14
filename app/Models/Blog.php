<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Blog extends Model
{
    use HasFactory;

    const STATUS_PUBLIC = 1;
    const STATUS_PRIVATE = 2;
    const STATUS_PENDING = 3;

    protected $fillable = [
        'user_id',
        'category_id',
        'title',
        'content',
        'image',
        'status'
    ];

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function comments(): HasMany
    {
        return $this->hasMany(Comment::class, 'blog_id', 'id');
    }

    public function likes(): HasMany
    {
        return $this->hasMany(Like::class, 'blog_id', 'id');
    }

    public function getTimeAttribute()
    {
        return $this->created_at->diffForHumans();
    }

    public function getUpdatedAtAttribute()
    {
        return Carbon::createFromFormat('Y-m-d H:i:s', $this->created_at)->format('d/m/Y');
    }

    public function delete()
    {

        $this->comments()->delete();

        $this->likes()->delete();

        return parent::delete();
    }
}
