<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\User;
use Auth;
class UpdateBookRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        $role = User::whereId(Auth::user()['id'])->select('role')->first()->role;
        if ($role == 'Админ'){
            return true;
        }else{
            return false;
        }
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'book_title' => "required|between:5,255",
            'book_author' => 'required|between:5,255',
            'book_description' => 'required|between:30,3000',
            'book_format' => 'required|between:5,255',
            'book_publisher' => 'required|between:5,255',
            'picture' => 'image',
            'book_genre_id' => 'required',
        ];
    }
}
