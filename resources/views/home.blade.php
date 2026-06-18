<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mapid Task | Web GIS Portfolio</title>
    <meta name="description" content="Portofolio Web GIS menampilkan visualisasi data spasial interaktif dengan desain modern dan performa tinggi.">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700&family=Inter:wght@300;400;500;600&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        body {
            background-color: #000000;
            color: #f3f4f6;
            font-family: 'Inter', sans-serif;
            overflow-x: hidden;
        }
        h1, h2, h3, h4, h5, h6, .brand-font {
            font-family: 'Outfit', sans-serif;
        }
        .glass-nav {
            background: rgba(0, 0, 0, 0.8);
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
            border-bottom: 1px solid rgba(255, 255, 255, 0.08);
        }
        .bg-grid {
            background-size: 40px 40px;
            background-image: 
                linear-gradient(to right, rgba(255, 255, 255, 0.06) 1px, transparent 1px),
                linear-gradient(to bottom, rgba(255, 255, 255, 0.06) 1px, transparent 1px);
            mask-image: radial-gradient(circle at top, black 20%, transparent 80%);
            -webkit-mask-image: radial-gradient(circle at top, black 20%, transparent 80%);
        }
        .glass-card {
            background: linear-gradient(145deg, rgba(255,255,255,0.03) 0%, rgba(255,255,255,0.01) 100%);
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
            border: 1px solid rgba(255, 255, 255, 0.08);
            box-shadow: 0 8px 32px 0 rgba(0, 0, 0, 0.2);
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        }
        .glass-card:hover {
            border-color: rgba(255, 255, 255, 0.2);
            transform: translateY(-4px);
        }
        @keyframes fadeInUp {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }
        .animate-fade-in-up {
            animation: fadeInUp 0.8s cubic-bezier(0.4, 0, 0.2, 1) forwards;
            opacity: 0;
        }
    </style>
