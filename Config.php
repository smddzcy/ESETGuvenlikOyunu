<?php

class Config
{
    const DB_HOST = "";
    const DB_USERNAME = "";
    const DB_PASSWORD = "";
    const DB_DATABASE = "";

    const HELPER_DIRECTORY = "Helpers/";
    const HELPER_FILE_USERDB = self::HELPER_DIRECTORY . "users_db_helper.php";

    const VALID_FUNCTIONS = ['increasePoint', 'decreasePoint', 'addUser', 'getUser'];
}