<?php
class SuccessMessages
{
    // SUCCESS_CONTROLLER_METHOD_ACTION
    const SUCCESS_ADMIN_NEWCATEGORY_EXISTS = '72482288350eebfcae47fe3754a5aeb5d143f98d';
    private $successList = [];
    function __construct()
    {
        $this->successList = [
            SuccessMessages::SUCCESS_ADMIN_NEWCATEGORY_EXISTS => 'La categoría se ha creado con éxito.'
        ];
    }
    public function get($hash)
    {
        return $this->successList[$hash];
    }
    public function existsKey($key)
    {
        if (array_key_exists($key, $this->successList)) {
            return true;
        } else {
            return false;
        }
    }
}
?>