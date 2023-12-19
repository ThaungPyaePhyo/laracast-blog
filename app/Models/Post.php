<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\File;

class Post extends Model
{
    use HasFactory;
    public  $title;
    public $excerpt;
    public $date;
    public $body;
    public $slug;

    public function __construct($title,$excerpt,$date,$body,$slug)
    {
        $this->title = $title;
        $this->excerpt = $excerpt;
        $this->date = $date;
        $this->body = $body;
        $this->slug = $slug;
    }


    public static function find($slug)
    {
        return static::allFiles()->firstWhere('slug',$slug);
    }

    public static function allFiles()
    {
        return cache()->rememberForever('posts.all', function () {
            return collect(\Illuminate\Support\Facades\File::files(resource_path('views/posts')))
                ->map(fn($file) => \Spatie\YamlFrontMatter\YamlFrontMatter::parseFile($file))
                ->map(fn($document) => new Post(
                    $document->title,
                    $document->excerpt,
                    $document->date,
                    $document->body(),
                    $document->slug
                ))
                ->sortBy('date');
        });
    }

}
