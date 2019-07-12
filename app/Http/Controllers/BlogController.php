<?php

namespace App\Http\Controllers;

use App\News;
use Jenssegers\Date\Date;

use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function news($slug) {
        DATE::setlocale('ru');

        $news = News::where('slug', $slug)->first();
        $updated_at = Date::parse($news->updated_at)->format('j F Y H:i:s');

        return view('blog.news', [
            'news' => $news,
            'updated_at' => $updated_at
        ]);
    }
}
