<?php

class Config
{
    const DB_HOST = "localhost";
    const DB_USERNAME = "root";
    const DB_PASSWORD = "1233211";
    const DB_DATABASE = "eset_hackathon";

    const BASE_URL = "/Library/WebServer/Documents/ESETGuvenlikOyunu/";
    const HELPER_DIRECTORY = self::BASE_URL . "Helpers/";
    const HELPER_FILE_USERDB = self::HELPER_DIRECTORY . "users_db_helper.php";
    const LEVELS_DIRECTORY = self::BASE_URL . "views/levels/";

    const MAX_POINT = 20;
    const MIN_POINT = 0;

    public static $VALID_FUNCTIONS = array('increasePoint', 'decreasePoint', 'addUser', 'getUser', 'nextLevel', 'calculatePoint');
}