<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Cviebrock\EloquentSluggable\SluggableInterface;
use Cviebrock\EloquentSluggable\SluggableTrait;
use Symfony\Component\HttpFoundation\File\UploadedFile;

class Post extends Model implements SluggableInterface
{

    use SluggableTrait;

    protected $sluggable = [
        'build_from' => 'title',
        'save_to'    => 'slug',
    ];

    protected $image_path;

    public function __construct()
    {
        $this->image_path = public_path('posts_images');
    }

    public function getAbstractAttribute()
    {
        $abstract = Str::words($this->content, 60);
        return $abstract;
    }

    public function author()
    {
       return $this->belongsTo('App\User', 'author_id', 'id');
    }

    public function setImageAttribute(UploadedFile $image)
    {
        $new_image = $image->move($this->image_path, $image->getClientOriginalName());
        $this->attributes['image'] = $image->getClientOriginalName();
    }

    public function getImageAttribute($image_name = false)
    {
        if(!$image_name) {
            return false;
        }

        return url('posts_images/' . $image_name);
    }

    public function delete()
    {
        if($image = $this->image) {
            unlink($this->image_path . '/' . $this->attributes['image']);
        }
        return parent::delete();
    }

}
