<?php
session_start();


?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fashion Motors</title>
    <link rel="stylesheet" href="index2.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css">
</head>

<body>
    <section class="header">
        <nav>
            <h3>Hello : <?php echo $_SESSION['fname']   ?></h3>
            <form action="logout.php" method="post">

                <button class="hero-btn">Logout</button>
            </form>


        </nav>
        <div class="text-box ">
            <h1>Fashion Motors</h1>
            <p>This is the best car selling platform
                <br>You should sell with us and experience for yourself.
            </p>
            <a href="post.php" class="hero-btn "> Sell</a>
        </div>
    </section>
    <section class="locations ">
        <h1>Our Services</h1>
        <p>Her are the Various Things that you can Do</p>

        <div class="row ">
            <div class="location-col ">
                <h3>See Listed Vihecles</h3>
                <p>
                    We have many locations all over the country some of which are in kenya and others which are not in kenya. we invite you to come and visit us and share our experiences.

                </p>
                <p><a href="listings.php">Visit</a></p>
            </div>
            <div class="location-col ">
                <h3>List Vihecles</h3>
                <p>
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Laboriosam exercitationem blanditiis laborum earum quia totam voluptates dignissimos cumque similique. Officia voluptates repellat illo dolores quia fuga ab itaque quisquam officiis!
                </p>
                <p><a href="post.php">Visit</a></p>
            </div>
            <div class="location-col ">
                <h3>See Your Own Listings</h3>
                <p>
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Nobis aspernatur blanditiis laboriosam cumque nemo exercitationem consequatur qui ab? Quo dolorum repellat minima sapiente alias excepturi quibusdam reiciendis quis, facilis ducimus.
                </p>
                <p><a href="myListing.php">Visit</a></p>
            </div>



        </div>

    </section>



    <section class="testimonials ">
        <h1>Testimonials</h1>
        <p>This are some of the Testimonies from Some of the people we have served</p>
        <div class="row ">
            <div class="test-col ">
                <img src="wallpaper.jpg ">
                <div>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ut minima dolores repellat vitae rerum tempore voluptatibus eligendi ad provident! Facere aliquid praesentium molestias vero eaque voluptatibus, adipisci nobis non ipsam.
                    </p>
                    <h3>Victor Andrew</h3>
                    <i class="fa fa-star "></i>
                    <i class="fa fa-star "></i>
                    <i class="fa fa-star "></i>
                    <i class="fa fa-star "></i>
                </div>
            </div>
            <div class="test-col ">
                <img src="wallpaper.jpg ">
                <div>
                    <p>
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam velit quo quidem totam amet iste impedit dolorum, quam odit repellendus optio non esse quas accusantium saepe veniam perspiciatis. Illo, hic!

                    </p>
                    <h3>Esther Marcus</h3>
                    <i class="fa fa-star "></i>
                    <i class="fa fa-star "></i>
                    <i class="fa fa-star "></i>
                    <i class="fa fa-star "></i>
                </div>
            </div>


        </div>
    </section>


    <section class="action ">
        <h1>Buy and Sell from the comfort of your home</h1>
        <a href="edit.php" class="hero-btn">EDIT PROFILE</a>

    </section>
    <section class="footer ">
        <h4>About Us</h4>
        <p>
            We are dedicated to serving a customers satisfaction by giving the best services
            <br>You will always want to come back to get some More.
        </p>
        <div class="icons ">
            <a href="# " class="fa fa-facebook "></a>
            <a href="# " class="fa fa-twitter "></a>
            <a href="# " class="fa fa-instagram "></a>
            <a href="# " class="fa fa-linkedin "></a>
        </div>
        <p>Made With<i class="fa fa-heart-o ">by 2bit Solutions</i></p>


    </section>
    <script>
        var navlinks = document.getElementById("navlinks ");

        function showmenu() {
            navlinks.style.right = "0 ";

        }

        function hidemenu() {
            navlinks.style.right = "-200px ";

        }
    </script>
</body>

</html>