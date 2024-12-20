<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>SP500 GAMES</title>
    <link rel="icon" type="image/x-icon" href="../../assets/favicon.png" />
    <!-- Font Awesome icons (free version)-->
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    <!-- Google fonts-->
    <link href="https://fonts.googleapis.com/css?family=Varela+Round" rel="stylesheet" />
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link rel="stylesheet" href="../../css/styles.css">
</head>

<body id="page-top">
    <!-- Navigation-->
    <nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
        <div class="container px-4 px-lg-5">
            <a class="navbar-brand" href="#page-top">SP 500 GAMES</a>
            <button class="navbar-toggler navbar-toggler-right" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false"
                aria-label="Toggle navigation">
                Menu
                <i class="fas fa-bars"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <!-- Aqui cada input enviara una señal al controlador-->
                        <div class="collapse navbar-collapse" id="navbarResponsive">
                            <form action="../Controller/controlador.php" method="post" class="d-flex w-100">
                                <ul class="navbar-nav ms-auto">
                                    <li class="nav-item">
                                        <button type="submit" name="tmp_inicio_btn_entrar_home" value="index"
                                            class="nav-link btn btn-link">Inicio</button>
                                    </li>
                                    <li class="nav-item">
                                        <button type="submit" name="tmp_inicio_btn_entrar_perfil" value="perfil"
                                            class="nav-link btn btn-link">Perfil</button>
                                    </li>
                                    <li class="nav-item">
                                        <button type="submit" name="tmp_inicio_btn_entrar_catalogo" value="catalogo"
                                            class="nav-link btn btn-link">Catalogo</button>
                                    </li>
                                    <li class="nav-item">
                                        <button type="submit" name="tmp_inicio_btn_entrar_login" value="login"
                                            class="nav-link btn btn-link">Login</button>
                                    </li>
                                    <li class="nav-item">
                                        <button type="submit" name="tmp_inicio_btn_entrar_salir" value="salir"
                                            class="nav-link btn btn-link">Salir</button>
                                    </li>
                                    <li class="nav-item">
                                        <button type="submit" name="tmp_inicio_btn_entrar_registro" value="registro"
                                            class="nav-link btn btn-link">Registro</button>
                                    </li>
                                    <!-- Más botones se pueden agregar aquí -->
                                    <!-- Ejemplo:
                                     <li class="nav-item">
                                     <button type="submit" name="page" value="admin" class="nav-link btn btn-link">Admin</button>
                                     </li>
                                     -->
                                    <?php if (isset($_SESSION['usuarioLogueado']['rol']) && $_SESSION['usuarioLogueado']['rol'] === 'Lider'): ?>
                                        <li class="nav-item">
                                            <button type="submit" name="tmp_inicio_btn_entrar_Administrador"
                                                value="Administrador" class="nav-link btn btn-link">Administrador</button>
                                        </li>
                                    <?php endif; ?>

                                </ul>
                            </form>
                        </div>
                </ul>
            </div>
        </div>
        </div>
    </nav>
    <!-- Masthead-->
    <header class="masthead">
        <div class="container px-4 px-lg-5 d-flex h-100 align-items-center justify-content-center">
            <div class="d-flex justify-content-center">
                <div class="text-center">
                    <h1 class="mx-auto my-0 text-uppercase">SP500 GAMES</h1>
                    <h2 class="text-white-50 mx-auto mt-2 mb-5">Tu pagina de videojuegos favorita <br>
                        <br> "Porque nos preocupamos por tu bolsillo"

                    </h2>
                </div>
            </div>
        </div>
    </header>
    <!-- About-->

    <!-- Aqui voy a incrustar php -->

    <section class="about-section text-center" id="about">
        <div class="container px-4 px-lg-5">
            <div class="row gx-4 gx-lg-5 justify-content-center">
                <div class="col-lg-8">
                    <h2 class="text-white mb-4">TEMPLE OF GAMING</h2>
                    <p class="text-white-50">
                        Encuentra aqui tus juegos favoritos clasificados en las categorias y generos mas demandantes del
                        mundo gaming</a> <br> <br>
                        <img class="img-fluid"
                            src="https://imgs.search.brave.com/-oB6zcf4zTkfUcC52GJGrGlJ2cs3GUsrkJVX_IkHxzc/rs:fit:860:0:0:0/g:ce/aHR0cHM6Ly93d3cu/Y2FsbG9mZHV0eS5j/b20vY29udGVudC9k/YW0vYXR2aS9jYWxs/b2ZkdXR5L2NvZC10/b3VjaHVpL2h1Yi92/MjAyMy9jb2QtZXll/YnJvdy5zdmc"
                            width="300px">
                        <img class="img-fluid"
                            src="https://imgs.search.brave.com/N7iAT-BnhMshAyq75ITHtNtMq4PHro5PpuW2uHMsn6U/rs:fit:860:0:0:0/g:ce/aHR0cHM6Ly9sb2dv/cy13b3JsZC5uZXQv/d3AtY29udGVudC91/cGxvYWRzLzIwMjEv/MDIvR2VhcnMtb2Yt/V2FyLUxvZ28tNzAw/eDM5NC5wbmc"
                            width="300px">
                        <img class="img-fluid"
                            src="https://imgs.search.brave.com/JPJCdHBCitkNLNVUUEwfNHM5MSapn4P_-R3KRqCn2Tk/rs:fit:860:0:0:0/g:ce/aHR0cHM6Ly91cGxv/YWQud2lraW1lZGlh/Lm9yZy93aWtpcGVk/aWEvY29tbW9ucy85/LzliL1plbGRhX29s/ZF9sb2dvLnN2Zw"
                            width="300px">
                    </p>
                </div>
            </div>
            <video class="video-fluid" id="miVideo" autoplay loop muted playsinline style="width: 100%; height: auto;">
                <source src="../../video/titanfall.mp4" type="video/mp4">
                Tu navegador no soporta el elemento de video.
            </video>
        </div>
    </section>
    <!-- Projects-->
    <section class="projects-section bg-light" id="projects">
        <div class="container px-4 px-lg-5">
            <!-- Featured Project Row-->
            <div class="row gx-0 mb-4 mb-lg-5 align-items-center">
                <div class="col-xl-8 col-lg-7"><img class="img-fluid mb-3 mb-lg-0"
                        src="https://imgs.search.brave.com/ywakqv1z9PhsWbvTnWNUMWchhxUUDTWfPqVoixtpAPk/rs:fit:860:0:0:0/g:ce/aHR0cHM6Ly93YWxs/cGFwZXJjYXZlLmNv/bS93cC93cDE4NTQ2/NzEuanBn"
                        alt="..." /></div>
                <div class="col-xl-4 col-lg-5">
                    <div class="featured-text text-center text-lg-left">
                        <h4>The Witcher 3</h4>
                        <p class="text-black-50 mb-0">Exploración, combates intensos y una narrativa inmersiva que adapta las elecciones del jugador
                            creando una experiencia única y profundamente emocional.</p>
                    </div>
                </div>
            </div>
            <!-- Project One Row-->
            <div class="row gx-0 mb-5 mb-lg-0 justify-content-center">
                <div class="col-lg-6"><img class="img-fluid"
                        src="https://imgs.search.brave.com/-T96_rmoXgxab2Rq0JEeUBkc35aqNbt5C8UbrKvSDzc/rs:fit:860:0:0:0/g:ce/aHR0cHM6Ly93YWxs/cGFwZXJiYXQuY29t/L2ltZy8zMDcyODkt/Y2FsbC1vZi1kdXR5/LW1vZGVybi13YXJm/YXJlLTMtNGstaGQt/Z2FtZXMtNGstd2Fs/bHBhcGVyLWltYWdl/LmpwZw"
                        alt="..." /></div>
                <div class="col-lg-6">
                    <div class="bg-black text-center h-100 project">
                        <div class="d-flex h-100">
                            <div class="project-text w-100 my-auto text-center text-lg-left">
                                <h4 class="text-white">Modern Warfare 3</h4>
                                <p class="mb-0 text-white-50">Trepidante shooter en primera persona que concluye la saga épica de guerra moderna
                                     con intensas campañas cinematográficas y frenéticas batallas multijugador.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Project Two Row-->
            <div class="row gx-0 justify-content-center">
                <div class="col-lg-6"><img class="img-fluid"
                        src="https://imgs.search.brave.com/PSGPlrtmnG0fiKFDgGvM_4ggF9A5CGYgdJnlUwUFywg/rs:fit:860:0:0:0/g:ce/aHR0cHM6Ly93YWxs/cGFwZXJzLmNvbS9p/bWFnZXMvZmVhdHVy/ZWQvZ29kLW9mLXdh/ci04M3J1c2g2djc2/cjR2MHVsLmpwZw"
                        alt="..." /></div>
                <div class="col-lg-6 order-lg-first">
                    <div class="bg-black text-center h-100 project">
                        <div class="d-flex h-100">
                            <div class="project-text w-100 my-auto text-center text-lg-right">
                                <h4 class="text-white">God of War</h4>
                                <p class="mb-0 text-white-50"> Aventura épica de acción que sigue a Kratos, un guerrero espartano en busca de redención,
                                     mientras enfrenta a dioses y criaturas mitológicas. Narrativa cargada de emociones y combates viscerales.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Signup-->
    <section class="signup-section" id="signup">
        <div class="container px-4 px-lg-5">
            <div class="row gx-4 gx-lg-5">
                <div class="col-md-10 col-lg-8 mx-auto text-center">
                    <i class="far fa-paper-plane fa-2x mb-2 text-white"></i>
                    <h2 class="text-white mb-5">Subscribe to receive updates!</h2>
                    <!-- * * * * * * * * * * * * * * *-->
                    <!-- * * SB Forms Contact Form * *-->
                    <!-- * * * * * * * * * * * * * * *-->
                    <!-- This form is pre-integrated with SB Forms.-->
                    <!-- To make this form functional, sign up at-->
                    <!-- https://startbootstrap.com/solution/contact-forms-->
                    <!-- to get an API token!-->
                    <form class="form-signup" id="contactForm" data-sb-form-api-token="API_TOKEN">
                        <!-- Email address input-->
                        <div class="row input-group-newsletter">
                            <div class="col"><input class="form-control" id="emailAddress" type="email"
                                    placeholder="Enter email address..." aria-label="Enter email address..."
                                    data-sb-validations="required,email" /></div>
                            <div class="col-auto"><button class="btn btn-primary disabled" id="submitButton"
                                    type="submit">Notify Me!</button></div>
                        </div>
                        <div class="invalid-feedback mt-2" data-sb-feedback="emailAddress:required">An email is
                            required.</div>
                        <div class="invalid-feedback mt-2" data-sb-feedback="emailAddress:email">Email is not valid.
                        </div>
                        <!-- Submit success message-->
                        <!---->
                        <!-- This is what your users will see when the form-->
                        <!-- has successfully submitted-->
                        <div class="d-none" id="submitSuccessMessage">
                            <div class="text-center mb-3 mt-2 text-white">
                                <div class="fw-bolder">Form submission successful!</div>
                                To activate this form, sign up at
                                <br />
                                <a
                                    href="https://startbootstrap.com/solution/contact-forms">https://startbootstrap.com/solution/contact-forms</a>
                            </div>
                        </div>
                        <!-- Submit error message-->
                        <!---->
                        <!-- This is what your users will see when there is-->
                        <!-- an error submitting the form-->
                        <div class="d-none" id="submitErrorMessage">
                            <div class="text-center text-danger mb-3 mt-2">Error sending message!</div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <!-- Contact-->
    <section class="contact-section bg-black">
        <div class="container px-4 px-lg-5">
            <div class="row gx-4 gx-lg-5">
                <div class="col-md-4 mb-3 mb-md-0">
                    <div class="card py-4 h-100">
                        <div class="card-body text-center">
                            <i class="fas fa-map-marked-alt text-primary mb-2"></i>
                            <h4 class="text-uppercase m-0">Address</h4>
                            <hr class="my-4 mx-auto" />
                            <div class="small text-black-50">IES Sampedro (Tres Cantos)</div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-3 mb-md-0">
                    <div class="card py-4 h-100">
                        <div class="card-body text-center">
                            <i class="fas fa-envelope text-primary mb-2"></i>
                            <h4 class="text-uppercase m-0">Email</h4>
                            <hr class="my-4 mx-auto" />
                            <div class="small text-black-50"><a href="#!">sp500Gaming@gmail.com</a></div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-3 mb-md-0">
                    <div class="card py-4 h-100">
                        <div class="card-body text-center">
                            <i class="fas fa-mobile-alt text-primary mb-2"></i>
                            <h4 class="text-uppercase m-0">Phone/Bizum</h4>
                            <hr class="my-4 mx-auto" />
                            <div class="small text-black-50">691654244</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="social d-flex justify-content-center">
                <a class="mx-2" href="#!"><i class="fab fa-twitter"></i></a>
                <a class="mx-2" href="#!"><i class="fab fa-facebook-f"></i></a>
                <a class="mx-2" href="#!"><i class="fab fa-github"></i></a>
            </div>
        </div>
    </section>
    <!-- Footer-->
    <footer class="footer bg-black small text-center text-white-50">
        <div class="container px-4 px-lg-5">Copyright &copy; Your Website 2023</div>
    </footer>
    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Core theme JS-->
    <script src="js/scripts.js"></script>
    <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
    <!-- * *                               SB Forms JS                               * *-->
    <!-- * * Activate your form at https://startbootstrap.com/solution/contact-forms * *-->
    <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
    <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
    <script>
        document.addEventListener("DOMContentLoaded", () => {
            const images = document.querySelectorAll(".img-fluid");

            const observer = new IntersectionObserver((entries) => {
                entries.forEach((entry) => {
                    if (entry.isIntersecting) {
                        entry.target.classList.add("show");
                    }
                });
            });

            images.forEach((img) => {
                observer.observe(img);
            });
        });


        document.addEventListener("DOMContentLoaded", () => {
            const video = document.getElementById("miVideo");

            // Establecer el tiempo de inicio (en segundos)
            const inicioEnSegundos = 30; // 1 minuto y 30 segundos

            video.currentTime = inicioEnSegundos;

            // Asegurarse de que se aplica cuando el video esté cargado
            video.addEventListener("loadedmetadata", () => {
                video.currentTime = inicioEnSegundos;
            });
        });

        document.addEventListener("DOMContentLoaded", () => {
            const videos = document.querySelectorAll('.video-fluid');

            const onScroll = () => {
                videos.forEach(video => {
                    const rect = video.getBoundingClientRect();
                    if (rect.top < window.innerHeight && rect.bottom > 0) {
                        video.classList.add('show');
                    }
                });
            };

            window.addEventListener('scroll', onScroll);
            onScroll(); // Para activar en caso de que ya estén visibles al cargar
        });

    </script>
</body>

</html>