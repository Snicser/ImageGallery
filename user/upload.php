<html lang="nl">
<head>
    <!-- Meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS & Own CSS-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
          integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="../css/style.css">

    <!-- Font awesome -->
    <script src="https://kit.fontawesome.com/b914407899.js" crossorigin="anonymous"></script>

    <title>Image Gallery - Upload</title>
</head>
<body>

<header>
    <nav class="navbar navbar-expand-sm navbar-dark bg-dark fixed-top">
        <div class="container">

            <a class="navbar-brand" href="#">
                <i class="fab fa-envira"></i>
                Image Gallery
            </a>

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="#">Logout</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="../index.php">Go back</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</header>

    <!-- Want next to input field a example to show result -->

    <main>
        <div class="container">

            <div class="card">
                <div class="card-header text-center display-3">Upload A Image</div>
                <div class="card-body">
                    <form action="process.php" method="post" enctype="multipart/form-data">

                        <div class="row">
                            <!-- Name -->
                            <div class="form-group col-6">
                                <label for="image-name">Image name</label>
                                <input type="text" class="form-control" name="image-name" id="image-name" placeholder="My beautiful dogs">
                            </div>
                        </div>

                        <div class="row">
                            <!-- Description> -->
                            <div class="form-group col-6">
                                <label for="image-description">Image description</label>
                                <input type="text" class="form-control" name="image-description" id="image-description" placeholder="My beautiful dogs Max and Sam watching Netflix">
                            </div>
                        </div>

                        <div class="row">
                            <!-- Image -->
                            <div class="form-group col-6">
                                <label for="image-file">File upload</label>
                                <input type="file" name="user-file" class="form-control-file" id="image-file">
                            </div>
                        </div>

                        <div class="row">
                            <!-- Submit button -->
                            <div class="form-group col-6">
                                <input class="btn btn-primary" type="submit" name="btn-send" value="Send">
                            </div>
                        </div>

                    </form>

                    <div class="row">

                        <?php
                            echo '<div class="form-group col-6">';

                            if(strpos($_SERVER['REQUEST_URI'], 'upload.php?upload=success') !== false){
                                echo '<button type="button" class="btn btn-success">Your images was successfully uploaded</button>';
                            } else {
                                echo '<button type="button" class="btn info">There was a problem while uploading the image</button>';
                            }
                            echo '</div>';
                        ?>

                    </div>

                    <!-- Example to show, make example button > then show -->
                </div>
            </div>
        </div>
    </main>

    <footer class="fixed-bottom footer">
        <div class="container">
            <div class="text-center">
                © 2020 Copyright: Flavio Schoute
            </div>
        </div>
    </footer>

    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
            integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
            crossorigin="anonymous">
    </script>

    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
            integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
            crossorigin="anonymous">
    </script>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"
            integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI"
            crossorigin="anonymous">
    </script>

</body>
</html>