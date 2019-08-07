<?php
    // includes
    include '../html/header.php';
    require_once '../models/user.php';
    // session start
    session_start();
    if(!isset($_SESSION['user']) || ($_SESSION['user'] == null || ($_SESSION['user'] == ""))) {
        header('Location: ../index.php');
        exit();
    } 
    $user = unserialize($_SESSION['user']);
    $contacts = $user->getContacts();
?>
<div class="text-right"> 
    User: <a href="/"> <?= $user->getUsername() ?> </a>
    <a href="../controllers/logoutHandler.php" class="btn btn-sm btn-danger text-right">Logout</a>
</div>

<form action="../controllers/editContactHandler.php" id="editForm" method="post">
    <table style= "width:100%" class="table table-striped">
        <tr>
            <th> Name </th>
            <th> Job </th>
            <th> Met At/On </th>
            <th> Last Contacted </th>
            <th> Contact Method </th>
            <th> Action </th>
        </tr>
        <?php 
            foreach ($contacts as $contact) {
                ?>
                <tr>
                    <td><input class="disabledInput <?= $contact->getID() ?>" id="name<?= $contact->getID()?>"
                        disabled type="text" value="<?= $contact->getName() ?>">
                    </td>
                    <td><input class="disabledInput <?= $contact->getID() ?>" id="job<?= $contact->getID()?>" 
                        disabled type="text" value="<?= $contact->getJob() ?>">
                    </td>
                    <td><input class="disabledInput <?= $contact->getID() ?>" id="firstMeetingLocation<?= $contact->getID()?>"
                        disabled type="text" value="<?= $contact->getFirstMeetingLocation() ?>">
                    </td>
                    <td><input class="disabledInput <?= $contact->getID() ?>" 
                        disabled type="text" value="<?= $contact->getLastContacted() ?>" id="lastContacted<?= $contact->getID()?>">
                    </td>
                    <td><input class="disabledInput <?= $contact->getID() ?>" 
                        disabled type="text" value="<?= $contact->getPrimaryContactMethod() ?>" id="primaryContactMethod<?= $contact->getID()?>">
                    </td>
                    <td>
                        <button type="button" class="btn btn-sm btn-primary">View</button>
                        <button type="button" onclick="enableThisForm('<?= $contact->getID() ?>')" class="btn btn-sm btn-warning edit<?=$contact->getID()?>">Edit</button>
                        <button type="button" class="btn btn-sm btn-danger">Delete</button> 
                    </td>
                </tr> 
                <?php
            }
        ?>
    </table>
    <input type="hidden" id="job" name="job">
    <input type="hidden" id="name" name="name">
    <input type="hidden" id="lastContacted" name="lastContacted">
    <input type="hidden" id="firstMeetingLocation" name="firstMeetingLocation">
    <input type="hidden" id="primaryContactMethod" name="primaryContactMethod">
    <input type="hidden" id="selectedContact" name="selectedContact" val="">
</form>

<h2> Add New Contact </h2>
<form class="form" action="../controllers/addContactHandler.php" method="post">
    <div class="form-group">
        <label for="name">Name:</label>
        <input class="form-control" type="text" name="name" id="name">
        <label for="job">Job:</label>
        <input class="form-control" type="text" name="job" id="job">
        <label for="firstMeetingLocation">First Met At/On: </label>
        <input class="form-control" type="text" name="firstMeetingLocation" id="firstMeetingLocation">
        <label for="lastContacted">Last Contacted On: </label>
        <input class="form-control" type="text" name="lastContacted" id="lastContacted">
        <label for="primmaryContactMethod">Primary Contact Method </label>
        <input class="form-control" type="text" name="primaryContactMethod" id="primaryContactMethod">
    </div>
    <input type="submit" value="Add New Contact" class="btn btn-success">
</form>

<?php
    include '../html/footer.php';
?>