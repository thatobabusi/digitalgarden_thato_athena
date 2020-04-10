<?php

namespace App\Http\Requests;

use App\Models\User\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;

class UpdateUserRequest extends FormRequest
{
    /**
     * @return bool
     */
    public function authorize(): bool
    {
        abort_if(Gate::denies('user_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    /**
     * @return array
     */
    public function rules(): array
    {
        return [
            'name'    => [
                'required'],
            'email'   => [
                'required',
                'unique:users,email,' . request()->route('user')->id],
            'roles.*' => [
                'integer'],
            'roles'   => [
                'required',
                'array'],
        ];
    }
}
