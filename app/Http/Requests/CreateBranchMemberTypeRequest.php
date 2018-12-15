<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\BranchMemberType;

class CreateBranchMemberTypeRequest extends FormRequest
{

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return BranchMemberType::$rules;
    }


    /**
     * This should overwrite the default error messages
    */
    public function messages()
    {
        return [
            'name.alpha_dash'  => 'name can contain only alphanumeric, dash and underscore',
            'name.unique_with' => 'Name already exists or has been created at church level',
            'branch_id.exists' => 'Member type branch not found. Make sure to select a branch that exits',
            'branch_id.numeric' => 'column "branch_id" has to be numeric',
        ];
    }
}
