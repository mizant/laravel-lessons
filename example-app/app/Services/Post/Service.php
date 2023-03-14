<?php


namespace App\Services\Post;


use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Support\Facades\DB;

class Service
{
    public function store($data)
    {
        try {
            DB::beginTransaction();

            $tags = $data['tags'];
            $category = $data['category'];
            unset($data['tags'], $data['category']);

            $tagIds = $this->getTagIds($tags);
            $data['category_id'] = $this->getCategoryId($category);

            $post = Post::create($data);
            $post->tags()->attach($tagIds);

            DB::commit();
        }
        catch (\Exception $exception) {
            DB::rollBack();
            return $exception->getMessage();
        }


        return $post;
    }

    public function update($post, $data)
    {
        $tags = $data['tags'];
        unset($data['tags']);

        $post->update($data);
        $post->tags()->sync($tags);
        return $post->fresh();
    }

    private function getCategoryId($item)
    {
            $category =  !isset($item['id']) ?  Category::create($item) : Category::find($item['id']);
            return $category->id;
    }

    private function getTagIds($tags)
    {
        $tagIds = [];
        foreach ($tags as $tag) {
            $tag = !isset($tag['id']) ? Tag::create($tag) : Tag::find($tag['id']);
            $tagsIds[] = $tag->id;
        }
        return $tagIds;
    }
}
