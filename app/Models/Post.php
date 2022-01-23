<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use HasFactory;
    //posle sozd migracii i ee radaktir idem i dobavl eto use softdel ne zabit sdelat migraciu i rollback
    use SoftDeletes;
    protected $table = 'posts';
    protected $guarded = false;  //for change table

    //delaem otnoshenie
    public function tags() {
        return $this->belongsToMany(Tag::class, 'post_tags', 'post_id', 'tag_id');
    }
    //delaem relation dla vivoda v glavnom shaplone preview image
    public function category(){
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }
}
