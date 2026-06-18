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

    <div class="absolute top-6 left-6 z-10 flex flex-col gap-4">
        <a href="{{ route('home') }}" class="inline-flex items-center w-max px-5 py-2.5 text-sm font-medium text-black bg-white rounded-full hover:bg-zinc-200 transition-colors shadow-lg">
            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
            Kembali ke Beranda
        </a>

        <div class="linear-panel rounded-2xl p-6 max-w-xs md:max-w-sm">
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
            <p class="text-zinc-400 text-xs leading-relaxed mb-5">
                Peta ini memvisualisasikan jalur dan jarak dari Kosku <strong>Grand Saskara</strong> menuju ke area gedung perkuliahan di <strong>TULT Telkom University</strong>.
            </p>
            <div class="flex flex-col gap-3 text-xs">
                <div class="flex items-center text-zinc-300">
                    <span class="w-2.5 h-2.5 rounded-full bg-[#10b981] mr-3"></span> Titik Lokasi
                </div>
                <div class="flex items-center text-zinc-300">
                    <span class="w-2.5 h-0.5 bg-[#3b82f6] mr-3"></span> Jalur Tempuh
                </div>
                <div class="flex items-center text-zinc-300">
                    <span class="w-2.5 h-2.5 border border-[#ef4444] bg-[#b91c1c]/30 mr-3 rounded-sm"></span> Kawasan Kampus
                </div>
            </div>
        </div>
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

        map.on('load', () => {

            const dummyGeoJSON = {
                "type": "FeatureCollection",
                "features": [
                    {
                        "type": "Feature",
                        "geometry": { "type": "Point", "coordinates": [107.6579720383293, -7.0032801660342825] },
                        "properties": { "type": "point", "title": "Rumah (Grand Saskara)" }
                    },
                    {
                        "type": "Feature",
                        "geometry": { "type": "Point", "coordinates": [107.631500, -6.974500] },
                        "properties": { "type": "point", "title": "Gerbang Telkom Univ" }
                    },
                    {
                        "type": "Feature",
                        "geometry": { "type": "Point", "coordinates": [107.628157, -6.969282] },
                        "properties": { "type": "point", "title": "TULT" }
                    },                     
                    {
                        "type": "Feature",
                        "geometry": {
                            "type": "LineString",
                            "coordinates": [
                                [107.6579720383293, -7.0032801660342825],
                                [107.638783, -6.978381], 
                                [107.631500, -6.974500], 
                                [107.628157, -6.969282]                 
                            ]
                        },
                        "properties": { "type": "line", "title": "Rute Berangkat" }
                    },
                    {
                        "type": "Feature",
                        "geometry": {
                            "type": "Polygon",
                            "coordinates": [[
                                [107.6250, -6.9680], 
                                [107.6310, -6.9680], 
                                [107.6310, -6.9760], 
                                [107.6250, -6.9760], 
                                [107.6250, -6.9680]  
                            ]]
                        },
                        "properties": { "type": "polygon", "title": "Kawasan Telkom University" }
                    }
                ]
            };

            map.addSource('geospatial-data', {
                type: 'geojson',
                data: dummyGeoJSON
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
                paint: {
                    'line-color': '#3b82f6', 
                    'line-width': 4,
                    'line-dasharray': [2, 1.5] 
                }
            });

            map.addLayer({
                id: 'point-layer',
                type: 'circle',
                source: 'geospatial-data',
                filter: ['==', 'type', 'point'],
                paint: {
                    'circle-radius': 7,
                    'circle-color': '#10b981', 
                    'circle-stroke-width': 2,
                    'circle-stroke-color': '#0a0a0a'
                }
            });

        });
    </script>
</body>
</html>