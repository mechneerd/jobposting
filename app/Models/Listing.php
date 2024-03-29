<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Listing extends Model
{
    use HasFactory;

    protected $fillable=['title','tags','loacation','description','email','company','website','logo','user_id'];

    public function scopeFilter($query,array $filters){
       // dd($filters);
        if($filters['tag'] ?? false){
            $query->where('tags','like','%'.request('tag').'%');
        }
        if($filters['search'] ?? false){
            $query->where('tags','like','%'.request('search').'%')->orwhere('description','like','%'.request('search').'%');
        }
    }

    public function user(){
        return $this->belongsTo(User::class,'user_id');
    }
}
