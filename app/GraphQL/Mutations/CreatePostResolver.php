<?php

namespace App\GraphQL\Mutations;
use App\Models\Post;

final class CreatePostResolver
{
    /**
     * @param  null  $_
     * @param  array{}  $args
     */
    public function __invoke($_, array $args)
    {
        // TODO implement the resolver
        $post = Post::create([
            'user_id' => $args['user_id'],
            'title' => $args['title'],
            'body' => $args['body'],
        ]);
        

        Log::info('action taken after post created');

        return $post;
    }
}
