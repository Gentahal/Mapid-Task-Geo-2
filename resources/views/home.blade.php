<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Geospatial Portfolio | Web GIS</title>
    <meta name="description" content="Portofolio Web GIS menampilkan visualisasi data spasial interaktif dengan desain modern dan performa tinggi.">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        body {
            background-color: #000000;
            color: #EDEDED;
            font-family: 'Inter', sans-serif;
        }
        .bg-grid {
            background-size: 30px 30px;
            background-image: linear-gradient(to right, rgba(255, 255, 255, 0.05) 1px, transparent 1px),
                              linear-gradient(to bottom, rgba(255, 255, 255, 0.05) 1px, transparent 1px);
            mask-image: radial-gradient(circle at center, black, transparent 80%);
            -webkit-mask-image: radial-gradient(ellipse at center, black, transparent 80%);
        }
        .glow {
            position: absolute;
            width: 800px;
            height: 800px;
            background: radial-gradient(circle, rgba(255,255,255,0.08) 0%, rgba(0,0,0,0) 60%);
            top: -300px;
            left: 50%;
            transform: translateX(-50%);
            z-index: 0;
            pointer-events: none;
        }
    </style>
</head>
<body class="bg-black min-h-screen antialiased selection:bg-white/20">
    <div class="fixed inset-0 bg-grid pointer-events-none z-0"></div>
    
    <nav class="sticky top-0 z-50 border-b border-white/[0.08] bg-black/60 backdrop-blur-xl">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-14">
                <div class="flex-shrink-0">
                    <span class="text-white font-medium text-base tracking-tight">Geospatial.</span>
                </div>
                <div class="hidden md:block">
                    <div class="ml-10 flex items-baseline space-x-6">
                        <a href="{{ route('home') }}" class="text-white px-3 py-2 rounded-md text-sm font-medium transition-colors">Beranda</a>
                        <a href="#features" class="text-gray-400 hover:text-white px-3 py-2 rounded-md text-sm font-medium transition-colors">Fitur</a>
                        <a href="#produk" class="text-gray-400 hover:text-white px-3 py-2 rounded-md text-sm font-medium transition-colors">Produk</a>
                        <a href="#profil" class="text-gray-400 hover:text-white px-3 py-2 rounded-md text-sm font-medium transition-colors">Profil</a>
                    </div>
                </div>
                <div class="hidden md:flex items-center">
                    <a href="{{ route('map') }}" class="inline-flex items-center justify-center px-4 py-1.5 text-xs font-medium text-black bg-white rounded-full hover:bg-gray-200 transition-all duration-200">
                        Buka Peta
                    </a>
                </div>
                <div class="md:hidden flex items-center">
                    <button type="button" id="mobile-menu-btn" class="text-gray-400 hover:text-white focus:outline-none p-2" aria-expanded="false">
                        <span class="sr-only">Buka menu utama</span>
                        <svg class="h-5 w-5" id="icon-menu" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 6h16M4 12h16M4 18h16"/>
                        </svg>
                        <svg class="h-5 w-5 hidden" id="icon-close" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M6 18L18 6M6 6l12 12"/>
                        </svg>
                    </button>
                </div>
            </div>
        </div>

        <div class="md:hidden hidden bg-black border-b border-white/[0.08]" id="mobile-menu">
            <div class="px-2 pt-2 pb-3 space-y-1 sm:px-3">
                <a href="{{ route('home') }}" class="text-white block px-3 py-2 rounded-md text-sm font-medium">Beranda</a>
                <a href="#features" class="text-gray-400 hover:text-white block px-3 py-2 rounded-md text-sm font-medium">Fitur</a>
                <a href="#produk" class="text-gray-400 hover:text-white block px-3 py-2 rounded-md text-sm font-medium">Produk</a>
                <a href="#profil" class="text-gray-400 hover:text-white block px-3 py-2 rounded-md text-sm font-medium">Profil</a>
                <a href="{{ route('map') }}" class="text-gray-400 hover:text-white block px-3 py-2 rounded-md text-sm font-medium">Buka Peta</a>
            </div>
        </div>
    </nav>

    <main class="relative z-10">
        <section class="relative max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 pt-32 pb-24 text-center">
            <div class="glow"></div>
            <div class="relative z-10">
                <div class="inline-flex items-center rounded-full border border-white/10 bg-white/[0.02] px-3 py-1 text-xs font-medium text-gray-400 backdrop-blur-md mb-8">
                    <span class="flex w-1.5 h-1.5 rounded-full bg-emerald-500 mr-2 shadow-[0_0_8px_rgba(16,185,129,0.8)]"></span>
                    Portfolio by Genta Halilintar
                </div>
                <h1 class="text-5xl md:text-7xl font-bold text-white tracking-tighter mb-6 leading-tight">
                    Visualisasi <span class="text-transparent bg-clip-text bg-gradient-to-b from-white to-gray-500">Data Spasial</span>
                </h1>
                <p class="mt-4 max-w-2xl text-base text-gray-400 mx-auto mb-10 tracking-tight leading-relaxed">
                    Eksplorasi data geografis dengan interaktivitas tinggi dan performa maksimal. Dibangun dengan fokus pada pengalaman pengguna (UX) dan desain developer-centric.
                </p>
                <div class="flex items-center justify-center gap-4">
                    <a href="{{ route('map') }}" class="inline-flex items-center justify-center px-5 py-2.5 text-sm font-medium text-black bg-white rounded-lg hover:bg-gray-200 transition-all duration-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-black focus:ring-white">
                        Buka Peta Interaktif
                    </a>
                    <a href="#features" class="inline-flex items-center justify-center px-5 py-2.5 text-sm font-medium text-white bg-white/5 border border-white/10 rounded-lg hover:bg-white/10 transition-all duration-200">
                        Pelajari Fitur
                    </a>
                </div>
            </div>
        </section>

        <section id="features" class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 py-24">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <div class="border border-white/10 bg-white/[0.02] rounded-2xl p-8 hover:bg-white/[0.04] transition-colors duration-300 group">
                    <div class="w-10 h-10 rounded-xl bg-white/5 flex items-center justify-center mb-6 border border-white/10 group-hover:border-white/20 transition-colors">
                        <svg class="w-5 h-5 text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 20l-5.447-2.724A1 1 0 013 16.382V5.618a1 1 0 011.447-.894L9 7m0 13l6-3m-6 3V7m6 10l4.553 2.276A1 1 0 0021 18.382V7.618a1 1 0 00-.553-.894L15 4m0 13V4m0 0L9 7"></path></svg>
                    </div>
                    <h3 class="text-lg font-medium text-white mb-2 tracking-tight">Peta Interaktif</h3>
                    <p class="text-sm text-gray-400 leading-relaxed">Rendering vektor berkinerja tinggi menggunakan MapLibre GL JS untuk visualisasi data yang mulus tanpa hambatan.</p>
                </div>
                <div class="border border-white/10 bg-white/[0.02] rounded-2xl p-8 hover:bg-white/[0.04] transition-colors duration-300 group">
                    <div class="w-10 h-10 rounded-xl bg-white/5 flex items-center justify-center mb-6 border border-white/10 group-hover:border-white/20 transition-colors">
                        <svg class="w-5 h-5 text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M13 10V3L4 14h7v7l9-11h-7z"></path></svg>
                    </div>
                    <h3 class="text-lg font-medium text-white mb-2 tracking-tight">Performa Cepat</h3>
                    <p class="text-sm text-gray-400 leading-relaxed">Dioptimalkan untuk kecepatan dan efisiensi memori. Langsung di eksekusi di browser dengan akselerasi WebGL.</p>
                </div>
                <div class="border border-white/10 bg-white/[0.02] rounded-2xl p-8 hover:bg-white/[0.04] transition-colors duration-300 group">
                    <div class="w-10 h-10 rounded-xl bg-white/5 flex items-center justify-center mb-6 border border-white/10 group-hover:border-white/20 transition-colors">
                        <svg class="w-5 h-5 text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z"></path></svg>
                    </div>
                    <h3 class="text-lg font-medium text-white mb-2 tracking-tight">Desain Linear</h3>
                    <p class="text-sm text-gray-400 leading-relaxed">Estetika minimalis dengan tema gelap pekat, glassmorphism, grid pattern halus, dan border yang presisi.</p>
                </div>
            </div>
        </section>

        <section id="produk" class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 py-24 border-t border-white/[0.05]">
            <div class="text-center mb-16">
                <h2 class="text-3xl font-semibold text-white mb-4 tracking-tight">Penjelasan Produk</h2>
                <p class="text-sm text-gray-400 max-w-2xl mx-auto">Aplikasi Web GIS ini dirancang untuk menampilkan data geografis secara real-time dengan antarmuka yang modern, ringan, dan presisi.</p>
            </div>
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
                <div class="order-2 lg:order-1">
                    <h3 class="text-xl font-medium text-white mb-4 tracking-tight">Sistem Pemetaan Terintegrasi</h3>
                    <p class="text-sm text-gray-400 mb-8 leading-relaxed">
                        Dibangun di atas ekosistem Laravel dan Tailwind CSS, aplikasi ini memanfaatkan kekuatan MapLibre GL JS untuk rendering peta vektor yang interaktif. Anda dapat dengan mudah memvisualisasikan berbagai entitas geografis.
                    </p>
                    <ul class="space-y-5">
                        <li class="flex items-start">
                            <div class="mt-0.5 w-6 h-6 rounded-lg border border-white/10 bg-white/5 flex items-center justify-center mr-4 flex-shrink-0">
                                <svg class="w-3.5 h-3.5 text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                            </div>
                            <div>
                                <h4 class="text-white text-sm font-medium">Teknologi Berbasis Vektor</h4>
                                <p class="text-sm text-gray-500 mt-1">Rendering peta yang halus dan tajam di berbagai tingkat zoom.</p>
                            </div>
                        </li>
                        <li class="flex items-start">
                            <div class="mt-0.5 w-6 h-6 rounded-lg border border-white/10 bg-white/5 flex items-center justify-center mr-4 flex-shrink-0">
                                <svg class="w-3.5 h-3.5 text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                            </div>
                            <div>
                                <h4 class="text-white text-sm font-medium">Optimasi Performa Front-end</h4>
                                <p class="text-sm text-gray-500 mt-1">Pemuatan cepat dengan bundel JavaScript yang minimal.</p>
                            </div>
                        </li>
                        <li class="flex items-start">
                            <div class="mt-0.5 w-6 h-6 rounded-lg border border-white/10 bg-white/5 flex items-center justify-center mr-4 flex-shrink-0">
                                <svg class="w-3.5 h-3.5 text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                            </div>
                            <div>
                                <h4 class="text-white text-sm font-medium">Dukungan Basemap Gratis (OSM)</h4>
                                <p class="text-sm text-gray-500 mt-1">Menggunakan OpenStreetMap tanpa ketergantungan API key berbayar.</p>
                            </div>
                        </li>
                    </ul>
                </div>
                <div class="order-1 lg:order-2 relative h-64 md:h-80 lg:h-full min-h-[350px] rounded-2xl overflow-hidden border border-white/10 bg-[#0a0a0a] group">
                    <div class="absolute inset-0 bg-gradient-to-br from-white/5 to-transparent z-10 pointer-events-none"></div>
                    <img src="{{ asset('images/map-visual.png') }}" alt="Visualisasi Web GIS" class="absolute inset-0 w-full h-full object-cover transition-transform duration-700 group-hover:scale-105 opacity-80" onerror="this.src='https://images.unsplash.com/photo-1524661135-423995f22d0b?q=80&w=800&auto=format&fit=crop';">
                </div>
            </div>
        </section>

        <section id="profil" class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 py-24 border-t border-white/[0.05]">
            <div class="border border-white/10 bg-white/[0.02] rounded-3xl p-8 md:p-12 relative overflow-hidden">
                <div class="absolute top-0 right-0 w-96 h-96 bg-white/[0.03] rounded-full blur-3xl -mr-20 -mt-20 pointer-events-none"></div>
                
                <div class="flex flex-col md:flex-row items-start md:items-center justify-between gap-6 mb-16 relative z-10">
                    <div>
                        <h2 class="text-3xl font-bold text-white mb-2 tracking-tight">Genta Halilintar</h2>
                        <p class="text-sm text-gray-400 font-medium">Fullstack Developer & IT Enthusiast</p>
                    </div>
                    <a href="https://www.linkedin.com/in/genta-halilintar/" target="_blank" rel="noopener noreferrer" class="inline-flex items-center justify-center px-4 py-2 text-xs font-medium text-white bg-white/5 border border-white/10 rounded-lg hover:bg-white/10 transition-all duration-200">
                        LinkedIn Profile
                        <svg class="w-3.5 h-3.5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"></path></svg>
                    </a>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-12 relative z-10">
                    <div class="space-y-6">
                        <h3 class="text-xs font-semibold text-gray-500 uppercase tracking-widest">Kontak</h3>
                        <ul class="space-y-4 text-sm text-gray-400">
                            <li><span class="text-white">Email</span><br> gentahalilintar36@gmail.com</li>
                            <li><span class="text-white">Telepon</span><br> 0813-1560-3835</li>
                            <li><span class="text-white">Portfolio Web</span><br> <a href="https://vo-genta-porto.vercel.app/" class="hover:text-white transition-colors" target="_blank" rel="noopener noreferrer">vo-genta-porto.vercel.app</a></li>
                            <li><span class="text-white">GitHub</span><br> <a href="https://github.com/Gentahal" class="hover:text-white transition-colors" target="_blank" rel="noopener noreferrer">github.com/Gentahal</a></li>
                        </ul>
                    </div>

                    <div class="space-y-6">
                        <h3 class="text-xs font-semibold text-gray-500 uppercase tracking-widest">Pengalaman</h3>
                        <div class="space-y-5 text-sm">
                            <div class="relative pl-4 border-l border-white/10">
                                <div class="absolute w-2 h-2 bg-white/20 rounded-full -left-[4.5px] top-1.5 border border-black"></div>
                                <p class="text-white font-medium">Freelance Web Developer</p>
                                <p class="text-xs text-gray-500 mt-1">Januari 2025 - Present</p>
                            </div>
                            <div class="relative pl-4 border-l border-white/10">
                                <div class="absolute w-2 h-2 bg-white/20 rounded-full -left-[4.5px] top-1.5 border border-black"></div>
                                <p class="text-white font-medium">PT Anugrah Inti Artha Mandiri</p>
                                <p class="text-xs text-gray-500 mt-1">Mei 2024 - November 2024</p>
                            </div>
                            <div class="relative pl-4 border-l border-transparent">
                                <div class="absolute w-2 h-2 bg-white/20 rounded-full -left-[4.5px] top-1.5 border border-black"></div>
                                <p class="text-white font-medium">PT Rahadyan Integrasi Nusantara</p>
                                <p class="text-xs text-gray-500 mt-1">Juni 2023 - Mei 2024</p>
                            </div>
                        </div>
                    </div>

                    <div class="space-y-6">
                        <h3 class="text-xs font-semibold text-gray-500 uppercase tracking-widest">Keahlian</h3>
                        <div class="flex flex-wrap gap-2">
                            <span class="px-2.5 py-1 bg-white/5 border border-white/10 rounded-md text-xs text-gray-300">PHP</span>
                            <span class="px-2.5 py-1 bg-white/5 border border-white/10 rounded-md text-xs text-gray-300">Laravel</span>
                            <span class="px-2.5 py-1 bg-white/5 border border-white/10 rounded-md text-xs text-gray-300">JavaScript</span>
                            <span class="px-2.5 py-1 bg-white/5 border border-white/10 rounded-md text-xs text-gray-300">Java</span>
                            <span class="px-2.5 py-1 bg-white/5 border border-white/10 rounded-md text-xs text-gray-300">MySQL</span>
                            <span class="px-2.5 py-1 bg-white/5 border border-white/10 rounded-md text-xs text-gray-300">MongoDB</span>
                            <span class="px-2.5 py-1 bg-white/5 border border-white/10 rounded-md text-xs text-gray-300">UI Design</span>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <footer class="border-t border-white/[0.05] bg-black py-8 relative z-10">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 flex justify-between items-center">
            <p class="text-xs text-gray-600">© 2026 Made by Gentahalilintar.</p>
        </div>
    </footer>
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const btn = document.getElementById('mobile-menu-btn');
            const menu = document.getElementById('mobile-menu');
            const iconMenu = document.getElementById('icon-menu');
            const iconClose = document.getElementById('icon-close');

            if (btn && menu) {
                btn.addEventListener('click', () => {
                    menu.classList.toggle('hidden');
                    iconMenu.classList.toggle('hidden');
                    iconClose.classList.toggle('hidden');
                });

                const mobileLinks = menu.querySelectorAll('a');
                mobileLinks.forEach(link => {
                    link.addEventListener('click', () => {
                        menu.classList.add('hidden');
                        iconMenu.classList.remove('hidden');
                        iconClose.classList.add('hidden');
                    });
                });
            }
        });
    </script>
</body>
</html>
