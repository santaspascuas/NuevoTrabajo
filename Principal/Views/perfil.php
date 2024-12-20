<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Elegant User Profile Portal</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            background: linear-gradient(-45deg, #1a1a1a, #2c2c2c, #333333, #1a1a1a);
            background-size: 400% 400%;
            animation: gradientBG 15s ease infinite;
            color: #ffffff;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            overflow: hidden;
        }

        @keyframes gradientBG {
            0% {
                background-position: 0% 50%;
            }

            50% {
                background-position: 100% 50%;
            }

            100% {
                background-position: 0% 50%;
            }
        }

        .container {
            background: rgba(0, 0, 0, 0.6);
            border-radius: 20px;
            padding: 40px;
            box-shadow: 0 8px 32px 0 rgba(0, 0, 0, 0.37);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.1);
            text-align: center;
            max-width: 400px;
            width: 100%;
            position: relative;
            z-index: 1;
        }

        h1 {
            margin-bottom: 20px;
            font-size: 2em;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
        }

        p {
            margin-bottom: 30px;
            font-size: 0.9em;
            color: #cccccc;
        }

        .btn {
            display: inline-block;
            padding: 12px 24px;
            margin: 10px;
            border-radius: 50px;
            text-decoration: none;
            color: #ffffff;
            font-weight: bold;
            transition: all 0.3s ease;
            border: 2px solid #ffffff;
            background-color: transparent;
            position: relative;
            overflow: hidden;
            font-size: 0.9em;
        }

        .btn:before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(120deg,
                    transparent,
                    rgba(255, 255, 255, 0.2),
                    transparent);
            transition: all 0.5s;
        }

        .btn:hover:before {
            left: 100%;
        }

        .btn-primary {
            border-color: #4CAF50;
        }

        .btn-secondary {
            border-color: #f44336;
        }

        .btn:hover {
            transform: translateY(-3px);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.3);
        }

        .animate {
            opacity: 0;
            transform: translateY(20px);
            transition: all 0.5s ease-out;
        }

        #particles-js {
            position: fixed;
            width: 100%;
            height: 100%;
            top: 0;
            left: 0;
            z-index: 0;
        }
    </style>
</head>

<body>
    <div id="particles-js"></div>
    <div class="container">
        <h1 class="animate">Welcome to Your Profile</h1>
        <p class="animate">Explore your gaming journey and manage your account</p>
        <a href="index.php?pagina=catalogo" class="btn btn-primary animate">Game Catalog</a>
        <a href="index.php?pagina=logout" class="btn btn-secondary animate">Logout</a>
    </div>

    <script src="https://cdn.jsdelivr.net/particles.js/2.0.0/particles.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', (event) => {
            const animatedElements = document.querySelectorAll('.animate');
            animatedElements.forEach((el, index) => {
                setTimeout(() => {
                    el.style.opacity = '1';
                    el.style.transform = 'translateY(0)';
                }, 200 * index);
            });

            particlesJS('particles-js', {
                particles: {
                    number: { value: 80, density: { enable: true, value_area: 800 } },
                    color: { value: "#ffffff" },
                    shape: { type: "circle" },
                    opacity: { value: 0.5, random: true, anim: { enable: true, speed: 1, opacity_min: 0.1, sync: false } },
                    size: { value: 3, random: true, anim: { enable: true, speed: 2, size_min: 0.1, sync: false } },
                    line_linked: { enable: false },
                    move: {
                        enable: true,
                        speed: 1,
                        direction: "none",
                        random: true,
                        straight: false,
                        out_mode: "out",
                        bounce: false,
                    }
                },
                interactivity: {
                    detect_on: "canvas",
                    events: {
                        onhover: { enable: true, mode: "repulse" },
                        onclick: { enable: true, mode: "push" },
                        resize: true
                    },
                    modes: {
                        repulse: { distance: 100, duration: 0.4 },
                        push: { particles_nb: 4 }
                    }
                },
                retina_detect: true
            });
        });
    </script>
</body>

</html>