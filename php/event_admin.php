<?php
    require_once("php/db_connect.php");
    // TODO: Get the query result in a ordered fashion
    $sql = "SELECT EVENT_TITLE, START_DATE, END_DATE, MODE FROM event";
    $result = mysqli_query($conn, $sql);

    $jsarray = array();
    while($row = mysqli_fetch_assoc($result))
        $jsarray[] = $row;
?>

<script>
    let table = document.querySelector("#my-table");
    let html = "";
    var eventData = <?php echo json_encode($jsarray); ?>;

    $(document).ready(function () {
        $('#my-table').DataTable( {
            responsive: true,
            dom: 'Bfrtip',
            buttons: [
                {
                    init: function(api, node, config) {
                        $(node).removeClass('dt-button')
                    },
                    text: 'Add new event',
                    className: "btn btn-success",
                    action: function() {
                        window.location.href = "event_creation.php";
                    }
                },
            ],
        } );
    });

    html += 
        `<thead>
        <tr>
            <th>Event title</th>
            <th>Start date</th>
            <th>End date</th>
            <th>Mode</th>
            <th class="dt-center">Update event</th>
            <th class="dt-center">Delete event</th>
        </tr>
        </thead>
        <tbody>`;

    for(let i = 0; i < eventData.length; i++)
    {
        html += 
            `<tr>
                <td>${eventData[i]['EVENT_TITLE']}</td>
                <td>${eventData[i]['START_DATE']}</td>
                <td>${eventData[i]['END_DATE']}</td>
                <td>${eventData[i]['MODE']}</td>
                <td class="dt-center">
                    <form method="POST" action="event_update.php">
                        <button class="btn btn-primary" name="EVENT_TITLE" type="submit" value="${eventData[i]['EVENT_TITLE']}">Update</button>
                    </form>
                </td>
                <td class="dt-center">
                    <form method="POST" action="php/event_delete.php">
                        <button class="btn btn-danger" name="EVENT_TITLE" type="submit" value="${eventData[i]['EVENT_TITLE']}">
                            Delete
                        </button>
                    </form>
                </td>
            </tr>`;
    }
    html += `</tbody>`;

    table.innerHTML = html;
</script>