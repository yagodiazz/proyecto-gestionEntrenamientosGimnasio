<?php
namespace App\Services;

class UserService
{
    private $array = [];

    public function __construct()
    {
        $this->array = [
            ["email" => "yago@gmail.com", "password" => "abc123.", "roles" => ["ROLE_USER"]],
            ["email" => "carla@gmail.com", "password" => "abc123.", "roles" => ["ROLE_USER"]],
            ["email" => "sara@gmail.com", "password" => "abc123.", "roles" => ["ROLE_ADMIN"]],
            ["email" => "pablo@gmail.com", "password" => "abc123.", "roles" => ["ROLE_ADMIN"]]
        ];
    }

    public function getArray()
    {
        return $this->array;
    }
}