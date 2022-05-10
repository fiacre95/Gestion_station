@extends('layout.app')

@section('content')
 
<div class="d-flex flex-column flex-root">
			<!--begin::Login-->
			<div class="login login-2 login-signin-on d-flex flex-column flex-lg-row flex-column-fluid bg-white" id="kt_login">
				<!--begin::Aside-->
				<div class="login-aside order-2 order-lg-1 d-flex flex-column-fluid flex-lg-row-auto bgi-size-cover bgi-no-repeat p-7 p-lg-10">
					<!--begin: Aside Container-->
					<div class="d-flex flex-row-fluid flex-column justify-content-between">
						<!--begin::Aside body-->
						<div class="d-flex flex-column-fluid flex-column flex-center mt-5 mt-lg-0">
							<a href="#" class="mb-15 text-center">
								<img src="{% static 'dist/assets/media/logos/logo-letter-1.png' %}" class="max-h-75px" alt="" />
							</a>
							
							<!--begin::Signup-->
							<div class="login-form login-signup">
								<div class="text-center mb-10 mb-lg-20">
									<h3 class="">Sign Up</h3>
									<p class="text-muted font-weight-bold">Enter your details to create your account</p>
								</div>
								<!--begin::Form-->
								
                                
                                @method('put')
								<!-- @if ($errors->any())
                                <div class="alert alert-danger" role="alert">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
								@endif -->
								<form class="form" novalidate="novalidate"  action="{{ route('station.update', $achat ) }}" method="POST">
                                    
                                    @csrf

									<div class="form-group py-3 m-0">
                                        <label for="exampleSelect2">Example multiple select <span class="text-danger">*</span></label>
                                        <select multiple="" class="form-control" name="cathegory" value="{{ $achat->cathegory }}">
                                        <option >Gasoil </option>
                                        <option >Essence</option>
                                        <option >Super</option>
                                        </select>
									</div>
									<div class="form-group py-3 m-0">
										<input class="form-control h-auto border-0 px-0 placeholder-dark-75" type="text" placeholder="Montant" name="montant" required="required" value="{{ $achat->montant }}" />
									</div>
									<div class="form-group py-3 m-0">
										<input class="form-control h-auto border-0 px-0 placeholder-dark-75" type="text" placeholder="Quantite" name="quantite" required="required" value="{{ $achat->quantite }}" />
									</div>
	
									<div class="form-group py-3 border-top m-0">
										<button type="submit" class="btn btn-primary font-weight-bold px-9 py-4 my-3 mx-2">Valider</button>
										<a href="{{ route('station.index')}}" class="btn btn-danger font-weight-bold px-9 py-4 my-3 mx-2"> Retour </a>
									</div>
								</form>
								<!--end::Form-->
							</div>
							<!--end::Signup-->
							
						</div>
						<!--end::Aside body-->
						<!--begin: Aside footer for desktop-->
						<div class="d-flex flex-column-auto justify-content-between mt-15">
							<div class="text-dark-50 font-weight-bold order-2 order-sm-1 my-2">© 2020 Metronic</div>
							<div class="d-flex order-1 order-sm-2 my-2">
								<a href="#" class="text-muted text-hover-primary">Privacy</a>
								<a href="#" class="text-muted text-hover-primary ml-4">Legal</a>
								<a href="#" class="text-muted text-hover-primary ml-4">Contact</a>
							</div>
						</div>
						<!--end: Aside footer for desktop-->
					</div>
					<!--end: Aside Container-->
				</div>
				<!--begin::Aside-->
				<!--begin::Content-->
				<div class="order-1 order-lg-2 flex-column-auto flex-lg-row-fluid d-flex flex-column p-7" style="background-image: url({% static 'dist/assets/media/bg/clinique.jpeg' %});">
					<!--begin::Content body-->
					<div class="d-flex flex-column-fluid flex-lg-center">
						<div class="d-flex flex-column justify-content-center">
							<h3 class="display-3 font-weight-bold my-7 text-white">Welcome to Metronic!</h3>
							<p class="font-weight-bold font-size-lg text-white opacity-80">The ultimate Bootstrap, Angular 8, React &amp; VueJS admin theme
							<br />framework for next generation web apps.</p>
						</div>
					</div>
					<!--end::Content body-->
				</div>
				<!--end::Content-->
			</div>
			<!--end::Login-->
		</div>

@endsection