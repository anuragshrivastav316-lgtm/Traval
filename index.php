<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Travel</title>

    <style>

        .btn{
               width:70px;
               margin-top:1.5rem;
               padding:12px;
               font-size:1rem;
               cursor:pointer;
               background: #7f44b6ff;
               color: #fff;
               border:none;
               border-radius:5px;
               transition:.3s;
               text-decoration: none;
                margin-bottom:1.5rem;
            }
        

          .home-offer{
                text-align: center;
                background: #e6d8c3;
             }
          .home-offer .content{
               max-width: 70rem;
               margin: 0 auto;
             }
          .home-offer .content h3{
                font-size: 3.5rem;
                text-transform: uppercase;
             }
          .home-offer .content p{
                font-size: 1.5rem;
                color: var(--light-black);
                line-height: 2rem;
                padding: 1rem 0;
             }


    </style>

</head>
<body  oncontextmenu="return false;">

    
 <?php
     include 'navbar.php';
    ?>
    
 <?php
     include 'user-slider.php';
    ?>


    
 <?php
     include 'services.php';
    ?>



   <section class="home-offer">
        <div class="content">
            <h3>upto 70% off</h3>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Perspiciatis necessitatibus aut quae ipsum possimus. Perferendis similique dignissimos cumque aliquam reprehenderit.</p>
            <!-- <a href="book.php" class="btn">book now</a> -->
        </div>
    </section>

    


    
 <?php
     include 'footer.php';
    ?>




</body>
</html>