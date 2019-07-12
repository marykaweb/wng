<?php

namespace App;

use Jenssegers\Date\Date;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class News extends Model
{
    protected $fillable = ['title', 'slug', 'description', 'created_by', 'is_published'];        

    public function setSlugAttribute($value) {
        $this->attributes['slug'] = Str::slug( mb_substr($this->title, 0, 40) . "-" . \Carbon\Carbon::now()->format('dmyHi'), '-');
    }

    public function user()
    {
        return $this->hasOne('App\User', 'id', 'created_by');
    }

    public function localeDate() {
        DATE::setlocale('ru');

        $newsDate = $this->updated_at;
        $updated_at = Date::parse($newsDate)->format('j F Y H:i:s');

        return $updated_at;
    }

}
