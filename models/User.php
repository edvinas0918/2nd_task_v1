<?php
include "./models/ConDataBase.php";

class User{
    public $id;
    public $name;
    public $surname;


    public function __construct($id, $name, $surname) {
        $this->id = $id;
        $this->name = $name;
        $this->surname = $surname;

    }

    public static function find($id)
    {
        $db = new ConDataBase();
        $sql = "SELECT * FROM `registration` where `id` =". $id;

        $result = $db->conn->query($sql);

        while($row = $result->fetch_assoc()) {
            $user = new User($row["id"], $row["name"], $row["surname"]);
        }
        $db->conn->close();
        return $user;
    }

    public static function all()
    {
       $users = [];
       $db = new ConDataBase();
       $sql = "SELECT * FROM registration";
       $result = $db->conn->query($sql);

       while($row = $result->fetch_assoc()) {
           $users[] = new User($row["id"], $row["name"], $row["surname"]);
       }
       $db->conn->close();
       return $users;
    }

    public static function create(){
        $db = new ConDataBase();
        $stmt = $db->conn->prepare("INSERT INTO registration (name, surname) VALUES (?, ?)");
        $stmt->bind_param("ss", $_POST['name'], $_POST['surname']);
        $stmt->execute();
        $stmt->close();
        $db->conn->close();
    }

    public static function update(){
        $db = new ConDataBase();
        $stmt = $db->conn->prepare("UPDATE registration SET name = ?, surname = ? WHERE id = ?");
        $stmt->bind_param("sss", $_POST['name'], $_POST['surname'], $_POST['id']);
        $stmt->execute();
        $stmt->close();
        $db->conn->close();
    }

    public static function destroy(){
        $db = new ConDataBase();
        $stmt = $db->conn->prepare("DELETE FROM registration WHERE id = ?");
        $stmt->bind_param("i", $_POST['id']);
        $stmt->execute();
        $stmt->close();
        $db->conn->close();
    }
}