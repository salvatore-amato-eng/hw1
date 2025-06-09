

<!DOCTYPE html>
<html>
    <head>
        <title>eStore - STMicroelectronics - Buy Direct from ST</title>
        <link rel = "stylesheet" href = "hw1.css">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
        <meta name = "viewport" content = "width=device-width, initial-scale = 1">
        <script src = "hw1.js" defer></script>
    </head>

    <body>
        <nav>
            <div id = "topnav">
                <div id = "hamburger">
                    <div></div>
                    <div></div>
                    <div></div>
                </div>
                <div id = "topnav_sx">
                    <img src = "logo_St.svg">
                    <input type='text' value='Search a part number' class = "barra"/>
                </div>

                <div id = "topnav_dx">
                    <span class = "logout">
                        <?php session_start();
                        if (!isset($_SESSION['email']))
                            echo "<a href = 'login.php'>Accedi</a>";
                        else 
                            echo "<a href = 'logout.php'>Logout</a>";
                        ?> </span>
                    <a href = "carrello.php"><img src = "shopping-cart-icn.svg"></a>
                </div>
            </div>

            <div id = "menu">
                <input type = "text" value = "Search a part number" class = "barra"/>
                    <div id = "navleft">   
                        <div class = "products">
                            <a class = "button" data-name="Products">
                                <div class = "icona">
                                    <div></div>
                                    <div></div>
                                    <div></div>
                                </div>
                                <strong >Products</strong>
                                <div class = "flex_tendina">
                                    <h4>Amplifiers and comparators</h4>
                                    <h4>Audio ICs</h4>
                                    <h4>Automotive ADAS Devices</h4>
                                </div>
                             </a>
                        </div>
                        <a class = "button" data-name="Applications">
                            <div class =  "flex_tendina">
                                <h4>Automotive</h4>
                                <h4>Communications Equipment Computers and Peripherals</h4>
                                <h4>Functions</h4>
                            </div>
                            <strong >Applications</strong></a>
                        <a class = "button"  data-name="Tools">
                            <div class =  "flex_tendina">
                                <h4>Development Tools</h4>
                                <h4>Evaluation Tools</h4>
                                <h4>Hardware Development Tools</h4>
                            </div>
                            <strong>Tools</strong></a>
                        <a id = "prodotti" href = "elenco_prodotti.php">New Products</a>
                        <a href = "elenco_prodotti.php">Feature Products </a>
                    </div>

                    <div id = "navright" >
                        <a>ST Home</a>
                        <a>FAQ</a>
                        <a>Contact Us</a>
                    </div>
            </div>

            <div class = "advertising">
                <span>Exclusive FREE shipping offer of Embedded World prodcuts! Use code <em>EV-EW2025-FREESHIP-03</em> at checkout!🛒<a class = "button">Order now!</a></span>
            </div>
        </nav>

        <section id = "modal_view" class = "hidden"></section>

        <header>
            <div id = "blue">
                <h1>New ST MEMS Sensors motherboard accepts all  ST DIL24 adapters</h1>
                <h4>Empower your projects with effortness plug-and-play evaluation of MEMS Sensors.</h4>
                <div class = "ordina">Order Now</div>
            </div>
            <div id = "maggiore">
                <h1>></h1>
            </div>
            <div id = "minore">
                <h1> < </h1>
            </div>
        </header>

        <section id = "chip">
            <div id = "titolo_section">
                <h1>New and Feature Products</h1>
                <h4><a href = "elenco_prodotti.php">View all</a></h4>
            </div>

            <div class = "prodotti">
                    <div class = "immagini" 
                        data-index = "0">
                        <img >
                        <h1></h1>
                        <h4></h4>
                        <h3></h3>
                        <?php
                        if (isset($_SESSION['email']))
                            echo "<button class = 'addCart' data-index = '0'>Add to cart</button>";
                        ?> 
                    </div>
                    
                    <div class = "immagini" 
                        data-index = "1">
                        <img >
                        <h1></h1>
                        <h4></h4>
                        <h3></h3>
                        <?php
                        if (isset($_SESSION['email']))
                            echo "<button class = 'addCart' data-index = '1'>Add to cart</button>";
                        ?> 
                    </div>
                
                    <div class = "immagini" 
                        data-index = "2">
                        <img >
                        <h1></h1>
                        <h4></h4>
                        <h3></h3>
                        <?php
                        if (isset($_SESSION['email']))
                            echo "<button class = 'addCart' data-index = '2'>Add to cart</button>";
                        ?> 
                    </div>
                
                    <div class = "immagini" 
                        data-index = "3">
                        <img >
                        <h1></h1>
                        <h4></h4>
                        <h3></h3>
                        <?php
                        if (isset($_SESSION['email']))
                            echo "<button class = 'addCart' data-index = '3'>Add to cart</button>";
                        ?> 
                    </div>
            </div>
        </section>

        <article id = "applications">
            <div id = "titolo_article">
                <h1>Applications</h1>
                <h4>Products for specific applications</h4>
            </div>

            <div class = "type_article">
                <div id = "automotive"><h3>Automotive</h3></div>
                <div id = "industrial"><h3>Industrial</h3></div>
                <div id = "personal_electronics"><h3>Personal Electronics</h3></div>
                <div id = "equipments"><h3>Communications equipment,Computer and peripherals</h3></div>
            </div>

        </article>

        <section id = "window_view" class = "hidden"></section>

        <section class = "St_Vantaggi">
            <div id = "join">
                <div>
                    <h1>Only at the ST eStore!</h1>
                    <h4>Join our newsletter to learn about free sample products and limited-time offers</h4>
                    <?php
                        if (!isset($_SESSION['email']))
                            echo "<a href = 'login.php'><strong>Sign up today</strong></a>";
                        ?> 
                </div>
            </div>

            <article class = "eStore">
                <div id = "titolo_compra">
                    <h1>Buying from ST's eStore</h1>
                    
                </div>

                <div id = "vantaggi">
                    <div>
                        <img src = "free samples.webp">
                        <h2>Free samples</h2>
                        <p>Experience the world of ST Microelectronics with our free samples! 
                            Test our cutting-edge products before making your final choice.</p>
                    </div>

                    <div>
                        <img src = "leaf-line.webp">
                        <h2>Sustainable Products</h2>
                        <p>At ST Microelectronics, we're committed to a greener future. 
                            Explore our sustainable products, designed with both innovation and the environment in mind.</p>
                    </div>

                    <div>
                        <img src = "mondo.webp">
                        <h2>Worldwide shipping</h2>
                        <p>Wherever you are in the world, ST Microelectronics is there for you.
                             With shipping everywhere, our cutting-edge technology is always within your reach.</p>
                    </div>
                </div>
            </article>
        </section>

        <footer>
            <div>
                <img src = "logo_St_blu.svg"><br>
                <div id = "footer_container">
                    <div>
                        <h4>About STMicroelectronics</h4>
                        <h5>Who we are</h5>
                        <h5>Investor relations</h5>
                        <h5>Sustainability</h5>
                        <h5>Innovation & technology</h5>
                        <h5>Careers</h5>
                        <h5>Blog</h5>
                        <h5>General terms and conditions</h5>
                    </div>

                    <div>
                        <h4>Connect with us</h4>
                        <h5>Contact ST offices</h5>
                        <h5>Find sales offices & distributors</h5>
                        <h5>Community</h5>
                        <h5>Innovation & technology</h5>
                        <h5>Newsroom</h5>
                        <h5>Events & trainings</h5>
                    </div>

                    <div>
                        <h4>Browse</h4>
                        <h5>Sitemap</h5>
                    </div>

                    <div>
                        <h4>Compliance, ethics & privacy</h4>
                        <h5>Ethics and compliance</h5>
                        <h5>ST ethics hotline</h5>
                        <h5>Privacy portal</h5>
                    </div>

                    <div id = "Newsletter_follow">
                        <div>
                            <h4>Newsletter sign up</h4>
                            <div id = "email">
                            <input type='text' value='Your Email Address' class = "barra"><span id = "invia">Submit</span>
                            </div>
                        </div>

                        <div>
                            <h4>Follow us</h4>
                        </div>
                    </div>    
                </div>
            </div>

            <div id = "footer_bottom">
                <div>All rights reserved © 2025 STMicroelectronics 
                    <a>Terms of use</a> | 
                    <a>eStore terms and conditions</a> | 
                    <a>Sales terms & conditions</a> | 
                    <a>Trademarks</a> | 
                    <a>Privacy portal</a> | 
                    <a>Manage cookies</a>
                </div>
            </div>
        </footer>
    </body>
</html>