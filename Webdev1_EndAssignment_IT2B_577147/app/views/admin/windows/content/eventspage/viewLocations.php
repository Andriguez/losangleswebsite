<div id="view-locations">
    <h1>Locations</h1>
    <div id="table-container">
        <table class="table table-hover">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">name</th>
                <th scope="col">city</th>
                <th scope="col">address</th>
                <th scope="col">country</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td><input type="checkbox" name="row1"></td>
                <th scope="row">Kaanal 40</th>
                <td>Amsterdam</td>
                <td>whatever address</td>
                <td>Netherlands</td>
            </tr>
            <tr>
                <td><input type="checkbox" name="row1"></td>
                <th scope="row">PIP</th>
                <td>The Hague</td>
                <td>whatever address</td>
                <td>Netherlands</td>
            </tr>
            <tr>
                <td><input type="checkbox" name="row1"></td>
                <th scope="row">Poing</th>
                <td>Roterdam</td>
                <td>whatever address</td>
                <td>Netherlands</td>
            </tr>
            </tbody>
        </table>
    </div>

    <div id="button-container">
        <button type="button" class="btn btn-danger">Delete</button>
        <button class="btn btn-primary" type="button">Edit</button>
        <button class="btn btn-success" onclick="openWindow('/admin/managelocation')" type="button">Create Location</button>
    </div>
</div>
