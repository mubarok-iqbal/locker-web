<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Locker Status</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .container {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .grid-container {
            display: grid;
            gap: 5px;
        }
        .grid-item {
            width: 50px;
            height: 50px;
            border: 1px solid black;
            cursor: pointer; /* Pointer on hover */
        }
        .title {
            margin-bottom: 20px; /* Space between title and grid */
        }
    </style>
</head>
<body>
<div class="container">
    <h3 class="title">Locker Status</h3>
    <div class="grid-container" id="lockerGrid">
        <!-- Grid items will be populated by JavaScript -->
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>
<script>
    // Function to fetch locker data from the API
    function fetchLockerData() {
        $.ajax({
            url: '/api/locker-data', // API endpoint
            method: 'GET',
            success: function({data}) {
                // Log data for debugging purposes
                console.log(data);

                // Define number of columns and rows
                const columns = 13;
                const rows = Math.ceil(data.length / columns);

                // Set CSS properties for the grid
                $('#lockerGrid').css('grid-template-columns', `repeat(${columns}, 50px)`);
                $('#lockerGrid').css('grid-template-rows', `repeat(${rows}, 50px)`);

                // Clear the grid before adding new data
                $('#lockerGrid').empty();

                // Initialize grid items based on API data
                data.forEach(function(cell) {
                    $('#lockerGrid').append(`
                        <div class="grid-item" style="background-color: ${cell.status_color};"
                             data-toggle="tooltip"
                             data-html="true"
                             title="Cell: ${cell.cell_name}<br>Status: ${cell.status_name}<br>Period: ${cell.period} hours">
                        </div>
                    `);
                });

                // Initialize Bootstrap tooltips with HTML support
                $('[data-toggle="tooltip"]').tooltip();
            },
            error: function() {
                // Alert user if there is an error fetching data
                alert('Error fetching locker data');
            }
        });
    }

    $(document).ready(function() {
        // Fetch data immediately when the page loads
        fetchLockerData();

        // Set interval to fetch data every 60 seconds (60000 ms)
        setInterval(fetchLockerData, 60000);
    });
</script>
</body>
</html>
