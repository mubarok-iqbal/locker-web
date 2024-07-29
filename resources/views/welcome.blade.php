<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Locker Status Grid</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body, html {
            height: 100%;
            margin: 0;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .grid-container {
            display: grid;
            grid-template-columns: repeat(13, 50px); /* 13 columns with fixed width */
            grid-template-rows: repeat(8, 50px); /* 8 rows with fixed height */
            gap: 5px; /* Gap between grid items */
        }
        .grid-item {
            background-color: #ccc; /* Default color */
            display: flex;
            justify-content: center;
            align-items: center;
            color: #fff;
            font-weight: bold;
            position: relative;
        }
        .grid-item::after {
            content: '';
            position: absolute;
            top: -5px; /* Same as the gap */
            left: -5px; /* Same as the gap */
            right: -5px; /* Same as the gap */
            bottom: -5px; /* Same as the gap */
            background-color: black; /* Color of the gap */
            z-index: -1;
        }
    </style>
</head>
<body>
    <div class="grid-container">
        <!-- Grid items will be inserted here by JavaScript -->
    </div>

    <script>
        const statuses = {
            empty: "rgb(105, 105, 105)",
            open: "rgb(3, 255, 0)",
            occupied: "rgb(2, 131, 4)",
            disabled: "rgb(122, 4, 122)",
            error: "rgb(241, 1, 1)",
            nothing: "rgb(0, 0, 0)"
        };

        const statusKeys = Object.keys(statuses);
        const gridContainer = document.querySelector('.grid-container');

        for (let i = 0; i < 104; i++) { // 13 * 8 = 104
            const gridItem = document.createElement('div');
            gridItem.className = 'grid-item';
            const statusKey = statusKeys[Math.floor(Math.random() * statusKeys.length)];
            gridItem.style.backgroundColor = statuses[statusKey];
            gridItem.innerText = statusKey;
            gridContainer.appendChild(gridItem);
        }
    </script>
</body>
</html>
