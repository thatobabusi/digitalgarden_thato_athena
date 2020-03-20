<?php

namespace App\Http\Requests;

use App\Models\AccessControl\Role;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;

class StoreRoleRequest extends FormRequest
{
    /**
     * @return bool
     */
    public function authorize()
    {
        abort_if(Gate::denies('role_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    /**
     * @return array
     */
    public function rules()
    {
        return [
            'title'         => [
                'required'],
            'permissions.*' => [
                'integer'],
            'permissions'   => [
                'required',
                'array'],
        ];
    }
}
