<?php

class Config
{
    const DB_HOST = "";
    const DB_USERNAME = "";
    const DB_PASSWORD = "";
    const DB_DATABASE = "";

    const HELPER_FILE_USERDB = "Helpers/users_db_helper.php";

    public static $VALID_FUNCTIONS = array('increasePoint', 'decreasePoint', 'addUser', 'getUser');
}