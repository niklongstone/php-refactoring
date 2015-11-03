<?php

class UserAdministration
{
    public function getAdminSettings($targetId)
    {
        $this->dao = new AdmDAO();

        return $this->getAmsSettingsWithTarget($targetId);
    }

    private function getAdmSettingsWithTarget($targetId)
    {
        return $this->dao->getAmsSettings($targetId);
    }
}

//----------------------------------------------------------------------
class UserAdministration
{
    public function __construct(SettingsInterface $settings)
    private function getSettings()
}

class UserSettings
{
    public function __construct(DaoInterface $dao)

    public function getUserSettings($userId)
    {
        $response = $dao->getUserSettings($userId);

        return new Settings($response);
    }
}
