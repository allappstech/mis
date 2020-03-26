 <!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
      {{ csrf_field() }}
    <!-- <meta name="csrf-token" content="{{ csrf_token() }}"> -->

<title>{{config('app.name','MIS')}}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
	 <link href="{{ asset('css/uaspoly.css') }}" rel="stylesheet">
</head>
<body>
<div class="container-fuild">
    <div class="tops"></div>
     <div class="row header">
        <div class="col-md-2">
             <div class="col-md-1 col-sm-12 logo">
 <img  width="" src="{{url('/images/logo.png')}}">
 </div>
        </div>

          <div class="col-md-6 col-sm-12 uaspoly">
          
               <h2> <center>UMARU ALI SHINKAFI POLYTECHNIC SOKOTO</center></h2>
                  
        </div>
     </div>

 
 
          
        <div class="row">
		<div class="col-md-8 ">
<h4 class="text-secondary">Umaru Ali Shinkafi Polytechnic, Sokoto</h4>
<h6 class="text-defaut">Student Information System</h6>
<ul>
 <li><a href="">My Results </a></li>
 <li><a href="">Exam Card </a></li>
 <li><a href="">Grading </a></li>
 <li><a href="">My Educational status </a></li>
 <li><a href="">Program Deferming </a></li>
</ul>
 </div>
		 <div class="col-md-4">
		 <div class="login">
		 
		  <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Admission No') }}</label>

                            <div class="col-md-8">
                                <input id="email" type="text" class="form-control @error('email') is-invalid @enderror" name="AdmissionNo" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-8">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
					</div>
		 </div>
		</div>
  

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
  </div>
</body>
</html>
 
 
