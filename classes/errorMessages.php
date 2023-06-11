<?php
class ErrorMessages
{
    // ERROR_CONTROLLER_METHOD_ACTION
    const ERROR_ADMIN_NEWCATEGORY_EXISTS = '2a5c9b816a80e824470d6500f41dd43fdba80479';
    private $errorList = [];
    function __construct()
    {
        $this->errorList = [
            ErrorMessages::ERROR_ADMIN_NEWCATEGORY_EXISTS => 'La categoría ya existe en la base de datos.'
        ];
    }
    public function get($hash)
    {
        return $this->errorList[$hash];
    }
    public function existsKey($key)
    {
        if (array_key_exists($key, $this->errorList)) {
            return true;
        } else {
            return false;
        }
    }
}
?>