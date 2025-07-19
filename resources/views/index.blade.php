<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Barber Shop - Fozilbek Yuldoshev</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <!-- Favicon -->
    <link href="./app/main_assets/img/favicon.ico" rel="icon">

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600;700;800&display=swap"
        rel="stylesheet">

    <!-- CSS Libraries -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="./app/main_assets/lib/animate/animate.min.css" rel="stylesheet">
    <link href="./app/main_assets/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="./app/main_assets/lib/lightbox/css/lightbox.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="./app/main_assets/css/style.css" rel="stylesheet">
</head>

<body>
    <!-- Nav Bar Start -->
    <div class="navbar bg-dark navbar-dark nav-sticky">
        <a href="./" class="navbar-brand">BARBER <span>SHOP</span></a>
    </div>
    <!-- Nav Bar End -->


    <!-- Hero Start -->
    <div class="hero">
        <div class="row">
            <div class="col-sm-12 col-md-6">
                <div class="hero-text">
                    <h1>Website for Barber Shop</h1>
                    <p>
                        Customers can book barber services at their convenience using this website. Barbers manage
                        their prices and clients through the Admin panel.
                    </p>
                    <div class="btn-group">
                        <a class="btn" href="#contact">Book now</a>
                        <a class="btn right" href="{{ route('panel') }}">Admin panel</a>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-md-6 d-none d-md-block">
                <div class="hero-image">
                    <img src="./app/main_assets/img/hero.png" alt="Hero Image">
                </div>
            </div>
        </div>
    </div>
    <!-- Hero End -->


    <!-- About Start -->
    <div class="about">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-5 col-md-6">
                    <div class="about-img">
                        <img src="./app/main_assets/img/about.jpg" alt="Image">
                    </div>
                </div>
                <div class="col-lg-7 col-md-6">
                    <div class="section-header text-left">
                        <h2>About Us</h2>
                    </div>
                    <div class="about-text">
                        <p>
                            At Barber Shop, we believe a great haircut is more than just a style—it's an experience.
                            Founded with a passion for classic craftsmanship and modern techniques, our barbershop
                            blends tradition and trend to help you look and feel your best.
                        </p>
                        <p>
                            Located in the heart of City, we're not just a place for grooming—we're a space where style
                            meets community. Whether you're after a sharp fade, a classic trim, or a relaxing shave, our
                            expert barbers are here to deliver precision, care, and confidence with every cut.
                        </p>
                        <p>
                            With a warm atmosphere, top-quality products, and a team that loves what they do, we're
                            proud to offer a grooming experience that's tailored just for you.
                        </p>
                        <p>
                            Come in, sit back, and let us take care of the rest.
                        </p>
                        <a class="btn" href="#contact">Book now</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- About End -->


    <!-- Testimonial Start -->
    <div class="testimonial">
        <div class="container">
            <div class="owl-carousel testimonials-carousel">
                @foreach ($testimonials as $testimonial)
                    <div class="testimonial-item">
                        <img src="./app/main_assets/img/testimonial.jpg" alt="Image">
                        <p>
                            {{ $testimonial->content }}
                        </p>
                        <h2>{{ $testimonial->author }}</h2>
                        <h3>Client</h3>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <!-- Testimonial End -->


    <!-- Pricing Start -->
    <div class="price">
        <div class="container">
            <div class="section-header text-center">
                <h2>Prices</h2>
            </div>
            <div class="row">
                @foreach ($prices as $price)
                    <div class="col-lg-3 col-md-4 col-sm-6">
                        <div class="price-item">
                            <div class="price-img">
                                <img src="./app/main_assets/img/price.jpg" alt="Image">
                            </div>
                            <div class="price-text">
                                <h2>{{ $price->name }}</h2>
                                <h3>{{ $price->price }}</h3>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <!-- Pricing End -->


    <!-- Contact Start -->
    <div class="contact" id="contact">
        <div class="container-fluid">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-md-4"></div>
                    <div class="col-md-8">
                        <div class="contact-form">
                            <div id="success"></div>
                            <form action="{{ route('book') }}" method="POST">
                                @csrf
                                <div class="control-group">
                                    <input type="text" class="form-control" name="name" id="name"
                                        placeholder="Your Name" required="required"
                                        data-validation-required-message="Please enter your name" />
                                    <p class="help-block text-danger"></p>
                                </div>
                                <div class="control-group">
                                    <input type="tel" class="form-control" name="phone_number" id="phone"
                                        placeholder="Phone Number" required="required"
                                        data-validation-required-message="Please enter your phone number" />
                                    <p class="help-block text-danger"></p>
                                </div>
                                <div class="control-group select-wrapper">
                                    <select class="form-control" name="barber" id="barber" required="required"
                                        data-validation-required-message="Please select a barber">
                                        <option value="" disabled selected>Select a Barber</option>
                                        @foreach ($barbers as $barber)
                                            <option value="{{ $barber->id }}">{{ $barber->name }}</option>
                                        @endforeach
                                    </select>
                                    <p class="help-block text-danger"></p>
                                </div>
                                <div class="control-group">
                                    <input type="date" class="form-control" name="date" id="appointment-date"
                                        required="required" data-validation-required-message="Please select a date" />
                                    <p class="help-block text-danger"></p>
                                </div>
                                <div class="control-group select-wrapper">
                                    <select class="form-control" name="time" id="appointment-time"
                                        required="required"
                                        data-validation-required-message="Please select a time slot">
                                        <option value="" disabled selected>Select a Time Slot</option>
                                    </select>
                                    <p class="help-block text-danger"></p>
                                </div>
                                <div>
                                    <button class="btn" type="submit">Book now</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Contact End -->


    <!-- Team Start -->
    <div class="team">
        <div class="container">
            <div class="section-header text-center">
                <h2>Expert Barbers</h2>
            </div>
            <div class="row">
                @foreach ($barbers as $barber)
                    <div class="col-lg-3 col-md-6">
                        <div class="team-item">
                            <div class="team-img">
                                <img src="./app/main_assets/img/team.jpg" alt="Team Image">
                            </div>
                            <div class="team-text">
                                <h2>{{ $barber->name }}</h2>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <!-- Team End -->


    <!-- Footer Start -->
    <div class="footer">
        <div class="container">
            <div class="row">
                <div class="col-lg-7">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="footer-contact">
                                <h2>Address</h2>
                                <p><i class="fa fa-map-marker-alt"></i>123 Street, City, Country</p>
                                <p><i class="fa fa-phone-alt"></i>+012 345 67890</p>
                                <p><i class="fa fa-envelope"></i><a
                                        href="mailto:support@yuldoshew.uz">support@yuldoshew.uz</a></p>
                                <div class="footer-social">
                                    <a href="#"><i class="fab fa-twitter"></i></a>
                                    <a href="#"><i class="fab fa-facebook-f"></i></a>
                                    <a href="#"><i class="fab fa-youtube"></i></a>
                                    <a href="#"><i class="fab fa-instagram"></i></a>
                                    <a href="#"><i class="fab fa-linkedin-in"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="footer-link">
                                <h2>Quick Links</h2>
                                <a href="#">Terms of use</a>
                                <a href="#">Privacy policy</a>
                                <a href="#">Help</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-5">
                    <div class="footer-newsletter">
                        <h2>Developers</h2>
                        <p>
                            Developer: <a href="https://yuldoshew.uz" target="_blank">Fozilbek Yuldoshev</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer End -->

    <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="./app/main_assets/lib/easing/easing.min.js"></script>
    <script src="./app/main_assets/lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="./app/main_assets/lib/isotope/isotope.pkgd.min.js"></script>
    <script src="./app/main_assets/lib/lightbox/js/lightbox.min.js"></script>

    <!-- Template Javascript -->
    <script src="./app/main_assets/js/main.js"></script>
    <script>
        document.getElementById('appointment-date').addEventListener('change', loadAvailableTimes);
        document.getElementById('barber').addEventListener('change', loadAvailableTimes);

        function loadAvailableTimes() {
            const date = document.getElementById('appointment-date').value;
            const barberId = document.getElementById('barber').value;
            const today = new Date().toISOString().split('T')[0];

            if (date && barberId) {
                fetch(`/available-times?date=${date}&barber_id=${barberId}`)
                    .then(response => response.json())
                    .then(data => {
                        const timeSelect = document.getElementById('appointment-time');
                        timeSelect.innerHTML = '';

                        const now = new Date();
                        const currentHour = now.getHours();

                        const filteredTimes = data.filter(time => {
                            if (date === today) {
                                const hour = parseInt(time.split(':')[0]);
                                return hour > currentHour;
                            }
                            return true;
                        });

                        if (filteredTimes.length === 0) {
                            timeSelect.innerHTML = '<option value="" disabled selected>No Available Times</option>';
                        } else {
                            timeSelect.innerHTML = '<option value="" disabled selected>Select a Time Slot</option>';
                            filteredTimes.forEach(time => {
                                const option = document.createElement('option');
                                option.value = time;
                                option.textContent = time;
                                timeSelect.appendChild(option);
                            });
                        }
                    });
            }
        }
    </script>

    <!-- Session Window -->
    @if (session('success'))
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Success!',
                text: '{{ session('success') }}',
                showConfirmButton: false,
                timer: 2500
            });
        </script>
    @endif
    @if ($errors->any())
        <script>
            Swal.fire({
                icon: 'error',
                title: 'Error!',
                text: '{{ $errors->first() }}',
                confirmButtonText: 'Ok'
            });
        </script>
    @endif
</body>

</html>
