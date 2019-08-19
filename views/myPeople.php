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
    User: <b> <?= $user->getUsername() ?> </b>
    <a href="../controllers/logoutHandler.php" class="btn btn-sm btn-danger text-right">Logout</a>
</div>

<form class="entryForm" class="formBorder" action="../controllers/editContactHandler.php" id="editForm" method="post">
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
                    <td><input type="date" class="disabledInput <?= $contact->getID() ?>" 
                        disabled type="text" value="<?= $contact->getLastContacted() ?>" id="lastContacted<?= $contact->getID()?>">
                    </td>
                    <td><input class="disabledInput <?= $contact->getID() ?>" 
                        disabled type="text" value="<?= $contact->getPrimaryContactMethod() ?>" id="primaryContactMethod<?= $contact->getID()?>">
                    </td>
                    <td>
                        <button type="button" onclick="openView('<?= $contact->getID()?>')" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#viewModal">View</button>
                        <button type="button" onclick="enableThisForm('<?= $contact->getID() ?>')" class="btn btn-sm btn-warning edit<?=$contact->getID()?>">Edit</button>
                        <a href="../controllers/deleteContactHandler.php?contactID=<?= $contact->getID()?>" onclick="deleteThisContact('<?= $contact->getID() ?>')" class="btn btn-sm btn-danger">Delete</a> 
                    </td>
                    <td class="d-none">
                        <p id="details<?= $contact->getID()?>"> <?= $contact->getDetails() ?> </p>
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
    <div>
        <button type="button" class="btn btn-success text-right" data-toggle="modal" data-target="#myModal">Add</button>
    </div>
</form>

<!-- The Modal -->
<div class="modal" id="myModal">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Add New Contact</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        <form class="form" action="../controllers/addContactHandler.php" method="post">
        <div class="form-group">
            <label for="name">Name:</label>
            <input class="form-control" type="text" name="name" id="name">
            <label for="job">Job:</label>
            <input class="form-control" type="text" name="job" id="job">
            <label for="firstMeetingLocation">First Met At/On: </label>
            <input class="form-control" type="text" name="firstMeetingLocation" id="firstMeetingLocation">
            <label for="lastContacted">Last Contacted On: </label>
            <input type="date" class="form-control" type="text" name="lastContacted" id="lastContacted">
            <label for="primaryContactMethod">Primary Contact Method: </label>
            <input class="form-control" type="text" name="primaryContactMethod" id="primaryContactMethod">
            <div class="form-group">
                <label for="details">Details: </label>
                <textarea class="form-control" type="text" name="details" id="details"></textarea>
            </div>
        </div>
        
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <input type="submit" value="Add" class="btn btn-success"> 
        </form>
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>

    </div>
  </div>
</div>

  <!-- The Modal -->
<div class="modal" id="viewModal">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 id="viewName">Alex Abdulla</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        <form class="form" action="../controllers/editDescriptionHandler.php" method="post">
        <div class="form-group">
            <b>Job:</b>
            <label id="viewJob">Programmer</label>
            <br>
            <b>First Met At/On: </b>
            <label id="viewFirstMeetingLocation">Tinder</label>
            <br>
            <b>Last Contacted On: </b>
            <label id="viewLastContactedOn"> 2019-08-19</label>
            <br>
            <b>Primary Contact Method: </b>
            <label id="viewPrimaryContactMethod"> Skype </label>
            <br>
            <b>Details:</b>
            <br>
            <br>
            <div class="form-group">
               <textarea class="form-control" id="viewDetails" name="viewDetails"></textarea>
            </div>
            <input id="viewSelectedContact" name="selectedContact" class="d-none">
        </div>
        
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <input type="submit" value="Save" class="btn btn-warning"> 
        </form>
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>

<?php
    include '../html/footer.php';
?>