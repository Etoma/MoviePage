<?php
class database {
    public function getAllUsers()
    {
        $mysqli = new mysqli("localhost", "root", "", "movieandaudio");
        $result = $mysqli->query("SELECT * FROM users");
        $users = array();
        while($row = $result->fetch_assoc()) {
            $users[] = $row;
        }
        $mysqli->close();
        return $users;
    }

    public function getUserById($userID)
    {
        $mysqli = new mysqli("localhost", "root", "", "movieandaudio");
        $result = $mysqli->query("SELECT * FROM users WHERE userID = $userID");
        $user = $result ? $result->fetch_assoc() : 0;
        $mysqli->close();
        return $user;
    }

    public function getAllSongs()
    {
        $mysqli = new mysqli("localhost", "root", "", "movieandaudio");
        $result = $mysqli->query("SELECT * FROM songs");
        $songs = array();
        while($row = $result->fetch_assoc()) {
            $songs[] = $row;
        }
        $mysqli->close();
        return $songs;
    }

    public function searchSongs($search)
    {
        $search = str_replace('*', '%', $search);
        $mysqli = new mysqli("localhost", "root", "", "movieandaudio");
        $result = $mysqli->query("SELECT * FROM songs WHERE songTitle LIKE '%$search%'");
        $songs = array();
        while($row = $result->fetch_assoc()) {
            $songs[] = $row;
        }
        $mysqli->close();
        return $songs;
    }

     public function getAllVideos()
    {
        $mysqli = new mysqli("localhost", "root", "", "movieandaudio");
        $result = $mysqli->query("SELECT * FROM movies");
        $movies = array();
        while($row = $result->fetch_assoc()) {
            $movies[] = $row;
        }
        $mysqli->close();
        return $movies;
    }

    public function searchVideos($search)
    {
        $search = str_replace('*', '%', $search);
        $mysqli = new mysqli("localhost", "root", "", "movieandaudio");
        $result = $mysqli->query("SELECT * FROM movies WHERE movieTitle LIKE '%$search%'");
        $movies = array();
        while($row = $result->fetch_assoc()) {
            $movies[] = $row;
        }
        $mysqli->close();
        return $movies;
    }
}
$db = new database;