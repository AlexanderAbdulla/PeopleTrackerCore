<?php
    // includes
    include '../html/header.php';
    require_once '../models/user.php';
    // session start
    session_start();
    $user = unserialize($_SESSION['user']);
    $contacts = $user->getContacts();
    //var_dump($user);
?>

<p> User: <?= $user->getUsername() ?></p>

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
<?php
    include '../html/footer.php';
?>