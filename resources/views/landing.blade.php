<!DOCTYPE html>
<html lang="sw">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Akibaplus </title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #0f3a4a 0%, #1a5f7a 50%, #0d2e3d 100%);
            color: #333;
            overflow-x: hidden;
        }

        /* Navigation Bar */
        nav {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 1.5rem 5%;
            background: rgba(15, 58, 74, 0.95);
            backdrop-filter: blur(10px);
            position: sticky;
            top: 0;
            z-index: 1000;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.2);
        }

        .logo {
            font-size: 1.8rem;
            font-weight: bold;
            color: #00a8d8;
            text-decoration: none;
            letter-spacing: 1px;
        }

        .nav-links {
            display: flex;
            list-style: none;
            gap: 2.5rem;
            align-items: center;
        }

        .nav-links a {
            color: #e0f4ff;
            text-decoration: none;
            font-size: 0.95rem;
            font-weight: 500;
            transition: color 0.3s ease;
            position: relative;
        }

        .nav-links a:hover {
            color: #00a8d8;
        }

        .nav-links a::after {
            content: '';
            position: absolute;
            bottom: -5px;
            left: 0;
            width: 0;
            height: 2px;
            background: #00a8d8;
            transition: width 0.3s ease;
        }

        .nav-links a:hover::after {
            width: 100%;
        }

        .hamburger {
            display: none;
            flex-direction: column;
            cursor: pointer;
            gap: 5px;
            background: none;
            border: none;
        }

        .hamburger span {
            width: 25px;
            height: 3px;
            background: #e0f4ff;
            border-radius: 2px;
            transition: all 0.3s ease;
        }

        .hamburger.active span:nth-child(1) {
            transform: rotate(45deg) translate(10px, 10px);
        }

        .hamburger.active span:nth-child(2) {
            opacity: 0;
        }

        .hamburger.active span:nth-child(3) {
            transform: rotate(-45deg) translate(7px, -7px);
        }

        /* Hero Section */
        .hero {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 4rem 5%;
            min-height: 90vh;
            gap: 3rem;
        }

        .hero-content {
            flex: 1;
            color: white;
        }

        .hero h1 {
            font-size: 3.5rem;
            font-weight: 800;
            margin-bottom: 1.5rem;
            color: #ffffff;
            line-height: 1.2;
        }

        .hero-subtitle {
            font-size: 1.1rem;
            color: #b0d4e3;
            margin-bottom: 2rem;
            line-height: 1.8;
            max-width: 500px;
        }

        .cta-button {
            display: inline-block;
            padding: 1rem 2.5rem;
            background: linear-gradient(135deg, #00a8d8, #0088a8);
            color: white;
            text-decoration: none;
            border-radius: 50px;
            font-weight: 600;
            font-size: 1rem;
            transition: all 0.3s ease;
            box-shadow: 0 5px 20px rgba(0, 168, 216, 0.3);
            border: none;
            cursor: pointer;
        }

        .cta-button:hover {
            transform: translateY(-3px);
            box-shadow: 0 10px 30px rgba(0, 168, 216, 0.5);
            background: linear-gradient(135deg, #0088a8, #006680);
        }

        .hero-image {
            flex: 1;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .hero-image img {
            max-width: 100%;
            height: auto;
            filter: drop-shadow(0 20px 40px rgba(0, 168, 216, 0.2));
        }

        /* Illustration Circle */
        .illustration-circle {
            width: 400px;
            height: 400px;
            background: radial-gradient(circle at 30% 30%, rgba(0, 168, 216, 0.1), rgba(0, 168, 216, 0.02));
            border-radius: 50%;
            position: relative;
            display: flex;
            align-items: center;
            justify-content: center;
            border: 1px solid rgba(0, 168, 216, 0.2);
        }

        .illustration-content {
            text-align: center;
            color: #00a8d8;
        }

        .illustration-content svg {
            width: 200px;
            height: 200px;
            margin-bottom: 1rem;
        }

        /* Features Section */
        .features {
            padding: 5rem 5%;
            background: white;
        }

        .features h2 {
            text-align: center;
            font-size: 2.5rem;
            color: #1a5f7a;
            margin-bottom: 3rem;
        }

        .features-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 2rem;
        }

        .feature-card {
            background: linear-gradient(135deg, #f8f9fa, #e8f4f8);
            padding: 2rem;
            border-radius: 15px;
            text-align: center;
            transition: all 0.3s ease;
            border: 1px solid rgba(0, 168, 216, 0.1);
        }

        .feature-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 40px rgba(0, 168, 216, 0.15);
            border-color: rgba(0, 168, 216, 0.3);
        }

        .feature-icon {
            font-size: 3rem;
            margin-bottom: 1rem;
        }

        .feature-card h3 {
            color: #1a5f7a;
            margin-bottom: 0.5rem;
            font-size: 1.3rem;
        }

        .feature-card p {
            color: #666;
            line-height: 1.6;
        }

        /* Footer */
        footer {
            background: #0f3a4a;
            color: #b0d4e3;
            padding: 3rem 5%;
            border-top: 1px solid rgba(0, 168, 216, 0.2);
        }

        .footer-content {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 2rem;
            margin-bottom: 2rem;
        }

        .footer-section h4 {
            color: #00a8d8;
            margin-bottom: 1rem;
        }

        .footer-section ul {
            list-style: none;
        }

        .footer-section ul li {
            margin-bottom: 0.5rem;
        }

        .footer-section a {
            color: #b0d4e3;
            text-decoration: none;
            transition: color 0.3s ease;
        }

        .footer-section a:hover {
            color: #00a8d8;
        }

        .social-links {
            display: flex;
            gap: 1rem;
        }

        .social-links a {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 40px;
            height: 40px;
            background: rgba(0, 168, 216, 0.1);
            border-radius: 50%;
            font-weight: bold;
            transition: all 0.3s ease;
        }

        .social-links a:hover {
            background: rgba(0, 168, 216, 0.3);
            transform: translateY(-3px);
        }

        /* Portfolio Section */
        .portfolio {
            padding: 5rem 5%;
            background: linear-gradient(135deg, #f8f9fa 0%, #e8f4f8 100%);
        }

        .portfolio-header {
            text-align: center;
            margin-bottom: 3rem;
        }

        .portfolio-header h2 {
            font-size: 2.5rem;
            color: #1a5f7a;
            margin-bottom: 0.5rem;
        }

        .portfolio-header p {
            color: #666;
            font-size: 1.1rem;
        }

        .portfolio-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(260px, 1fr));
            gap: 2rem;
        }

        .portfolio-item {
            background: white;
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.08);
            transition: all 0.3s ease;
            animation-duration: 0.6s;
        }

        .portfolio-item:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 40px rgba(0, 168, 216, 0.2);
        }

        .portfolio-image {
            width: 100%;
            height: 200px;
            position: relative;
            overflow: hidden;
        }

        .portfolio-image::after {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(0, 0, 0, 0);
            transition: background 0.3s ease;
        }

        .portfolio-item:hover .portfolio-image::after {
            background: rgba(0, 0, 0, 0.1);
        }

        .portfolio-item h3 {
            padding: 1.5rem 1.5rem 0.5rem;
            color: #1a5f7a;
            font-size: 1.2rem;
        }

        .portfolio-item p {
            padding: 0 1.5rem 1.5rem;
            color: #666;
        }

        /* About Section */
        .about {
            padding: 5rem 5%;
            background: white;
        }

        .about-container {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 3rem;
            align-items: center;
        }

        .about-image {
            display: flex;
            justify-content: center;
        }

        .about-illustration {
            width: 300px;
            height: 300px;
            background: linear-gradient(135deg, rgba(0, 168, 216, 0.1), rgba(0, 168, 216, 0.05));
            border-radius: 20px;
            display: flex;
            align-items: center;
            justify-content: center;
            animation: float 3s ease-in-out infinite;
        }

        .about-illustration svg {
            width: 100%;
            height: 100%;
        }

        @keyframes float {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-20px); }
        }

        .about-content h2 {
            font-size: 2.5rem;
            color: #1a5f7a;
            margin-bottom: 1.5rem;
        }

        .about-content p {
            color: #666;
            line-height: 1.8;
            margin-bottom: 1rem;
            font-size: 1rem;
        }

        .about-list {
            list-style: none;
            margin-top: 2rem;
        }

        .about-list li {
            color: #1a5f7a;
            margin: 0.8rem 0;
            font-weight: 500;
            font-size: 1.05rem;
        }

        /* Testimonials Section */
        .testimonials {
            padding: 5rem 5%;
            background: linear-gradient(135deg, #f8f9fa 0%, #e8f4f8 100%);
        }

        .testimonials h2 {
            text-align: center;
            font-size: 2.5rem;
            color: #1a5f7a;
            margin-bottom: 3rem;
        }

        .testimonials-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 2rem;
        }

        .testimonial-card {
            background: white;
            padding: 2rem;
            border-radius: 15px;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.08);
            transition: all 0.3s ease;
            animation-duration: 0.6s;
        }

        .testimonial-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 40px rgba(0, 168, 216, 0.15);
        }

        .testimonial-card .stars {
            color: #ffc107;
            font-size: 1.2rem;
            margin-bottom: 1rem;
        }

        .testimonial-card p {
            color: #666;
            line-height: 1.8;
            margin-bottom: 1.5rem;
            font-style: italic;
        }

        .testimonial-author {
            display: flex;
            gap: 1rem;
            align-items: center;
        }

        .author-avatar {
            width: 50px;
            height: 50px;
            background: linear-gradient(135deg, #00a8d8, #0088a8);
            color: white;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: bold;
        }

        .testimonial-author strong {
            display: block;
            color: #1a5f7a;
        }

        .testimonial-author p {
            margin: 0;
            font-size: 0.85rem;
            color: #999;
            font-style: normal;
        }

        /* Contact Section */
        .contact {
            padding: 5rem 5%;
            background: linear-gradient(135deg, #0f3a4a 0%, #1a5f7a 50%, #0d2e3d 100%);
            color: white;
        }

        .contact-container {
            max-width: 1200px;
            margin: 0 auto;
        }

        .contact h2 {
            text-align: center;
            font-size: 2.5rem;
            margin-bottom: 0.5rem;
        }

        .contact-subtitle {
            text-align: center;
            color: #b0d4e3;
            margin-bottom: 3rem;
            font-size: 1.1rem;
        }

        .contact-content {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 3rem;
        }

        .contact-info {
            display: flex;
            flex-direction: column;
            gap: 2rem;
        }

        .info-item {
            display: flex;
            gap: 1.5rem;
            align-items: flex-start;
        }

        .info-icon {
            font-size: 2rem;
        }

        .info-item h3 {
            color: #00a8d8;
            margin-bottom: 0.5rem;
        }

        .info-item p {
            color: #b0d4e3;
        }

        .info-item a {
            color: #00a8d8;
            text-decoration: none;
            transition: color 0.3s ease;
        }

        .info-item a:hover {
            color: #ffffff;
            text-decoration: underline;
        }

        .contact-form {
            display: flex;
            flex-direction: column;
            gap: 1.5rem;
        }

        .form-group input,
        .form-group textarea {
            width: 100%;
            padding: 1rem;
            background: rgba(255, 255, 255, 0.1);
            border: 1px solid rgba(0, 168, 216, 0.3);
            color: white;
            border-radius: 8px;
            font-family: inherit;
            font-size: 0.95rem;
            transition: all 0.3s ease;
        }

        .form-group input::placeholder,
        .form-group textarea::placeholder {
            color: rgba(255, 255, 255, 0.6);
        }

        .form-group input:focus,
        .form-group textarea:focus {
            outline: none;
            background: rgba(255, 255, 255, 0.15);
            border-color: #00a8d8;
            box-shadow: 0 0 15px rgba(0, 168, 216, 0.2);
        }

        /* Animations */
        @keyframes slideInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .feature-card,
        .portfolio-item,
        .testimonial-card {
            opacity: 0;
        }

        .feature-card.animate-in,
        .portfolio-item.animate-in,
        .testimonial-card.animate-in {
            animation: slideInUp 0.6s ease-out forwards;
        }

        .feature-card:nth-child(1).animate-in {
            animation-delay: 0.1s;
        }

        .feature-card:nth-child(2).animate-in {
            animation-delay: 0.2s;
        }

        .feature-card:nth-child(3).animate-in {
            animation-delay: 0.3s;
        }

        .feature-card:nth-child(4).animate-in {
            animation-delay: 0.4s;
        }

        .feature-card:nth-child(5).animate-in {
            animation-delay: 0.5s;
        }

        .feature-card:nth-child(6).animate-in {
            animation-delay: 0.6s;
        }

        .portfolio-item.animate-in,
        .testimonial-card.animate-in {
            animation-delay: 0.2s;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .hamburger {
                display: flex;
            }

            .nav-links {
                position: absolute;
                top: 100%;
                left: 0;
                right: 0;
                background: rgba(15, 58, 74, 0.98);
                flex-direction: column;
                gap: 0.5rem;
                padding: 1rem 2rem;
                max-height: 0;
                overflow: hidden;
                transition: max-height 0.3s ease;
                z-index: 100;
            }

            .nav-links.active {
                max-height: 500px;
            }

            .nav-links a {
                padding: 0.8rem 0;
                border-bottom: 1px solid rgba(0, 168, 216, 0.1);
                font-size: 0.95rem;
                display: block;
            }

            .nav-links a::after {
                display: none;
            }

            nav {
                padding: 1rem 3%;
                position: relative;
            }

            .hero {
                flex-direction: column;
                padding: 2rem 5%;
                min-height: auto;
            }

            .hero h1 {
                font-size: 2.2rem;
            }

            .hero-image {
                margin-top: 2rem;
            }

            .illustration-circle {
                width: 300px;
                height: 300px;
            }

            .features-grid,
            .portfolio-grid,
            .testimonials-grid {
                grid-template-columns: 1fr;
            }

            .about-container {
                grid-template-columns: 1fr;
            }

            .contact-content {
                grid-template-columns: 1fr;
            }

            .portfolio-header h2 {
                font-size: 2rem;
            }

            .about-content h2 {
                font-size: 2rem;
            }

            .testimonials h2 {
                font-size: 2rem;
            }

            .contact h2 {
                font-size: 2rem;
            }
        }

        @media (max-width: 480px) {
            .hero h1 {
                font-size: 1.8rem;
            }

            .hero-subtitle {
                font-size: 0.95rem;
            }

            .illustration-circle {
                width: 250px;
                height: 250px;
            }

            .nav-links {
                padding: 1rem 1.5rem;
            }

            .portfolio-header h2,
            .about-content h2,
            .testimonials h2,
            .contact h2 {
                font-size: 1.5rem;
            }

            .about-illustration {
                width: 250px;
                height: 250px;
            }

            .contact-info {
                gap: 1.5rem;
            }

            .info-item {
                gap: 1rem;
            }

            .form-group input,
            .form-group textarea {
                padding: 0.8rem;
                font-size: 0.9rem;
            }

            .logo {
                font-size: 1.4rem;
            }

            .cta-button {
                padding: 0.7rem 1.5rem;
                font-size: 0.9rem;
            }
        }
    </style>
</head>
<body>
    <!-- Navigation -->
    <nav>
        <a href="#" class="logo" style="display: flex; align-items: center; gap: 0.5rem;">
          <!--  <img src="logo.png" alt="Akibaplus" style="height: 30px; width: auto;">  -->
            Akibaplus
        </a>
        <button class="hamburger" id="hamburger">
            <span></span>
            <span></span>
            <span></span>
        </button>
        <ul class="nav-links" id="navLinks">
            <li><a href="#home">Nyumbani</a></li>
            <li><a href="#service">Huduma</a></li>
            <li><a href="#company">Kampani</a></li>
            <li><a href="#portfolio">Portifolio</a></li>
            <li><a href="#contact">Wasiliana Nasi</a></li>
            <li><a href="{{ route('login') }}" style="color: #00a8d8; border: 2px solid #00a8d8; padding: 0.5rem 1rem; border-radius: 5px; transition: all 0.3s; background: transparent;">Ingia</a></li>
        </ul>
    </nav>

    <!-- Hero Section -->
    <section class="hero" id="home">
        <div class="hero-content">
            <h1>AKIBAPLUS </h1>
            <p class="hero-subtitle">
                Kutengeneza muonekano mzuri na kazi nzuri kwa ajili ya biashara yako. Tunatumia teknolohia mpya na uzoefu wa kituo cha ubunifu.
            </p>
            <div style="display: flex; gap: 1rem;">
                <button class="cta-button">Jifunze Zaidi</button>
                <a href="{{ route('register') }}" class="cta-button" style="background: transparent; border: 2px solid #00a8d8; text-decoration: none;">Jisajili</a>
            </div>
        </div>
        <div class="hero-image">
            <div class="illustration-circle">
                <div class="illustration-content">
                    <img src="logo1.png" alt="Akibaplus" style="width: 400px; height: 400px; object-fit: cover; border-radius: 50%;">
                </div>
            </div>
        </div>
    </section>

    <!-- Features Section -->
    <section class="features" id="service">
        <h2>Services Zetu</h2>
        <div class="features-grid">
            <div class="feature-card">
                <div class="feature-icon">🎨</div>
                <h3>UI Design</h3>
                <p>Kutengeneza interface nzuri na rahisi kutumia kwa ajili ya users wako.</p>
            </div>
            <div class="feature-card">
                <div class="feature-icon">✨</div>
                <h3>UX Research</h3>
                <p>Kuchunguza tabia za users na kupanga solutions bora.</p>
            </div>
            <div class="feature-card">
                <div class="feature-icon">📱</div>
                <h3>Responsive Design</h3>
                <p>Websites na apps zinazofanya vizuri kwenye devices zote.</p>
            </div>
            <div class="feature-card">
                <div class="feature-icon">⚙️</div>
                <h3>Frontend Development</h3>
                <p>Kubadilisha designs kuwa real websites na applications.</p>
            </div>
            <div class="feature-card">
                <div class="feature-icon">🎯</div>
                <h3>Brand Strategy</h3>
                <p>Kutengeneza brand identity enye nguvu na inayoweza kukumbuka.</p>
            </div>
            <div class="feature-card">
                <div class="feature-icon">📊</div>
                <h3>Analytics</h3>
                <p>Kufuatilia na kuboresha performance ya digital presence yako.</p>
            </div>
        </div>
    </section>

    <!-- Portfolio Section -->
    <section class="portfolio" id="portfolio">
        <div class="portfolio-header">
            <h2>Portfolio Yetu</h2>
            <p>Kazi nzuri na projects zinazoweza kukamata jicho</p>
        </div>
        <div class="portfolio-grid">
            <div class="portfolio-item">
                <div class="portfolio-image" style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);"></div>
                <h3>E-Commerce Platform</h3>
                <p>Website ya kuuza biashara online</p>
            </div>
            <div class="portfolio-item">
                <div class="portfolio-image" style="background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);"></div>
                <h3>Mobile App Design</h3>
                <p>Application nzuri ya mobile</p>
            </div>
            <div class="portfolio-item">
                <div class="portfolio-image" style="background: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%);"></div>
                <h3>Dashboard System</h3>
                <p>Sistem ya kuangalia data</p>
            </div>
            <div class="portfolio-item">
                <div class="portfolio-image" style="background: linear-gradient(135deg, #43e97b 0%, #38f9d7 100%);"></div>
                <h3>SaaS Application</h3>
                <p>Cloud-based solution</p>
            </div>
        </div>
    </section>

    <!-- About Section -->
    <section class="about" id="company">
        <div class="about-container">
            <div class="about-image">
                <div class="about-illustration">
                    <svg viewBox="0 0 200 200" xmlns="http://www.w3.org/2000/svg">
                        <circle cx="100" cy="60" r="30" fill="#00a8d8" opacity="0.8"/>
                        <rect x="70" y="100" width="60" height="50" fill="#00a8d8" rx="5" opacity="0.6"/>
                        <circle cx="40" cy="120" r="15" fill="#00a8d8" opacity="0.4"/>
                        <circle cx="160" cy="140" r="15" fill="#00a8d8" opacity="0.4"/>
                    </svg>
                </div>
            </div>
            <div class="about-content">
                <h2>Kuhusu Akibaplus</h2>
                <p>Tumetumia miaka kadhaa kushughulika na UI/UX design, kutengeneza solutions za kidijitali zinazokukamata jicho na kazi.</p>
                <p>Sisi ni team ya wabunifu, waengineer, na storytellers ambao tunapenda kufanya digital experiences zinazojuu.</p>
                <ul class="about-list">
                    <li>✓ 50+ Projects Completed</li>
                    <li>✓ 30+ Happy Clients</li>
                    <li>✓ 100% Satisfaction Rate</li>
                    <li>✓ 24/7 Support</li>
                </ul>
            </div>
        </div>
    </section>

    <!-- Testimonials Section -->
    <section class="testimonials">
        <h2>Wanasema Nini Kuhusu Sisi</h2>
        <div class="testimonials-grid">
            <div class="testimonial-card">
                <div class="stars">★★★★★</div>
                <p>"Akibaplus ilituagiza website nzuri sana. Design ilikuwa modern na hiyo ilisaidia sales yetu."</p>
                <div class="testimonial-author">
                    <div class="author-avatar">JK</div>
                    <div>
                        <strong>John Kimani</strong>
                        <p>CEO - Tech Solutions Ltd</p>
                    </div>
                </div>
            </div>
            <div class="testimonial-card">
                <div class="stars">★★★★★</div>
                <p>"Team yao ilikuwa professional sana. Wakatufikilisha project haraka na na quality nzuri."</p>
                <div class="testimonial-author">
                    <div class="author-avatar">SM</div>
                    <div>
                        <strong>Sarah Mwangi</strong>
                        <p>Founder - Creative Agency</p>
                    </div>
                </div>
            </div>
            <div class="testimonial-card">
                <div class="stars">★★★★★</div>
                <p>"Kazi yao ilikuwa beyond expectations. Nimerekomenda Akibaplus kwa wengine wengi."</p>
                <div class="testimonial-author">
                    <div class="author-avatar">PL</div>
                    <div>
                        <strong>Peter Lela</strong>
                        <p>Manager - Digital Marketing</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Contact Section -->
    <section class="contact" id="contact">
        <div class="contact-container">
            <h2>Wasiliana Nasi</h2>
            <p class="contact-subtitle">Tuna maswali? Tupo hapa kusaidia. Tujaribu kurudi saa moja.</p>
            <div class="contact-content">
                <div class="contact-info">
                    <div class="info-item">
                        <div class="info-icon">📧</div>
                        <h3>Email</h3>
                        <p><a href="mailto:info@akibaplus.com">info@akibaplus.com</a></p>
                    </div>
                    <div class="info-item">
                        <div class="info-icon">📱</div>
                        <h3>Phone</h3>
                        <p><a href="tel:+255-651-137-807">+255 651 137 807</a></p>
                    </div>
                    <div class="info-item">
                        <div class="info-icon">📍</div>
                        <h3>Office</h3>
                        <p>Dar es salaam, Tanzania</p>
                    </div>
                </div>
                <form class="contact-form" id="contactForm">
                    <div class="form-group">
                        <input type="text" placeholder="Jina lako" required>
                    </div>
                    <div class="form-group">
                        <input type="email" placeholder="Email yako" required>
                    </div>
                    <div class="form-group">
                        <input type="text" placeholder="Subject">
                    </div>
                    <div class="form-group">
                        <textarea placeholder="Ujumbe wako" rows="5" required></textarea>
                    </div>
                    <button type="submit" class="cta-button">Tuma Ujumbe</button>
                </form>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer>
        <div class="footer-content">
            <div class="footer-section">
                <h4>Akibaplus</h4>
                <p>UI/UX Design Studio</p>
            </div>
            <div class="footer-section">
                <h4>Quick Links</h4>
                <ul>
                    <li><a href="#home">Home</a></li>
                    <li><a href="#service">Services</a></li>
                    <li><a href="#portfolio">Portfolio</a></li>
                    <li><a href="#contact">Contact</a></li>
                </ul>
            </div>
            <div class="footer-section">
                <h4>Follow Us</h4>
                <div class="social-links">
                    <a href="#" title="Facebook">f</a>
                    <a href="#" title="Twitter">𝕏</a>
                    <a href="#" title="Instagram">📷</a>
                    <a href="#" title="LinkedIn">in</a>
                </div>
            </div>
        </div>
        <hr style="border: none; border-top: 1px solid rgba(0, 168, 216, 0.2); margin: 2rem 0;">
        <p>&copy; 2026 Akibaplus - UI/UX Design Studio. All rights reserved.</p>
    </footer>

    <script>
        // Hamburger menu toggle
        const hamburger = document.getElementById('hamburger');
        const navLinks = document.getElementById('navLinks');

        hamburger.addEventListener('click', function() {
            hamburger.classList.toggle('active');
            navLinks.classList.toggle('active');
        });

        // Close menu when a link is clicked
        document.querySelectorAll('.nav-links a').forEach(link => {
            link.addEventListener('click', function() {
                hamburger.classList.remove('active');
                navLinks.classList.remove('active');
            });
        });

        // Smooth scroll behavior
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    target.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });
                }
            });
        });

        // Form submission
        const contactForm = document.getElementById('contactForm');
        if (contactForm) {
            contactForm.addEventListener('submit', function (e) {
                e.preventDefault();
                alert('Ujumbe umefika! Tutakukamatia saa moja. Asante!');
                this.reset();
            });
        }

        // Scroll animations
        const observerOptions = {
            threshold: 0.1,
            rootMargin: '0px 0px -100px 0px'
        };

        const observer = new IntersectionObserver(function(entries) {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('animate-in');
                }
            });
        }, observerOptions);

        document.querySelectorAll('.feature-card, .portfolio-item, .testimonial-card').forEach(el => {
            observer.observe(el);
        });
    </script>
</body>
</html>
