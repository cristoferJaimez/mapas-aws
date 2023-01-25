//import


//end import
//import


//end import

var searchInput = 'search_input';
var map;
var mark;



let text_ = document.querySelector('.search_input');

$(text_).on('click', () => {
    $(text_).val('');
})

google.maps.event.addDomListener(window, "load", function() {


    map = new google.maps.Map(document.getElementById('map'), {
        center: { lat: 4.570868, lng: -74.297333 },
        zoom: 5,
        mapTypeControl: false,
    });






    var autocomplete;
    autocomplete = new google.maps.places.Autocomplete((document.getElementById(searchInput)), {
        // types: ['geocode', '', 'doctor'],
    });

    var place = autocomplete.getPlace();




    google.maps.event.addListener(autocomplete, 'place_changed', function() {
        var near_place = autocomplete.getPlace();

        //limpia mapa
        //alert(near_place)
        //clear_maps(maps)
        darwing(near_place)
        console.log(near_place.address_components);
        //flay(near_place)
        map.setCenter(near_place.geometry.location)
        var coor = { lat: near_place.geometry.location.lat(), lng: near_place.geometry.location.lng() }
        map.setZoom(15)
        mark = new google.maps.Marker({
            //draggable: true,
            animation: google.maps.Animation.DROP,
            position: coor,
            map,
            title: "" + near_place.formatted_address + "",
        });
        //console.log(mark);
        var popup = new google.maps.InfoWindow();

        mark.addListener('click', function(e) {
            popup.setContent('<table class="table table-striped">' +
                '<tr>' +
                '<th colspan="2"><strong>' + `${near_place.formatted_address}` + '</strong></th>' +
                '</tr>'

                +
                '</table>'
            );
            popup.setPosition(e.latLng);
            popup.open(map);


        });


    });
});



// naegar a punto
function flay(near_place) {}


//clear maps
async function clear_maps(feature) {
    console.log("limpiando");
    await map.data.setStyle({ visible: false });


}

//drawin maps
function darwing(near_place) {
    console.log("dibujando");


    //console.log(near_place.address_components[0].long_name);
    let locations = [

        { location: 'Amazonas', cod: '91' },
        { location: 'Arauca', cod: '81' },
        { location: 'Cundinamarca', cod: '25' },
        { location: 'Boyacá', cod: '15' },
        { location: 'Bolívar', cod: '13' },
        { location: 'Santander', cod: '68' },
        { location: 'Pasto', cod: '52' },
        { location: 'Vichada', cod: '99' },
        { location: 'Vaupés', cod: '97' },
        { location: 'Guainía', cod: '94' },
        { location: 'San Andrés', cod: '88' },
        { location: 'Putumayo', cod: '86' },
        { location: 'Casanare', cod: '85' },

        { location: 'Caldas', cod: '17' },
        { location: 'Caquetá', cod: '18' },
        { location: 'Cauca', cod: '19' },
        { location: 'Cesar', cod: '20' },
        { location: 'Córdoba', cod: '23' },
        { location: 'Chocó', cod: '27' },

        { location: 'Huila', cod: '41' },
        { location: 'La Guajira', cod: '44' },
        { location: 'Magdalena', cod: '44' },
        { location: 'Meta', cod: '50' },
        { location: 'Narino', cod: '52' },
        { location: 'Norte de Santander', cod: '54' },
        { location: 'Quindío', cod: '63' },
        { location: 'Risaralda', cod: '66' },
        { location: 'Sucre', cod: '70' },
        { location: 'Tolima', cod: '73' },
        { location: 'Valle del Cauca', cod: '76' },


        { location: 'Bello', cod: '76' },
        { location: 'Bogotá', cod: '76' },

    ]

    let resultado
    for (let h = 0; h <= near_place.address_components.length; h++) {
        resultado = locations.find(fruta => fruta.location === near_place.address_components[h].long_name);
        if (resultado != undefined) {
            break
        }
    }
    draw(resultado)
}

