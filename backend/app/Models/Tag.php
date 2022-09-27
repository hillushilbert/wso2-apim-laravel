<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;

    protected $table = 'tags';

    protected $fillable = [
        'name',
    ];

    /**
     * The studies that belong to the tag.
     */
    public function studies()
    {
        return $this->belongsToMany(\App\Models\Study::class,'studies_tags','tag_id','study_id');
    }
}
