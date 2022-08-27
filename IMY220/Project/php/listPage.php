<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="../style/eventPageStyle.css">
         <!-- boostrap CSS only -->
        <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css"
        rel="stylesheet"
        integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx"
        crossorigin="anonymous"
        />
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
        <!-- font awesome -->
        <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css"
        integrity="sha512-1sCRPdkRXhBV2PBLUdRb4tMg1w2YPf37qatUFeS7zlBy7jJI8Lf4VHwWfZZfpXtYSLy85pkm9GaYVYMfw5BC1A=="
        crossorigin="anonymous"
        referrerpolicy="no-referrer"
        />
        <!-- favicon -->
        <link
        rel="apple-touch-icon"
        sizes="180x180"
        href="../favicon/apple-touch-icon.png"
        />
        <link
        rel="icon"
        type="image/png"
        sizes="32x32"
        href="../favicon/favicon-32x32.png"
        />
        <link
        rel="icon"
        type="image/png"
        sizes="16x16"
        href="../../favicon/favicon-16x16.png"
        />
        <link rel="manifest" href="../favicon/site.webmanifest" />
        <!-- w3schools bootstrap for modal -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    </head>
    <body>
        <div id="header">
            <?php 
            echo "<div id='backBtn'>
                    <a href='" . $currentPage ."'><i class='fa-solid fa-arrow-left-long fa-3x'></i></a>
                </div>";
                echo "<h1>" . $row['name'] . "</h1>";
                echo "<h4>" . $row['description'] . "</h4>";
            ?>
        </div>
        <br/>
        <div class="container">
            <div class='card-columns'>
            <?php
                // $eventID = $_SESSION["localEvent_id"];
                $query = "SELECT * FROM listEvents WHERE list_id = '$listID'";
                $res = mysqli_query($mysqli, $query);
                while($row = mysqli_fetch_array($res)){
                    $eventID = $row["event_id"];
                    echo $eventID;
                    $query2 = "SELECT * FROM localevents WHERE localEvent_id = '$eventID'";
                    $res2 = mysqli_query($mysqli, $query2);
                    $row2 = mysqli_fetch_array($res2);
                    echo "
                        <div class='card' id='listCard'>
                                <h3 class='card-header'>" . $row2['name'] . " - " . "<small>" . $row2['date'] . "</small></h3>
                                <img class='card-img-top' src='../gallery/" . $row2['image_name'] . "' alt='Card image cap'>
                        </div>";
                }

            ?>
            </div>
        </div>
        
        <!-- Bootstrap Jquery -->
        <script
        src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"
        ></script>
        <!-- PopperJS -->
        <script
        src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.9.2/umd/popper.min.js"
        integrity="sha512-2rNj2KJ+D8s1ceNasTIex6z4HWyOnEYLVC3FigGOmyQCZc2eBXKgOxQmo3oKLHyfcj53uz4QMsRCWNbLd32Q1g=="
        crossorigin="anonymous"
        referrerpolicy="no-referrer"
        ></script>
        <!-- JavaScript Bundle with Popper -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" 
        integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" 
        crossorigin="anonymous">
        </script>
        <!-- w3schools bootstrap script -->
        <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
        <script src="" async defer></script>
    </body>
</html>