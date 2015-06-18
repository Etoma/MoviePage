<?php

class database
{
    /**
     * @return array
     */
    public function getAllUsers()
    {
        $mysqli = new mysqli("localhost", "root", "", "movieandaudio");
        $result = $mysqli->query("SELECT * FROM users");
        $users = array();
        while ($row = $result->fetch_assoc()) {
            $users[] = $row;
        }
        $mysqli->close();
        return $users;
    }

    /**
     * @param $userID
     * @return array|int
     */
    public function getUserById($userID)
    {
        $mysqli = new mysqli("localhost", "root", "", "movieandaudio");
        $result = $mysqli->query("SELECT * FROM users WHERE userID = $userID");
        $user = $result ? $result->fetch_assoc() : 0;
        $mysqli->close();
        return $user;
    }

    /**
     * @return array
     */
    public function getAllSongs()
    {
        $mysqli = new mysqli("localhost", "root", "", "movieandaudio");
        $result = $mysqli->query("SELECT * FROM songs");
        $songs = array();
        while ($row = $result->fetch_assoc()) {
            $songs[] = $row;
        }
        $mysqli->close();
        return $songs;
    }

    /**
     * @param $search
     * @return array
     */
    public function searchSongs($search)
    {
        $search = str_replace('*', '%', $search);
        $mysqli = new mysqli("localhost", "root", "", "movieandaudio");
        $result = $mysqli->query("SELECT * FROM songs WHERE songTitle LIKE '%$search%'");
        $songs = array();
        while ($row = $result->fetch_assoc()) {
            $songs[] = $row;
        }
        $mysqli->close();
        return $songs;
    }

    /**
     * @return array
     */
    public function getAllVideos()
    {
        $mysqli = new mysqli("localhost", "root", "", "movieandaudio");
        $result = $mysqli->query("SELECT * FROM movies");
        $movies = array();
        while ($row = $result->fetch_assoc()) {
            $movies[] = $row;
        }
        $mysqli->close();
        return $movies;
    }

    /**
     * @param $search
     * @return array
     */
    public function searchVideos($search)
    {
        $search = str_replace('*', '%', $search);
        $mysqli = new mysqli("localhost", "root", "", "movieandaudio");
        $result = $mysqli->query("SELECT * FROM movies WHERE movieTitle LIKE '%$search%'");
        $movies = array();
        while ($row = $result->fetch_assoc()) {
            $movies[] = $row;
        }
        $mysqli->close();
        return $movies;
    }

    /**
     * @param $filename
     * @param $title
     * @param $artist
     * @param $album
     */
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

    /**
     * @param $songId
     * @return array
     */
    public function getSongDataById($songId)
    {
        $mysqli = new mysqli("localhost", "root", "", "movieandaudio");
        $result = $mysqli->query("SELECT * FROM songs WHERE songID = $songId");
        $row = $result->fetch_assoc();
        $mysqli->close();
        return $row;
    }

    /**
     * @param $movieId
     * @return array
     */
    public function getVideoDataById($movieId)
    {
        $mysqli = new mysqli("localhost", "root", "", "movieandaudio");
        $result = $mysqli->query("SELECT * FROM movies WHERE movieID = $movieId");
        $row = $result->fetch_assoc();
        $mysqli->close();
        return $row;
    }

    /**
     * @param $movieId
     */
    public function deleteVideoById($movieId)
    {
        $mysqli = new mysqli("localhost", "root", "", "movieandaudio");
        $sql = "DELETE FROM `movieandaudio`.`movies` WHERE `movies`.`movieID` = $movieId";
        $mysqli->query($sql);
        $mysqli->close();
    }

    /**
     * @param $songId
     */
    public function deleteSongById($songId)
    {
        $mysqli = new mysqli("localhost", "root", "", "movieandaudio");
        $sql = "DELETE FROM `movieandaudio`.`songs` WHERE `songs`.`songID` = $songId";
        $mysqli->query($sql);
        $mysqli->close();
    }

    /**
     * @param $title
     * @param $artist
     * @param $album
     * @param $songId
     */
    public function changeSong($title, $artist, $album, $songId)
    {
        $mysqli = new mysqli("localhost", "root", "", "movieandaudio");
        $sql = "UPDATE `movieandaudio`.`songs` SET songTitle = '$title', songArtist = '$artist', songAlbum = '$album' WHERE `songs`.`songID` = $songId";
        $mysqli->query($sql);
        $mysqli->close();
    }

    /**
     * @param $title
     * @param $description
     * @param $movieId
     */
    public function changeVideo($title, $description, $movieId)
    {
        $mysqli = new mysqli("localhost", "root", "", "movieandaudio");
        $sql = "UPDATE `movieandaudio`.`movies` SET movieTitle = '$title', movieDescription = '$description' WHERE `movies`.`movieID` = $movieId";
        $mysqli->query($sql);
        $mysqli->close();
    }

    /**
     * @param $firstname
     * @param $lastname
     */
    public function addUser($firstname, $lastname)
    {

    }
}

$db = new database;