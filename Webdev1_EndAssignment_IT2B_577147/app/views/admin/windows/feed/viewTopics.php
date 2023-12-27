<div id="main-page">
    <h1>Feed Topics</h1>
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
                <th scope="row">General</th>
            </tr>
            <tr>
                <td><input type="checkbox" name="row1"></td>
                <th scope="row">HRT</th>
            </tr>
            <tr>
                <td><input type="checkbox" name="row1"></td>
                <th scope="row">Gigs</th>
            </tr>
            </tbody>
        </table>
    </div>


    <div id="button-container">
        <button type="button" class="btn btn-danger">Delete</button>
        <button class="btn btn-primary" type="button">Edit</button>
        <button onclick="openWindow('admin/managetopic')" class="btn btn-success" type="button">Create new</button>

    </div>
</div>