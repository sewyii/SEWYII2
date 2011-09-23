<?php
class SEUserIdentity extends CUserIdentity {
    const ERROR_ACTIVATION_INVALID=200;
    public $login;
    public $password;
    private $_id;

    /**
     * Authenticates a user.
     * @return boolean whether authentication succeeds.
     */
    public function __construct($login,$password) {
        $this->login=$login;
        $this->password=$password;
    }

    public function authenticate() {

        $user=User::model()->findByAttributes(array('login'=>$this->login));
        if($user===null)
            $this->errorCode=self::ERROR_USERNAME_INVALID;
        else if(!empty($user->activate_key))
            $this->errorCode=self::ERROR_ACTIVATION_INVALID;
        else if(!$user->validatePassword($this->password))
            $this->errorCode=self::ERROR_PASSWORD_INVALID;
        else {
            $this->errorCode=self::ERROR_NONE;
            $this->_id=$user->id;
            $this->username=$user->login;
        }

        return $this->errorCode==self::ERROR_NONE;
    }
    
    public function setOtherEnter($id_user) {
        $user=User::model()->findByPk($id_user);
        $this->errorCode=self::ERROR_NONE;
        $this->_id=$user->id;
        $this->username=$user->login;
        return $this->errorCode==self::ERROR_NONE;
    }

    /**
     * @return integer the ID of the user record
     */
    public function getId() {
        return $this->_id;
    }
}
?>