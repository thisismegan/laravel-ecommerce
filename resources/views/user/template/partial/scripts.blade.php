<script type="text/javascript">
    function initMap() {
        var latitude = 36.114647;
        var longitude = -115.172813;
        var map = new google.maps.Map(document.getElementById('map'), {
            zoom: 15,
            center: {
                lat: latitude,
                lng: longitude
            },
            mapTypeId: 'roadmap'
        });
        var marker = new google.maps.Marker({
            position: {
                lat: latitude,
                lng: longitude
            },
            map: map,
            label: "Mina"
        });

    }
</script>
<script src="https://developers.google.com/maps/documentation/javascript/examples/markerclusterer/markerclusterer.js">
</script>
<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCsyzuXq0HwAYN_JuFOKfWey_2_DbXuU0Y&callback=initMap">
</script>
<script>
    window.__webpack_public_path__ = "https://cdn11.bigcommerce.com/s-v508lml64r/stencil/c8fef4a0-faa6-0135-f553-525400dfdca6/e/e815ddf0-9d9a-0138-d7ff-0242ac11000e/dist/";
</script>
<script src="https://cdn11.bigcommerce.com/s-v508lml64r/stencil/c8fef4a0-faa6-0135-f553-525400dfdca6/e/e815ddf0-9d9a-0138-d7ff-0242ac11000e/dist/theme-bundle.main.js"></script>

<script src="{{ asset('homepage/assets/js/app.js') }}"></script>

<script type="text/javascript" src="https://cdn11.bigcommerce.com/shared/js/csrf-protection-header-14d7a517a359072d0dc53537c6a3e7070e54b6c0.js"></script>

<!-- snippet location footer -->
</body>

</html>