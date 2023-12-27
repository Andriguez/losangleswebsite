<div id="view-events">
    <h1>Events</h1>
    <div id="table-container">
        <table class="table table-hover">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">name</th>
                <th scope="col">date</th>
                <th scope="col">location</th>
                <th scope="col">type</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td><input type="checkbox" name="row1"></td>
                <th scope="row">139 Angles</th>
                <td>14 oct 2023</td>
                <td>Kaanal 40</td>
                <td>club night</td>
            </tr>
            <tr>
                <td><input type="checkbox" name="row2"></td>
                <th scope="row">Parish</th>
                <td>15 dec 2023</td>
                <td>Pip den haag</td>
                <td>club night</td>
            </tr>
            <tr>
                <td><input type="checkbox" name="row3"></td>
                <th scope="row">Poing Pride</th>
                <td>2 jun 2023</td>
                <td>Poing</td>
                <td>club night</td>
            </tr>
            </tbody>
        </table>
    </div>

    <div id="button-container">
        <button type="button" class="btn btn-danger">Delete</button>
        <button class="btn btn-primary" type="button">Edit</button>
        <button class="btn btn-primary" onclick="openWindow('/admin/manageevent')" type="button">Create Event</button>

    </div>
</div>