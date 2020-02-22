<?php
include("../controllers/SearchController.php");
include("../controllers/AlbumsController.php");
include("../controllers/ArtistsController.php");
// header('Access-Control-Allow-Origin: *');

if (isset($_POST)) {

    switch ($_POST["op"]) {
        case "search":
            search($_POST);
            break;

        case "getAlbums":
            getAlbums($_POST);
            break;

        case "getArtists":
            getArtists($_POST);
            break;

        default:
            die("Wrong data received");
    }
}

function search($i_data)
{
    $search = new SearchController();
    $x = $search->search($i_data);
    echo $x;
    // include_once()
    die();
}

function getAlbums($i_data)
{
    $getAlbums  = new AlbumsController();
    $x = $getAlbums->getAlbums($i_data);
    print_r($x);
    die();
}

function getArtists($i_data)
{
    $getArtists = new ArtistsController();
    $x = $getArtists->getArtists($i_data);
    print_r($x);
    die();
}
die();
