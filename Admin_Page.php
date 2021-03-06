<?php

include('db.php');

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
          integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
            integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
            crossorigin="anonymous"></script>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
            integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
            crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
            integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
            crossorigin="anonymous"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <link rel="stylesheet" href="Admin_Page_Style.css">
    <title>Admin Page</title>
</head>

<body>


<div class="container">

    <!--icon image bar-->
    <div class="row bottom maintab">
        <div class="col-12">

            <img class="bottom imgicon" src="images/icon.png" alt="logo" style="width:180px; height:100px;">

        </div>

    </div>


    <!--Administration bar-->

    <div class="admin"><h2>Administration</h2></div>


    <!--first row cards-->
    <div class="row mt-3 mb-5">

        <div class="col-4">
            <!--first card-->
            <div class="card boader">

                <div class="card-header">
                    <h3>Sales Revenue<h3>
                </div>

                <div class="card-body">
                    <?php

                    $revenue = $con->query("SELECT SUM(price) FROM sales");
                    $rev = $revenue->fetch_array();


                    ?>
                    <h2>Rs.<?php echo $rev[0]; ?></h2>

                </div>

            </div>
        </div>

        <div class="col-4">
            <!--second card-->
            <div class="card boader">

                <div class="card-header">
                    <h3>Total Customers<h3>
                </div>

                <div class="card-body">
                    <?php

                    $customer = $con->query("SELECT COUNT(customer_id) FROM customer");
                    $cus = $customer->fetch_array();


                    ?>
                    <h2><?php echo $cus[0]; ?><h2>

                </div>

            </div>

        </div>


        <div class="col-4">
            <!--third card-->
            <div class="card boader">

                <div class="card-header">
                    <h3>Total Sales<h3>
                </div>

                <div class="card-body">

                    <?php

                    $sales = $con->query("SELECT COUNT(id) FROM sales");
                    $sale = $sales->fetch_array();


                    ?>
                    <h2><?php echo $sale[0]; ?><h2>
                </div>
            </div>

        </div>


    </div>


    <!--second row cards-->
    <div class="row mt-3 mb-5">

        <div class="col-6">
            <!--first card-->
            <div class="card boader">

                <div class="card-header">
                    <h3>Available stock<h3>
                </div>

                <div class="card-body">

                    <?php

                    $stock = $con->query("SELECT COUNT(code),SUM(stock) FROM items");
                    $st = $stock->fetch_array();


                    ?>
                    <h2>Item types:- <?php echo $st[0]; ?></h2>


                    <h2>Total quantity:- <?php echo $st[1]; ?></h2>
                </div>

            </div>

        </div>
        <div class="col-2">
        </div>

        <div class="col-4">
            <!--second card-->
            <div class="card boader">

                <div class="card-header">
                    <h3>Today Purchases<h3>
                </div>

                <div class="card-body">
                    <?php
                    $date = date("Y-m-d");
                    $today = $con->query("SELECT COUNT(id) FROM sales WHERE `date`='" . $date . "'");

                    $tod = $today->fetch_array();


                    ?>

                    <h2><?php echo $tod[0]; ?><h2>
                </div>
            </div>

        </div>


    </div>


</div>


</body>

</html>