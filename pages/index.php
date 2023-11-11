<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clinic</title>
    <link rel="shortcut icon" type="image/x-icon" href="../images/logoIcon.ico"/>
    <link rel="stylesheet" href="../styles/clinicss.css">

    <script>
        function openPopup() {
            document.getElementById('popup').style.display = 'flex';
        }

        function closePopup() {
            document.getElementById('popup').style.display = 'none';
        }
    </script>
</head>
<body>

    
    <header>
        <nav>
            <div>
                <a href="#"><img src="../images/clinic_logo.png" alt="clinic-logo"></a>
            </div>

            <div class="nav-container">
                <a href="#services">Services</a>
                <a href="#offer">Offers</a>
                <a href="#about">Clinic</a>
                <a href="#contact">Contact</a>
            </div>

            <div class="menu">
                <img src="../images/hamburger.png" alt="menu.img">
            </div>
        </nav>
    </header>

    <section id="hero" class="shadow">
        <div>
            <img src="../images/hero2.png" alt="hero">
        </div>
        
        <div class="container">
            <div>
                <h1>Empowering Healthy Smiles, One Treatment at a Time.</h1>
            </div>
    
            <div class="button-container">
                <p>+63 (920) 954 0792</p>
                <!--To whatever page it is-->
                <a href="#signup">
                    <button class="button" onclick="openPopup()">
                        Make an appointment
                    </button>
                </a> 
            </div>
            
        <div class="popup-container" id="popup">
            <img src="/images/close.png" alt="" onclick="closePopup()">
            <iframe src="appointment.html" frameborder="0"></iframe>
        </div>
        </div>

    </section>

    <section id="offer">

            <h1 class="heading">Special offers</h1>

        <div class="offer-container">
            <div class="shadow">
                <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Odit, delectus!</p>
            </div>
    
            <div class="shadow">
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Numquam, unde.</p>
            </div>
    
            <div class="shadow">
                <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Iusto, minus.</p>
            </div>
        </div>
    </section>

    <section id="about">

        <h1 class="heading">Our clinic</h1>

        <div class="about-container">

            <p>
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Eligendi excepturi enim aperiam labore sed provident qui repudiandae, eveniet obcaecati quis perspiciatis sit officia debitis adipisci quos incidunt aliquam quo iure ullam a id vel et veniam. Odio ut inventore quos ad repellendus. A enim aliquid debitis quis aliquam culpa excepturi delectus iure. Fugiat, asperiores consectetur? Aliquid libero repudiandae perspiciatis quisquam. Unde aspernatur, perferendis similique ex corporis sed excepturi tempora ut voluptate autem consectetur a, laborum atque harum commodi ducimus doloribus consequatur quos, debitis iusto dolore rem nostrum? Tenetur incidunt quos quae? Doloribus dolores modi ea voluptas tenetur consequatur iste aperiam consectetur alias distinctio porro debitis, tempore quisquam in illo vero dolore! Velit possimus nobis assumenda quia laudantium sapiente eum, doloremque sit architecto sequi libero natus consequatur necessitatibus fugit dolor asperiores quasi eaque ea, unde saepe, nesciunt beatae ducimus odit? Nemo iste ad et sunt expedita culpa reprehenderit maxime laboriosam, est sapiente debitis error ipsum doloremque esse! Alias, nostrum. Placeat iste facere tempore earum aspernatur, quod numquam error dignissimos odit voluptate enim totam inventore dolor neque. Voluptate quaerat culpa debitis assumenda officia laborum doloremque? Odio maiores animi quod mollitia. Ea libero enim aut necessitatibus? Enim explicabo consectetur eos fugit, nam molestiae!
            </p>

            <img src="../images/clinic-img.png" alt="clinic-img">

        </div>
    </section>

    <section id="services">

        <h1 class="heading">Services</h1>

        <div class="service-container">
            <div>
                <img src="../images/initialConsultation.png" alt="consultation-img">

                <div class="service-content">
                    <h2>
                        Consultation
                    </h2>
    
                    <p>
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Incidunt, accusamus!
                    </p>
                </div>

                
            </div>

            <div>
                <img src="../images/orthodontics.png" alt="orthodontics-img">
                <div class="service-content">
                    <h2>
                        Orthodontics Treatment
                    </h2>
    
                    <p>
                        Lorem ipsum dolor sit amet consectetur, adipisicing elit. Ullam, corrupti?
                    </p>
                </div>

            </div>

            <div>
                <img src="../images/surgery.png" alt="surgery-img">
                <div class="service-content">
                    <h2>
                        Surgery
                    </h2>
    
                    <p>
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Est, libero?
                    </p>      
                </div>

            </div>

            <div>
                <img src="../images/extraction.png" alt="extraction-img">
                <div class="service-content">
                    <h2>
                        Extraction
                    </h2>
                    
                    <p>
                        Lorem ipsum dolor sit amet consectetur, adipisicing elit. Sunt, eum?
                    </p>
                </div>

  
            </div>

            <div>
                <img src="../images/restoration.png" alt="">
                <div class="service-content">
                    <h2>
                        Restoration
                    </h2>
    
                    <p>
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Deleniti, numquam?
                    </p>
                </div>

            </div>

            <div>
                <img src="../images/oralProphylaxis.png" alt="Hygiene-img">
                <div class="service-content">
                    <h2>
                        Oral Prophylaxis
                    </h2>
    
                    <p>
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Numquam, nostrum.
                    </p>
                </div>

            </div>

            <div>
                <img src="../images/rootCanalTreatment.png" alt="Implantation-img">
                <div class="service-content">
                    <h2>
                        Root Canal
                    </h2>
    
                    <p>
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Aperiam, odio.
                    </p>
                </div>

            </div>

            <div>
                <img src="../images/prosthetics.png" alt="Prosthetic-img">
                <div class="service-content">
                    <h2>
                        Prosthetic
                    </h2>
    
                    <p>
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Natus, similique!
                    </p>
                </div>

            </div>

            <div>
                <img src="../images/dentures.png" alt="Urgent-care-img">
                <div class="service-content">
                    <h2>
                        Dentures
                    </h2>
    
                    <p>
                        Lorem, ipsum dolor sit amet consectetur adipisicing elit. Repudiandae, laudantium.
                    </p>
                </div>
            </div>

            <div>
                <img src="../images/bleaching.png" alt="bleaching-img">
                <div class="service-content">
                    <h2>
                        Bleaching
                    </h2>
    
                    <p>
                        Lorem, ipsum dolor sit amet consectetur adipisicing elit. Repudiandae, laudantium.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <section id="contact">

        <h1 class="heading">Contact</h1>
        
        <br>
        <!--div for whole contact section-->
        <div class="divider">

            <!--div for icons and buttons, using column flex-->
            <div class="contact-container">

                <!--div for three icons-->
                <div class="info-container">

                    <div>
                        <img src="../images/location.png" alt="location-logo">
        
                        <p>
                            National Highway, Sta Rita,<br>Batangas City Batangas, Philippines
                        </p>
                    </div>
        
                    <div>
                        <img src="../images/contact.png" alt="contact-logo">
                        <p>
                            +63 (920) 954 0792
                        </p>
                    </div>
        
                    <div>
                        <img src="../images/time.png" alt="time-logo">
                        <p>
                            Mon-Fri <br>9:00AM - 4:00PM
                        </p>
                    </div>
                </div>
        
                <div class="info-button">
                    <button class="button" id="info-button2">
                        Contact Now
                    </button>
        
                    <button class="button" id="info-button3">
                        How to get there?
                    </button>
                </div>
            </div>
    
            <div class="info-loc">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3874.9861031739665!2d121.0378992206268!3d13.77971121464498!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x33bd0f87a345ad4f%3A0x983d6dfced439c46!2sDr.%20Ruth%20Luneta-Alolod!5e0!3m2!1sen!2sph!4v1698222757909!5m2!1sen!2sph" width="400" height="300" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
        </div>

    </section>

</body>
</html>