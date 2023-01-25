function home(dir, mydir) {
    farmacia = mydir;

    //cargar json para uso interno
    $.getJSON(
        "https://raw.githubusercontent.com/cristoferJaimez/cristoferjaimez.github.io/main/maps_ok.min.json",
        function(data) {
            //console.log(data.features[550].properties.name);
            for (let i = 0; i < 4747; i++) {
                if (Number(data.features[i].properties.name) === dir) {
                    //console.log( data.features[i]. geometry.coordinates[0][0][0]);
                    //dibujar mapa zoom
                    var lat = data.features[i].geometry.coordinates[0][0][1];
                    var lng = data.features[i].geometry.coordinates[0][0][0];
                    var map = new google.maps.Map(
                        document.getElementById("map"), {
                            zoom: 14,
                            center: { lat, lng },
                            mapTypeControl: false,
                        }
                    );

                    //marca
                    marker = new google.maps.Marker({
                        map: map,
                        //draggable: true,
                        animation: google.maps.Animation.DROP,
                        position: { lat, lng },
                        title: data.features[i].properties.name
                    });

                    //dibujar poligono contenedor
                    var col = new google.maps.Data({ map: map });

                    var json = {
                        type: "FeatureCollection",
                        features: [data.features[i]]
                    }


                    col.loadGeoJson('https://raw.githubusercontent.com/cristoferJaimez/cristoferjaimez.github.io/main/maps_ok.min.json');

                    col.setStyle({
                        fillColor: "green",
                        strokeColor: "green",
                        strokeWeight: 0.5,
                        zIndex: 1,
                    });

                    col.addListener("click", function(event) {
                        var res = arr_back_utc.some((e) => e === event.feature.h.name);
                        if (res == false) {
                            arr_back_utc.push(event.feature.h.name);

                            arr_utc.push(event.feature.h);
                            //limpiar listado
                            list_utc.innerHTML = "";
                            arr_utc.forEach((e) => {
                                list_utc.innerHTML += '<i class="btn btn-sm btn-outline-secondary m-1" style="font-size: 0.7em;">' + e.name + "</i>";
                            });
                            col.overrideStyle(event.feature, {
                                fillColor: "orange",
                                strokeColor: "red",
                                strokeWeight: 1,
                                zIndex: -1,
                            });
                            //map.data.overlayLayer.appendChild(this.div)
                            infoWindow.setPosition(event.latLng);
                            infoWindow.setContent(
                                '<div class="text-center p-2" style="z-index: 99999">' +
                                '<img src="https://www.close-upinternational.com/img/logo.svg" class="img-fluid img-thumbnail" alt="logo">' +
                                "<center>" +
                                event.feature.h.description +
                                "</div>"
                            );

                            document.getElementById('arr_utc').value = arr_back_utc


                            infoWindow.open(map);
                        } else if (res === true) {
                            //cambiar de color
                            col.overrideStyle(event.feature, {
                                fillColor: "green",
                                strokeColor: "green",
                                strokeWeight: 1,
                                zIndex: -1,
                            });

                            let index = arr_back_utc.findIndex(
                                (e) => e === event.feature.h.name
                            );
                            //console.log("indice  " + index);
                            arr_back_utc.splice(index, 1);

                            document.getElementById('arr_utc').value = arr_back_utc
                                //console.log(arr_utc);
                            let index_ = arr_utc.findIndex(
                                (e) => e.name === event.feature.h.name
                            );
                            arr_utc.splice(index_, 1);

                            list_utc.innerHTML = "";
                            arr_utc.forEach((e) => {
                                list_utc.innerHTML += '<i class="btn btn-sm btn-outline-secondary m-1" style="font-size: 0.7em;">' + e.name + "</i>";
                            });
                        }
                    });
                    map_ = true;

                    //dibujar poligonos linderos
                }
            }
        }
    );
}
