<?php

class database {
    protected $db;

    function __construct( ) {
        $this->db = new mysqli("localhost", "root", "", "pastahub");
        if ($this->db->connect_errno)
            die($this->db->connect_error);
    }

    function get_pasta_types( ) {
        $sql = "select * from pasta_types";
        return $this->db->query($sql)->fetch_all(MYSQLI_ASSOC);
    }
}

class user extends database {
    const REGISTER_MSG_USER_EXISTS = "User with that username already exists";
    const REGISTER_MSG_PASSWORD_SHORT = "Your password must contain atleast 8 characters";
    const REGISTER_MSG_SUCCESS = "User registered successfully";

    function login(string $username, string $password): int {
        $sql = "select Password, User_ID from users where Username=?";
        $result = $this->db->execute_query($sql, [ $username ])->fetch_all(MYSQLI_ASSOC);
        if (sizeof($result) == 0)
            return -1;

        if (password_verify($password, $result[0]["Password"])) {
            return $result[0]["User_ID"];
        }

        return -1;
    }

    function logout( ) {
        unset($_COOKIE['user_id']); 
        setcookie('user_id', '', -1, '/'); 
    }

    private function user_exists(string $username): bool {
        $sql = "select User_ID from users where Username=?";
        $result = $this->db->execute_query($sql, [ $username ])->fetch_all(MYSQLI_ASSOC);

        return sizeof($result) > 0;
    }

    function register(string $username, string $password): string | null {
        if ($this->user_exists($username))
            return self::REGISTER_MSG_USER_EXISTS;

        $len = strlen($password);
        if ($len < 8)
            return self::REGISTER_MSG_PASSWORD_SHORT;

        $sql = "insert into users (Username, Password) values (?, ?)";
        $result = $this->db->execute_query($sql, [ $username, password_hash($password, PASSWORD_ARGON2I) ]);

        return self::REGISTER_MSG_SUCCESS;
    }

    function user_id( ) {
        if (array_key_exists("user_id", $_COOKIE))
            return $_COOKIE["user_id"];

        return -1;
    }

    function new_listing(string $title, float $price, bool $isCool, string $description, int $pastaTypeId) {
        $owner_id = @$_COOKIE["user_id"];
        if (!isset($owner_id)) {
            return "Unknown error"; // its actually known hehe
        }

        $sql = "
            insert into listings
            (Title, Price, IS_COOL, Description, img_path, created_at, Owner_ID, PastaType_ID)
            values
            (?, ?, ?, ?, ?, ?, ?, ?)
        ";

        $created_at = time( );

        $img = $_FILES["image"];

        $name = $img["name"];
        $ext = explode(".", $name)[1];
        // echo $ext;
        if (!$ext)
            return "Invalid file";

        $allowedTypes = ["png", "jpg", "jpeg", "webp"];
        if (!in_array($ext, $allowedTypes))
            return "Invalid file type";

        $uniqueName = uniqid( );
        $newPath = "./core/uploads/$uniqueName.$ext";
        if (!move_uploaded_file($img["tmp_name"], $newPath))
            return "File upload error";

        $this->db->execute_query($sql, [ $title, $price, 0, $description, $newPath, $created_at, $owner_id, $pastaTypeId ]);

        return "New listing created successfully";
    }
}

?>