// dibujar mapa
function draw(data) {
    var geo = [];


    for (let index = 0; index <= 1119; index++) {
        //console.log(maps.features[index].properties.name + "  " + data.location.toUpperCase());
        if (maps.features[index].properties.name != undefined) {
            let re = maps.features[index].properties.name === data.location.toUpperCase().normalize("NFD").replace(/[\u0300-\u036f]/g, "");

            if (re === true) {
                console.log(re);
                //console.log(maps.features[index]);
                geo.unshift(maps.features[index])
            }
        }

    }

    var json = JSON.stringify(geo)
    var data_geo = {
            type: 'FeatureCollection',
            features: geo,
            type: "FeatureCollection"
        }
        //console.log(maps);
    console.log(data_geo);

    map.data.addGeoJson(data_geo)

    //map.data.addGeoJson(json);

    map.data.setStyle({
        icon: 'https://www.close-upinternational.com/img/logo.svg',
        fillColor: 'green',
        strokeColor: 'red',
        clickable: true,
        fillOpacity: 0.2,
        strokeWeight: 1,
        geodesic: true,
    });

    var infoWindow = new google.maps.InfoWindow();


    map.data.addListener('click', function(event) {
        $(event.feature.h.description).addClass('table table-striped ')

        //console.log(event);
        map.data.overrideStyle(event.feature, { fillColor: 'red', strokeColor: 'blue', strokeWeight: 1 });
        console.log(event.feature);
        //console.log(event.latLng);
        infoWindow.setPosition(event.latLng);
        infoWindow.setContent(
            '<div class="text-center p-2" style="z-index: 99999">' +
            '<img src="https://www.close-upinternational.com/img/logo.svg" alt="logo">' + '</br>' +
            event.feature.h.description +
            '</div>'
        );
        infoWindow.open(map);
        //map.setCenter(event.latLng);
    });


}

