<?php
namespace App\Http\Requests\Order;

use Illuminate\Foundation\Http\FormRequest;

class UpdateOrder extends FormRequest
{
    /**
     * Determine if the UpdateOrder is authorized to make this request.
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
        return [
            //
        ];
    }
}
