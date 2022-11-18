<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Str;

class ThreadResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'slug' => $this->slug,
            'body' => $this->body,
            'teaser' => Str::limit($this->body, 100),
            'created_at' => $this->created_at->format("d F, Y"),
            'answer_id' => $this->answer_id,
            'likes_count' => $this->likes_count,
            'replies_count' => $this->replies_count,
            'category' => [
                'id' => $this->category->id,
                'name' => $this->category->name,
                'slug' => $this->category->slug,
            ],
            'user' => [
                'id' => $this->user->id,
                'name' => $this->user->name,
                'picture' => $this->user->picture(),
            ],
        ];
    }
}
