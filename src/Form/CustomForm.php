<?php

namespace App\Form;

use Cake\Form\Form;
use Cake\Form\Schema;
use Cake\Validation\Validator;

class CustomForm extends Form
{
    protected function _buildSchema(Schema $schema): Schema
    {
        return $schema;
    }

    public function validationDefault(Validator $validator)
    {
        $validator
            ->add('image', 'fileSize', [
                'rule' => ['fileSize', '<', '2097152'],
                'message' => '2MB以下の画像がアップロード可能です',
            ])
            ->add('image', 'mimeType', [
                'rule' => ['mimeType', ['image/png', 'image/jpeg', 'image/gif']],
                'message' => '「PNG」、「JPG」または「GIF」の画像ファイルを指定してください',
            ]);
        return $validator;
    }
}
