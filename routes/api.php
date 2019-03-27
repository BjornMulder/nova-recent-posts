<?php

namespace Mattmangoni\RecentPosts\Resources;

use Mattmangoni\RecentPosts\RecentPosts;
use Illuminate\Http\Resources\Json\JsonResource;

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
        return [
            'id' => $this->id,
            'postsUriKey' => RecentPosts::getOption('postUriKey'),
            'usersUriKey' => RecentPosts::getOption('userUriKey'),
            'title' => $this->name,
            'created_at' => $this->created_at->format(RecentPosts::getOption('dateFormat')),
        ];
    }
}
