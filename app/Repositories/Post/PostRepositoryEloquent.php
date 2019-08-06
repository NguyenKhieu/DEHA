<?php

namespace App\Repositories\Post;

use App\Repositories\RepositoryEloquent;

class PostRepositoryEloquent extends RepositoryEloquent implements PostRepositoryInterface
{
    public function getModel()
    {
        // Có thể bớ cái scopeActive zô đây được này
        // => Sửa duy nhất ở đây là đủ rồi :D
        return \App\Models\Post::class;
    }

    public function getAllPublished()
    {
        $result = $this->_model->where('is_published', 1)->get();

        return $result;
    }

    public function findOnlyPublished($id)
    {
        $result = $this
            ->_model
            ->where('id', $id)
            ->where('is_published', 1)
            ->first();

        return $result;
    }
}
