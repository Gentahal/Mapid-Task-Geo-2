<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <title>Rute ke TULT | GeoPort</title>
    <meta name="description" content="Visualisasi peta interaktif dengan MapLibre GL JS, rute Grand Saskara ke TULT.">
    <link href="https://unpkg.com/maplibre-gl@3.6.2/dist/maplibre-gl.css" rel="stylesheet" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
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
            background: rgba(0, 0, 0, 0.6);
            backdrop-filter: blur(16px);
            -webkit-backdrop-filter: blur(16px);
            border: 1px solid rgba(255, 255, 255, 0.08);
            box-shadow: 0 4px 30px rgba(0, 0, 0, 0.5);
        }
    </style>
</head>
<body class="font-sans antialiased text-gray-300">
    
    <div id="map"></div>

    <div class="absolute top-6 left-6 z-10 flex flex-col gap-4">
        <a href="{{ route('home') }}" class="inline-flex items-center w-max px-4 py-2 text-xs font-medium text-white bg-white/5 border border-white/10 rounded-lg hover:bg-white/10 transition-all duration-200">
            <svg class="w-3.5 h-3.5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
            Kembali ke Home
        </a>

        <div class="linear-panel rounded-xl p-5 max-w-xs md:max-w-sm">
            <div class="flex items-center mb-4">
                <div class="w-8 h-8 rounded-lg bg-white/5 flex items-center justify-center mr-3 border border-white/10">
                    <svg class="w-4 h-4 text-emerald-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                </div>
                <h2 class="text-white font-medium text-sm tracking-tight">Informasi Rute Peta</h2>
            </div>
            <p class="text-gray-400 text-xs leading-relaxed mb-5">
                Peta ini memvisualisasikan jalur dan jarak dari Kosku <strong>Grand Saskara</strong> menuju ke area gedung perkuliahan di <strong>TULT Telkom University</strong>.
            </p>
            <div class="flex flex-col gap-3 text-xs">
                <div class="flex items-center text-gray-400">
                    <span class="w-2.5 h-2.5 rounded-full bg-[#10b981] mr-3 shadow-[0_0_8px_rgba(16,185,129,0.5)]"></span> Titik Lokasi
                </div>
                <div class="flex items-center text-gray-400">
                    <span class="w-2.5 h-0.5 bg-[#3b82f6] mr-3 shadow-[0_0_8px_rgba(59,130,246,0.5)]"></span> Jalur Tempuh
                </div>
                <div class="flex items-center text-gray-400">
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