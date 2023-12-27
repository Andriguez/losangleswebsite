<div id="viewtypes">
    <h1>Event Types</h1>
    <div id="table-container">
        <table class="table table-hover">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">name</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td><input type="checkbox" name="row1"></td>
                <th scope="row">Club Night</th>
            </tr>
            <tr>
                <td><input type="checkbox" name="row1"></td>
                <th scope="row">Exhibition</th>
            </tr>
            <tr>
                <td><input type="checkbox" name="row1"></td>
                <th scope="row">Livestream</th>
            </tr>
            </tbody>
        </table>
    </div>


    <div id="button-container">
        <button type="button" class="btn btn-danger">Delete</button>
        <button class="btn btn-primary" type="button">Edit</button>
        <button class="btn btn-success" onclick="openWindow('admin/managetype')" type="button">Create Type</button>

    </div>
</div>