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

<table style= "width:100%" class="table table-striped">
    <tr>
        <th> Name </th>
        <th> Job </th>
        <th> Met At/On </th>
        <th> Last Contacted </th>
        <th> Contact Method </th>
    </tr>
    <?php 
        foreach ($contacts as $contact) {
            ?>
            <tr>
                <td><?= $contact->getName() ?></td>
                <td><?= $contact->getJob() ?></td>
                <td><?= $contact->getFirstMeetingLocation() ?></td>
                <td><?= $contact->getLastContacted() ?></td>
                <td><?= $contact->getPrimaryContactMethod() ?></td>
            </tr> 
            <?php
        }
    ?>
</table>

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
        <label for="primmaryContactMethod">First Met At/On </label>
        <input class="form-control" type="text" name="primaryContactMethod" id="primaryContactMethod">
    </div>
    <input type="submit" value="Add New Contact" class="btn btn-success">
</form>

<?php
    include '../html/footer.php';
?>