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
        $sql = "select * from users where Username=? and Password=?";
        $result = $this->db->execute_query($sql, [ $username, $password ])->fetch_all(MYSQLI_ASSOC);

        if (sizeof($result) == 0)
            return -1;

        return $result[0]["User_ID"];
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
        $result = $this->db->execute_query($sql, [ $username, $password ]);

        return self::REGISTER_MSG_SUCCESS;
    }
}

?>