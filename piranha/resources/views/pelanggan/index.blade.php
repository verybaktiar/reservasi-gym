<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  <link href="https://cdn.jsdelivr.net/npm/remixicon@3.5.0/fonts/remixicon.css" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css" />
  <link rel="stylesheet" href="{{asset('user/styles.css')}}" />
  <title>Web Design Mastery | Power</title>
  <style>
    .saldo {
    display: flex;
    align-items: center;
    font-size: 1.2em;
    color: #000;
}

.saldo i {
    margin-right: 5px;
}
  </style>
</head>

<body>
  <header class="header">
    <nav>
      <div class="nav__header">
        <div class="nav__logo">
          <a href="#"><img src="{{asset('user/assets/logo.png')}}" alt="logo" />Power</a>
        </div>
        <div class="nav__menu__btn" id="menu-btn">
          <span><i class="ri-menu-line"></i></span>
        </div>
      </div>
      <ul class="nav__links" id="nav-links">
        <li class="link"><a href="#home">Home</a></li>
        <li class="link"><a href="#about">About</a></li>
        <li class="link"><a href="#class">Classes</a></li>
        <li class="link"><a href="#trainer">Trainers</a></li>
        <li class="link"><a href="#price">Pricing</a></li>
        @if(auth()->check())
          <li class="link dropdown">
            <a href="#" class="dropdown-toggle" id="profileDropdown" data-bs-toggle="dropdown" aria-expanded="false">
              <i class="ri-user-line"></i> Profil
            </a>
            <ul class="dropdown-menu" aria-labelledby="profileDropdown">
              <li>
                <span class="dropdown-item saldo">
                  <i class="ri-money-dollar-circle-line"></i>
                  {{ auth()->user()->saldo->saldo_member }}
                </span>
              </li>
              <li><a class="dropdown-item" href="{{ url('profile') }}">Profile</a></li>
              <li><a class="dropdown-item" href="{{ url('logout') }}">Logout</a></li>
              
            </ul>
          </li>
        @endif
      </ul>
    </nav>
    <div class="section__container header__container" id="home">
      <div class="header__image">
        <img src="{{asset('user/assets/header.png')}}" alt="header" />
      </div>
      <div class="header__content">
        <h4>Build Your Body &</h4>
        <h1 class="section__header">Shape Yourself!</h1>
        <p>
          Unleash your potential and embark on a journey towards a stronger,
          fitter, and more confident you. Sign up for 'Make Your Body Shape'
          now and witness the incredible transformation your body is capable
          of!
        </p>
        <div class="header__btn">
          <button class="btn">Join Today</button>
        </div>
      </div>
    </div>
    <section class="section__container about__container" id="about">
      <div class="about__image">
        <img class="about__bg" src="{{asset('user/assets/dot-bg.png')}}" alt="bg" />
        <img src="{{asset('user/assets/about.png')}}" alt="about" />
      </div>
      <div class="about__content">
        <h2 class="section__header">Our Story</h2>
        <p class="section__description">
          Led by our team of expert and motivational instructors, "The Class You
          Will Get Here" is a high-energy, results-driven session that combines
          a perfect blend of cardio, strength training, and functional
          exercises.
        </p>
        <div class="about__grid">
          <div class="about__card">
            <span><i class="ri-open-arm-line"></i></span>
            <div>
              <h4>Open Door Policy</h4>
              <p>
                We believe in providing unrestricted access to all individuals,
                regardless of their fitness level, age, or background.
              </p>
            </div>
          </div>
          <div class="about__card">
            <span><i class="ri-shield-cross-line"></i></span>
            <div>
              <h4>Fully Insured</h4>
              <p>
                Your peace of mind is our top priority, and our commitment to
                your safety extends to every aspect of your fitness journey.
              </p>
            </div>
          </div>
          <div class="about__card">
            <span><i class="ri-p2p-line"></i></span>
            <div>
              <h4>Personal Trainer</h4>
              <p>
                With personalized workout plans tailored to your needs, we will
                ensure that you get the most out of your gym experience.
              </p>
            </div>
          </div>
        </div>
      </div>
    </section>
  
    <section class="section__container class__container" id="class">
      <h2 class="section__header">Our Classes</h2>
      <p class="section__description">
        Discover a diverse range of exhilarating classes at our gym designed to
        cater to all fitness levels and interests. Whether you're a seasoned
        athlete or just starting your fitness journey, our classes offer
        something for everyone.
      </p>
      <div class="class__grid">
        <div class="class__card">
          <img src="{{asset('user/assets/dot-bg.png')}}" alt="bg" class="class__bg" />
          <img src="{{asset('user/assets/class-1.jpg')}}" alt="class" />
          <div class="class__content">
            <h4>Strength Training</h4>
            <p>Resistance Training</p>
          </div>
        </div>
        <div class="class__card">
          <img src="{{asset('user/assets/dot-bg.png')}}" alt="bg" class="class__bg" />
          <img src="{{asset('user/assets/class-2.jpg')}}" alt="class" />
          <div class="class__content">
            <h4>Flexibility & Mobility</h4>
            <p>Yoga & Pilates</p>
          </div>
        </div>
        <div class="class__card">
          <img src="{{asset('user/assets/dot-bg.png')}}" alt="bg" class="class__bg" />
          <img src="{{asset('user/assets/class-3.jpg')}}" alt="class" />
          <div class="class__content">
            <h4>HIIT</h4>
            <p>Circuit Training</p>
          </div>
        </div>
        <div class="class__card">
          <img src="{{asset('user/assets/dot-bg.png')}}" alt="bg" class="class__bg" />
          <img src="{{asset('user/assets/class-4.jpg')}}" alt="class" />
          <div class="class__content">
            <h4>Group Fitness</h4>
            <p>Zumba or Dance</p>
          </div>
        </div>
      </div>
    </section>
  
    <section class="section__container trainer__container" id="trainer">
      <h2 class="section__header">Our Trainers</h2>
      <p class="section__description">
        Our trainers are more than just experts in exercise; they are passionate
        about helping you achieve your health and fitness goals. Our trainers
        are equipped to tailor workout programs to meet your unique needs.
      </p>
      <div class="trainer__grid">
        <div class="trainer__card">
          <img src="{{asset('user/assets/trainer-1.jpg')}}" alt="trainer" />
        </div>
        <div class="trainer__card">
          <div class="trainer__content">
            <h4>James Rodriguez</h4>
            <h5>Strength and Conditioning</h5>
            <hr />
            <p>
              With a background in competitive sports, he's dedicated to helping
              you reach your peak physical performance.
            </p>
            <div class="trainer__socials">
              <a href="#"><i class="ri-facebook-fill"></i></a>
              <a href="#"><i class="ri-google-fill"></i></a>
              <a href="#"><i class="ri-instagram-line"></i></a>
              <a href="#"><i class="ri-twitter-fill"></i></a>
            </div>
          </div>
        </div>
        <div class="trainer__card">
          <img src="{{asset('user/assets/trainer-2.jpg')}}" alt="trainer" />
        </div>
        <div class="trainer__card">
          <div class="trainer__content">
            <h4>Mark Harris</h4>
            <h5>HIIT and Functional</h5>
            <hr />
            <p>
              His energetic and dynamic workouts are designed to push your
              limits, boost metabolism, and torch calories.
            </p>
            <div class="trainer__socials">
              <a href="#"><i class="ri-facebook-fill"></i></a>
              <a href="#"><i class="ri-google-fill"></i></a>
              <a href="#"><i class="ri-instagram-line"></i></a>
              <a href="#"><i class="ri-twitter-fill"></i></a>
            </div>
          </div>
        </div>
        <div class="trainer__card">
          <img src="{{asset('user/assets/trainer-3.jpg')}}" alt="trainer" />
        </div>
        <div class="trainer__card">
          <div class="trainer__content">
            <h4>Emily Davis</h4>
            <h5>Yoga and Mindfulness</h5>
            <hr />
            <p>
              Emily's sessions are about physical postures and also about
              cultivating inner peace and mindfulness.
            </p>
            <div class="trainer__socials">
              <a href="#"><i class="ri-facebook-fill"></i></a>
              <a href="#"><i class="ri-google-fill"></i></a>
              <a href="#"><i class="ri-instagram-line"></i></a>
              <a href="#"><i class="ri-twitter-fill"></i></a>
            </div>
          </div>
        </div>
      </div>
    </section>
  
    <section class="section__container price__container" id="price">
      @foreach($produk as $produk)
      <h2 class="section__header">Our Pricing</h2>
      <p class="section__description">
        Our pricing plan comes with various membership tiers, each tailored to
        cater to different preferences and fitness aspirations.
      </p>
      <div class="price__grid">
        <div class="price__card">
          <div class="price__content">
            <h4>{{ $produk->nama_produk }}</h4>
            <img src="{{ asset('images/' . $produk->gambar) }}" alt="price" />
            <p>
              {{ $produk->deskripsi_produk }}
            </p>
            <hr />
            <h4>{{$produk->durasi_paket}}</h4>
            <p>Smart workout plan</p>
            <p>At home workouts</p>
          </div>
  
  
          <!-- Button trigger modal -->
          <button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#modalReservasi">
            Join Now</button>
        </div>
        @endforeach
  
    </section>
  </header>

 
  <!-- Modal -->
  <div class="modal fade" id="modalReservasi" tabindex="-1" role="dialog" aria-labelledby="modalReservasiLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="modalReservasiLabel">Formulir Reservasi</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <!-- Formulir reservasi -->
          <form action="{{ url('reservasi/store') }}" method="post">
            @csrf
            <!-- Menyembunyikan paket yang dipilih -->
            <div class="form-group">
              <label for="nama">nama</label>
              <input type="nama" class="form-control" id="nama" name="nama" required>
            </div>
            <div class="form-group">
              <label for="tanggal">Tanggal Reservasi</label>
              <input type="date" class="form-control" id="tanggal" name="tanggal" min="{{ date('Y-m-d') }}" required>
            </div>
            <div class="form-group">
              <label for="jam_mulai">Jam Mulai</label>
              <input type="time" class="form-control" id="jam_mulai" name="jam_mulai" required>
            </div>
            <div class="form-group">
              <label for="jam_selesai">Jam Selesai</label>
              <input type="time" class="form-control" id="jam_selesai" name="jam_selesai" required>
            </div>
            <div class="form-group">
              <label for="durasi">Durasi Reservasi</label>
              <select class="form-control" id="durasi" name="durasi" required>
                <option value="1">1 Jam</option>
                <option value="2">2 Jam</option>
                <!-- Tambahkan opsi durasi lainnya jika diperlukan -->
              </select>
            </div>
            <div class="form-group">
              <label for="jumlah_orang">Jumlah Orang</label>
              <input type="number" class="form-control" id="jumlah_orang" name="jumlah_orang" required>
            </div>
            <div class="form-group">
              <label for="catatan">Catatan Tambahan</label>
              <textarea class="form-control" id="catatan" name="catatan" rows="3"></textarea>
            </div>

            <button type="submit" class="btn btn-primary">Kirim Reservasi</button>
          </form>

        </div>
      </div>
    </div>
  </div>



  <section class="section__container client__container" id="client">
    <h2 class="section__header">What People Says About Us?</h2>
    <p class="section__description">
      These testimonials serve as a testament to our commitment to helping
      individuals achieve their fitness goals, and fostering a supportive
      environment for everyone who walks through our doors.
    </p>
    <!-- Slider main container -->
    <div class="swiper">
      <!-- Additional required wrapper -->
      <div class="swiper-wrapper">
        <!-- Slides -->
        <div class="swiper-slide">
          <div class="client__card">
            <img src="{{asset('user/assets/client-1.jpg')}}" alt="client" />
            <div class="client__ratings">
              <span><i class="ri-star-fill"></i></span>
              <span><i class="ri-star-fill"></i></span>
              <span><i class="ri-star-fill"></i></span>
              <span><i class="ri-star-fill"></i></span>
              <span><i class="ri-star-line"></i></span>
            </div>
            <p>
              The trainers here customized a plan that balanced my work-life
              demands, and I've seen remarkable progress in my fitness
              journey. It's not just a gym; it's my sanctuary for self-care.
            </p>
            <h4>Jane Smith</h4>
            <h5>Marketing Manager</h5>
          </div>
        </div>
        <div class="swiper-slide">
          <div class="client__card">
            <img src="{{asset('user/assets/client-2.jpg')}}" alt="client" />
            <div class="client__ratings">
              <span><i class="ri-star-fill"></i></span>
              <span><i class="ri-star-fill"></i></span>
              <span><i class="ri-star-fill"></i></span>
              <span><i class="ri-star-fill"></i></span>
              <span><i class="ri-star-half-fill"></i></span>
            </div>
            <p>
              The trainers' expertise and the gym's commitment to cleanliness
              during these times have made it a safe haven for me to maintain
              my health and de-stress.
            </p>
            <h4>Emily Carter</h4>
            <h5>Registered Nurse</h5>
          </div>
        </div>
        <div class="swiper-slide">
          <div class="client__card">
            <img src="{{asset('user/assets/client-3.jpg')}}" alt="client" />
            <div class="client__ratings">
              <span><i class="ri-star-fill"></i></span>
              <span><i class="ri-star-fill"></i></span>
              <span><i class="ri-star-fill"></i></span>
              <span><i class="ri-star-half-fill"></i></span>
              <span><i class="ri-star-line"></i></span>
            </div>
            <p>
              The variety of classes and the supportive community have kept me
              motivated. I've shed pounds, gained confidence, and found a new
              level of energy to inspire my students.
            </p>
            <h4>John Davis</h4>
            <h5>Teacher</h5>
          </div>
        </div>
        <div class="swiper-slide">
          <div class="client__card">
            <img src="{{asset('user/assets/client-4.jpg')}}" alt="client" />
            <div class="client__ratings">
              <span><i class="ri-star-fill"></i></span>
              <span><i class="ri-star-fill"></i></span>
              <span><i class="ri-star-fill"></i></span>
              <span><i class="ri-star-fill"></i></span>
              <span><i class="ri-star-fill"></i></span>
            </div>
            <p>
              This gym's 24/7 access has been a lifesaver. Whether it's a
              late-night workout or an early morning session, the convenience
              here is unbeatable.
            </p>
            <h4>David Martinez</h4>
            <h5>Entrepreneur</h5>
          </div>
        </div>
      </div>
    </div>
  </section>

  <footer class="footer">
    <div class="section__container footer__container">
      <div class="footer__col">
        <div class="footer__logo">
          <a href="#"><img src="{{asset('user/assets/logo.png')}}" alt="logo" />Power</a>
        </div>
        <p>
          Take the first step towards a healthier, stronger you with our
          unbeatable pricing plans. Let's sweat, achieve, and conquer
          together!
        </p>
        <div class="footer__socials">
          <a href="#"><i class="ri-facebook-fill"></i></a>
          <a href="#"><i class="ri-instagram-line"></i></a>
          <a href="#"><i class="ri-twitter-fill"></i></a>
        </div>
      </div>
      <div class="footer__col">
        <h4>Company</h4>
        <div class="footer__links">
          <a href="#">Business</a>
          <a href="#">Franchise</a>
          <a href="#">Partnership</a>
          <a href="#">Network</a>
        </div>
      </div>
      <div class="footer__col">
        <h4>About Us</h4>
        <div class="footer__links">
          <a href="#">Blogs</a>
          <a href="#">Security</a>
          <a href="#">Careers</a>
        </div>
      </div>
      <div class="footer__col">
        <h4>Contact</h4>
        <div class="footer__links">
          <a href="#">Contact Us</a>
          <a href="#">Privacy Policy</a>
          <a href="#">Terms & Conditions</a>
          <a href="#">BMI Calculator</a>
        </div>
      </div>
    </div>
    <div class="footer__bar">
      Copyright © 2023 Web Design Mastery. All rights reserved.
    </div>
  </footer>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  <script src="https://unpkg.com/scrollreveal"></script>
  <script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>
  <script src="{{asset('user/main.js')}}"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
</body>

</html>

</html>