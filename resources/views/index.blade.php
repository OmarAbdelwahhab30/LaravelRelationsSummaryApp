<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel Relations</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;600&display=swap" rel="stylesheet">

        <!-- Styles -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
        <style>

            .just-padding {
                padding: 15px;
            }

            .list-group.list-group-root {
                padding: 0;
                overflow: hidden;
            }

            .list-group.list-group-root .list-group {
                margin-bottom: 0;
            }

            .list-group.list-group-root .list-group-item {
                border-radius: 0;
                border-width: 1px 0 0 0;
            }

            .list-group.list-group-root > .list-group-item:first-child {
                border-top-width: 0;
            }

            .list-group.list-group-root > .list-group > .list-group-item {
                padding-left: 30px;
            }

            .list-group.list-group-root > .list-group > .list-group > .list-group-item {
                padding-left: 45px;
            }

            .list-group-item .glyphicon {
                margin-right: 5px;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            <div class="container mt-4">
                <div class="title m-b-md text-center">
                    <h3>Laravel Relations</h3>
                </div>
                <div class="just-padding">
                    <div class="list-group list-group-root well">
                        <a href="#item-1" class="list-group-item" data-toggle="collapse">
                            <i class="glyphicon glyphicon-chevron-right"></i>One - To - One
                        </a>
                        <div class="list-group collapse" id="item-1">
                            <a href="{{route("hasOne")}}" class="list-group-item">Has-One</a>
                            <a href="{{route("ReverseHasOne")}}" class="list-group-item">Has - on - Reverse</a>
                            <a href="{{route("WhereHas")}}" class="list-group-item">WhereHas Example</a>
                            <a href="{{route("WhereDoesnotHave")}}" class="list-group-item">Where DoesnotHave Example</a>
                        </div>

                        <a href="#item-2" class="list-group-item" data-toggle="collapse">
                            <i class="glyphicon glyphicon-chevron-right"></i>One - To - Many
                        </a>
                        <div class="list-group collapse" id="item-2">
                            <a href="{{route("GetDoctorsByHospital")}}" class="list-group-item">Has-Many (Get Doctors By Hospital)</a>
                            <a href="{{route("GetHospitalByDoctor")}}" class="list-group-item">Belongs to One Hospital (Get Hospital By Doctor)</a>
                            <a href="{{route("GetHospitalsWithMaleDoctors")}}" class="list-group-item">Get Hospitals With Male Doctors(WhereHas Ex)</a>
                            <a href="{{route("GetHospitalsWithNoMaleDoctors")}}" class="list-group-item">Get Hospitals With No Male Doctors (WhereDoesntHave Ex)</a>
                            <a href="{{route("hospitals.all")}}" class="list-group-item">View All Hospitals</a>
                        </div>

                        <a href="#item-3" class="list-group-item" data-toggle="collapse">
                            <i class="glyphicon glyphicon-chevron-right"></i>Many - To - Many
                        </a>
                        <div class="list-group collapse" id="item-3">
                            <a href="{{route("getDoctorServices")}}" class="list-group-item">Get Doctor Services</a>
                            <a href="{{route("getServiceDoctors")}}" class="list-group-item">Get Service Doctors</a>
                            <a href="{{route("AllDoctors")}}" class="list-group-item">Display All Doctors</a>
                        </div>

                        <a href="#item-4" class="list-group-item" data-toggle="collapse">
                            <i class="glyphicon glyphicon-chevron-right"></i>Has - One - Through
                        </a>
                        <div class="list-group collapse" id="item-4">
                            <a href="{{route("Patient.Doctor")}}" class="list-group-item">
                                Get The Patient Doctor Through Medical_history Table
                            </a>
                        </div>

                        <a href="#item-5" class="list-group-item" data-toggle="collapse">
                            <i class="glyphicon glyphicon-chevron-right"></i>Has - Many - Through
                        </a>
                        <div class="list-group collapse" id="item-5">
                            <a href="{{route("Country.Doctors")}}" class="list-group-item">
                                Get The Doctors In certain Country Through Hospital Table
                            </a>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <script>
        $(function() {

            $('.list-group-item').on('click', function() {
                $('.glyphicon', this)
                    .toggleClass('glyphicon-chevron-right')
                    .toggleClass('glyphicon-chevron-down');
            });

        });
    </script>
    </body>
</html>
