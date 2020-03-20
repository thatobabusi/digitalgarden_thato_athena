<?php

namespace App\Http\Requests;

use App\Models\AccessControl\Permission;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;

class UpdatePermissionRequest extends FormRequest
{
    /**
     * @return bool
     */
    public function authorize()
    {
        abort_if(Gate::denies('permission_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    /**
     * @return array
     */
    public function rules()
    {
        return [
            'title' => [
                'required'],
        ];
    }
}
