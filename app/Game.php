<?php

namespace App;

use App\Traits\Sluggable;
use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    use Sluggable;

    protected $appends = ['rating', 'images'];

    //region Relationships

    public function platforms()
    {
        return $this->belongsToMany(Platform::class);
    }

    public function genre()
    {
        return $this->belongsTo(Genre::class);
    }

    //endregion

    //region Virtual Attributes

    public function getRatingAttribute()
    {
        if (! $this->votes || $this->votes < 0)
            return 0;

        // Force rating to 1 to 5, 0 will be reserved for unrated
        return clamp($this->score / $this->votes, 1, 5);
    }

    public function images()
    {
        $images = [];
        foreach (range(0, rand(5, 15)) as $id) {
            $images[] = (object) [
                'thumbnail' => 'http://placehold.it/100x56&text=Placeholder'. ($id + 1),
                'full' => 'http://placehold.it/480x270&text=Placeholder'. ($id + 1),
            ];
        }

        return $images;
    }

    //endregion
}
