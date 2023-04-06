<!doctype html>
<html class="no-js" lang="zxx">
    
<!-- login-register31:27-->
<head>
        @include('home.head')
    </head>
    <body>
    <!--[if lt IE 8]>
		<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
	<![endif]-->
        <!-- Begin Body Wrapper -->
        <div class="body-wrapper">
            <!-- Begin Header Area -->
            @include('home.header')
    
            <!-- Begin Login Content Area -->
            <div class="page-section mb-60">
                <div class="container">
                    <div class="row">
                    <div class="col-sm-12 col-md-12 col-lg-6 col-xs-12">
                            <form action="{{route('register.post')}}" method="POST">
                                @csrf
                                <div class="login-form">
                                    <h4 class="login-title">Register</h4>
                                    <div class="row">
                                        <div class="col-md-6 col-12 mb-20">
                                            <label>Name</label>
                                            <input class="mb-0" type="text" name="name" placeholder="Name">
                                        </div>
                                        <div class="col-md-6 col-12 mb-20">
                                            <label>Phone</label>
                                            <input class="mb-0" type="number" name="phone" placeholder="Phone">
                                        </div>
                                        <div class="col-md-12 mb-20">
                                            <label>Email Address*</label>
                                            <input class="mb-0" type="text" name="email" placeholder="Email Address">
                                        </div>
                                        <div class="col-md-6 mb-20">
                                            <label>Password</label>
                                            <input class="mb-0" type="password" name="password" placeholder="Password">
                                        </div>
                    
                                        <div class="col-12">
                                            <button class="register-button mt-0">Register</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Login Content Area End Here -->
            @include('home.footer')
        <!-- jQuery-V1.12.4 -->
        @include('home.script')
    </body>

<!-- login-register31:27-->
</html>