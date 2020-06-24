

<!doctype html>

<html lang="en">

  <head>

    <!-- Required meta tags -->

    <meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">



    <!-- Bootstrap CSS -->

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">



    <!--bootstrap template copied from startbootstrap heroic features template

    Start Bootstrap - Heroic Features (https://startbootstrap.com/template-overviews/heroic-features)-->

    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">



    <link rel="canonical" href="https://getbootstrap.com/docs/4.5/examples/sticky-footer/">



    <!--google fonts-->

    <link href='https://fonts.googleapis.com/css?family=Lato' rel='stylesheet'>

    <title>Web Application</title>

    <style>

    /*for background color */

    body,html{

      height: 100%;

      width: 100%;

      font-family: Arial ;



    }

      .container, body{

        background-color: gray;

         color: white;

        }
      



      /*navbar styling */

      .navbar{padding: .7rem;}

      .navbar-nav li{padding: center;}

      .nav-link{font-size: 1.1em !important;}



       /*sticky footer */

       .footer{

         /* position:fixed; */

         width: 100%;
height: auto;
         bottom: 0;}

    </style>

  </head>

  <body>

    

    <?php include "app/connection.php" ?>



    <!--navigation bar row-->

    <div class="row">



      <div class="col">



     <!--new navigation -->

        <nav class="navbar navbar-expand-md navbar-dark bg-dark sticky-top">

       <!--trial for logo -->

       <div class="container-fluid">

          <a class="navbar-brand" href="index.php" ><img src="images/logo_scp.jpg" height="90px" width="150px"></a>

          <button class="navbar-toggler" type="button" data-toggle="collapse"

          data-target="#navbarResponsive">

          <span class="navbar-toggler-icon"></span>

          </button>

          <div class="collapse navbar-collapse" id="navbarResponsive">

              <!--added navbar-expand-md and sticky-top -->

       <ul class="navbar-nav ml-auto">

        

        <!--run php loop through the database and display page names here-->

        <?php foreach($result as $page): ?>



        <li class="nav-item active">

          <a href="index.php?page='<?php echo $page['pg']; ?>' "class="nav-link text-light"><?php echo $page['pg']; ?></a>

        </li>



        <?php endforeach; ?>





        <li class="nav-item active">

          <a href="forms/form.php" class="nav-link text-light">Enter new SCP Page</a>

        </li>

       

       </ul>



          </div>

          </div>

          <!--trial ended -->

      

      </nav>

      

      



      </div>



         

    </div>



     <!--database content row-->

     <div class="container">

     <div class="row">



        <div class="col">



            <?php

            

              if(isset($_GET['page']))

              {

                // remove single quotes from page get value

                $pg = trim($_GET['page'], "'");



                //run sql command to select record based on get value

                $record = $connection->query("select * from pages where pg='$pg'") or die($connection->error());



                //convert $record into an array for us to echo out the individual fields on screen.

                $row = $record->fetch_assoc();



                //create variables that hold data from all table fields

                $class = $row['class'];

                $image = $row['image'];

                $process = $row['process'];

                $description = $row['description'];

                $reference = $row['reference'];

                $add_notes = $row['add_notes'];

                $text_1 = $row['text_1'];

                $text_2 = $row['text_2'];



                //variables to hold update and delete url strings

                $id = $row['id'];

                $update = "forms/update.php?update=" . $id;

                $delete = "forms/processing.php?delete=" . $id;



                //Display information on screen

                echo "

                

                    <h1>Item #: {$pg}</h1>";

                    echo "<h2>{$class}</h2>";

                    if ($row['image']) { echo "<br><p><img src='{$image}' class='img-fluid shadow p-3 mb-5 mx-auto d-block' ></p>";}

                    echo "<p><h3 >Special Containment Procedures:</h3>{$process}</p>";

                    echo "<p><h3>Description:</h3>{$description}</p>";

                  if ($row['reference'])  {echo "<p><h3>Reference:</h3>{$row['reference']}</p>"; }

                  if ($row['add_notes']) {echo "<p><h3>Additional Notes:</h3>{$add_notes}</p> ";}

                  echo "<p> {$text_1} </p> ";

                  if ($row['text_1']) { echo "<p> <h3>Space Time Anomalies:</h3>{$text_2}</p> ";}

                

                



                //Display update and delete buttons

                echo "

                <p>

                <a href='{$update}' class='btn btn-warning'>Update</a>

                <a href='{$delete}' class='btn btn-danger'>Delete</a>

                </p>

                

                ";

              } 

              else

              {

                    //if this is the first time this page has been accessed, display content below

                    echo "

                      <h1>Welcome to this database driven SCP Foundation website</h1>

                      <p class='text-center'>Use the links above to view pages stored in the database</p>

                      <p class='text-center'><img src='images/map.png' class='img-fluid'></p>

                    ";

              }

           

           ?>
        </div>



    </div>

</div>

    <!-- Footer -->

  <footer class="footer mt-auto py-3">

    <div class="bg-dark">

      <p class="m-0 text-center text-white">Copyright &copy; SCP FOUNDATION Website <br>

      made by Jasdeep Kaur Bajwa</p>

    </div>

    <!-- /.container -->

  </footer>



    <!-- Optional JavaScript -->

    <!-- jQuery first, then Popper.js, then Bootstrap JS -->

    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

  </body>

</html>