<?php

$dbConnection = new mysqli("localhost", "root", "", "Modul10");

if ($dbConnection->connect_error) {
    die("En feil skjedde: " . $dbConnection->connect_error);
}

function getJobById($jobId) {
    global $dbConnection;
    $query = "SELECT * FROM jobs WHERE id = $jobId";
    $result = $dbConnection->query($query);
    return $result->fetch_assoc();
}

function getRandomJobByCategory($category) {
    global $dbConnection;
    $query = "SELECT * FROM jobs WHERE category = '$category' ORDER BY RAND() LIMIT 1";
    $result = $dbConnection->query($query);
    return $result->fetch_assoc();
}

function getJobsByLocation($location) {
    global $dbConnection;
    $query = "SELECT * FROM jobs WHERE location LIKE '%$location%'";
    $result = $dbConnection->query($query);

    $jobs = array();
    while ($row = $result->fetch_assoc()) {
        $jobs[] = $row;
    }

    return $jobs;
}

function getJobsByCategory($cat) {
    global $dbConnection;
    $query = "SELECT * FROM jobs WHERE category LIKE '%$cat%'";
    $result = $dbConnection->query($query);

    $jobs = array();
    while ($row = $result->fetch_assoc()) {
        $jobs[] = $row;
    }

    return $jobs;
}

if (isset($_GET['action'])) {
    $action = $_GET['action'];

    switch ($action) {
        case 'getJobById':
            if (isset($_GET['jobId'])) {
                $jobId = $_GET['jobId'];
                $res = getJobById($jobId);
            }
            break;
        case 'getRandomJobByCategory':
            if (isset($_GET['category'])) {
                $category = $_GET['category'];
                $res = getRandomJobByCategory($category);
            }
            break;
        case 'getJobsByLocation':
            if (isset($_GET['location'])) {
                $location = $_GET['location'];
                $res = getJobsByLocation($location);
            }
            break;
        case 'getJobsByCategory':
            if (isset($_GET['category'])) {
                $cat = $_GET['category'];
                $res = getJobsByCategory($cat);
            }
            break;
        default:
            $res = array('error' => 'Ugyldig handling');
            break;
    }

    header('Content-Type: application/json');
    echo json_encode($res);
}

$dbConnection->close();

?>
