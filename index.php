<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Display Data</title>
    <style>
       header{
        background-color: aquamarine;

       }
        table {
            width: 100%;
        }
        th, td {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }
        th {
            color: #ddd232;
            background-color: #ffff;
        }
    </style>
</head>
<body>
    <header>    <h2>Books</h2>
</header>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Book Title</th>
                <th>Author</th>
                <th>Year</th>
            </tr>
        </thead>
        <tbody>
            <?php
                $conn = mysqli_connect("localhost", "root", "", "dbbook");

                if (!$conn) {
                    die("Connection failed: " . mysqli_connect_error());
                }

                $sql = "SELECT * FROM books";
                $result = mysqli_query($conn, $sql);

                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<tr>";
                        echo "<td>" . $row["id"] . "</td>";
                        echo "<td>" . $row["title"] . "</td>";
                        echo "<td>" . $row["author"] . "</td>";
                        echo "<td>" . $row["year"] . "</td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='4'>No data found</td></tr>";
                }

                mysqli_close($conn);
            ?>
        </tbody>
    </table>
</body>
</html>
