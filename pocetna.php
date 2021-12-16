<?php
    include 'dbb.php';
    include 'model/termin.php';
    include 'loginregister.php';
    //ovde prvo ucitavamo sve podatke o terminima da bismo mogli da ih prikazemo u tabeli 

    $termini = Termin::vratiSveTermine($conn);
    




?>





<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rezervacije</title>

        
    <!-- Za bootstrap preuzeto sa   https://getbootstrap.com/docs/4.3/getting-started/introduction/-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto:400,100,300,500">
 
 
    <script src="https://kit.fontawesome.com/64d58efce2.js" crossorigin="anonymous"></script>

</head>
<body> 
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                    <a class="navbar-brand" href="#"><?php  echo Kozmeticar::vratiKozmeticaraPoID($_SESSION['ulogovaniKozmeticar'],$conn);  ?></a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav mr-auto">
                        <li class="nav-item active">
                            <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Link</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Dropdown
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="#">Action</a>
                            <a class="dropdown-item" href="#">Another action</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#">Something else here</a>
                            </div>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link disabled" href="#">Disabled</a>
                        </li>
                        </ul>
                        <form class="form-inline my-2 my-lg-0">
                        <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                        </form>
                    </div>
        </nav>





    <br><br><br>

    <div class="container">




        <table class="table">
        <thead>
            <tr>
            <th scope="col">ID</th>
            <th scope="col">Naziv</th>
            <th scope="col">Kozmeticar</th>
            <th scope="col">Datum i vreme</th>
            <th scope="col">Adresa</th>
            <th scope="col">Cena</th>
            <th scope="col"> Oznaci   </th>

            </tr>
        </thead>
        <tbody>

            <?php    
                  while($red = $termini->fetch_array()):
            ?>

                <tr>
                    <th scope="row"><?php echo $red['id'];   ?></th>
                    <td><?php echo $red['naziv'];   ?></td>
                    <td><?php echo $red['ime']." ".$red['prezime'];   ?></td>
                    <td><?php echo $red['datumVreme']  ?></td>
                    <td><?php echo $red['adresa']  ?></td>
                    <td><?php echo $red['cena']  ?></td>
                    <td>
                        <label class="custom-radio-btn">
                            <input type="radio" name="checked-donut" value=<?php echo $red["id"]?>>
                            <span class="checkmark"></span>
                        </label>
                    </td>

                </tr>

            <?php    
                  endwhile;
            ?>
 
        </tbody>
        </table>

        <div>
            <button type="button" class="btn btn-info" data-toggle="modal" data-target="#viewModal" id="prikazi">Prikazi</button>
            <button type="button" class="btn btn-secondary">Napravi novi termin</button>
            <button type="button" class="btn btn-danger">Obrisi termin</button>
            <button type="button" class="btn btn-light">Izmeni</button>
        </div>

 
    </div>


        <!-- profile modal start -->
        <div class="modal fade" id="viewModal" tabindex="-1" role="dialog" aria-labelledby="ViewModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Tretman <i class="fas fa-spa"></i></h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="container" id="profile">
                            <div class="row">
                                <div class="col-sm-6 col-md-4">
                                    <img src="http://placehold.it/100x100" id="Img" alt="" class="rounded responsive" style="width: 100px;height: auto;" />
                                </div>
                                <div class="col-sm-6 col-md-8">
                                    <h4 id="modelPreview" class="text-primary"></h4>
                                    <p class="text-secondary">
                                        <input type="hidden" name="hiddenData"   value="">
                                        <i id="opis" class="fa fa-pencil" aria-hidden="true"> </i>
                                        <!-- <i id="Email" class="fa fa-envelope-o" aria-hidden="true"></i> -->
                                        <br />
                                        <i id="cena" class="fa fa-tag"  aria-hidden="true"></i>
                                        <br>
                                        <i id="kozmeticar" class="fas fa-user"  aria-hidden="true"></i>
                                    </p>

                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- profile modal end -->







     

























    <script src="https://kit.fontawesome.com/64d58efce2.js" crossorigin="anonymous"></script>
     
   
     <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
     <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
     <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

     <script src="js/main.js"></script>

</body>
</html>