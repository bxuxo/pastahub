<?php

class database {
    protected $db;

    function __construct( ) {
        $this->db = new mysqli("localhost", "root", "", "pastahub");
        if ($this->db->connect_errno)
            die($this->db->connect_error);
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
}

class listing extends database {
    // returns result
    function new(string $title, float $price, bool $isCool, string $description) {
        $owner_id = @$_COOKIE["user_id"];
        if (!isset($owner_id)) {
            return "Unknown error."; // its actually known hehe
        }

        $sql = "
            insert into listings
            (Title, Price, IS_COOL, Description, img_path, created_at, Owner_ID)
            values
            (?, ?, ?, ?, ?, ?, ?)
        ";

        $created_at = time( );

        print_r($_FILES);
    }
}

?>