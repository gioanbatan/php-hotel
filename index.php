<?php

$hotels = [

    [
        'name' => 'Hotel Belvedere',
        'description' => 'Hotel Belvedere Descrizione',
        'parking' => true,
        'vote' => 4,
        'distance_to_center' => 10.4
    ],
    [
        'name' => 'Hotel Futuro',
        'description' => 'Hotel Futuro Descrizione',
        'parking' => true,
        'vote' => 2,
        'distance_to_center' => 2
    ],
    [
        'name' => 'Hotel Rivamare',
        'description' => 'Hotel Rivamare Descrizione',
        'parking' => false,
        'vote' => 1,
        'distance_to_center' => 1
    ],
    [
        'name' => 'Hotel Bellavista',
        'description' => 'Hotel Bellavista Descrizione',
        'parking' => false,
        'vote' => 5,
        'distance_to_center' => 5.5
    ],
    [
        'name' => 'Hotel Milano',
        'description' => 'Hotel Milano Descrizione',
        'parking' => true,
        'vote' => 2,
        'distance_to_center' => 50
    ],

];
?>

<?php
$form_info = $_GET;
var_dump($form_info);
if (!empty($form_info)) {
    var_dump($form_info['parking']);
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <title>PHP Hotel</title>
</head>

<body>
    <div class="container">
        <div class="ms_content mt-2">
            <section class="ms_form my-4">
                <h1 class="text-center">PHP HOTELS</h1>

                <h3>Filters:</h3>

                <form action="index.php" method="GET">
                    <label for="parking">Parking area</label>
                    <input type="checkbox" id="parking" name="parking" value="true">

                    <button type="submit">Submit!</button>
                </form>
            </section>

            <section class="ms_table">
                <table class="table">
                    <thead>
                        <thead>
                            <tr>
                                <th>Number</th>
                                <?php
                                foreach ($hotels[0] as $key => $value) {
                                    echo "<th>" . ucfirst(str_replace("_", " ", $key)) .
                                        "</th>";
                                }
                                ?>
                            </tr>
                        </thead>
                    <tbody>
                        <?php
                        if (!empty($form_info)) {
                            foreach ($hotels as $hotel_index => $single_hotel) {
                                // var_dump($single_hotel);
                                // var_dump($single_hotel['parking']);
                                if (($single_hotel['parking'] && $form_info['parking'] === "true") || ($form_info['parking'] === "false")) {
                                    echo "Induinat";
                                    echo "<tr>";
                                    echo "<td>" . $hotel_index + 1 . "</td>";
                                    foreach ($hotels[$hotel_index] as $key => $value) {
                                        echo "<td>{$value}</td>";
                                    }
                                    echo "</tr>";
                                }
                            }
                        } else {
                            for ($i = 0; $i < count($hotels); $i++) {
                                echo "<tr>";
                                echo "<td>" . $i + 1 . "</td>";
                                foreach ($hotels[$i] as $key => $value) {
                                    echo "<td>{$value}</td>";
                                }
                                echo "</tr>";
                            }
                        }
                        ?>
                    </tbody>
                </table>
            </section>
        </div>
    </div>
</body>

</html>