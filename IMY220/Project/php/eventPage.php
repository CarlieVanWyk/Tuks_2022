<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="../style/eventPageStyle.css">
        <!-- google fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Baloo+2:wght@600&display=swap" rel="stylesheet">
        <link
        rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Dosis"
        />
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
                echo "<h4>" . $row['date'] . "</h4>";
            ?>
        </div>
        <br/>
        <div class="container">
            <div class="row" >
                <div class="col align-self-center">
                    <div id="eventImg" class="text-center">
                        <?php 
                            echo "<img class='rounded' width='70%' src='../gallery/" . $row['image_name'] . "' alt=''>";
                        ?>
                    </div>
                </div>
                <div class="col align-self-center">
                    <div class="text-center" id="eventDetails">
                        <div id="eventDesc">
                            <i class='fa-solid fa-note-sticky fa-2x'></i>
                            <?php 
                                echo "<p>" . $row['description'] . "</p>";
                            ?>
                        </div>
                        <div id="eventLocation">
                            <i class='fa-solid fa-map-marker-alt fa-2x'></i>
                            <?php 
                                echo "<p>" . $row['location'] . "</p>";
                            ?>
                        </div>
                        <div id="eventHash">
                            <i class='fa-solid fa-hashtag fa-2x'></i>
                            <?php 
                                echo "<p>" . $row['hashtags'] . "</p>";
                            ?>
                        </div>
                    </div>
                </div>
            </div>
            <br/>
            <div class="row" >
                <div class="col align-self-center">
                    <div id="eventImg" class="text-center">
                        <?php 
                            if(isset($row2['image_name'])){
                                echo "<img class='rounded' width='70%' src='../gallery/" . $row2['image_name'] . "' alt=''>";
                            }
                        ?>
                    </div>
                </div>
                <div class="col align-self-center">
                    <div class="text-center" id="eventDetails">
                        <div id="eventDesc">
                            <?php 
                                if(isset($row2['description'])){
                                    echo "<i class='fa-solid fa-note-sticky fa-2x'></i>";
                                    echo "<p>" . $row2['description'] . "</p>";
                                    echo "<i class='fa-solid fa-star'></i>";
                                    echo "<p>" . $row2['rating'] . "</p>";
                                }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
            <br/>
            
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