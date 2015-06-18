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
        while ($row = $result ? $result->fetch_assoc() : 0) {
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
        while ($row = $result ? $result->fetch_assoc() : 0) {
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
        while ($row = $result ? $result->fetch_assoc() : 0) {
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
        while ($row = $result ? $result->fetch_assoc() : 0) {
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
        while ($row = $result ? $result->fetch_assoc() : 0) {
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
        $sql = "INSERT INTO movieandaudio.songs (songName, songArtist, songAlbum, songTitle) VALUES ('$filename', '$artist', '$album', '$title')";
        $mysqli->query($sql);
        $mysqli->close();
    }

    public function insertNewVideo($filename, $title, $description)
    {
        $mysqli = new mysqli("localhost", "root", "", "movieandaudio");
        $sql = "INSERT INTO movieandaudio.movies (movieName, movieDescription, movieTitle) VALUES ('$filename', '$description', '$title');";
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
        $row = $result ? $result->fetch_assoc() : array();
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
        $row = $result ? $result->fetch_assoc() : array();
        $mysqli->close();
        return $row;
    }

    /**
     * @param $movieId
     */
    public function deleteVideoById($movieId)
    {
        $mysqli = new mysqli("localhost", "root", "", "movieandaudio");
        $sql = "DELETE FROM movieandaudio.movies WHERE movies.movieID = $movieId";
        $mysqli->query($sql);
        $mysqli->close();
    }

    /**
     * @param $songId
     */
    public function deleteSongById($songId)
    {
        $mysqli = new mysqli("localhost", "root", "", "movieandaudio");
        $sql = "DELETE FROM movieandaudio.songs WHERE songs.songID = $songId";
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
        $sql = "UPDATE movieandaudio.songs SET songTitle = '$title', songArtist = '$artist', songAlbum = '$album' WHERE songs.songID = $songId";
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
        $sql = "UPDATE movieandaudio.movies SET movieTitle = '$title', movieDescription = '$description' WHERE movies.movieID = $movieId";
        $mysqli->query($sql);
        $mysqli->close();
    }

    /**
     * @param $firstname
     * @param $lastname
     */
    public function addUser($firstname, $lastname, $email)
    {
        $mysqli = new mysqli("localhost", "root", "", "movieandaudio");
        $sql = "INSERT INTO movieandaudio.users (firstname, lastname, userEmail) VALUES ('$firstname', '$lastname', '$email')";
        $mysqli->query($sql);
        $mysqli->close();
    }

    /**
     * @param $fieldName
     * @param $val
     * @param $userId
     */
    public function changeUser($fieldName, $val, $userId)
    {
        $mysqli = new mysqli("localhost", "root", "", "movieandaudio");
        $sql = "UPDATE movieandaudio.users SET $fieldName = '$val' WHERE userID = $userId";
        $mysqli->query($sql);
        $mysqli->close();
    }

    /**
     * @param $mediaId
     * @param $mediaType
     * @param $userId
     * @return bool
     */
    public function isFavorite($mediaId, $mediaType, $userId)
    {
        if ((int)$mediaType === 1) {
            $table = 'movieFavorites';
            $idName = 'movieID';
        } elseif ((int)$mediaType === 2) {
            $table = 'songFavorites';
            $idName = 'songID';
        }
        $mysqli = new mysqli("localhost", "root", "", "movieandaudio");
        $sql = "SELECT * FROM $table WHERE $idName = $mediaId AND userID = $userId";
        $result = $mysqli->query($sql);
        $row = $result ? $result->fetch_assoc() : array();
        $mysqli->close();
        return count($row) ? true : false;
    }

    /**
     * @param $mediaId
     * @param $mediaType
     * @param $userId
     */
    public function setFavorite($mediaId, $mediaType, $userId)
    {
        if ((int)$mediaType === 1) {
            $table = 'movieFavorites';
            $idName = 'movieID';
        } elseif ((int)$mediaType === 2) {
            $table = 'songFavorites';
            $idName = 'songID';
        }
        $mysqli = new mysqli("localhost", "root", "", "movieandaudio");
        $sql = "INSERT INTO $table ($idName, userID) VALUES ($mediaId, $userId)";
        $mysqli->query($sql);
        $mysqli->close();
    }

    /**
     * @param $mediaId
     * @param $mediaType
     * @param $userId
     */
    public function removeFavorite($mediaId, $mediaType, $userId)
    {
        if ((int)$mediaType === 1) {
            $table = 'movieFavorites';
            $idName = 'movieID';
        } elseif ((int)$mediaType === 2) {
            $table = 'songFavorites';
            $idName = 'songID';
        }
        $mysqli = new mysqli("localhost", "root", "", "movieandaudio");
        $sql = "DELETE FROM $table WHERE $idName = $mediaId AND userID = $userId";
        $mysqli->query($sql);
        $mysqli->close();
    }

    /**
     * @param $userId
     * @return array
     */
    public function getFavoritesOfUser($userId)
    {
        $mysqli = new mysqli("localhost", "root", "", "movieandaudio");
        $result = $mysqli->query("SELECT * FROM movieFavorites JOIN movies ON movieFavorites.movieID = movies.movieID WHERE movieFavorites.userID = $userId");
        $movieFavorites = array();
        while ($row = $result ? $result->fetch_assoc() : 0) {
            $movieFavorites[] = $row;
        }
        $result = $mysqli->query("SELECT * FROM songFavorites JOIN songs ON songFavorites.songID = songs.songID WHERE songFavorites.userID = $userId");
        $songFavorites = array();
        while ($row = $result ? $result->fetch_assoc() : 0) {
            $songFavorites[] = $row;
        }
        $favorites = array_merge($movieFavorites, $songFavorites);
        $mysqli->close();
        return $favorites;
    }
}

$db = new database;