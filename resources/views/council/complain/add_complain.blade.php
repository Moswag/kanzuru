<!DOCTYPE html>
<html lang="en">
<head>
    <title>Contact V11</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--===============================================================================================-->
    <link rel="icon" type="image/png" href="{{URL::to('complainform/images/icons/favicon.ico')}}"/>
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{URL::to('complainform/vendor/bootstrap/css/bootstrap.min.css')}}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{URL::to('complainform/fonts/font-awesome-4.7.0/css/font-awesome.min.css')}}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{URL::to('complainform/fonts/Linearicons-Free-v1.0.0/icon-font.min.css')}}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{URL::to('complainform/vendor/animate/animate.css')}}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{URL::to('complainform/vendor/css-hamburgers/hamburgers.min.css')}}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{URL::to('complainform/vendor/select2/select2.min.css')}}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{URL::to('complainform/css/util.css')}}">
    <link rel="stylesheet" type="text/css" href="{{URL::to('complainform/css/main.css')}}">
    <!--===============================================================================================-->
</head>
<body>


<div class="container-contact100" style="background-image: url('{{URL::to('complainform/images/bg-01.jpg')}}');">
    <div class="wrap-contact100">
        @if(Session::has('message'))
            <div class="alert-success">{{Session::get('message')}}</div>
        @elseif(Session::has('error'))
            <div class="alert-danger">{{Session::get('error')}}</div>
        @endif
        <form class="contact100-form validate-form" method="post" action="{{route('save_complain')}}">
            {{csrf_field()}}
				<span class="contact100-form-title">
					Get in Touch
				</span>


            <div class="wrap-input100 rs1-wrap-input100 validate-input" data-validate="Name is required">
                <span class="label-input100">Tell us your name *</span>
                <input class="input100" type="text" name="name" placeholder="Enter your name">
            </div>

            <div class="wrap-input100 rs1-wrap-input100 validate-input" data-validate = "Valid Phonenumber is required: 263771000000">
                <span class="label-input100">Enter phonenumber *</span>
                <input class="input100" type="number" name="phonenumber" placeholder="Enter your Phonenumber">
            </div>

            <div class="wrap-input100">
                <span class="label-input100">Pick Location</span>
                <select class="input100" name="location">
                    @foreach($locations as $location)
                    <option value="{{$location->name}}">{{$location->name}}</option>
                        @endforeach
                </select>
            </div>

            <div class="wrap-input100 validate-input" data-validate = "Complain is required">
                <span class="label-input100">Complain</span>
                <textarea class="input100" name="complain" placeholder="Your complain here..."></textarea>
            </div>

            <div class="container-contact100-form-btn">
                <div class="wrap-contact100-form-btn">
                    <div class="contact100-form-bgbtn"></div>
                    <button class="contact100-form-btn">
                        Submit
                    </button>
                </div>
            </div>
        </form>
    </div>

    <span class="contact100-more">
				Developed by Rumbidzai
		</span>
</div>



<div id="dropDownSelect1"></div>

<!--===============================================================================================-->
<script src="{{URL::to('complainform/vendor/jquery/jquery-3.2.1.min.js')}}"></script>
<!--===============================================================================================-->
<script src="{{URL::to('complainform/vendor/bootstrap/js/popper.js')}}"></script>
<script src="{{URL::to('complainform/vendor/bootstrap/js/bootstrap.min.js')}}"></script>
<!--===============================================================================================-->
<script src="{{URL::to('complainform/vendor/select2/select2.min.js')}}"></script>
<!--===============================================================================================-->
<script src="{{URL::to('complainform/js/main.js')}}"></script>

<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-23581568-13"></script>
<script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', 'UA-23581568-13');
</script>

</body>
</html>
