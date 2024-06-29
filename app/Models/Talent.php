<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Talent extends Model
{
    use HasFactory;
    protected $fillable = [
        "name",
        "type_id",
        "location",
        "birthday",
        "salary_range_start",
        "salary_range_end",
        "condition",
        "placement",
        "weight",
        "height",
        "skin_tone",
        "education",
        "experience",
        "experience_year",
        "location_id",
        "rating",
        "image1",
        "image2",
        "image3",
        "image4",
        "created_by",
        "deleted_by",
        "deleted_at",
    ];

    public function type(){
        return $this->belongsTo(Type::class);
    }

    public function skills(){
        return $this->belongsToMany(Skill::class, 'talent_skills', 'talent_id', 'skill_id')->wherePivot("status", 1);
    }

    public function location_(){
        return $this->belongsTo(Location::class, "location_id");
    }

    public function placement_location(){
        return $this->belongsTo(Location::class, "placement");
    }
}
