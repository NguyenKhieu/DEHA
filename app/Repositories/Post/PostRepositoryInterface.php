<?php
namespace App\Repositories\Post;

interface PostRepositoryInterface
{
    public function getAllPublished();

    public function findOnlyPublished();
}