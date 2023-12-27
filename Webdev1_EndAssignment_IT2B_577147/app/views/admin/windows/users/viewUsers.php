<div id="viewusers">
<h1>Users</h1>
    <select id="selectType" class="form-select">
        <option selected>Choose...</option>
        <option>Admin</option>
        <option>Artist</option>
        <option>Collaborator</option>
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
        <tr>
            <td><input type="checkbox" name="row1"></td>
            <th scope="row">1001</th>
            <td>Andy</td>
            <td>Rodriguez</td>
            <td>andhriguez@outlook.com</td>
            <td>developer</td>
            <td>no</td>
        </tr>
        <tr>
            <td><input type="checkbox" name="row2"></td>
            <th scope="row">1002</th>
            <td>Andy</td>
            <td>Rodriguez</td>
            <td>andhriguez@outlook.com</td>
            <td>admin</td>
            <td><a href="#">yes</a></td>
        </tr>
        <tr>
            <td><input type="checkbox" name="row13"></td>
            <th scope="row">1003</th>
            <td>Andy</td>
            <td>Rodriguez</td>
            <td>andhriguez@outlook.com</td>
            <td>artist</td>
            <td><a href="#">yes</a></td>
        </tr>
        </tbody>
    </table>
</div>


<div id="button-container">
        <button type="button" class="btn btn-danger">Delete</button>
        <button class="btn btn-primary" type="button">Edit</button>
    </div>
</div>
