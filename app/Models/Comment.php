<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Comment extends Model

{
    use SoftDeletes;
    use HasFactory;
    protected $fillable = [
        'review_id',
        'user_id',
        'body',
        'created_at',
        'updated_at',
        'deleted_at',
    ];
    
    public function getPaginateByLimit(int $limit_count = 5)
    {
        // updated_atで降順に並べたあと、limitで件数制限をかける
        return $this->orderBy('updated_at', 'DESC')->paginate($limit_count);
    }
    
    public function review(Review $review)
    {
        return $this->belongsTo(Review::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
        public function CommentLike()
    {
        return $this->belongsToMany(User::class, 'commentlike');
    }

}
