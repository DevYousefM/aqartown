

 <!-- Counter Section -->    
		<!-- ============================ Agency List Start ================================== -->
		<section class=" contact">
			<div class="container">
		
				
				
				<!-- row Start -->
				<div class="row">
					<div class="col-lg-8 col-md-7">
						<div class="property_block_wrap">
							
							<div class="property_block_wrap_header">
								<h4 class="property_block_title">{{ $langg->lang53 }}</h4>
							</div>
                <form action="{{route('front.contact.submit')}}" name="appointment" id="email-form" method="POST" autocomplete="off" class="contact_form2">
                    {{csrf_field()}}
                      <div class="form-group w-100">
                        <div class="response w-100"></div>
                      </div>
							<div class="block-body">
								<div class="row">
									<div class="col-lg-6 col-md-12">
										<div class="form-group">
											<label>{{$langg->lang47}}</label>
											<input type="text" required name="name" class="form-control simple fname">
										</div>
									</div>
									<div class="col-lg-6 col-md-12">
										<div class="form-group">
											<label>{{$langg->lang49}}</label>
											<input type="email" required name="email" class="form-control simple email">
										</div>
									</div>
								</div>
								
								<div class="form-group">
									<label>{{$langg->lang48}}</label>
									<input type="text" required name="phone" class="form-control simple">
								</div>
								
								<div class="form-group">
									<label>{{$langg->lang50}}</label>
									<textarea name="text" required class="form-control simple"></textarea>
								</div>
								@if($gs->is_capcha == 1)

                                <ul class="captcha-area">
                                    <li>
                                        <p><img class="codeimg1" src="{{asset("assets/images/capcha_code.png")}}" alt=""> <i class="fas fa-sync-alt pointer refresh_code"></i></p>

                                    </li>
                                    <li>
                                        <input name="codes" type="text" class="input-field" placeholder="{{ $langg->lang51 }}" required="">

                                    </li>
                                </ul>

                                @endif 

                    <input type="hidden" name="to" value="{{ $ps->contact_email }}">
								<div class="form-group">
									<button class="btn btn-theme" type="submit">{{ $langg->lang52 }}</button>
								</div>
							</div>
                            </form>
						</div>
										
					</div>
					
					<div class="col-lg-4 col-md-5">
                    {!! $ps->map !!}												  

					</div>
					
				</div>
				<!-- /row -->		
			</div>	
		</section>


        
              