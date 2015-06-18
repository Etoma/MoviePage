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

    public function insertNewSong($filename, $title, $artist, $album)
    {
        $mysqli = new mysqli("localhost", "root", "", "movieandaudio");
        $sql = "INSERT INTO `movieandaudio`.`songs` (`songName`, `songArtist`, `songAlbum`, `songTitle`) VALUES ('$filename', '$artist', '$album', '$title')";
        $mysqli->query($sql);
        $mysqli->close();
    }

    public function insertNewVideo($filename, $title, $description)
    {
        $mysqli = new mysqli("localhost", "root", "", "movieandaudio");
        $sql = "INSERT INTO `movieandaudio`.`movies` (`movieName`, `movieDescription`, `movieTitle`) VALUES ('$filename', '$description', '$title');";
        $mysqli->query($sql);
        $mysqli->close();
    }

    public function getSongNameById($songId)
    {
        $mysqli = new mysqli("localhost", "root", "", "movieandaudio");
        $result = $mysqli->query("SELECT * FROM songs WHERE songID = $songId");
        $row = $result->fetch_assoc();
        $mysqli->close();
        return $row["songName"];
    }

    public function getVideoNameById($movieId)
    {
        $mysqli = new mysqli("localhost", "root", "", "movieandaudio");
        $result = $mysqli->query("SELECT * FROM movies WHERE movieID = $movieId");
        $row = $result->fetch_assoc();
        $mysqli->close();
        return $row["movieName"];
    }

    public function deleteVideoById($movieId)
    {
        $mysqli = new mysqli("localhost", "root", "", "movieandaudio");
        $sql = "DELETE FROM `movieandaudio`.`movies` WHERE `movies`.`movieID` = $movieId";
        $mysqli->query($sql);
        $mysqli->close();
    }

     public function deleteSongById($songId)
    {
        $mysqli = new mysqli("localhost", "root", "", "movieandaudio");
        $sql = "DELETE FROM `movieandaudio`.`songs` WHERE `songs`.`songID` = $songId";
        $mysqli->query($sql);
        $mysqli->close();
    }
}
$db = new database;