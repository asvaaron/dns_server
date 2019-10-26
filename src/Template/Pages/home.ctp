<?php
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link          https://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       https://opensource.org/licenses/mit-license.php MIT License
 */
use Cake\Cache\Cache;
use Cake\Core\Configure;
use Cake\Core\Plugin;
use Cake\Datasource\ConnectionManager;
use Cake\Error\Debugger;
use Cake\Http\Exception\NotFoundException;

$this->layout = false;

if (!Configure::read('debug')) :
    throw new NotFoundException(
        'Please replace src/Template/Pages/home.ctp with your own version or re-enable debug mode.'
    );
endif;

$cakeDescription = 'CakePHP: the rapid development PHP framework';
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="/docs/4.0/assets/img/favicons/favicon.ico">

    <title>Checkout example for Bootstrap</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.0/examples/checkout/">

    <!-- Bootstrap core CSS -->
    <link href="../../dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="form-validation.css" rel="stylesheet">
</head>

<body class="bg-light">

<div class="container">
    <div class="py-5 text-center">
        <img class="d-block mx-auto mb-4" src="https://getbootstrap.com/docs/4.0/assets/brand/bootstrap-solid.svg" alt="" width="72" height="72">
        <h2>Checkout form</h2>
        <p class="lead">Below is an example form built entirely with Bootstrap's form controls. Each required form group has a validation state that can be triggered by attempting to submit the form without completing it.</p>
    </div>

    <div class="row">
        <div class="col-md-4 order-md-2 mb-4">
            <h4 class="d-flex justify-content-between align-items-center mb-3">
                <span class="text-muted">Your cart</span>
                <span class="badge badge-secondary badge-pill">3</span>
            </h4>
            <ul class="list-group mb-3">
                <li class="list-group-item d-flex justify-content-between lh-condensed">
                    <div>
                        <h6 class="my-0">
                            <a href="https://github.com">Github</a>
                        </h6>
                        <small class="text-muted">140.82.114.3</small>
                    </div>
                </li>
                <li class="list-group-item d-flex justify-content-between lh-condensed">
                    <div>
                        <h6 class="my-0">
                            <a href="https://google.com">Google</a>
                        </h6>
                        <small class="text-muted">172.217.1.100</small>
                    </div>
                </li>
            </ul>

        </div>
        <div class="col-md-8 order-md-1">
            <h3 class="mb-3">DNS Insertions</h3>
            <div class="needs-validation" novalidate>
                <div id="dns-container">
                    <div class="row pair-values-dns-container">
                        <div class="col-md-6 mb-3">
                            <label for="firstName">Domain Name</label>
                            <input type="text" class="form-control" id="firstName" placeholder="" value="" required>
                            <div class="invalid-feedback">
                                Valid domain name is required.
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="lastName">Ip Address</label>
                            <input type="text" class="form-control" id="lastName" placeholder="" value="" required>
                            <div class="invalid-feedback">
                                Valid ip address name is required.
                            </div>
                        </div>
                    </div>

                </div>

                <hr class="mb-4">
                <div class="row">
                    <div class="col-md-10 mb-3">
                        <button class="btn btn-primary btn-lg btn-block" type="submit" id="add-dns-values">Continue to checkout</button>
                    </div>
                    <div class="col-md-2 mb-3">
                        <button class="btn btn-secondary btn-lg btn-block btn-add" >Add</button>
                    </div>
                    <div id="dns-request-output">

                    </div>
                </div>
            </div>
        </div>
    </div>

    <footer class="my-5 pt-5 text-muted text-center text-small">
        <p class="mb-1">&copy; 2017-2018 Company Name</p>
        <ul class="list-inline">
            <li class="list-inline-item"><a href="#">Privacy</a></li>
            <li class="list-inline-item"><a href="#">Terms</a></li>
            <li class="list-inline-item"><a href="#">Support</a></li>
        </ul>
    </footer>
</div>

<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
<script>
    // Send request for creating multiple dns values
    $('#add-dns-values').click(function() {
        let i = $("#dns-container :input");
        // Stop form from submitting normally
        var data = {
            dns_list:[]
        };
        event.preventDefault();

        i.each(function (index) {
            if (index % 2 ===0){
                var dns_data= {
                    domain: i.eq(index).val(),
                    ip_address: i.eq(index+1).val()
                };
                data['dns_list'].push(dns_data)
            }


        });
        console.log(data);
        $.ajax({
            url: 'http://localhost:8765/api/v1/dns-test',
            dataType: 'json',
            type: 'post',
            contentType: 'application/json',
            data: JSON.stringify(data),
            processData: false,
            success: function( data, textStatus, jQxhr ){
                // $('#response pre').html( JSON.stringify( data ) );
                var passed = [];
                var failed = [];
                data['dns_list'].forEach(function (item, index) {
                if(item['addded'] ===1){
                    passed.push(item)
                }
                else{
                    failed.push(item)
                }
                console.log(failed.join(', '));
                console.log(passed.join(', '));
                $('#dns-request-output').append(
                    '<div class="alert alert-success alert-dismissible fade show" role="alert">\n' +
                    '<strong>Succesfull request!</strong> \n' +
                    '<p> Failed:' +failed.join(', ') + '</p>'+
                    '<p> Passed:' +passed.join(', ') + '</p>'+
                    '<button type="button" class="close" data-dismiss="alert" aria-label="Close">\n' +
                    '<span aria-hidden="true">&times;</span>\n' +
                    '</button>\n' +
                    '</div>')
                });


            },
            error: function( jqXhr, textStatus, errorThrown ){
                console.log('no functiona');
                console.log( errorThrown );
            }
        });
    });
    // Add one new row of inputs in the
    $('.btn-add').click(function() {
        $('#dns-container').append('<div class="row pair-values-dns-container">\n' +
            '                        <div class="col-md-6 mb-3">\n' +
            '                            <label for="firstName">Domain Name</label>\n' +
            '                            <input type="text" class="form-control" id="firstName" placeholder="" value="" required>\n' +
            '                            <div class="invalid-feedback">\n' +
            '                                Valid domain name is required.\n' +
            '                            </div>\n' +
            '                        </div>\n' +
            '                        <div class="col-md-6 mb-3">\n' +
            '                            <label for="lastName">Ip Address</label>\n' +
            '                            <input type="text" class="form-control" id="lastName" placeholder="" value="" required>\n' +
            '                            <div class="invalid-feedback">\n' +
            '                                Valid ip address name is required.\n' +
            '                            </div>\n' +
            '                        </div>\n' +
            '                    </div>');
    });
</script>
</body>
</html>
