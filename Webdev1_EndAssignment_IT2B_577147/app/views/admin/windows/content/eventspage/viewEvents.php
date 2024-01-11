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
                <td><input class="form-check-input radioBtn" type="radio" name="radioButton"></td>
                <th scope="row">139 Angles</th>
                <td>14 oct 2023</td>
                <td>Kaanal 40</td>
                <td>club night</td>
            </tr>
            </tbody>
        </table>
    </div>

    <div id="button-container">
        <button type="button" class="btn btn-danger">Delete</button>
        <button class="btn btn-primary" type="button">Edit</button>
        <button class="btn btn-primary" onclick="openWindow('manageevent')" type="button">Create Event</button>

    </div>
</div>