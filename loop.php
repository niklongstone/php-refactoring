<?php

$emailCollection = array();
foreach ($users as $user) {
    $userEmail = $user->getEmail();
    if (null !== $userEmail) {
        if (isValid($userEmail)) {
            if (isGmail($userEmail)) {
                $emailCollection[] = $userEmail;
            }
            if (isYahoo($userEmail)) {
                $emailCollection[] = $userEmail;
            }
        }
    }
    if (count($emailCollection == 10)) {
        break;
    }
}
sendPromotionEmail($emailCollection);

class EmailCollection implements \Countable
{
    public function __construct(EmailFilter $filter, $user)
    //code ....
    public function getValidEmail()
    //code....
    public function count()
    //...
    public function offset($offset, $length)
}

$emailCollection = new EmailCollection(Myfilter, $user);
sendPromotionEmail($emailCollection->getValidEmail()->offset(0, 10));
