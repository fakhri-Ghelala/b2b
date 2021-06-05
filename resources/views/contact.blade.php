@extends('layout')
@section('content')

    <div class="container-fluid bg-light py-5">
        <div class="col-md-6 m-auto text-center">
            <h1 class="h1">Contact Us</h1>
            <p>
                You have a feed back, or a question? Don't hesitate to contact us and tell us about it.
            </p>
        </div>
    </div>

{{--    <!-- Start Map -->--}}
{{--    <div id="mapid" style="width: 100%; height: 300px;"></div>--}}
{{--    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js" integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA==" crossorigin=""></script>--}}
{{--    <script>--}}
{{--        var mymap = L.map('mapid').setView([-23.013104, -43.394365, 13], 13);--}}

{{--        L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {--}}
{{--            maxZoom: 18,--}}
{{--            attribution: 'Zay Telmplte | Template Design by <a href="https://templatemo.com/">Templatemo</a> | Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, ' +--}}
{{--                '<a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, ' +--}}
{{--                'Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',--}}
{{--            id: 'mapbox/streets-v11',--}}
{{--            tileSize: 512,--}}
{{--            zoomOffset: -1--}}
{{--        }).addTo(mymap);--}}

{{--        L.marker([-23.013104, -43.394365, 13]).addTo(mymap)--}}
{{--            .bindPopup("<b>Zay</b> eCommerce Template<br />Location.").openPopup();--}}

{{--        mymap.scrollWheelZoom.disable();--}}
{{--        mymap.touchZoom.disable();--}}
{{--    </script>--}}
{{--    <!-- Ena Map -->--}}

    <!-- Start Contact -->
    <div class="container py-5">
        <div class="row py-5">
            <form class="col-md-9 m-auto" method="post" role="form" action="{{route('save_contact')}}">
                @csrf
                <div class="row">

                    <div class="form-group col-md-6 mb-3">
                        <label for="inputemail">Email</label>
                        <input type="email" class="form-control mt-1" id="email" name="email" placeholder="Email">
                    </div>
                    <div class="form-group col-md-6 mb-3">
                        <label for="inputname">Subject</label>
                        <input type="text" class="form-control mt-1" id="subject" name="subject" placeholder="subject">
                    </div>
                </div>

                <div class="mb-3">
                    <label for="inputmessage">Message</label>
                    <textarea class="form-control mt-1" id="content" name="content" placeholder="Message" rows="8"></textarea>
                </div>
                <div class="row">
                    <div class="col text-end mt-2">
                        <button type="submit" class="btn btn-success btn-lg px-3">Let’s Talk</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!-- End Contact -->

@stop
