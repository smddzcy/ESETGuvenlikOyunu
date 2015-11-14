<?php

class Config
{
    const DB_HOST = "localhost";
    const DB_USERNAME = "root";
    const DB_PASSWORD = "";
    const DB_DATABASE = "eset_hackathon";

    const HELPER_DIRECTORY = "Helpers/";
    const HELPER_FILE_USERDB = "Helpers/users_db_helper.php";
    const LEVELS_DIRECTORY = "Levels/";

    const MAX_POINT = 20;

    public static $VALID_FUNCTIONS = array('increasePoint', 'decreasePoint', 'addUser', 'getUser');
}