<?php
    // Includes
    require_once '../lib/dbSuper.php';
    require_once '../models/user.php';
    require_once '../models/contact.php';
    // Start sesison
    session_start();
    // Get our ID values
    $user = unserialize($_SESSION['user']);
    $userID = $user->getID();
    $contactID = $_POST['selectedContact'];
    // Create a new contact
    var_dump($_POST);
    $db = new DbSuper();
    $user->setConn($db->getConn());
    $user->editContact($contactID, $_POST['firstMeetingLocation'], $_POST['job'], $_POST['lastContacted'], 
        $_POST['name'], $_POST['primaryContactMethod']);
    $_SESSION['user'] = serialize($user);
    header('Location: ../views/myPeople.php');
?>