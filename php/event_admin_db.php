<?php
    require_once("php/db_connect.php");

    $result = "";
    try
    {
        $sql = "SELECT EVENT_TITLE, START_DATE, END_DATE, MODE FROM event WHERE START_DATE >= CURDATE() ORDER BY START_DATE";
        // $sql = "SELECT EVENT_TITLE, START_DATE, END_DATE, MODE FROM event ORDER BY START_DATE";
        $result = mysqli_query($conn, $sql);
        mysqli_close($conn);
    }
    catch(PDOEXCEPTION $e)
    {
        die("Error: " . $e->getMessage());
    }

    $jsarray = array();
    while($row = mysqli_fetch_assoc($result))
        $jsarray[] = $row;
?>

<script>
    let table = document.querySelector("#my-table");
    var eventData = <?php echo json_encode($jsarray); ?>;

    $(document).ready(function () {
        $('#my-table').DataTable( {
            "order": [],
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

    let html = "<tbody>";
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

    table.innerHTML += html;
</script>