<?php
include "./models/User.php";
class UserControler
{

    public static function index()
    {
        $plants = User::all();
        return $plants;
    }

    public static function show()
    {
        $user = User::find($_POST['id']);
        return $user;
    }

    public static function store()
    {
        User::create();
        
    }

    public static function update()
    {
        User::update();
    }

    public static function destroy()
    {
        User::destroy();
    }
}
