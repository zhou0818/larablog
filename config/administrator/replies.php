<?php

use App\Models\Reply;

return [
    'title' => '回复',
    'single' => '回复',
    'model' => Reply::class,

    'columns' => [

        'id' => [
            'title' => 'ID',
        ],
        'contents' => [
            'title' => '内容',
            'sortable' => false,
            'output' => function ($value, $model) {
                return '<div style="max-width:600px">' . $value . '</div>';
            },
        ],
        'user' => [
            'title' => '作者',
            'sortable' => false,
            'output' => function ($value, $model) {
                $avatar = $model->user->avatar;
                $value = empty($avatar) ? 'N/A' : '<img src="' . $avatar . '" style="height:22px;width:22px"> ' . e($model->user->name);
                return model_link($value, $model->user);
            },
        ],
        'article' => [
            'title' => '文章',
            'sortable' => false,
            'output' => function ($value, $model) {
                return '<div>' . model_admin_link(e($model->article->title), $model->article) . '</div>';
            },
        ],
        'operation' => [
            'title' => '管理',
            'sortable' => false,
        ],
    ],
    'edit_fields' => [
        'user' => [
            'title' => '用户',
            'type' => 'relationship',
            'name_field' => 'name',
            'autocomplete' => true,
            'search_fields' => array("CONCAT(id, ' ', name)"),
            'options_sort_field' => 'id',
        ],
        'article' => [
            'title' => '文章',
            'type' => 'relationship',
            'name_field' => 'title',
            'autocomplete' => true,
            'search_fields' => array("CONCAT(id, ' ', title)"),
            'options_sort_field' => 'id',
        ],
        'content' => [
            'title' => '回复内容',
            'type' => 'textarea',
        ],
    ],
    'filters' => [
        'user' => [
            'title' => '用户',
            'type' => 'relationship',
            'name_field' => 'name',
            'autocomplete' => true,
            'search_fields' => array("CONCAT(id, ' ', name)"),
            'options_sort_field' => 'id',
        ],
        'article' => [
            'title' => '文章',
            'type' => 'relationship',
            'name_field' => 'title',
            'autocomplete' => true,
            'search_fields' => array("CONCAT(id, ' ', title)"),
            'options_sort_field' => 'id',
        ],
        'content' => [
            'title' => '回复内容',
        ],
    ],
    'rules' => [
        'content' => 'required'
    ],
    'messages' => [
        'content.required' => '请填写回复内容',
    ],
];