<?php

namespace App\Http\Requests;

use App\Advertisement;
use Illuminate\Foundation\Http\FormRequest;

class UpdateAdvertisement extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        $advertisement = $this->route('advertisement');
        return $advertisement && $this->user()->can('update', $advertisement);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title' => 'required|max:255'
        ];
    }
}
