<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <title>Rute ke TULT | Mapid Task</title>
    <meta name="description" content="Visualisasi peta interaktif dengan MapLibre GL JS, rute Grand Saskara ke TULT.">
    <link href="https://unpkg.com/maplibre-gl@3.6.2/dist/maplibre-gl.css" rel="stylesheet" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700&family=Inter:wght@300;400;500;600&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        body, html {
            margin: 0;
            padding: 0;
            width: 100%;
            height: 100vh;
            overflow: hidden; 
            background-color: #000000;
            font-family: 'Inter', sans-serif;
        }
        #map {
            width: 100%;
            height: 100%;
            position: absolute;
            top: 0;
            left: 0;
        }
        .linear-panel {
            background: rgba(0, 0, 0, 0.8);
            backdrop-filter: blur(16px);
            -webkit-backdrop-filter: blur(16px);
            border: 1px solid rgba(255, 255, 255, 0.08);
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.5);
        }
        .brand-font {
            font-family: 'Outfit', sans-serif;
        }
    </style>
</head>
<body class="font-sans antialiased text-gray-300">
    
    <div id="map"></div>

    <div class="absolute top-6 left-6 z-10 flex flex-col gap-4 w-full max-w-xs md:max-w-sm">
        <a href="{{ route('home') }}" class="inline-flex items-center w-max px-5 py-2.5 text-sm font-medium text-black bg-white rounded-full hover:bg-zinc-200 transition-colors shadow-lg">
            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
            Kembali ke Beranda
        </a>

        <div class="linear-panel rounded-2xl p-6">
            <div class="flex items-center mb-5">
                <div class="w-10 h-10 rounded-xl bg-zinc-800 flex items-center justify-center mr-4 border border-zinc-700">
                    <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                </div>
                <div>
                    <h2 class="text-white font-semibold text-base tracking-tight brand-font">Mapid Task.</h2>
                    <p class="text-xs text-zinc-400">Informasi Rute Peta</p>
                </div>
            </div>
            
            <div class="flex flex-col gap-3 mb-4">
                <div>
                    <label class="text-xs text-zinc-400">Titik Awal (Lat, Lng)</label>
                    <input type="text" id="start-point" placeholder="Klik peta atau ketik..." class="w-full bg-zinc-800/50 text-white border border-zinc-700 rounded-lg px-3 py-2 text-sm mt-1 focus:outline-none focus:border-[#3b82f6] transition-colors">
                </div>
                <div>
                    <label class="text-xs text-zinc-400">Titik Tujuan (Lat, Lng)</label>
                    <input type="text" id="end-point" placeholder="Klik peta atau ketik..." class="w-full bg-zinc-800/50 text-white border border-zinc-700 rounded-lg px-3 py-2 text-sm mt-1 focus:outline-none focus:border-[#3b82f6] transition-colors">
                </div>
                <div>
                    <label class="text-xs text-zinc-400">Pilih Area (Opsional)</label>
                    <input type="text" id="polygon-point" placeholder="Klik peta atau ketik..." class="w-full bg-zinc-800/50 text-white border border-zinc-700 rounded-lg px-3 py-2 text-sm mt-1 focus:outline-none focus:border-[#ef4444] transition-colors">
                </div>
                <button id="calc-btn" class="w-full bg-[#3b82f6] hover:bg-blue-600 text-white font-medium rounded-lg px-4 py-2.5 text-sm transition-colors mt-2">
                    Tampilkan di Peta
                </button>
            </div>
            <p class="text-xs text-zinc-500 leading-relaxed">
                *Pilih kolom input lalu klik pada peta untuk mengisi koordinat secara otomatis.
            </p>
            
            <div class="mt-5 pt-5 border-t border-zinc-800 flex flex-col gap-3 text-xs">
                <div class="flex items-center text-zinc-300">
                    <span class="w-3 h-3 rounded-full bg-[#10b981] border-2 border-[#0a0a0a] mr-3"></span> Titik Awal
                </div>
                <div class="flex items-center text-zinc-300">
                    <span class="w-3 h-3 rounded-full bg-[#ef4444] border-2 border-[#0a0a0a] mr-3"></span> Titik Tujuan
                </div>
                <div class="flex items-center text-zinc-300">
                    <span class="w-3 h-1 bg-[#3b82f6] mr-3 rounded-full"></span> Rute Kendaraan Tercepat
                </div>
                <div id="legend-polygon" class="flex items-center text-zinc-300">
                    <span class="w-3 h-3 border border-[#ef4444] bg-[#b91c1c]/30 mr-3 rounded-[3px]"></span> Area Yang Dipilih
                </div>
            </div>
        </div>
    </div>

    <div id="result-popup" class="hidden absolute top-6 right-6 z-10 linear-panel rounded-2xl p-6 w-64 border-l-4 border-l-[#3b82f6] transition-opacity duration-300 shadow-2xl">
        <h3 class="text-white font-semibold mb-4 text-sm flex items-center">
            <svg class="w-4 h-4 mr-2 text-[#3b82f6]" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
            Hasil Kalkulasi
        </h3>
        <div class="space-y-3">
            <div>
                <p class="text-xs text-zinc-400 mb-1">Jarak Tempuh</p>
                <p id="res-distance" class="font-bold text-white text-lg">-</p>
            </div>
            <div>
                <p class="text-xs text-zinc-400 mb-1">Estimasi Waktu Kendaraan</p>
                <p id="res-time" class="font-bold text-[#10b981] text-lg">-</p>
            </div>
        </div>
        <button id="close-popup" class="w-full mt-5 py-2 text-xs font-medium text-zinc-300 bg-zinc-800 hover:bg-zinc-700 rounded-lg transition-colors border border-zinc-700">Tutup</button>
    </div>

    <script src="https://unpkg.com/maplibre-gl@3.6.2/dist/maplibre-gl.js"></script>
    <script>
        const map = new maplibregl.Map({
            container: 'map',
            style: 'https://basemaps.cartocdn.com/gl/dark-matter-gl-style/style.json',
            center: [107.643000, -6.986000], 
            zoom: 13.2, 
            attributionControl: false
        });

        map.addControl(new maplibregl.NavigationControl(), 'top-right');

        let activeInput = null;
        const startInput = document.getElementById('start-point');
        const endInput = document.getElementById('end-point');
        const polygonInput = document.getElementById('polygon-point');
        const calcBtn = document.getElementById('calc-btn');
        const resultPopup = document.getElementById('result-popup');
        const resDistance = document.getElementById('res-distance');
        const resTime = document.getElementById('res-time');
        const closePopup = document.getElementById('close-popup');
        const legendPolygon = document.getElementById('legend-polygon');

        startInput.addEventListener('focus', () => activeInput = startInput);
        endInput.addEventListener('focus', () => activeInput = endInput);
        polygonInput.addEventListener('focus', () => activeInput = polygonInput);

        map.on('click', (e) => {
            if (activeInput) {
                const lat = e.lngLat.lat.toFixed(6);
                const lng = e.lngLat.lng.toFixed(6);
                activeInput.value = `${lat}, ${lng}`;
            }
        });

        closePopup.addEventListener('click', () => {
            resultPopup.classList.add('hidden');
        });

        async function geocode(query) {
            const coords = query.split(',').map(s => parseFloat(s.trim()));
            if (coords.length === 2 && !isNaN(coords[0]) && !isNaN(coords[1])) {
                return [coords[1], coords[0]]; 
            }
            
            const url = `https://nominatim.openstreetmap.org/search?format=json&q=${encodeURIComponent(query)}&limit=1`;
            const response = await fetch(url);
            const data = await response.json();
            
            if (data && data.length > 0) {
                return [parseFloat(data[0].lon), parseFloat(data[0].lat)]; 
            }
            throw new Error(`Lokasi "${query}" tidak ditemukan.`);
        }

        map.on('load', async () => {
            try {
                const response = await fetch('/api/map-data');
                const initialGeoJSON = await response.json();

                map.addSource('geospatial-data', {
                    type: 'geojson',
                    data: initialGeoJSON
                });

            map.addLayer({
                id: 'polygon-layer',
                type: 'fill',
                source: 'geospatial-data',
                filter: ['==', 'type', 'polygon'],
                paint: {
                    'fill-color': '#b91c1c', 
                    'fill-opacity': 0.1,
                    'fill-outline-color': '#ef4444'
                }
            });

            map.addLayer({
                id: 'line-layer',
                type: 'line',
                source: 'geospatial-data',
                filter: ['==', 'type', 'line'],
                layout: {
                    'line-join': 'round',
                    'line-cap': 'round'
                },
                paint: {
                    'line-color': '#3b82f6', 
                    'line-width': 4
                }
            });

            map.addLayer({
                id: 'start-point-layer',
                type: 'circle',
                source: 'geospatial-data',
                filter: ['==', 'type', 'start-point'],
                paint: {
                    'circle-radius': 7,
                    'circle-color': '#10b981', 
                    'circle-stroke-width': 2,
                    'circle-stroke-color': '#0a0a0a'
                }
            });

            map.addLayer({
                id: 'end-point-layer',
                type: 'circle',
                source: 'geospatial-data',
                filter: ['==', 'type', 'end-point'],
                paint: {
                    'circle-radius': 7,
                    'circle-color': '#ef4444', 
                    'circle-stroke-width': 2,
                    'circle-stroke-color': '#0a0a0a'
                }
            });

            } catch (error) {
                console.error("Gagal memuat data dummy dari backend:", error);
            }

            calcBtn.addEventListener('click', async () => {
                if (!startInput.value || !endInput.value) {
                    alert('Silakan isi Titik Awal dan Titik Tujuan terlebih dahulu.');
                    return;
                }

                try {
                    const originalBtnText = calcBtn.innerHTML;
                    calcBtn.innerHTML = 'Mencari Lokasi...';
                    calcBtn.disabled = true;

                    const startPoint = await geocode(startInput.value);
                    const endPoint = await geocode(endInput.value);

                    let routeGeoJSONFeatures = [
                        {
                            "type": "Feature",
                            "geometry": { "type": "Point", "coordinates": startPoint },
                            "properties": { "type": "start-point" }
                        },
                        {
                            "type": "Feature",
                            "geometry": { "type": "Point", "coordinates": endPoint },
                            "properties": { "type": "end-point" }
                        }
                    ];

                    calcBtn.innerHTML = 'Menghitung Rute...';

                    const osrmUrl = `https://router.project-osrm.org/route/v1/driving/${startPoint[0]},${startPoint[1]};${endPoint[0]},${endPoint[1]}?overview=full&geometries=geojson`;
                    
                    const response = await fetch(osrmUrl);
                    if (!response.ok) {
                        throw new Error('Gagal mengambil data rute dari server OSRM.');
                    }
                    
                    const data = await response.json();
                    let routeGeometry = null;

                    if (data.code === 'Ok' && data.routes && data.routes.length > 0) {
                        const route = data.routes[0];
                        routeGeometry = route.geometry;
                        
                        routeGeoJSONFeatures.push({
                            "type": "Feature",
                            "geometry": routeGeometry,
                            "properties": { "type": "line" }
                        });

                        const distanceMeters = route.distance;
                        const distanceKm = distanceMeters / 1000;
                        
                        const durationSeconds = route.duration;
                        const timeMinutes = Math.round(durationSeconds / 60);

                        resDistance.textContent = distanceKm < 1 ? `${Math.round(distanceMeters)} m` : `${distanceKm.toFixed(2)} km`;
                        
                        if (timeMinutes < 1) {
                            resTime.textContent = '< 1 menit';
                        } else if (timeMinutes >= 60) {
                            const h = Math.floor(timeMinutes / 60);
                            const m = timeMinutes % 60;
                            resTime.textContent = `${h} jam ${m} mnt`;
                        } else {
                            resTime.textContent = `${timeMinutes} menit`;
                        }
                        resultPopup.classList.remove('hidden');
                    } else {
                        alert('Rute berkendara tidak ditemukan, mungkin titik tersebut tidak terhubung oleh jalan raya.');
                        resultPopup.classList.add('hidden');
                    }

                    if (polygonInput.value) {
                        const polyCenter = await geocode(polygonInput.value);
                        if (polyCenter) {
                            const pLng = polyCenter[0];
                            const pLat = polyCenter[1];
                            const offset = 0.005;

                            routeGeoJSONFeatures.push({
                                "type": "Feature",
                                "geometry": {
                                    "type": "Polygon",
                                    "coordinates": [[
                                        [pLng - offset, pLat - offset],
                                        [pLng + offset, pLat - offset],
                                        [pLng + offset, pLat + offset],
                                        [pLng - offset, pLat + offset],
                                        [pLng - offset, pLat - offset]
                                    ]]
                                },
                                "properties": { "type": "polygon" }
                            });

                            if (legendPolygon) legendPolygon.style.display = 'flex';
                        }
                    } else {
                        if (legendPolygon) legendPolygon.style.display = 'none';
                    }

                    map.getSource('geospatial-data').setData({
                        "type": "FeatureCollection",
                        "features": routeGeoJSONFeatures
                    });

                    const bounds = new maplibregl.LngLatBounds();
                    if (routeGeometry) {
                        routeGeometry.coordinates.forEach(coord => bounds.extend(coord));
                    } else {
                        bounds.extend(startPoint);
                        bounds.extend(endPoint);
                    }
                    map.fitBounds(bounds, { padding: 80 });

                } catch (e) {
                    alert('Error: ' + e.message + '\nPastikan ejaan nama tempat atau format lat, lng benar.');
                } finally {
                    calcBtn.innerHTML = 'Tampilkan di Peta';
                    calcBtn.disabled = false;
                }
            });
        });
    </script>
</body>
</html>