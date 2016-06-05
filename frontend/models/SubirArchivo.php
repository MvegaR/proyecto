<?php

namespace frontend\models;
use yii\base\Model;
use yii;

class SubirArchivo extends Model{

	/**
     * @var UploadedFile
     */
    public $file;

    public function rules()
    {
        return [
            [['file'], 'file', 'skipOnEmpty' => false, 'extensions' => 'xlsx, xls'],
        ];
    }
    
    public function upload()
    {
        if ($this->validate()) {
            $this->file->saveAs('imports/' . $this->file->baseName . '.' . $this->file->extension);
            return true;
        } else {
            return false;
        }
    }



}


?>