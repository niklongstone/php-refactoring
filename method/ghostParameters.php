<?php
function authoriseOperation(
    $userId, $pageId, $auth, $isMaster = false, DAO $dao = null
)
{
    if (!$dao) {
        $dao = new DAO();
    }
    if ($isMaster) {
        $dao->authMasterOperation();
    }
}

//----------------------------------------------------------------------
// Use DI for the DAO possibly in the constructor
// Anyway try to use null object if really needed
function authoriseMasterOperation(//... DAO $dao)
{
    if ($dao instanceof NullDao) //...
}
