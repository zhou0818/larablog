<?php
/**
 * Created by PhpStorm.
 * User: zhou
 * Date: 2017/12/29
 * Time: 15:13
 */

namespace App\Http\Requests;


use Illuminate\Foundation\Http\FormRequest;

class Request extends FormRequest
{
    public function authorize()
    {
        // Using policy for Authorization
        return true;
    }
}