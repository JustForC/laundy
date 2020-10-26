<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>ADMIN DUDE</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
        <style>
            .header{
                background-color:black;
            }
            .font-header{
                color:#FFFFFF;
            }
            .footer{
                background-color:black;
            }
            .font-footer{
                color:#FFFFFF;
            }
            .card{
                border-style:solid;
                border-color:#9E9C9C;
                border-radius:15px;
                border-width:2px;
            }
            .font-card{
                color:black;
            }
            .card-header{
                border-bottom-style:solid;
                border-width:2px;
                border-color:black;
                background-color:#F7F7F7;
            }
            .content{
                border-bottom-style:solid;
                border-color:black;
            }
        </style>
    </head>
    <body>
        <div class="container-fluid">
            <div class="row header">
                <h1 class="font-header">Deekey</h1>
            </div>
        </div>
        <br>
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-3">
                    <div class="card">
                        <div class="card-header">
                                <h3 class='font-card'>Admin</h3>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col" >
                                    <h4 class='font'></h4>
                                </div>
                                <div class="col" id='kanan'>
                                    <h4 class='font'></h4>
                                </div>
                            </div>
                        </div>
                    </div>
                    </div>
                <div class="col-md-9">
                        <div class="card">
                            <div id='kiri' class="card-body">
                    <div class="row content">
                        <h2 class="font-card">Data Pelanggan</h2>
                    </div>
                    <br></br>
                    <div class="row">
                    
                                <table class="table table-striped table-primary table-responsive">
                                    <tr>
                                        <th>No</th>
                                        <th>Address</th>
                                        <th>Done</th>
                                        <th>Email</th>
                                        <th>Name</th>
                                        <th>Notes</th>
                                        <th>Phone</th>
                                        <th>Quantity</th>
                                        <th>Treatment</th>
                                    </tr>
                                    <tbody id='body'>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="row footer">
                <h2 class="font-footer">Contact Info</h2>
            </div>
        </div>
    </body>
    <script src="https://www.gstatic.com/firebasejs/4.9.1/firebase.js"></script>
    <script>
        // Your web app's Firebase configuration
        var config = {
            apiKey: "AIzaSyCIiElD0gPgTUssg22NIEQoFSyQfhXspYc",
            authDomain: "deekey-api.firebaseapp.com",
            databaseURL: "https://deekey-api.firebaseio.com",
            projectId: "deekey-api",
            storageBucket: "deekey-api.appspot.com",
            messagingSenderId: "651943227260",
            appId: "1:651943227260:web:2819990287d9a6e77a3ef9",
            measurementId: "G-KSFW98LWFY"
        };
        // Initialize Firebase
        firebase.initializeApp(config);
        var database = firebase.database();
        var customer = customer;
        // Get Data
        database.ref('customer/').on('value', function(snapshot) {
        var value = snapshot.val();
        var htmls = [];
        var nextUrl;
        var no = 0;
        for(var key in value){
            no = no +1
            htmls.push('<tr>\
            <td>'+ no +'</td>\
            <td>'+ value[key].address +'</td>\
            <td><a data-toggle="modal" data-target="#update-modal" class="btn btn-outline-success changeValue" data-id="'+key+'">'+ value[key].done +'</td>\
            <td>'+ value[key].email +'</td>\
            <td>'+ value[key].name +'</td>\
            <td>'+ value[key].notes +'</td>\
            <td>'+ value[key].phone +'</td>\
            <td>'+ value[key].qty +'</td>\
            <td>'+ value[key].treatment +'</td>\
            </tr>');
            nextUrl = value[key].url;  
        };
        $('#body').html(htmls);
        });

        // Update Data
        var updateID;
        $(document.body).on('click', '.changeValue', function() {
            updateID = $(this).attr('data-id');
            database.ref('/customer/' + updateID).on('value',function(snapshot){
                var values = snapshot.val();  
                postData = {
                    done : 'false',
                };
                var updates = {};
                updates['/customer/' + updateID] = postData;
                firebase.database().ref().update(updates);
                window.location.reload();
            });
        });
        $(document.body).on('click', '.changeValue', function() {
            updateID = $(this).attr('data-id');
            database.ref('/customer/' + updateID).on('value',function(snapshot){
                var values = snapshot.val();  
                postData = {
                    done : 'true',
                };
                var updates = {};
                updates['/customer/' + updateID] = postData;
                firebase.database().ref().update(updates);
                window.location.reload();
            });
        });

    </script>
</html>
