<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Project extends Model
{
    use HasFactory;

    protected $fillable = [
        "title",
        "subtitle",
        "description",
        "url",
        "img_url",
        "category_id"
    ];

    public function category():BelongsTo{
        return $this->belongsTo(Category::class);
    }
    public function technologies(){
        return $this->belongsToMany(Technology::class);
    }
}
