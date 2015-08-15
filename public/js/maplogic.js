var map;

DG.then(function () {
    
    //Init the map.
    map = DG.map('map', {
        center: [54.97, 73.40],
        zoom: 14,
        fullscreenControl: false,
        zoomControl: false,
        doubleClickZoom: false
    });

    //Add geolocation of user.
    DG.control.location({
        position: 'bottomright'
    }).addTo(map);

    //Add ruler.
    DG.control.ruler({
        position: 'bottomright'
    }).addTo(map);

    //Get all coordinates and names of locations and render them on the map.
    $.getJSON("http://lara.dev/locations", function (data) {
        $.each(data, function (key, val) {
            var geo = val.coordinates;
            var name = val.name;
            geo = geo.replace(/[\[\]]/g, '').split(',');
            DG.marker(geo).addTo(map).bindPopup(name);
        });
    });

    //Build a form.
    var html =
        "<form method='POST' action='http://api.lara.dev/locations/post' accept-charset='UTF-8'>" +
        "<input name='_token' type='hidden' value='54e7Qs3SjoD0H03fCPDOCGcxa0WpILUqBjoyFOmj'>" +
        " <input type='hidden' name='coordinates' id='coordinates'>" +
        "<input class='form-name' placeholder='введите название' name='name' type='text'>" +
        "<label for='title'>Тип заведения</label>" +
        "<select name='type'><option value='cafe' selected='selected'>Кафе</option><option value='eatery'>Столовая</option><option value='restaurant'>Ресторан</option><option value='coffee'>Кофейня</option><option value='other'>Другое</option></select>" +
        "<input class='form-time' placeholder='время работы' name='time' type='text'>" +
        "<label for='title'>Представлена еда</label>" +
        "<input name='specification' type='checkbox' value='vegetarian'>" +
        "<label for='title'>Вегетарианская</label>" +
        "<input name='specification' type='checkbox' value='vegan'>" +
        "<label for='title'>Веганская</label>" +
        "<input name='rating' type='radio' value='1'>" +
        "<input name='rating' type='radio' value='2'>" +
        "<input name='rating' type='radio' value='3'>" +
        "<input name='rating' type='radio' value='4'>" +
        "<input name='rating' type='radio' value='5'>" +
        "<textarea class='form-description' placeholder='что в меню?' name='description' cols='30' rows='10'></textarea>" +
        "<input type='submit' value='Сохранить'>";

    //And render its on map by dblclick.
    map.on('dblclick', function (e) {
        DG.popup()
            .setLatLng([e.latlng.lat, e.latlng.lng])
            .setContent(html)
            .addTo(map);
        $('#coordinates').val(e.latlng.lat + ', ' + e.latlng.lng);
    });
});
