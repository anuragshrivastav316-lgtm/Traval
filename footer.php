<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Footer</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <style>
        /* Footer styles */
        body {
            margin: 0;
            font-family: Arial, sans-serif;
        }

        .footer {
            background-color: #5d866c;
            color: #fff;
            padding: 50px 20px;
        }

        .footer .box-container {
            display: flex;
            flex-wrap: wrap;
            gap: 30px;
            justify-content: space-between;
        }

        .footer .box {
            flex: 1 1 200px;
            min-width: 200px;
        }

        .footer .box h3 {
            font-size: 18px;
            margin-bottom: 20px;
            color: #7f44b6ff;
        }

        .footer .box a {
            display: block;
            text-decoration: none;
            color: #ccc;
            margin-bottom: 10px;
            transition: 0.3s;
        }

        .footer .box a i {
            margin-right: 8px;
            color: #7f44b6ff;
        }

        .footer .box a:hover {
            color: #fff;
            padding-left: 5px;
        }

        .footer .follow-icons {
            display: flex;
            gap: 15px;
            margin-top: 10px;
        }

        .footer .follow-icons a {
            display: flex;
            align-items: center;
            gap: 5px;
        }

        .footer .credit {
            text-align: center;
            margin-top: 30px;
            font-size: 14px;
            color: #aaa;
        }

        .footer .credit span {
            color: #8a2be2;
        }

        @media (max-width: 768px) {
            .footer .box-container {
                flex-direction: column;
                gap: 20px;
            }
        }
    </style>
</head>
<body>

    <!-- footer section start -->
    <section class="footer">
        <div class="box-container">
            <div class="box">
                <h3>Quick links</h3>
                <a href="index.php"> <i class="fas fa-angle-right"></i>Home</a>
                <a href="about-page.php"> <i class="fas fa-angle-right"></i>About</a>
                <a href="package.php"> <i class="fas fa-angle-right"></i>Package</a>
                <a href="book.php"> <i class="fas fa-angle-right"></i>Book</a>
            </div>
            <div class="box">
                <h3>Extra links</h3>
                <a href="#"> <i class="fas fa-angle-right"></i>Ask questions</a>
                <a href="#"> <i class="fas fa-angle-right"></i>About us</a>
                <a href="#"> <i class="fas fa-angle-right"></i>Privacy policy</a>
                <a href="#"> <i class="fas fa-angle-right"></i>Terms of use</a>
            </div>
            <div class="box">
                <h3>Contact info</h3>
                <a href="#"> <i class="fas fa-phone"></i> +91 7052041375</a>
                <a href="#"> <i class="fas fa-envelope"></i> anurag316@gmail.com</a>
                <a href="#"> <i class="fas fa-map"></i> Gorkhpur, UP-273001</a>
            </div>
            <div class="box">
                <h3>Follow us</h3>
                <div>
                    <a href="#"> <i class="fab fa-facebook-f"></i> Facebook</a>
                    <a href="#"> <i class="fab fa-twitter"></i> Twitter</a>
                    <a href="https://www.instagram.com/anurag_shrivastav_2?igsh=MXVsY2lsbHVtaW5rZQ=="> <i class="fab fa-instagram"></i> Instagram</a>
                    <a href="#"> <i class="fab fa-linkedin"></i> LinkedIn</a>
                    <a href="https://wa.me/7052041375" target="_blank" aria-label="WhatsApp"><i class="fab fa-whatsapp"></i> WhatsApp</a>
                </div>
            </div>
        </div>
        <div class="credit">Created by <span>Anurag Shrivastav</span>. All rights reserved</div>
    </section>
    <!-- footer section end -->

</body>
</html>