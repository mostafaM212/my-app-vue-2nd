<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PostResource extends JsonResource
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
            'id'=> $this->id ,

            'title' =>$this->title ,

            'user' => $this->user ,

            'content' => $this->content ,

            'created' => $this->created_at


        ];
    }
}
