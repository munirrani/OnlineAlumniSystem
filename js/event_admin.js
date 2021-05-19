let table = document.querySelector("#my-table");
let html = "";
let eventData = [
    {
        title: "Lorem ipsum dolor sit amet consectetur",
        startDate: "Start",
        endDate: "End",
        mode: "Physical",
        updatePath: "",
        deletePath: ""
    },
    {
        title: "Lorem ipsum dolor sit amet consectetur adipisicing elit. Vel corporis temporibus laudantium reprehenderit ",
        startDate: "Start",
        endDate: "End",
        mode: "Virtual",
        updatePath: "",
        deletePath: ""
    },
    {
        title: "Lorem ipsum dolor sit amet consectetur adipisicing elit. Vel corporis temporibus laudantium reprehenderit optio consectetur corrupti sint? Debitis, dolor quam.",
        startDate: "Start",
        endDate: "End",
        mode: "Physical",
        updatePath: "",
        deletePath: ""
    }
];

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
            <td>${eventData[i].title}</td>
            <td>${eventData[i].startDate}</td>
            <td>${eventData[i].endDate}</td>
            <td>${eventData[i].mode}</td>
            <td class="dt-center"><a href="event_creation.html"><button class="btn btn-primary">Update</button></a></td>
            <td class="dt-center"><a href="#"><button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal">Delete</button></a></td>
        </tr>`;
}
html += `</tbody>`;

table.innerHTML = html;