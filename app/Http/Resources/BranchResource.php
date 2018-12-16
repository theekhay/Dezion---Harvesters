<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Models\MemberDetail;

class BranchResource extends JsonResource
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
            'name' => $this->name,
            'code' => $this->code,
            'created_by' => $this->created_by,
            'created_at' => $this->created_at,
            'church_id' => $this->church_id,
            'member-types' => ChurchMemberTypeResource::collection( $this->getMemberTypes ),
            'members' => MemberDetailResource::collection( $this->getMembers ),
        ];
    }
}
