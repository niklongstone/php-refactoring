<?php
class Authentication
{
    const ROLE_GUEST = 0;
    const ROLE_MEMBER= 1;
    const ROLE_ADMIN = 2;

    public function getRole($user)
    {
        $role = $user['role'];
        //other operations
    }
}

class GuestRole implements Role
class MemberRole implements Role
class AdminRole implements Role

class Authentication

class User
