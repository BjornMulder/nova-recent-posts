<?php

namespace Mattmangoni\RecentPosts\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Mattmangoni\RecentPosts\Helpers\ConfigResolver;

class RecentPostResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $options = ConfigResolver::fetch();

        return [
            'id' => $this->id,
            'postsUriKey' => $options['posts_uri_key'],
            'usersUriKey' => $options['users_uri_key'],
            'title' => $this->title,
            'created_at' => $this->created_at->format($options['date_format']),
            'author' => new AuthorResource($this->{$options['author_relationship_name']})
        ];
    }
}
