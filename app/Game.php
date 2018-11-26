<?php

namespace App;

use App\Traits\Searchable;
use App\Traits\Sluggable;
use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    use Sluggable, Searchable;

    /**
     * Append some "virtual" attributes
     *
     * @var array
     */
    protected $appends = ['rating', 'images'];

    /**
     * The columns of the full text index
     */
    protected $searchable = [
        'name',
        'description',
    ];

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

    public static function sorts()
    {
        return collect([
            'relevance' => [
                'display' => 'Relevance',
                'field' => 'relevance_score',
                'direction' => 'desc',
            ],
            'name' => [
                'display' => 'Name',
                'field' => 'name',
                'direction' => 'asc',
            ],
            'lowest' => [
                'display' => 'Price Lowest',
                'field' => 'price',
                'direction' => 'asc',
            ],
            'highest' => [
                'display' => 'Price Highest',
                'field' => 'price',
                'direction' => 'desc',
            ],
            'rating' => [
                'display' => 'Rating',
                'field' => 'score',
                'direction' => 'desc',
            ],
        ]);
    }

    //endregion
}
