<div id="viewusers">
<h1>Users</h1>
    <select id="selectType" class="form-select">
        <option selected>Choose...</option>
        <?php foreach ($userTypes as $type){ ?>
            <option value="<?php echo $type->getUserTypeId();?>"><?php echo $type->getUserType();?></option>
        <?php }?>
    </select>

    <div id="table-container">
    <table class="table table-hover">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">ID</th>
            <th scope="col">Name</th>
            <th scope="col">Last Name</th>
            <th scope="col">Email</th>
            <th scope="col">Type</th>
            <th scope="col">Has Content</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($users as $user){?>
        <tr>
            <td><input class="form-check-input userRadio" type="radio" name="radioButton" id="<?php echo $user->getUserId();?>"></td>
            <th scope="row"><?php echo $user->getUserId(); ?></th>
            <td><?php echo $user->getFirstName(); ?></td>
            <td><?php echo $user->getLastName(); ?></td>
            <td><?php echo $user->getEmail(); ?></td>
            <td><?php echo $user->getUserType()->getUserType(); ?></td>
            <td>no</td> <!-- <td><a href="usercontentpage">yes</a></td>-->

        </tr>
        <?php } ?>
        </tbody>
    </table>
</div>


<div id="button-container">
        <button type="button" class="btn btn-danger" onclick="selectedUserAction('deleteuser', true)">Delete</button>
        <button class="btn btn-primary" type="button" id="editSelectedUserBtn" onclick="selectedUserAction('manageuser', false)">Edit</button>
    </div>
</div>
