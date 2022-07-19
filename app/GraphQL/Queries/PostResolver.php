<?php

namespace App\GraphQL\Queries;
use App\Models\Post;

final class PostResolver
{
    /**
     * @param  null  $_
     * @param  array{}  $args
     */
    public function __invoke($_, array $args)
    {
        // TODO implement the resolver
        return Post::where('id', $args['id'])->first();
    }
}
