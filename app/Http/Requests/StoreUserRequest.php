<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;

class StoreUserRequest extends FormRequest
{
    /**
     * @return bool
     */
    public function authorize(): bool
    {
        abort_if(Gate::denies('user_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    /**
     * @return array
     */
    public function rules(): array
    {
        return [
            'name'     => [
                'required'],
            'email'    => [
                'required',
                'unique:users'],
            'password' => [
                'required'],
            'roles.*'  => [
                'integer'],
            'roles'    => [
                'required',
                'array'],
        ];
    }
}
