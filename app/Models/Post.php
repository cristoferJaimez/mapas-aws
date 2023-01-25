<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Client\Request;
use App\Models\Category;
use App\Models\User;
use App\Models\typeReport;



class Post extends Model
{
    use HasFactory;

    protected $table = 'post';

    protected $fillable = [
        'title',
        'url',
        'type_report_id',
        'status',
        'description',
         'user_id',
        'category_id',
    ];

    protected $attributes = [
        'status' => 'active',
    ];

    protected $hidden = [
    ];

    
    //show
    public function getAll(){
      return Post::all();   
    }

    //create
    public function create(Request $request ){
        return Post::created($request);
    }

    //update

    //delete

    //edit







    //Relation one to more (invertida)
    public function user(){
        return $this->belongsTo(User::class);
    }

    //Relation one to more (invertida)
    public function category(){
        return $this->belongsTo(Category::class);
    }

    //Relation one to more (invertida)
    public function type(){
        return $this->belongsTo(typeReport::class);
    }


    
}
    
