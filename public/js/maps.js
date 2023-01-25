try {
    let array_init = undefined;

    let cargando = document.querySelector("#cargando");
    // Make basemap
    const map = new L.Map("map", {
        center: new L.LatLng(4.570868, -74.297333),
        zoom: 5,
        ext: "png"
    });
    var cartodbAttribution =
        '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors, &copy; <a href="#"><img src="https://www.close-upinternational.com/img/logo.svg" width="50px" /> | <img src="https://upload.wikimedia.org/wikipedia/commons/2/21/Flag_of_Colombia.svg" width="12px" /></a>';

    const osm = new L.TileLayer(
        //"http://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png",
        //"https://server.arcgisonline.com/ArcGIS/rest/services/World_Topo_Map/MapServer/tile/{z}/{y}/{x}"
        //"https://stamen-tiles.a.ssl.fastly.net/carto/{z}/{x}/{y}.png"
        //"https://stamen-tiles.a.ssl.fastly.net/toner/{z}/{x}/{y}.png"
        "https://cartodb-basemaps-{s}.global.ssl.fastly.net/light_all/{z}/{x}/{y}.png",
        //"https://stamen-tiles.a.ssl.fastly.net/terrain/{z}/{x}/{y}.jpg"
        //"https://stamen-tiles.a.ssl.fastly.net/watercolor/{z}/{x}/{y}.jpg"
        { attribution: cartodbAttribution }
    );

    //llenar search con datos de maps


    //pain areas
    function getColor(d) {
        //console.log(d);
        "#FD8D3C";
    }
    //style
    function generarLetra() {
        var letras = [
            "a",
            "b",
            "c",
            "d",
            "e",
            "f",
            "0",
            "1",
            "2",
            "3",
            "4",
            "5",
            "6",
            "7",
            "8",
            "9",
        ];
        var numero = (Math.random() * 15).toFixed(0);
        return letras[numero];
    }

    function colorHEX() {
        var coolor = "";
        for (var i = 0; i < 6; i++) {
            coolor = coolor + generarLetra();
        }
        return "#" + coolor;
    }

    function style(feature) {
        //console.log(feature);
        return {
            fillColor: getColor(feature.properties.name),
            weight: 2,
            opacity: 0.1,
            color: "red",
            dashArray: "3",
            fillOpacity: 0.1,
        };
    }

    function style_dep() {
        let color = colorHEX();
        //console.log(feature.properties.name);
        return {
            fillColor: color,
            weight: 2,
            opacity: 0.1,
            color: "red",
            dashArray: "3",
            fillOpacity: 0.5,
        };
    }

    map.addLayer(osm);

    var CustomIcon = L.Icon.extend({
        options: {
            iconSize: [120, 90],
            iconAnchor: [22, 94],
            popupAnchor: [-3, -76],
        },
    });

    var svgrect = "https://www.close-upinternational.com/img/logo.svg";

    //Para Firefox y IE hay que rremplazar '#' por '%23'.
    var url = encodeURI("data:image/svg+xml," + svgrect).replace("#", "%23");

    var rectIcon = new CustomIcon({ iconUrl: url });

    /*
    var marker = L.marker([4.570868, -74.297333], { icon: rectIcon })
        .bindPopup("Colombia")
        .addTo(map);
    */

    // add maps geojson
    L.geoJson(null, {
        filter: function(feature) {
            // console.log(feature.properties.name);
        },
        style: style,
        onEachFeature: function(feature, layer) {
            if (feature.geometry.type) {
                layer.bindPopup(
                    JSON.stringify(
                        "<img src='https://www.close-upinternational.com/img/logo.svg' alt='colombia'  /> <br>" +
                        feature.properties.description
                    )
                );
            }
        },
    }).addTo(map);

    //escala
    L.control.scale().addTo(map);
    //end view maps

    //lazo

    //end lazo

    // Insertando una leyenda en el mapa
    //L.control.zoom({ position: "topright" }).addTo(map);


    //end pain

    // Insertando una leyenda en el mapa

    //selector

    const selectElement = document.querySelector(".nieve");
    const num_utc = document.querySelector(".num_utc");

    selectElement.addEventListener("change", (event) => {});

    //removercapas



    function removeMarkers() {
        try {

            //L.geoJson(layer).removeLayer(map)

            map.eachLayer(function(layer) {
                if (layer.myTag === "mapa") {
                    map.removeLayer(layer);
                }

                if (layer.myTag === "calor") {
                    map.removeLayer(layer);
                }
            });
        } catch (error) {
            alert(error);
        }
    }

    function flay(a, b, c) {
        if (c === 'a') {
            map.flyTo([a, b], 9)
        } else
        if (c === 'b') {
            map.flyTo([a, b], 11.8)
        } else
        if (c === 'c') {
            map.flyTo([a, b], 12)
        } else
        if (c === 'd') {
            map.flyTo([a, b], 13)
        } else
        if (c === 'e') {
            map.flyTo([a, b], 17.5)
        }

    }

    function clearUTC() {
        const $select_utc = document.querySelector("#my-select-utc");
        for (let i = $select_utc.options.length; i >= 0; i--) {
            $select_utc.remove(i);
        }
    }

    //limpir select
    function clearSelect() {
        const $select = document.querySelector("#my-select-dep");
        for (let i = $select.options.length; i >= 0; i--) {
            $select.remove(i);
        }

        const $select_ = document.querySelector("#search_");
        for (let i = $select_.options.length; i >= 0; i--) {
            $select_.remove(i);
        }
        clearSelectMun();
        clearSelectLoc();
        clearSelectBar()
        clearUTC();
    }
    //limpiar select municipios
    function clearSelectMun() {
        const $select = document.querySelector("#my_select-mun");
        for (let i = $select.options.length; i >= 0; i--) {
            $select.remove(i);
        }
        clearSelectLoc();
        clearSelectBar()
        clearUTC();
    }

    //limpiar select localidad
    function clearSelectLoc() {
        const $select = document.querySelector("#my_select-loc");
        for (let i = $select.options.length; i >= 0; i--) {
            $select.remove(i);
        }

        clearSelectBar()
        clearUTC();
    }

    //limpiar select barrio
    function clearSelectBar() {
        const $select = document.querySelector("#my_select-bar");
        for (let i = $select.options.length; i >= 0; i--) {
            $select.remove(i);
        }
        clearUTC();
    }

    function onLoad_() {
        let i = (document.getElementById("cargando").textContent = " ");
    }

    function offLoad_(txt) {
        document.getElementById("cargando").textContent = txt;
    }

    //valores unicos
    function onlyUnique(value, index, self) {
        return self.indexOf(value) === index;
    }
    let dep = [];

    function cargandoON() {
        $(cargando).show(3000);
    }

    function cargandoOFF() {
        $(cargando).show(3000);
    }


    //centro de poligono



    //consultar region utc
    selectElement.addEventListener('change', function() {
        //  $(selectElement).on('change', function() {
        $.ajax({
            url: "utcmaps",
            data: $("#form-search").serialize(),
            type: "post",
            success: function(response) {
                try {
                    clearSelect();
                    clearSelectMun();
                    clearSelectLoc();
                    clearSelectBar()
                    clearUTC();
                    removeMarkers();
                } catch (error) {
                    console.log(error);
                }
                dep = [];
                array_init = response;
                //console.log(response);
                let init = function() {
                    try {
                        switch (response[0].region) {
                            case "CENTRO":
                                onLoad_("CENTRO");
                                //L.marker([4.60971, -74.08175]).addTo(layerGroup);

                                for (const it of response) {
                                    L.geoJson(maps, {
                                        filter: function(feature, layer) {

                                            return (

                                                feature.properties.name === it.co_barrio
                                            );
                                        },
                                        style: style,
                                        onEachFeature: function(feature, layer) {
                                            layer.myTag = "mapa";
                                            if (feature.geometry.type) {
                                                layer.bindPopup(
                                                    JSON.stringify(
                                                        "<br><img src='https://www.close-upinternational.com/img/logo.svg' alt='colombia'  /> <br>" +
                                                        feature.properties
                                                        .description
                                                    )
                                                );

                                                poligono = feature.geometry.coordinates;
                                            }
                                        },
                                    }).addTo(map);

                                    dep.push(it.departamento);

                                    //cargar utc dentro de departamentos
                                    var x = document.getElementById("my-select-utc");
                                    var option = new Option(
                                        `${it.co_barrio}`,
                                        `${it.co_barrio}`
                                    );
                                    x.appendChild(option);

                                    var y = document.getElementById("search_");
                                    var option_ = new Option(
                                        `${it.co_barrio}`,
                                        `${it.co_barrio}`
                                    );
                                    y.appendChild(option_);

                                }

                                //console.log(dep.length);
                                var unique = dep.filter(onlyUnique);
                                //console.log(unique)


                                //select de utc
                                var x = document.getElementById("my-select-dep");
                                unique.forEach((element) => {
                                    var option = new Option(
                                        `${element}`,
                                        `${element}`,
                                        false,
                                        false
                                    );
                                    x.appendChild(option);
                                });
                                cargandoOFF();
                                map.flyTo([4.60971, -74.08175], 6.8);
                                offLoad_();
                                break;
                            case "COSTA ATLANTICA":
                                onLoad_("COSTA ATLANTICA");
                                //L.marker([10.96854, -74.78132]).addTo(layerGroup);

                                for (const it of response) {
                                    L.geoJson(maps, {
                                        filter: function(feature, layer) {
                                            return (
                                                feature.properties.name === it.co_barrio
                                            );
                                        },
                                        style: style,
                                        onEachFeature: function(feature, layer) {
                                            layer.myTag = "mapa";
                                            if (feature.geometry.type) {
                                                layer.bindPopup(
                                                    JSON.stringify(
                                                        "<br><img src='https://www.close-upinternational.com/img/logo.svg' alt='colombia'  /> <br>" +
                                                        feature.properties
                                                        .description
                                                    )
                                                );
                                            }
                                        },
                                    }).addTo(map);

                                    dep.push(it.departamento);
                                    //cargar utc dentro de departamentos
                                    var x = document.getElementById("my-select-utc");
                                    var option = new Option(
                                        `${it.co_barrio}`,
                                        `${it.co_barrio}`
                                    );
                                    x.appendChild(option);
                                    var y = document.getElementById("search_");
                                    var option_ = new Option(
                                        `${it.co_barrio}`,
                                        `${it.co_barrio}`
                                    );
                                    y.appendChild(option_);
                                }

                                //console.log(dep.length);
                                var unique = dep.filter(onlyUnique);
                                //console.log(unique)

                                //select de utc
                                var x = document.getElementById("my-select-dep");
                                unique.forEach((element) => {
                                    var option = new Option(
                                        `${element}`,
                                        `${element}`,
                                        false,
                                        false
                                    );
                                    x.appendChild(option);
                                });
                                map.flyTo([10.96854, -74.78132], 6.8);
                                offLoad_();
                                break;
                            case "COSTA PACIFICA":
                                onLoad_("COSTA PACIFICA");
                                ///L.marker([3.43722, -76.5225]).addTo(layerGroup);

                                for (const it of response) {
                                    L.geoJson(maps, {
                                        filter: function(feature, layer) {
                                            return (
                                                feature.properties.name === it.co_barrio
                                            );
                                        },
                                        style: style,
                                        onEachFeature: function(feature, layer) {
                                            layer.myTag = "mapa";
                                            if (feature.geometry.type) {
                                                layer.bindPopup(
                                                    JSON.stringify(
                                                        "<br><img src='https://www.close-upinternational.com/img/logo.svg' alt='colombia'  /> <br>" +
                                                        feature.properties
                                                        .description
                                                    )
                                                );
                                            }
                                        },
                                    }).addTo(map);

                                    dep.push(it.departamento);

                                    //cargar utc dentro de departamentos
                                    var x = document.getElementById("my-select-utc");
                                    var option = new Option(
                                        `${it.co_barrio}`,
                                        `${it.co_barrio}`
                                    );
                                    x.appendChild(option);
                                    var y = document.getElementById("search_");
                                    var option_ = new Option(
                                        `${it.co_barrio}`,
                                        `${it.co_barrio}`
                                    );
                                    y.appendChild(option_);
                                }
                                //console.log(dep.length);
                                var unique = dep.filter(onlyUnique);
                                //console.log(unique)

                                //select de utc
                                var x = document.getElementById("my-select-dep");
                                unique.forEach((element) => {
                                    var option = new Option(
                                        `${element}`,
                                        `${element}`,
                                        false,
                                        false
                                    );
                                    x.appendChild(option);
                                });
                                map.flyTo([3.43722, -76.5225], 7);
                                offLoad_();
                                break;
                            case "ANTIOQUIA":
                                onLoad_("ANTIOQUIA");
                                //L.marker([4.60971, -74.08175]).addTo(layerGroup);

                                for (const it of response) {
                                    L.geoJson(maps, {
                                        filter: function(feature, layer) {
                                            return (
                                                feature.properties.name === it.co_barrio
                                            );
                                        },
                                        style: style,
                                        onEachFeature: function(feature, layer) {
                                            layer.myTag = "mapa";
                                            if (feature.geometry.type) {
                                                layer.bindPopup(
                                                    JSON.stringify(
                                                        "<br><img src='https://www.close-upinternational.com/img/logo.svg' alt='colombia'  /> <br>" +
                                                        feature.properties
                                                        .description
                                                    )
                                                );
                                            }
                                        },
                                    }).addTo(map);

                                    dep.push(it.departamento);

                                    //cargar utc dentro de departamentos
                                    var x = document.getElementById("my-select-utc");
                                    var option = new Option(
                                        `${it.co_barrio}`,
                                        `${it.co_barrio}`
                                    );
                                    x.appendChild(option);
                                    var y = document.getElementById("search_");
                                    var option_ = new Option(
                                        `${it.co_barrio}`,
                                        `${it.co_barrio}`
                                    );
                                    y.appendChild(option_);
                                }

                                //console.log(dep.length);
                                var unique = dep.filter(onlyUnique);
                                //console.log(unique)

                                //select de utc
                                var x = document.getElementById("my-select-dep");
                                unique.forEach((element) => {
                                    var option = new Option(
                                        `${element}`,
                                        `${element}`,
                                        false,
                                        false
                                    );
                                    x.appendChild(option);
                                });

                                map.flyTo([7.1711111111111, -75.763611111111], 7.5);
                                offLoad_();
                                break;
                            case "EJE CAFETERO":
                                onLoad_("EJE CAFETERO");
                                //L.marker([4.81333, -75.69611]).addTo(layerGroup);

                                for (const it of response) {
                                    L.geoJson(maps, {
                                        filter: function(feature, layer) {
                                            return (
                                                feature.properties.name === it.co_barrio
                                            );
                                        },
                                        style: style,
                                        onEachFeature: function(feature, layer) {
                                            layer.myTag = "mapa";
                                            if (feature.geometry.type) {
                                                layer.bindPopup(
                                                    JSON.stringify(
                                                        "<br><img src='https://www.close-upinternational.com/img/logo.svg' alt='colombia'  /> <br>" +
                                                        feature.properties
                                                        .description
                                                    )
                                                );
                                            }
                                        },
                                    }).addTo(map);

                                    dep.push(it.departamento);

                                    //cargar utc dentro de departamentos
                                    var x = document.getElementById("my-select-utc");
                                    var option = new Option(
                                        `${it.co_barrio}`,
                                        `${it.co_barrio}`
                                    );
                                    x.appendChild(option);
                                    var y = document.getElementById("search_");
                                    var option_ = new Option(
                                        `${it.co_barrio}`,
                                        `${it.co_barrio}`
                                    );
                                    y.appendChild(option_);
                                }

                                //console.log(dep.length);
                                var unique = dep.filter(onlyUnique);
                                //console.log(unique)

                                //select de utc
                                var x = document.getElementById("my-select-dep");
                                unique.forEach((element) => {
                                    var option = new Option(
                                        `${element}`,
                                        `${element}`,
                                        false,
                                        false
                                    );
                                    x.appendChild(option);
                                });
                                map.flyTo([4.81333, -75.69611], 8.5);
                                offLoad_();
                                break;
                            case "SANTANDERES":
                                onLoad_("SANTANDERES");
                                //L.marker([7.12539, -73.1198]).addTo(layerGroup);

                                for (const it of response) {
                                    L.geoJson(maps, {
                                        filter: function(feature, layer) {
                                            return (
                                                feature.properties.name === it.co_barrio
                                            );
                                        },
                                        style: style,
                                        onEachFeature: function(feature, layer) {
                                            layer.myTag = "mapa";
                                            if (feature.geometry.type) {
                                                layer.bindPopup(
                                                    JSON.stringify(
                                                        "<br><img src='https://www.close-upinternational.com/img/logo.svg' alt='colombia'  /> <br>" +
                                                        feature.properties
                                                        .description
                                                    )
                                                );
                                            }
                                        },
                                    }).addTo(map);

                                    dep.push(it.departamento);
                                    //cargar utc dentro de departamentos
                                    var x = document.getElementById("my-select-utc");
                                    var option = new Option(
                                        `${it.co_barrio}`,
                                        `${it.co_barrio}`
                                    );
                                    x.appendChild(option);
                                    var y = document.getElementById("search_");
                                    var option_ = new Option(
                                        `${it.co_barrio}`,
                                        `${it.co_barrio}`
                                    );
                                    y.appendChild(option_);
                                }

                                //console.log(dep.length);
                                var unique = dep.filter(onlyUnique);
                                //console.log(unique)

                                //select de utc
                                var x = document.getElementById("my-select-dep");
                                unique.forEach((element) => {
                                    var option = new Option(
                                        `${element}`,
                                        `${element}`,
                                        false,
                                        false
                                    );
                                    x.appendChild(option);
                                });
                                map.flyTo([7.12539, -73.1198], 7.5);
                                offLoad_();
                                break;
                            case "ORIENTAL":
                                onLoad_("ORIENTAL");
                                //L.marker([3.38463, -74.04424]).addTo(layerGroup);

                                for (const it of response) {
                                    L.geoJson(maps, {
                                        filter: function(feature, layer) {
                                            return (
                                                feature.properties.name === it.co_barrio
                                            );
                                        },
                                        style: style,
                                        onEachFeature: function(feature, layer) {
                                            layer.myTag = "mapa";
                                            if (feature.geometry.type) {
                                                layer.bindPopup(
                                                    JSON.stringify(
                                                        "<br><img src='https://www.close-upinternational.com/img/logo.svg' alt='colombia'  /> <br>" +
                                                        feature.properties
                                                        .description
                                                    )
                                                );
                                            }
                                        },
                                    }).addTo(map);

                                    dep.push(it.departamento);

                                    //cargar utc dentro de departamentos
                                    var x = document.getElementById("my-select-utc");
                                    var option = new Option(
                                        `${it.co_barrio}`,
                                        `${it.co_barrio}`
                                    );
                                    x.appendChild(option);
                                    var y = document.getElementById("search_");
                                    var option_ = new Option(
                                        `${it.co_barrio}`,
                                        `${it.co_barrio}`
                                    );
                                    y.appendChild(option_);
                                }

                                //console.log(dep.length);
                                var unique = dep.filter(onlyUnique);
                                //console.log(unique)

                                //select de utc
                                var x = document.getElementById("my-select-dep");
                                unique.forEach((element) => {
                                    var option = new Option(
                                        `${element}`,
                                        `${element}`,
                                        false,
                                        false
                                    );
                                    x.appendChild(option);
                                });
                                map.flyTo([3.38463, -74.04424], 5.77);
                                offLoad_();
                                break;
                        }
                    } catch (error) {
                        console.log("cath de regiones");
                        removeMarkers();

                        clearSelect();
                        clearSelectMun();
                        clearSelectLoc();
                        clearSelectBar()
                        clearUTC();
                        map.flyTo([4.60971, -74.08175], 5);
                    }
                }
                init()
                    //end mark

                //console.log(maps);
                //L.geoJson(maps).addTo(map);
                var num = 0;
                response.forEach((element) => {
                    num++;
                });
                num_utc.textContent = ` ` + num;
                //add layer
            },
            statusCode: {
                404: function() {
                    alert("web not found");
                },
            },
            error: function(x, xs, xt) {
                //nos dara el error si es que hay alguno
                //window.open(JSON.stringify(x));
                alert(
                    "error: " +
                    JSON.stringify(x) +
                    "\n error string: " +
                    xs +
                    "\n error throwed: " +
                    xt
                );
            },
        });
        //  });
    });


    //end region utc

    //colores para departamentos
    function color_departamento(num) {
        switch (num) {
            case 0:
                return "#16A085";
                break;
            case 0:
                return "#C0392B";
                break;

            default:
                break;
        }
    }


    //consultar departamentos utc para ver municipios
    const selectElementDep = document.querySelector(".my-select-dep");
    $(selectElementDep).change(function() {
        let coord;
        let ciudad = [];
        let municipio_u = [];
        try {
            removeMarkers();
            clearSelectMun();
        } catch (error) {

        }
        let val = $(this).val();
        let cont = 0;
        try {
            for (const key in val) {
                let color = color_departamento(val[key]);
                cont = 0;
                switch (val[key]) {
                    case val[key]:
                        for (const it of array_init) {
                            cont = cont + 1;
                            //pintar mapa
                            let geoDep = it.departamento === val[key];
                            switch (geoDep) {
                                case true:
                                    ciudad.push(it.municipio);
                                    L.geoJson(maps, {
                                        filter: function(feature, layer) {
                                            return (
                                                feature.properties.name === it.co_barrio
                                            );
                                        },
                                        style: style_dep,
                                        onEachFeature: function(feature, layer) {
                                            layer.myTag = "mapa";
                                            if (feature.geometry.type) {
                                                layer.bindPopup(
                                                    JSON.stringify(
                                                        "<br><img src='https://www.close-upinternational.com/img/logo.svg' alt='colombia'  /> <br>" +
                                                        feature.properties
                                                        .description
                                                    )
                                                );

                                                try {
                                                    coord = feature.geometry.coordinates[0][0]
                                                } catch (error) {
                                                    coord = coord;
                                                }


                                            }
                                        },
                                    }).addTo(map);


                                    //console.log(maps.features[it].geometry.coordinates[1]);
                                    //volar al departamento

                                    /*
                                    //cargar utc dentro de departamentos
                                    */

                                    var x = document.getElementById("my-select-utc");
                                    var option = new Option(
                                        `${it.co_barrio}`,
                                        `${it.co_barrio}`
                                    );
                                    x.appendChild(option);

                                    break;

                                default:
                                    break;
                            }
                        }

                        municipio_u = ciudad.filter(onlyUnique);
                        var y = document.getElementById("my_select-mun");
                        municipio_u.forEach((element) => {
                            var option = new Option(
                                `${element}`,
                                `${element}`,
                                false,
                                false
                            );
                            y.appendChild(option);
                        });

                        //leyenda

                        // Insertando una leyenda en el mapa
                        /*
                console.log(maps.features[cont].geometry.coordinates[0][0],maps.features[cont].geometry.coordinates[0][1]);
                let lat = maps.features[cont].geometry.coordinates[0][0];
                let lng = maps.features[cont].geometry.coordinates[0][1];

                flay(lat, lng)
*/
                        break;

                    default:
                        console.log("default departamentos");
                        break;
                }
            }
        } catch (error) {

        }
        flay(coord[1], coord[0], 'a')
    });

    const selectElementMUN = document.querySelector(".my_select-mun");
    //consultar municipio para ver localidad
    $(selectElementMUN).change(function() {
        let coord;
        $('html,body').css('cursor', 'wait');
        let localidad = [];
        let localidad_u = [];
        try {
            removeMarkers();
            clearSelectLoc();
        } catch (error) {

        }
        let val = $(this).val();
        //console.log(val);
        try {
            for (const key in val) {
                let color = color_departamento(val[key]);
                switch (val[key]) {
                    case val[key]:
                        for (const it of array_init) {
                            //pintar mapa
                            let geoDep = it.municipio === val[key];
                            //console.log(geoDep + " localidad: " + it.municipio + " loc: " + val[key]);
                            switch (geoDep) {
                                case true:
                                    localidad.push(it.localidad);
                                    L.geoJson(maps, {
                                        filter: function(feature, layer) {

                                            return (
                                                feature.properties.name === it.co_barrio
                                            );
                                        },
                                        style: style_dep,
                                        onEachFeature: function(feature, layer) {
                                            layer.myTag = "mapa";
                                            if (feature.geometry.type) {
                                                layer.bindPopup(
                                                    JSON.stringify(
                                                        "<br><img src='https://www.close-upinternational.com/img/logo.svg' alt='colombia'  /> <br>" +
                                                        feature.properties
                                                        .description
                                                    )
                                                );
                                                //console.log(feature.geometry.coordinates);
                                                try {
                                                    coord = feature.geometry.coordinates[0][0]
                                                } catch (error) {
                                                    coord = coord;
                                                }


                                            }
                                        },
                                    }).addTo(map);

                                    //volar al departamento
                                    //map.flyTo([4.60971, -74.08175], 5);





                                    /*
                                    //cargar utc dentro de departamentos
                                    */

                                    var x = document.getElementById("my-select-utc");
                                    var option = new Option(
                                        `${it.co_barrio}`,
                                        `${it.co_barrio}`
                                    );
                                    x.appendChild(option);

                                    break;

                                default:
                                    break;
                            }
                        }

                        localidad_u = localidad.filter(onlyUnique);
                        var y = document.getElementById("my_select-loc");
                        localidad_u.forEach((element) => {
                            var option = new Option(
                                `${element}`,
                                `${element}`,
                                false,
                                false
                            );
                            y.appendChild(option);
                        });

                        //leyenda

                        // Insertando una leyenda en el mapa


                        break;

                    default:
                        break;
                }
            } //fin de for
        } catch (error) {

        }
        console.log("coord: ", coord[0], " ", coord[1]);
        flay(coord[1], coord[0], 'b')
    });

    const selectElementLOC = document.querySelector(".my_select-loc");
    //consultar localidad para ver barrio
    $(selectElementLOC).change(function() {

        let barrio = [];
        let barrio_u = [];
        try {
            removeMarkers();
            clearSelectBar();
        } catch (error) {

        }
        let val = $(this).val();
        //console.log(val);
        try {
            for (const key in val) {
                let color = color_departamento(val[key]);
                switch (val[key]) {
                    case val[key]:
                        for (const it of array_init) {
                            //pintar mapa
                            let geoDep = it.localidad === val[key];
                            //console.log(geoDep + " localidad: " + it.municipio + " loc: " + val[key]);
                            switch (geoDep) {
                                case true:
                                    barrio.push(it.desc_utc);
                                    L.geoJson(maps, {
                                        filter: function(feature, layer) {
                                            return (
                                                feature.properties.name === it.co_barrio
                                            );
                                        },
                                        style: style_dep,
                                        onEachFeature: function(feature, layer) {
                                            layer.myTag = "mapa";
                                            if (feature.geometry.type) {
                                                layer.bindPopup(
                                                    JSON.stringify(
                                                        "<br><img src='https://www.close-upinternational.com/img/logo.svg' alt='colombia'  /> <br>" +
                                                        feature.properties
                                                        .description
                                                    )
                                                );
                                                try {
                                                    coord = feature.geometry.coordinates[0][0]
                                                } catch (error) {
                                                    coord = coord;
                                                }
                                            }
                                        },
                                    }).addTo(map);

                                    //volar al departamento
                                    //map.flyTo([4.60971, -74.08175], 5);

                                    /*
                                    //cargar utc dentro de departamentos
                                    */

                                    var x = document.getElementById("my-select-utc");
                                    var option = new Option(
                                        `${it.co_barrio}`,
                                        `${it.co_barrio}`
                                    );
                                    x.appendChild(option);

                                    break;

                                default:
                                    break;
                            }
                        }

                        barrio_u = barrio.filter(onlyUnique);
                        var y = document.getElementById("my_select-bar");
                        barrio_u.forEach((element) => {
                            var option = new Option(
                                `${element}`,
                                `${element}`,
                                false,
                                false
                            );
                            y.appendChild(option);
                        });

                        //leyenda

                        // Insertando una leyenda en el mapa


                        break;

                    default:
                        break;
                }
            }
        } catch (error) {

        }
        flay(coord[1], coord[0], 'c')
    });

    const selectElementBAR = document.querySelector(".my_select-bar");
    //consultar barrio para ver utc unica
    $(selectElementBAR).change(function() {

        let utc = [];
        let utc_u = [];
        try {
            removeMarkers();
            clearUTC();
        } catch (error) {

        }
        let val = $(this).val();
        //console.log(val);
        try {
            for (const key in val) {
                let color = color_departamento(val[key]);
                switch (val[key]) {
                    case val[key]:
                        for (const it of array_init) {
                            //pintar mapa
                            let geoDep = it.desc_utc === val[key];
                            //console.log(geoDep + " localidad: " + it.municipio + " loc: " + val[key]);
                            switch (geoDep) {
                                case true:
                                    utc.push(it.desc_utc);
                                    L.geoJson(maps, {
                                        filter: function(feature, layer) {
                                            return (
                                                feature.properties.name === it.co_barrio
                                            );
                                        },
                                        style: style_dep,
                                        onEachFeature: function(feature, layer) {
                                            layer.myTag = "mapa";
                                            if (feature.geometry.type) {
                                                layer.bindPopup(
                                                    JSON.stringify(
                                                        "<br><img src='https://www.close-upinternational.com/img/logo.svg' alt='colombia'  /> <br>" +
                                                        feature.properties
                                                        .description
                                                    )
                                                );
                                                try {
                                                    coord = feature.geometry.coordinates[0][0]
                                                } catch (error) {
                                                    coord = coord;
                                                }
                                            }
                                        },
                                    }).addTo(map);

                                    //volar al departamento
                                    //map.flyTo([4.60971, -74.08175], 5);

                                    /*
                                    //cargar utc dentro de departamentos
                                    */

                                    var x = document.getElementById("my-select-utc");
                                    var option = new Option(
                                        `${it.co_barrio}`,
                                        `${it.co_barrio}`
                                    );
                                    x.appendChild(option);

                                    break;

                                default:
                                    break;
                            }
                        }



                        //leyenda

                        // Insertando una leyenda en el mapa


                        break;

                    default:
                        break;
                }
            }
        } catch (error) {

        }
        flay(coord[1], coord[0], 'd')
    });


    const selectElementUTC = document.querySelector("#my-select-utc");
    //consultar barrio para ver utc unica
    $(selectElementUTC).change(function() {
        let lat = 0,
            lng = 0;
        let utc = [];
        let utc_u = [];
        try {
            removeMarkers();
        } catch (error) {

        }
        let val = $(this).val();
        try {
            for (const key in val) {
                let color = color_departamento(val[key]);
                //console.log(val[key]);
                switch (val[key]) {
                    case val[key]:
                        for (const it of array_init) {
                            //pintar mapa
                            let geoDep = it.co_barrio == val[key];
                            //           console.log(geoDep);
                            switch (geoDep) {
                                case true:
                                    utc.push(it.co_barrio);
                                    L.geoJson(maps, {
                                        filter: function(feature, layer) {
                                            return (
                                                feature.properties.name === it.co_barrio
                                            );
                                        },
                                        style: style_dep,
                                        onEachFeature: function(feature, layer) {
                                            layer.myTag = "mapa";
                                            if (feature.geometry.type) {
                                                layer.bindPopup(
                                                    JSON.stringify(
                                                        "<br><img src='https://www.close-upinternational.com/img/logo.svg' alt='colombia'  /> <br>" +
                                                        feature.properties
                                                        .description
                                                    )
                                                );

                                                try {
                                                    coord = feature.geometry.coordinates[0][0]
                                                } catch (error) {
                                                    coord = coord;
                                                }
                                            }
                                        },
                                    }).addTo(map);

                                    //volar al departamento
                                    //map.flyTo([4.60971, -74.08175], 5);




                                    break;

                                default:
                                    break;
                            }
                        }



                        //leyenda

                        // Insertando una leyenda en el mapa


                        break;

                    default:
                        break;
                }
            }
        } catch (error) {

        }
        flay(coord[1], coord[0], 'e')

    });


    const selectElementUTC_search = document.getElementsByClassName("mi-selector");
    //consultar barrio para ver utc unica
    $(selectElementUTC_search).change(function() {
        //console.log("cambio");

        let utc = [];
        removeMarkers();
        let val = $(this).val();
        console.log(val);
        for (const key in val) {
            let color = color_departamento(val[key]);
            //console.log(val[key]);
            switch (val[key]) {
                case val[key]:
                    for (const it of array_init) {
                        //pintar mapa
                        //console.log(val[key]);
                        let geoDep = it.co_barrio == val;
                        //console.log(geoDep);
                        switch (geoDep) {
                            case true:
                                utc.push(it.co_barrio);
                                L.geoJson(maps, {
                                    filter: function(feature, layer) {
                                        return (
                                            feature.properties.name === it.co_barrio
                                        );
                                    },
                                    style: style,
                                    onEachFeature: function(feature, layer) {
                                        layer.myTag = "mapa";
                                        if (feature.geometry.type) {
                                            layer.bindPopup(
                                                JSON.stringify(
                                                    "<br><img src='https://www.close-upinternational.com/img/logo.svg' alt='colombia'  /> <br>" +
                                                    feature.properties
                                                    .description
                                                )
                                            );

                                            try {
                                                coord = feature.geometry.coordinates[0][0]
                                            } catch (error) {
                                                coord = coord;
                                            }
                                        }
                                    },
                                }).addTo(map);

                                //volar al departamento
                                //map.flyTo([4.60971, -74.08175], 5);




                                break;

                            default:
                                break;
                        }
                    }



                    //leyenda

                    // Insertando una leyenda en el mapa


                    break;

                default:
                    break;
            }
        }
        console.log(coord[1], coord[0]);
        flay(coord[1], coord[0], 'e')

    });
} catch (error) {}
