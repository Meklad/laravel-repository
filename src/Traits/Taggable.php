<?php

namespace Owllog\LaravelTaggy\Traits;

use Owllog\LaravelTaggy\Models\Tag;

/**
 * @author Ahmed Meklad <ahmed.meklad.news@gmail>
 */
trait Taggable
{
    /**
     * Retuen all tags assosiated with a model.
     *
     * @return \Illuminate\Support\Collection
     */
    public function tags()
    {
        return $this->morphToMany(Tag::class, 'taggable');
    }
}
