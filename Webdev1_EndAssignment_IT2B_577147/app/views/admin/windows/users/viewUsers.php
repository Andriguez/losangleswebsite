<div id="viewusers">
<h1>Users</h1>
    <select id="selectType" class="form-select" onchange="displaySelectedIdAction(this, 'viewUsers')">
        <option selected value="<?php echo isset($selectedUserType) ? $selectedUserType->getUserTypeId() : ''?>"><?php echo isset($selectedUserType) ? $selectedUserType->getUserType() : 'Choose..'?></option>
        <?php foreach ($userTypes as $type){ ?>
            <option value="<?php echo $type->getUserTypeId();?>"><?php echo $type->getUserType();?></option>
        <?php }?>
        <option value="0">All Users</option>
    </select>

    <div id="table-container">
    <table class="table table-hover">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">ID</th>
            <th scope="col">Full Name</th>
            <th scope="col">Email</th>
            <th scope="col">Type</th>
        </tr>
        </thead>
        <tbody>
        <?php if(isset($users))foreach ($users as $user){?>
        <tr>
            <td><input class="form-check-input radioBtn" type="radio" name="radioButton" id="<?php echo $user->getUserId();?>"></td>
            <th scope="row"><?php echo $user->getUserId(); ?></th>
            <td><?php echo $user->getFullName(); ?></td>
            <td><?php echo $user->getEmail(); ?></td>
            <td><?php echo $user->getUserType()->getUserType(); ?></td>

        </tr>
        <?php } ?>
        </tbody>
    </table>
</div>


<div id="button-container">
        <button type="button" class="btn btn-danger" onclick="selectedRadioBtnAction('deleteuser', 'viewusers')">Delete</button>
        <button class="btn btn-primary" type="button" id="editSelectedUserBtn" onclick="selectedRadioBtnOpenWindow('manageUser')">Edit</button>
        <button class="btn btn-success" type="button" onclick="openWindow('manageuser')">Create User</button>
    </div>
</div>
