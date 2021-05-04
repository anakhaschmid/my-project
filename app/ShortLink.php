<?php
   
namespace App;
   
use Illuminate\Database\Eloquent\Model;
   
class ShortLink extends Model
{
    
    protected $primaryKey = 'id';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title','code', 'link','user_id','status'
    ];
}