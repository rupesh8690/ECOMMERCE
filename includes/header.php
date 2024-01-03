<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Header</title>

    <style>
    body {
      overflow-x: hidden;
    }

    .custom-color {
      background-color: #F05941;

    }

    .second-nav-bg {
      background-color: #A9A9A9;
    }

    .mylink{
        font-size: 1.5rem;
        font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;
    }

  
  </style>

    <!--custom css file link--->
  <link rel="stylesheet" href="../styles.css">

      <!--bootstrap CSS Link --->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css"
    integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">


</head>
<body>

  <!--navbar-->
  <div class="container-fluid p-0">
  <nav class="navbar navbar-expand-lg navbar-light custom-color fixed-top">
    <img src="../image/logo.png" alt="Ecommerce logo" class="logo">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link text-white mylink" href="../index.php">Mithila Store<span
                        class="sr-only">(current)</span></a>
            </li>
        </ul>

    </div>
</nav>
  </div>
    
</body>
</html>