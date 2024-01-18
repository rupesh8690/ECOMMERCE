<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mithila Store | Contact us</title>

    <style>
        .custom-color {
            background-color: #F05941;

        }

        .second-nav-bg {
            background-color: #A9A9A9;
        }

        .mylink {
            font-size: 1.5rem;
            font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;
        }

        .myrow {
            margin-top: 10rem;
        }

        .content {
            margin-top: 10rem;
        }

        p,
        h2,
        h3 {
            font-family: 'Georgia', serif;
        }

        .cont-bg {
            background-color: red;
        }

        /* Define height for regular input fields */
        .form-control[type="text"],
        .form-control[type="email"] {
            height: 3rem;
            /* You can adjust this value as needed */
        }

        .no-resize {
            resize: none;
        }

        .contact {
            height: 75%;
            width: 100%;
        }

        .error-message {
            color: red;
        }

        .form-group span {
            font-size: 18px;
            font-weight: 600;
            color: red;


        }
    </style>



    <!---font awesome link for icon--->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
        integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!--custom css file link--->
    <link rel="stylesheet" href="./styles.css">

    <!--bootstrap CSS Link --->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">


</head>

<body>


    <!--navbar-->

    <div class="container-fluid p-0">
        <nav class="navbar navbar-expand-lg navbar-light custom-color fixed-top">
            <img src="./image/logo.png" alt="Ecommerce logo" class="logo">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link text-white mylink" href="index.php">Mithila Store<span
                                class="sr-only">(current)</span></a>
                    </li>
                </ul>

            </div>
        </nav>
    </div>


    <!-- picture and about section -->
    <div class="container-fluid content">
        <div class="row ">
            <div class="col-md-6">

                <img src="./image/contact.png" alt="" class="contact">


            </div>

            <div class="col-md-6">
                <p class="text-justify p-3">
                    The Mithila Store is a digital platform that facilitates online transactions of goods and
                    services. It serves as a virtual marketplace where businesses and consumers interact, enabling the
                    buying and selling of products across various categories. It offers a user-friendly
                    interface where customers can browse through a diverse range of items, compare prices, read product
                    descriptions, and make purchases conveniently from the comfort of their homes
                </p>
            </div>
         
        </div>

    </div>






    <!-- contact us form -->

    <div class="container-fluid"
        style="background-color: #e6e6e6; padding-top: 5rem; padding-left: 2.5rem; padding-bottom: 3rem;">
        <h2 class="text-center"></h2>
        <H3 class="text-center"></H3>

        <div class="container d-flex justify-content-center align-items-center">
            <form style="width: 75%;" method="post">
                <div class="form-group ">
                    <label for="exampleInputEmail1">Your Name </label>
                    <input class="form-control" type="text" name="name" id="myName" required>
                    <span id="error-name"></span>
                </div>

                <div class="form-group">
                    <label for="exampleInputEmail1">Your contact number </label>
                    <input type="text" class="form-control" name="contact_no" id="myContact" required>
                    <span id="error-contact"> </span>
                </div>

                <div class="form-group">
                    <label for="exampleInputEmail1">Your Email address</label>
                    <input type="email" class="form-control" name="email" id="myEmail" required>
                    <span id="error-email"></span>
                </div>

                <div class="form-group">
                    <label for="exampleInputEmail1">Subject </label>
                    <input type="text" class="form-control" name="subject">
                </div>

                <div class="form-group">
                    <label for="exampleFormControlTextarea1" class="form-label">Your Message</label>
                    <textarea class="form-control no-resize" id="exampleFormControlTextarea1" rows="5"
                        name="message"></textarea>
                </div>
                <input type="submit" class="btn btn-primary font-weight-bold px-3 py-2 " name="send" value="Send"
                    id="submitBtn">
            </form>
        </div>
    </div>
    <script>
        let h2 = document.querySelector("h2");
        let h3 = document.querySelector("h3");
        setTimeout(() => {
            h2.innerText = "CONTACT US ";
            h3.innerText = "Get Intouch";
        }, 500);

        setTimeout(() => {

            h3.innerText = "Get Intouch";
        }, 700);


    </script>


    <div class="container-fluid">
        <div class="container d-flex justify-content-center align-items-center " style="height: 10rem;">
            <i class="fab fa-facebook-f" style="font-size: 1.5rem;"></i>
            <i class="fas fa-envelope" style="font-size: 1.5rem; padding-left:1.5rem;"></i>
            <i class="fab fa-linkedin" style="font-size: 1.5rem;  padding-left:1.5rem;"></i>
            <i class="fab fa-skype" style="font-size: 1.5rem;  padding-left:1.5rem;"></i>
        </div>
    </div>




    <?php
    include("./includes/footer.php");
    ?>



</body>


</html>

<?php

include("./includes/connect.php");
if (isset($_POST["send"])) {
    $name = $_POST['name'];
    $contNo = $_POST['contact_no'];
    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];


    $insert_contact = " INSERT INTO `contact`( `name`, `contact`, `email`, `subject`, `message`) VALUES ('$name','$contNo','$email','$subject','$message')";
    $result_insert_contact = mysqli_query($conn, $insert_contact);
    if ($result_insert_contact) {
      
        echo "<script> alert('Request Submitted');</script>";
    } else {
    
        echo "<script> alert('Cannot connect to the database');</script>";

    }

}

?>