/*
//import


//end import

var searchInput = 'search_input';
var map;
var mark;
var bogota;
var json_api;
var map_drawing;
var infoWindow = new google.maps.InfoWindow();

var car_api = document.querySelector('.car_api');
let text_ = document.querySelector('.search_input');



$(text_).on('click', () => {
    $(text_).val('');
    clear_maps("v");
    mark.setMap(null)
    if (infoWindow) infoWindow.close();

})

google.maps.event.addDomListener(window, "load", function() {


    map = new google.maps.Map(document.getElementById('map'), {
        center: { lat: 4.570868, lng: -74.297333 },
        zoom: 5,
        mapTypeControl: false,
    });






    var autocomplete;
    autocomplete = new google.maps.places.Autocomplete((document.getElementById(searchInput)), {
        // types: ['geocode', '', 'doctor'],
    });

    var place = autocomplete.getPlace();



    google.maps.event.addListener(autocomplete, 'place_changed', function() {
        var near_place = autocomplete.getPlace();




        darwing(near_place)
        console.log(near_place.address_components);
        //flay(near_place)
        map.setCenter(near_place.geometry.location)
        var coor = { lat: near_place.geometry.location.lat(), lng: near_place.geometry.location.lng() }
        map.setZoom(15)
        mark = new google.maps.Marker({
            //draggable: true,
            animation: google.maps.Animation.DROP,
            position: coor,
            map,
            title: "" + near_place.formatted_address + "",
        });
        //console.log(mark);
        var popup = new google.maps.InfoWindow();

        mark.addListener('click', function(e) {
            popup.setContent('<table class="table table-striped">' +
                '<tr>' +
                '<th colspan="2"><strong>' + `${near_place.formatted_address}` + '</strong></th>' +
                '</tr>'

                +
                '</table>'
            );
            popup.setPosition(e.latLng);
            popup.open(map);


        });


    });
});



// naegar a punto
function flay(near_place) {}


//clear maps
function clear_maps(feature) {
    //console.log(feature);
    map.data.forEach(function(feature) {
        map.data.remove(feature);
    });



    //clear mark
}

//drawin maps
function darwing(near_place) {
    //console.log(near_place);
    clear_maps(near_place)
    let locations = [
        { location: 'Atlántico', cod: '08', api: 'barranquilla.json' },
        { location: 'Antioquia', cod: '05', api: 'medellin.json' },

        { location: 'Bogotá', cod: '11', api: 'bogota.json' },
        { location: 'Cartagena de Indias', cod: '13', api: 'cartagena.json' },
        { location: 'Cartagena', cod: '13', api: 'cartagena.json' },
        { location: 'Barranquilla', cod: '08', api: 'barranquilla.json' },
        { location: 'Bello', cod: '05', api: 'bello.json' },
        { location: 'Cali', cod: '76', api: 'cali.json' },
        { location: 'Valle del Cauca', cod: '76', api: 'cali.json' },
        { location: 'Envigado', cod: '05', api: 'envigado.json' },
        { location: 'Itagüi', cod: '05', api: 'itagui.json' },
        { location: 'Medellín', cod: '05', api: 'medellin.json' },
        { location: 'Bucaramanga', cod: '68', api: 'bucaramanga.json' },
        { location: 'Floridablanca', cod: '68', api: 'floridablanca.json' },
        { location: 'Cúcuta', cod: '54', api: 'cucuta.json' },
        { location: 'Soledad', cod: '08', api: 'soledad.json' },
        { location: 'Armenia', cod: '63', api: 'armenia.json' },
        { location: 'Pereira', cod: '66', api: 'pereira.json' },
        { location: 'Manizales', cod: '17', api: 'manizales.json' },

        { location: 'Amazonas', cod: '91', api: 'amazonas.json' },
        { location: 'Arauca', cod: '81', api: 'arauca.json' },
        { location: 'Cundinamarca', cod: '25', api: 'cundinamarca.json' },
        { location: 'Boyacá', cod: '15', api: 'boyaca.json' },
        { location: 'Bolívar', cod: '13', api: 'bolivar.json' },
        { location: 'Santander', cod: '68', api: 'santander.json' },
        { location: 'Pasto', cod: '52', api: 'pasto.json' },
        { location: 'Vichada', cod: '99', api: 'vichada.json' },
        { location: 'Vaupés', cod: '97', api: 'vaupes.json' },
        { location: 'Guainía', cod: '94', api: 'guainia.json' },
        { location: 'San Andrés', cod: '88', api: 'san_andres.json' },
        { location: 'Putumayo', cod: '86', api: 'putumayo.json' },
        { location: 'Casanare', cod: '85', api: 'casanare.json' },

        { location: 'Caldas', cod: '17', api: 'caldas.json' },
        { location: 'Caquetá', cod: '18', api: 'caqueta.json' },
        { location: 'Cauca', cod: '19', api: 'cauca.json' },
        { location: 'Cesar', cod: '20', api: 'cesar.json' },
        { location: 'Córdoba', cod: '23', api: 'cordoba.json' },
        { location: 'Chocó', cod: '27', api: 'choco.json' },

        { location: 'Huila', cod: '41', api: 'huila.json' },
        { location: 'La Guajira', cod: '44', api: 'la_guajira.json' },
        { location: 'Magdalena', cod: '44', api: 'magdalena.json' },
        { location: 'Meta', cod: '50', api: 'meta.json' },
        { location: 'Narino', cod: '52', api: 'narino.json' },
        { location: 'Nariño', cod: '52', api: 'narino.json' },
        { location: 'Norte de Santander', cod: '54', api: 'norte_santander.json' },
        { location: 'Quindío', cod: '63', api: 'quindio.json' },
        { location: 'Risaralda', cod: '66', api: 'risaralda.json' },
        { location: 'Sucre', cod: '70', api: 'sucre.json' },
        { location: 'Tolima', cod: '73', api: 'tolima.json' },
        { location: 'Valle del Cauca', cod: '76', api: 'valle_cauca.json' },
        { location: 'Alban', cod: '52', api: 'narino.json' },
        { location: 'Arboleda', cod: '52', api: 'narino.json' },
        { location: 'Arenal', cod: '13', api: 'bolivar.json' },
        { location: 'Guaviare', cod: '95', api: 'guaviare.json' },
    ]
    var resultado;
    var BreakException = {};
    try {
        for (let i = 0; i <= near_place.address_components.length; i++) {
            console.log(near_place.address_components[i].long_name);
            locations.forEach(e => {
                if (e.location === near_place.address_components[i].long_name) {
                    resultado = e;
                }

            })
        } //console.log(resultado.api);
    } catch (error) {


    }
    json_api = resultado.api;
    draw(resultado)
}


// dibujar mapa
function draw(data) {



    try {


        fetch(`https://raw.githubusercontent.com/cristoferJaimez/cristoferjaimez.github.io/main/${json_api} `, {
                method: 'GET',

            }).then($(car_api).show())
            .then(response => response.json())
            .then(data => map_drawing = map.data.addGeoJson(data))
            .then(
                $(car_api).hide()
            );

    } catch (error) {
        var data_geo;
        fetch(`https://raw.githubusercontent.com/cristoferJaimez/cristoferjaimez.github.io/main/${json_api} `, {
                method: 'GET',

            }).then($(car_api).show())
            .then(response => response.json())
            .then(data => map_drawing = map.data.addGeoJson(data))
            .then(
                $(car_api).hide()
            );


    }
    map.data.setStyle({
        icon: 'https://www.close-upinternational.com/img/logo.svg',
        fillColor: 'green',
        strokeColor: 'red',
        clickable: true,
        fillOpacity: 0.2,
        strokeWeight: 1,
        geodesic: true,
    });




    map.data.addListener('click', function(event) {
        //$(event.feature.j.description).addClass('table table-striped ')
        console.log(event.feature);
        map.data.overrideStyle(event.feature, { fillColor: 'red', strokeColor: 'blue', strokeWeight: 1 });

        infoWindow.setPosition(event.latLng);
        infoWindow.setContent(
            '<div class="text-center p-2" style="z-index: 99999">' +
            '<img src="https://www.close-upinternational.com/img/logo.svg" alt="logo">' + '</br>' +
            event.feature.h.description +
            '</div>'
        );
        infoWindow.open(map);
    });

}

const init = () => {
    if (!"geolocation" in navigator) {
        return alert("Tu navegador no soporta el acceso a la ubicación. Intenta con otro");
    }


    const onActualizacionDeUbicacion = ubicacion => {
        const coordenadas = ubicacion.coords;
        let { latitude, longitude } = coordenadas;
        //console.log(latitude, longitude);


        const destination = new google.maps.LatLng(latitude, longitude);
        var geocoder = new google.maps.Geocoder();
        geocoder.geocode({ 'location': destination }, function(results, status) {

            if (status == 'OK') {
                console.log(results);

            } else {
                //alert('Geocode was not successful for the following reason: ' + status);
            }
        });



        autocomplete = new google.maps.places.Autocomplete((document.getElementById('lat_lng')), {
            //types: ['cities'],
        });
        //var place = autocomplete.getPlace();

        //console.log(place);
        google.maps.event.addListener(autocomplete, 'place_changed', function() {
            var near_place = autocomplete.getPlace();
            console.log(near_place);
        });

    }

    const onErrorDeUbicacion = err => {
        console.log("Error obteniendo ubicación: ", err);
    }


    const opcionesDeSolicitud = {
        enableHighAccuracy: true, // Alta precisión
        maximumAge: 0, // No queremos caché
        timeout: 30000 // Esperar solo 30 segundos
    };

    idWatcher = navigator.geolocation.watchPosition(onActualizacionDeUbicacion, onErrorDeUbicacion, opcionesDeSolicitud);
}

*/