</head>
<body class="antialiased selection:bg-zinc-800 selection:text-white">
    <div class="fixed inset-0 bg-grid pointer-events-none z-0"></div>
    <nav class="sticky top-0 z-50 glass-nav transition-all duration-300">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-16">
                <div class="flex-shrink-0 flex items-center gap-3 cursor-pointer group">
                    <div class="w-9 h-9 rounded-xl bg-zinc-800 border border-zinc-700 flex items-center justify-center group-hover:border-zinc-500 transition-colors duration-300">
                        <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                    <span class="text-white font-semibold text-xl tracking-tight brand-font">Mapid Task.</span>
                </div>
                
                <div class="hidden md:block">
                    <div class="ml-10 flex items-center space-x-8">
                        <a href="{{ route('home') }}" class="text-white text-sm font-medium transition-colors">Beranda</a>
                        <a href="#features" class="text-zinc-400 hover:text-white text-sm font-medium transition-colors">Fitur</a>
                        <a href="#produk" class="text-zinc-400 hover:text-white text-sm font-medium transition-colors">Produk</a>
                        <a href="#profil" class="text-zinc-400 hover:text-white text-sm font-medium transition-colors">Profil</a>
                    </div>
                </div>
                <div class="hidden md:flex items-center">
                    <a href="{{ route('map') }}" class="group relative inline-flex items-center justify-center px-6 py-2 text-sm font-medium text-black bg-white rounded-full hover:bg-zinc-200 transition-colors">
                        Buka Peta
                        <svg class="w-4 h-4 ml-2 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                    </a>
                </div>
                <div class="md:hidden flex items-center">
                    <button type="button" id="mobile-menu-btn" class="text-zinc-400 hover:text-white p-2 rounded-lg bg-zinc-900 border border-zinc-800" aria-expanded="false">
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

        <div class="md:hidden hidden bg-black border-b border-zinc-800 absolute w-full left-0" id="mobile-menu">
            <div class="px-4 pt-4 pb-6 space-y-3">
                <a href="{{ route('home') }}" class="text-white block px-4 py-3 rounded-xl bg-zinc-900 text-base font-medium">Beranda</a>
                <a href="#features" class="text-zinc-400 hover:text-white block px-4 py-3 rounded-xl hover:bg-zinc-900 text-base font-medium">Fitur</a>
                <a href="#produk" class="text-zinc-400 hover:text-white block px-4 py-3 rounded-xl hover:bg-zinc-900 text-base font-medium">Produk</a>
                <a href="#profil" class="text-zinc-400 hover:text-white block px-4 py-3 rounded-xl hover:bg-zinc-900 text-base font-medium">Profil</a>
                <a href="{{ route('map') }}" class="text-black block px-4 py-3 rounded-xl bg-white font-medium mt-4 text-center">Buka Peta</a>
            </div>
        </div>
    </nav>

    <main class="relative z-10">
        <section class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 pt-28 pb-32 text-center flex flex-col items-center justify-center min-h-[85vh]">
            <div class="inline-flex items-center rounded-full border border-zinc-800 bg-zinc-900 px-4 py-1.5 text-xs font-medium text-zinc-300 mb-8 animate-fade-in-up">
                <span class="flex w-2 h-2 rounded-full bg-emerald-500 mr-2"></span>
                Mapid Task Portfolio • Genta Halilintar
            </div>
            <h1 class="text-5xl md:text-7xl font-bold text-white tracking-tight mb-6 leading-[1.1] animate-fade-in-up" style="animation-delay: 100ms;">
                Visualisasi Data Spasial<br/><span class="text-zinc-500">Generasi Berikutnya</span>
            </h1>
            <p class="mt-6 max-w-2xl text-base md:text-lg text-zinc-400 mx-auto mb-10 tracking-wide leading-relaxed animate-fade-in-up" style="animation-delay: 200ms;">
                Eksplorasi data geografis dengan interaktivitas tanpa batas. Dibangun dengan fokus pada desain minimalis, performa tinggi, dan pengalaman pengguna profesional.
            </p>
            <div class="flex flex-col sm:flex-row items-center justify-center gap-4 w-full sm:w-auto animate-fade-in-up" style="animation-delay: 300ms;">
                <a href="{{ route('map') }}" class="w-full sm:w-auto inline-flex items-center justify-center px-8 py-3.5 text-sm font-semibold text-black bg-white rounded-full hover:bg-zinc-200 transition-colors">
                    Buka Peta Interaktif
                </a>
                <a href="#features" class="w-full sm:w-auto inline-flex items-center justify-center px-8 py-3.5 text-sm font-semibold text-white bg-zinc-900 border border-zinc-800 rounded-full hover:bg-zinc-800 transition-colors">
                    Pelajari Fitur
                </a>
            </div>
        </section>

        <section id="features" class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 py-24 border-t border-zinc-900">
            <div class="text-center mb-16">
                <h2 class="text-3xl md:text-4xl font-bold text-white mb-4 tracking-tight brand-font">Keunggulan Sistem</h2>
                <p class="text-base text-zinc-400 max-w-2xl mx-auto">Dirancang untuk kecepatan, kejelasan, dan fungsionalitas murni.</p>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div class="glass-card rounded-[2rem] p-8 group">
                    <div class="w-14 h-14 rounded-2xl bg-zinc-900 flex items-center justify-center mb-6 border border-zinc-800 group-hover:border-zinc-600 transition-colors">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 20l-5.447-2.724A1 1 0 013 16.382V5.618a1 1 0 011.447-.894L9 7m0 13l6-3m-6 3V7m6 10l4.553 2.276A1 1 0 0021 18.382V7.618a1 1 0 00-.553-.894L15 4m0 13V4m0 0L9 7"></path></svg>
                    </div>
                    <h3 class="text-xl font-semibold text-white mb-3 tracking-tight brand-font">Peta Interaktif</h3>
                    <p class="text-sm text-zinc-400 leading-relaxed">Rendering vektor berkinerja tinggi menggunakan MapLibre GL JS untuk visualisasi data yang presisi dan mulus.</p>
                </div>
                <div class="glass-card rounded-[2rem] p-8 group">
                    <div class="w-14 h-14 rounded-2xl bg-zinc-900 flex items-center justify-center mb-6 border border-zinc-800 group-hover:border-zinc-600 transition-colors">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M13 10V3L4 14h7v7l9-11h-7z"></path></svg>
                    </div>
                    <h3 class="text-xl font-semibold text-white mb-3 tracking-tight brand-font">Performa Tinggi</h3>
                    <p class="text-sm text-zinc-400 leading-relaxed">Dioptimalkan untuk kecepatan pemuatan layar. Langsung dieksekusi di browser dengan akselerasi WebGL.</p>
                </div>
                <div class="glass-card rounded-[2rem] p-8 group">
                    <div class="w-14 h-14 rounded-2xl bg-zinc-900 flex items-center justify-center mb-6 border border-zinc-800 group-hover:border-zinc-600 transition-colors">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 5a1 1 0 011-1h14a1 1 0 011 1v2a1 1 0 01-1 1H5a1 1 0 01-1-1V5zM4 13a1 1 0 011-1h6a1 1 0 011 1v6a1 1 0 01-1 1H5a1 1 0 01-1-1v-6zM16 13a1 1 0 011-1h2a1 1 0 011 1v6a1 1 0 01-1 1h-2a1 1 0 01-1-1v-6z"></path></svg>
                    </div>
                    <h3 class="text-xl font-semibold text-white mb-3 tracking-tight brand-font">Desain Minimalis</h3>
                    <p class="text-sm text-zinc-400 leading-relaxed">Estetika murni tanpa gangguan, tipografi bersih, dan palet warna monokromatik yang menonjolkan konten.</p>
                </div>
            </div>
        </section>

        <section id="produk" class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 py-24 border-t border-zinc-900">
            <div class="glass-card rounded-[2.5rem] p-8 md:p-12 lg:p-16">
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 items-center">
                    <div>
                        <div class="inline-flex items-center rounded-full border border-zinc-700 bg-zinc-800 px-3 py-1 text-xs font-medium text-zinc-300 mb-6">
                            Detail Produk
                        </div>
                        <h2 class="text-3xl md:text-5xl font-bold text-white mb-6 tracking-tight brand-font leading-tight">Visualisasi Tanpa Batas</h2>
                        <p class="text-base text-zinc-400 mb-10 leading-relaxed">
                            Dibangun di atas ekosistem Laravel modern, aplikasi ini memanfaatkan kekuatan MapLibre GL JS untuk rendering peta vektor yang presisi. Anda dapat dengan mudah melihat dan memanipulasi berbagai data spasial.
                        </p>
                        
                        <ul class="space-y-6">
                            <li class="flex items-start">
                                <div class="mt-1 w-10 h-10 rounded-xl bg-zinc-900 flex items-center justify-center mr-5 flex-shrink-0 text-white border border-zinc-800">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                                </div>
                                <div>
                                    <h4 class="text-white text-lg font-semibold brand-font">Teknologi Vektor Interaktif</h4>
                                    <p class="text-sm text-zinc-500 mt-1.5 leading-relaxed">Rendering peta presisi di semua tingkat zoom tanpa distorsi.</p>
                                </div>
                            </li>
                            <li class="flex items-start">
                                <div class="mt-1 w-10 h-10 rounded-xl bg-zinc-900 flex items-center justify-center mr-5 flex-shrink-0 text-white border border-zinc-800">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                                </div>
                                <div>
                                    <h4 class="text-white text-lg font-semibold brand-font">Basemap Dark Matter</h4>
                                    <p class="text-sm text-zinc-500 mt-1.5 leading-relaxed">Estetika gelap yang memanjakan mata dan menonjolkan data secara kontras.</p>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <div class="rounded-[2rem] overflow-hidden border border-zinc-800 h-80 lg:h-[450px]">
                        <img src="{{ asset('images/map-visual.png') }}" alt="Visualisasi Web GIS" class="w-full h-full object-cover grayscale opacity-80 hover:grayscale-0 hover:opacity-100 transition-all duration-700" onerror="this.src='https://images.unsplash.com/photo-1524661135-423995f22d0b?q=80&w=800&auto=format&fit=crop';">
                    </div>
                </div>
            </div>
        </section>

        <section id="profil" class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 py-24 border-t border-zinc-900">
            <div class="text-center mb-16">
                <h2 class="text-3xl md:text-4xl font-bold text-white mb-4 tracking-tight brand-font">Profil Developer</h2>
            </div>
            
            <div class="glass-card rounded-[2.5rem] p-8 md:p-12">
                <div class="flex flex-col md:flex-row items-start md:items-center justify-between gap-8 mb-16">
                    <div class="flex items-center gap-6">
                        <div class="w-20 h-20 rounded-full border border-zinc-700 bg-zinc-900 flex items-center justify-center">
                            <span class="text-2xl font-bold text-white brand-font">GH</span>
                        </div>
                        <div>
                            <h3 class="text-3xl font-bold text-white tracking-tight brand-font mb-1">Genta Halilintar</h3>
                            <p class="text-zinc-400 font-medium text-base">Fullstack Developer & Web GIS</p>
                        </div>
                    </div>
                    <a href="https://www.linkedin.com/in/genta-halilintar/" target="_blank" rel="noopener noreferrer" class="inline-flex items-center justify-center px-6 py-3 text-sm font-medium text-black bg-white rounded-full hover:bg-zinc-200 transition-colors">
                        Connect on LinkedIn
                        <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"></path></svg>
                    </a>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-12">
                    <div>
                        <h4 class="text-xs font-semibold text-zinc-500 uppercase tracking-widest mb-5">Hubungi</h4>
                        <ul class="space-y-4 text-sm text-zinc-400">
                            <li><span class="text-white">Email</span><br> gentahalilintar36@gmail.com</li>
                            <li><span class="text-white">Telepon</span><br> 0813-1560-3835</li>
                            <li><span class="text-white">Portfolio Web</span><br> <a href="https://v0-genta-porto.vercel.app/" class="hover:text-white transition-colors" target="_blank" rel="noopener noreferrer">vo-genta-porto.vercel.app</a></li>
                            <li><span class="text-white">GitHub</span><br> <a href="https://github.com/Gentahal" class="hover:text-white transition-colors" target="_blank" rel="noopener noreferrer">github.com/Gentahal</a></li>
                        </ul>
                    </div>
                    <div>
                        <h4 class="text-xs font-semibold text-zinc-500 uppercase tracking-widest mb-5">Pengalaman</h4>
                        <div class="space-y-6 text-sm">
                            <div class="relative pl-5 border-l border-zinc-800">
                                <div class="absolute w-2.5 h-2.5 bg-white rounded-full -left-[5.5px] top-1.5"></div>
                                <p class="text-white font-semibold text-base">Freelance Web Developer - (JokiProyek)</p>
                                <p class="text-zinc-500 text-xs mt-1.5">Jan 2025 - Sekarang</p>
                            </div>
                            <div class="relative pl-5 border-l border-zinc-800">
                                <div class="absolute w-2.5 h-2.5 bg-zinc-700 rounded-full -left-[5.5px] top-1.5"></div>
                                <p class="text-white font-semibold text-base">PT Anugrah Inti Artha Mandiri</p>
                                <p class="text-zinc-500 text-xs mt-1.5">Mei 2024 - Nov 2024</p>
                            </div>
                            <div class="relative pl-5 border-l border-transparent">
                                <div class="absolute w-2.5 h-2.5 bg-zinc-700 rounded-full -left-[5.5px] top-1.5"></div>
                                <p class="text-white font-semibold text-base">PT Rahadyan Integrasi Nusantara</p>
                                <p class="text-zinc-500 text-xs mt-1.5">Juni 2023 - Mei 2024</p>
                            </div>
                        </div>
                    </div>
                    <div>
                        <h4 class="text-xs font-semibold text-zinc-500 uppercase tracking-widest mb-5">Keahlian Teknis</h4>
                        <div class="flex flex-wrap gap-2.5">
                            <span class="px-3.5 py-1.5 bg-zinc-900 border border-zinc-800 rounded-lg text-xs font-medium text-zinc-300">PHP / Laravel</span>
                            <span class="px-3.5 py-1.5 bg-zinc-900 border border-zinc-800 rounded-lg text-xs font-medium text-zinc-300">JavaScript</span>
                            <span class="px-3.5 py-1.5 bg-zinc-900 border border-zinc-800 rounded-lg text-xs font-medium text-zinc-300">Java</span>
                            <span class="px-3.5 py-1.5 bg-zinc-900 border border-zinc-800 rounded-lg text-xs font-medium text-zinc-300">Tailwind CSS</span>
                            <span class="px-3.5 py-1.5 bg-zinc-900 border border-zinc-800 rounded-lg text-xs font-medium text-zinc-300">Web GIS</span>
                            <span class="px-3.5 py-1.5 bg-zinc-900 border border-zinc-800 rounded-lg text-xs font-medium text-zinc-300">MySQL</span>
                            <span class="px-3.5 py-1.5 bg-zinc-900 border border-zinc-800 rounded-lg text-xs font-medium text-zinc-300">MongoDB</span>
                            <span class="px-3.5 py-1.5 bg-zinc-900 border border-zinc-800 rounded-lg text-xs font-medium text-zinc-300">UI Design</span>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <footer class="border-t border-zinc-900 bg-black py-10 mt-12">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 flex flex-col md:flex-row justify-between items-center gap-4">
            <div class="flex items-center gap-2.5">
                <div class="w-6 h-6 rounded-md bg-white flex items-center justify-center">
                    <svg class="w-3.5 h-3.5 text-black" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                </div>
                <span class="text-base font-bold text-white brand-font tracking-tight">Mapid Task.</span>
            </div>
            <p class="text-sm text-zinc-500 font-medium">© 2026 Crafted by Genta Halilintar.</p>
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
