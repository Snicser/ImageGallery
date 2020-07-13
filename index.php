<html lang="nl">
<head>
    <!-- Meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS & Own CSS-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/style.css">

    <!-- Font awesome -->
    <script src="https://kit.fontawesome.com/b914407899.js" crossorigin="anonymous"></script>

    <title>Image Gallery</title>
</head>
<body>

    <header>
        <nav class="navbar navbar-expand-sm navbar-dark bg-dark fixed-top">
            <div class="container">

                <a class="navbar-brand" href="#">
                    <i class="fab fa-envira"></i>
                    Image Gallery
                </a>


                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" href="#">Sign up</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#" data-toggle="modal" data-target="#login-model">Login</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <main>
        <div class="container">

            <div id="to-top" title="Scroll to top">🛧</div>

            <div class="jumbotron">
                <h1><i class="fa fa-camera" aria-hidden="true"></i> The Image Gallery</h1>
                <p class="lead">A bunch of beautiful images that I didn't take :)</p>
            </div>

            <!-- Modal -->
            <div class="modal fade" id="login-model" tabindex="-1" role="dialog" aria-labelledby="login-model" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="model-title-label">Login</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">

                            <form class="was-validated" action="php/handlers/checks.php" method="post">

                                <!-- Email -->
                                <div class="form-group">
                                    <label for="username"><strong>Email:</strong></label>
                                    <input type="text" class="form-control" id="username" placeholder="Username" name="username" required="" style="cursor: auto;">
                                    <div class="valid-feedback">Valid.</div>
                                    <div class="invalid-feedback">Please fill out this field.</div>
                                </div>

                                <!-- Password -->
                                <div class="form-group">
                                    <label for="pwd"><strong>Password:</strong></label>
                                    <input type="password" class="form-control" id="pwd" placeholder="Password" name="pwd" required="" autocomplete="on" style="cursor: auto;">
                                    <div class="valid-feedback">Valid.</div>
                                    <div class="invalid-feedback">Please fill out this field.</div>
                                </div>

                                <!-- Submit button -->
                                <button type="submit" class="btn btn-primary" id="btn-login" name="btn-login">Login</button>
                            </form>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">

                <?php
                    require_once('php/config/database.php');

                    $connection = getDatabaseConnection();

                    $sql = "SELECT imageType, imageBlob FROM images";

                    $prepare = $connection -> prepare($sql);

                    $prepare -> execute();

                    while ($row = $prepare -> fetch(PDO::FETCH_ASSOC)) {
                        echo '<div class="col-lg-4 col-sm-6">';
                        echo '<img class="img-thumbnail" src = "data:$row[imageType];base64,' . base64_encode($row['imageBlob']) . '" alt="Image">';
                        echo '</div>';
//                        echo '<img src = "data:$row[imageType];base64,' . base64_encode($row['imageBlob']) . '">';
                    }
                ?>

                    <!-- <div class="col-lg-4 col-sm-6">
                        <img class="img-thumbnail" src="http://i.imgur.com/qK42fUu.jpg" alt="Image">
                    </div>
                    <div class="col-lg-4 col-sm-6">
                        <img class="img-thumbnail" src="http://i.imgur.com/qK42fUu.jpg" alt="Image">
                    </div>
                    <div class="col-lg-4 col-sm-6">
                        <img class="img-thumbnail" src="http://i.imgur.com/qK42fUu.jpg" alt="Image">
                    </div>


                    <div class="col-lg-4 col-sm-6">
                        <img class="img-thumbnail" src="http://i.imgur.com/qK42fUu.jpg" alt="Image">
                    </div>
                    <div class="col-lg-4 col-sm-6">
                        <img class="img-thumbnail" src="http://i.imgur.com/qK42fUu.jpg" alt="Image">
                    </div>
                    <div class="col-lg-4 col-sm-6">
                        <img class="img-thumbnail" src="http://i.imgur.com/qK42fUu.jpg" alt="Image">
                    </div>

                    <div class="col-lg-4 col-sm-6">
                        <img class="img-thumbnail" src="http://i.imgur.com/qK42fUu.jpg" alt="Image">
                    </div>
                    <div class="col-lg-4 col-sm-6">
                        <img class="img-thumbnail" src="http://i.imgur.com/qK42fUu.jpg" alt="Image">
                    </div>
                    <div class="col-lg-4 col-sm-6">
                        <img class="img-thumbnail" src="http://i.imgur.com/qK42fUu.jpg" alt="Image">
                    </div> -->

            </div>
        </div>
    </main>

    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>

    <!-- Own Scripts -->
    <script src="js/main.js"></script>

</body>
</html>