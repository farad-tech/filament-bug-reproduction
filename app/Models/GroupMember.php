<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GroupMember extends Model
{
    use HasFactory;

    protected $fillable = [
        'group_id',
        'user_id',
    ];

    protected function groupId(): Attribute
    {
        return Attribute::make(function ($group_id) {
            
            return Group::where('id', $group_id)->first();

        });
    }
}
