<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "docente".
 *
 * @property string $ID_DOCENTE
 * @property integer $ID_ROL
 * @property integer $ID_FACULTAD
 * @property string $NOMBRE_DOCENTE
 * @property string $EMAIL
 * @property string $USER
 * @property string $PASSWORD
 * @property string $COOKIE
 *
 * @property Rol $iDROL
 * @property Facultad $iDFACULTAD
 * @property Seccion[] $seccions
 */
class Docente extends \yii\db\ActiveRecord implements \yii\web\IdentityInterface
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'docente';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
        [['ID_DOCENTE', 'NOMBRE_DOCENTE'], 'required'],
        [['ID_ROL', 'ID_FACULTAD'], 'integer'],
        [['ID_DOCENTE', 'NOMBRE_DOCENTE', 'EMAIL', 'USER', 'PASSWORD', 'COOKIE'], 'string', 'max' => 255],
        ['USER', 'unique'],
        ["PASSWORD_REPEAT", "required", "message" => "Campo requerido."],
        ["PASSWORD_REPEAT", "compare", "compareAttribute" => "PASSWORD","message" => "No son iguales."],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
        'ID_DOCENTE' => 'Id  Docente',
        'ID_ROL' => 'Id  Rol',
        'ID_FACULTAD' => 'Id  Facultad',
        'NOMBRE_DOCENTE' => 'Nombre  Docente',
        'EMAIL' => 'Email',
        'USER' => 'User',
        'PASSWORD' => 'Password',
        'COOKIE' => 'Cookie',
        ];
    }
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIDROL()
    {
        return $this->hasOne(Rol::className(), ['ID_ROL' => 'ID_ROL']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIDFACULTAD()
    {
        return $this->hasOne(Facultad::className(), ['ID_FACULTAD' => 'ID_FACULTAD']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSeccions()
    {
        return $this->hasMany(Seccion::className(), ['ID_DOCENTE' => 'ID_DOCENTE']);
    }

///////////////////////////////////////////////////////////////////////

        /**
     * Finds an identity by the given ID.
     *
     * @param string|integer $id the ID to be looked for
     * @return IdentityInterface|null the identity object that matches the given ID.
     */
        public static function findIdentity($id)
        {
            return static::findOne($id);
        }

    /**
     * Finds an identity by the given token.
     *
     * @param string $token the token to be looked for
     * @return IdentityInterface|null the identity object that matches the given token.
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
        return static::findOne(['COOKIE' => $token]);
    }




    /**
     * @return int|string current user ID
     */
    public function getId()
    {
        return $this->ID_DOCENTE;
    }

    /**
     * @return string current user auth key
     */
    public function getAuthKey()
    {
        return $this->PASSWORD;
    }

    public function generateAuthKey()
    {
        $this->COOKIE = Yii::$app->security->generateRandomString();
    }

       public function generateAccessToken()
    {
        $this->PASSWORD = sha1(Yii::$app->security->generateRandomString());
    }

    /**
     * @param string $authKey
     * @return boolean if auth key is valid for current user
     */
    public function validateAuthKey($authKey)
    {
        return $this->getAuthKey() === $authKey;
    }

        /**
 * Validates password
 *
 * @param  string  $password password to validate
 * @return boolean if password provided is valid for current user
 */
        public function validatePassword($password)
        {
            return $this->PASSWORD === sha1($password);
        }

        /**
 * Finds user by username
 *
 * @param  string      $username
 * @return static|null
 */
        public static function findByUsername($username)
        {
            foreach (Docente::find()->all() as $user) {
                if (strcasecmp($user['USER'], $username) === 0) {
                    return new static($user);
                }
            }

            return null;
        }

        public function beforeSave($insert)
        {
            if (parent::beforeSave($insert)) {
                if ($this->isNewRecord) {
                    $this->COOKIE = \Yii::$app->security->generateRandomString();
                    $nueva_cadena = preg_replace("[^A-Za-z0-9]", "", $this->ID_DOCENTE);
                    $this->PASSWORD = sha1($nueva_cadena);
                    $this->USER = $this->NOMBRE_DOCENTE. $nueva_cadena;
                }
                return true;
            }
            return false;
        }


    }
