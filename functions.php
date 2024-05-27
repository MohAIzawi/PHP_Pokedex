<?php
    require "./config.php";

    function dbConnect() {
        global $server_Name, $user_Name, $password, $db_Name;
        $mysqli = new mysqli($server_Name, $user_Name, $password, $db_Name);
        if ($mysqli->connect_error) {
            die("Failed to connect to MySQL: " . $mysqli->connect_error);
        }
        return $mysqli;
    }

    function getPokemonByName($name) {
        $mysqli = dbConnect();
        $stmt = $mysqli->prepare("SELECT * FROM pokemon WHERE Name = ?");
        $stmt->bind_param("s", $name);
        $stmt->execute();
        $result = $stmt->get_result();
        $data = $result->fetch_all(MYSQLI_ASSOC);
        return $data;
    }

    // getpokemonbyID function
    function getPokemonByID($id) {
        $mysqli = dbConnect();
        $stmt = $mysqli->prepare("SELECT * FROM pokemon WHERE id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        $data = $result->fetch_all(MYSQLI_ASSOC);
        return $data;
    }

    // function to get pokemon sprite from local folder pokemon_sprites
    function getPokemonSprite($name) {
        $spritePath = "./pokemon_sprites/" . $name . ".png";
        if (file_exists($spritePath)) {
            return $spritePath;
        } else {
            return "pokemon_sprites/default.png"; // return a default sprite if the specific sprite doesn't exist
        }
    }


    function getPokemonInfo($id) {
        $mysqli = dbConnect();
        $stmt = $mysqli->prepare("SELECT * FROM pokemon WHERE id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        $data = $result->fetch_all(MYSQLI_ASSOC);
        return $data;
    }

    function getAllPokemon() {
        $mysqli = dbConnect();
        $result = $mysqli->query("SELECT * FROM pokemon");
        if ($result === FALSE) {
            die("Failed to query the database: " . $mysqli->error);
        }
        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }
        return $data;
    }

    function getPokemonByType($type) {
        $mysqli = dbConnect();
        $stmt = $mysqli->prepare("SELECT * FROM pokemon WHERE Type_1 = ? OR Type_2 = ?");
        $stmt->bind_param("ss", $type, $type);
        $stmt->execute();
        $result = $stmt->get_result();
        $data = $result->fetch_all(MYSQLI_ASSOC);
        return $data;
    }


    function getPokemonByPartialName($partialName) {
        $mysqli = dbConnect();
        $stmt = $mysqli->prepare("SELECT * FROM pokemon WHERE Name LIKE ?");
        $partialName = "%" . $partialName . "%"; // Surround the partial name with % for the LIKE query
        $stmt->bind_param("s", $partialName);
        $stmt->execute();
        $result = $stmt->get_result();
        $data = $result->fetch_all(MYSQLI_ASSOC);
        return $data;
    }

    // combine getPokemonByType and getPokemonByPartialName
    function getPokemonByTypeAndPartialName($type, $partialName) {
        $mysqli = dbConnect();
        $stmt = $mysqli->prepare("SELECT * FROM pokemon WHERE (Type_1 = ? OR Type_2 = ?) AND Name LIKE ?");
        $partialName = "%" . $partialName . "%"; // Surround the partial name with % for the LIKE query
        $stmt->bind_param("sss", $type, $type, $partialName);
        $stmt->execute();
        $result = $stmt->get_result();
        $data = $result->fetch_all(MYSQLI_ASSOC);
        return $data;
    }
