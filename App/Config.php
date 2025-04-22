<?php

namespace App;

abstract class Config
{
    const SHOW_ERRORS = true;

    const DB_HOST = "127.0.0.1";
    const DB_NAME = "library_api";
    const DB_USER = "root";
    const DB_PASSWORD = "root"; // this should never be public like shown but come from an .env file but this is just a mvc sample
    
}