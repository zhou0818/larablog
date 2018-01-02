<?php

namespace App\Http\Requests;

class ArticleRequest extends Request
{
    public function rules()
    {
        switch ($this->method()) {
            // CREATE
            case 'POST':
                {
                    return [
                        'title' => 'required|min:2',
                        'body' => 'required|min:3',
                        'category_id' => 'required|numeric',
                        'image' => 'required|mimes:jpeg,bmp,png,gif|dimensions:min_width=800,min_height=600'
                    ];
                }
            // UPDATE
            case 'PUT':
            case 'PATCH':
                {
                    return [
                        'title' => 'required|min:2',
                        'body' => 'required|min:3',
                        'category_id' => 'required|numeric',
                        'image' => 'exists:image|mimes:jpeg,bmp,png,gif|dimensions:min_width=800,min_height=600'
                    ];
                }
            case 'GET':
            case 'DELETE':
            default:
                {
                    return [];
                }
        }
    }

    public function messages()
    {
        return [
            'title.min' => '标题必须至少两个字符',
            'body.min' => '文章内容必须至少三个字符',
            'body.required' => '文章内容不能为空',
            'category_id.required' => '请选择分类',
            'image.required' => '请上传封面图',
            'image.mimes' => '封面图类型必须为jpeg,bmp,png,gif',
            'image.dimensions' => '图片的清晰度不够，宽需要 800px 以上,高需要600px 以上',
        ];
    }
}
