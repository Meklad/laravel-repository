<?php

namespace Owllog\LaravelTaggy\Traits;

use Illuminate\Support\Collection;
use Owllog\LaravelTaggy\Models\Tag;
use Illuminate\Database\Eloquent\Model;

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

    public function tag($tags)
    {
        $this->addTags($this->getWorkableTags($tags));
    }

    private function addTags(Collection $tags)
    {
        $sync = $this->tags()->syncWithoutDetaching(
            $tags->pluck('id')->toArray()
        );
    }

    private function getWorkableTags($tags)
    {
        if(is_array($tags)) {
            return $this->getTagModel($tags);
        }

        if($tags instanceof Model) {
            return $this->getTagModel([$tags->slug]);
        }

        return $this->filterTagsCollection($tags);
    }

    private function filterTagsCollection(Collection $tags)
    {
        return $tags->filter(function($tag) {
            return $tag instanceof Model;
        });
    }

    private function getTagModel(array $tags)
    {
        return Tag::whereIn('slug', $this->normailzeTagName($tags))->get();
    }

    private function normailzeTagName(array $tags)
    {
        return array_map(function($tag) {
            return str_slug($tag);
        }, $tags);
    }
}
