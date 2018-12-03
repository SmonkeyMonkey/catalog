@extends('layout')
@section('content')
<section class="contact-map">
    <div class="container-fluid">
        <div class="row contact-grids">
            <div class="col-lg-8 col-md-6 pr-0">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d100939.98555687309!2d-122.50815494344963!3d37.75781499229416!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x80859a6d00690021%3A0x4a501367f076adff!2sSan+Francisco%2C+CA%2C+USA!5e0!3m2!1sen!2sin!4v1486123800256" class="map"></iframe>
            </div>
            <div class="col-lg-4 col-md-6 pl-0">
                <div class="contact-info p-sm-5 p-4">
                    <div class="mb-5">
                        <h4 class="mb-3">Address</h4>
                        <p><span class="fas fa-map-marker mr-2"></span> 123 Street W, Seattle WA 99999 Paris, France.</p>
                        <p><span class="fas fa-phone mr-2"></span> +12 345 567 7890</p>
                        <p><span class="fas fa-fax mr-2"></span> +12 345 567 7890</p>
                        <p><span class="fas fa-envelope mr-2"></span> <a href="mailto:name@example.com"> mail@example.com</a> </p>
                    </div>
                    <div class="">
                        <h4 class="mb-3">Opening Hours</h4>
                        <p><span class="fas fa-clock mr-2"></span> Monday – Friday : 9am - 6pm</p>
                        <p><span class="fas fa-clock mr-2"></span> Saturday and Sunday : 10am - 4pm</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
    @endsection