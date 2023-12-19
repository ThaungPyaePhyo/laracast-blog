<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\File;

class Post extends Model
{
    use HasFactory;

    public static function find($slug)
    {
        if (!file_exists($path = resource_path("posts/{$slug}.html"))) {
            throw new ModelNotFoundException();
        }

        return cache()->remember("posts.{$slug}", 1200, fn () => file_get_contents($path));

    }

    public static function allFiles()
    {
        $files = File::files(resource_path("/views/posts/"));
        return array_map(function ($file) {
            return $file->getContents();
        }, $files);
        return array_map(fn($file) => $file->getContents(), $files);
    }

}
