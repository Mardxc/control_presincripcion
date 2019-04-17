<?php

/**
 * UserIdentity represents the data needed to identity a user.
 * It contains the authentication method that checks if the provided
 * data can identity the user.
 */
class UserIdentity extends CUserIdentity
{
	 private $id;
	/**
	 * Authenticates a user.
	 * The example implementation makes sure if the username and password
	 * are both 'demo'.
	 * In practical applications, this should be changed to authenticate
	 * against some persistent user identity storage (e.g. database).
	 * @return boolean whether authentication succeeds.
	 */
	public function authenticate()
	{
        $record=Usuarios::model()->findByAttributes(array('usuario'=>$this->username));
        echo $record->contrasena;
        if($record===null){
        	//echo "El login";
            $this->errorCode='self::ERROR_USERNAME_INVALID';
        }

        else if($record->contrasena!==$this->password)
        {
            $this->errorCode=self::ERROR_PASSWORD_INVALID;
            //echo "El password";
         }
        else
        {
            $this->id=$record->id_usuario;
            echo $this->id;
            $this->setState('roles', $record->roles);            
            $this->errorCode=self::ERROR_NONE;
        }
        return !$this->errorCode;
	}
    public function getId(){
        return $this->id;
    }
}