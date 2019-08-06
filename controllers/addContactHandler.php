<?php
    // Includes
    require_once '../lib/dbSuper.php';
    require_once '../models/user.php';
    require_once '../models/contact.php';
    // Start session
    session_start();
    // Get our DB object
    $db = new DbSuper();
    $user = unserialize($_SESSION['user']);
    $contact = new Contact($_POST['firstMeetingLocation'], $_POST['job'], $_POST['lastContacted'], $_POST['name'], null, $_POST['primaryContactMethod']);
    $user->setConn($db->getConn());
    $user->addContact($contact);
    $_SESSION['user'] = serialize($user);
    header('Location: ../views/myPeople.php');
?>