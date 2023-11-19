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
            <img src="../images/close.png" alt="" onclick="closePopup()">
            <iframe src="optionAppointment.php" frameborder="0"></iframe>
            
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

        <article class="about-container">

            <p>
            Elevate your dental experience at Dr. Ruth S. Luneta-Alolod's Dental Clinic, your gateway to optimal oral health and radiant smiles. Located at National Highway Sta Rita Batangas City our clinic is a testament to precision, care, and innovation in dentistry. Our clinic welcomes you to a haven where your dental needs are met with unwavering dedication. Beyond providing exceptional clinical care, our clinic is designed to offer a soothing environment that transforms your dental visits into uplifting experiences. Come, contact us now, and be a part of our dental family, where your journey to a brighter smile begins!
            </p>

            <img src="../images/clinic-img.png" alt="clinic-img">

    </article>
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
                    Our comprehensive consultation services involve thorough oral examinations and personalized treatment plans to address your dental concerns effectively.
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
                    Achieve a straighter, more aligned smile through our expert orthodontic treatments, tailored to enhance both aesthetics and functionality.
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
                    Experience precise and minimally invasive surgical procedures, ensuring optimal outcomes for a range of dental conditions.                
                    </p>  <br>    
                </div>

            </div>

            <div>
                <img src="../images/extraction.png" alt="extraction-img">
                <div class="service-content">
                    <h2>
                        Extraction
                    </h2>
                    
                    <p>
                    Our skilled team performs gentle and efficient tooth extractions, prioritizing patient comfort and promoting oral health.
                    </p>
                    <br> 
                </div>

  
            </div>

            <div>
                <img src="../images/restoration.png" alt="">
                <div class="service-content">
                    <h2>
                        Restoration
                    </h2>
    
                    <p>
                    Restore your teeth to their natural strength and appearance with our high-quality dental restoration services, including fillings and crowns.
                    </p>
                    <br> 
                </div>

            </div>

            <div>
                <img src="../images/oralProphylaxis.png" alt="Hygiene-img">
                <div class="service-content">
                    <h2>
                        Oral Prophylaxis
                    </h2>
    
                    <p>
                    Maintain optimal oral health with professional dental cleanings and preventive measures, safeguarding against common dental issues.
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
                    Alleviate pain and preserve your natural teeth through our expertly conducted root canal treatments, focusing on long-term oral health.
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
                    Enhance both function and aesthetics with our customized prosthetic solutions, including bridges and dental implants.
                    </p>
                    <br> 
                </div>

            </div>

            <div>
                <img src="../images/dentures.png" alt="Urgent-care-img">
                <div class="service-content">
                    <h2>
                        Dentures
                    </h2>
    
                    <p>
                    Regain confidence in your smile and functionality with our meticulously crafted dentures, tailored to meet your individual needs.
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
                    Achieve a brighter, whiter smile with our safe and effective teeth bleaching procedures, designed to enhance your overall dental appearance.
                    <br> 
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
                            National Highway,<br> Sta Rita,Batangas City, <br>Batangas, Philippines
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
                <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d7749.974137491473!2d121.037843!3d13.779653!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x33bd0f87a345ad4f%3A0x983d6dfced439c46!2sDr.%20Ruth%20Luneta-Alolod!5e0!3m2!1sen!2sph!4v1699700360910!5m2!1sen!2sph" width="550" height="350" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
        </div>

    </section>

</body>
</html>