<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Barangays;

class Districts extends Model
{
    use HasFactory;

    protected $table = 'districts';
    protected $fillable = ['district_name'];
    protected $guarded = [];
    
    public function barangays()
    {
        return $this->hasMany(Barangays::class,'district_id','id');
    }
}
