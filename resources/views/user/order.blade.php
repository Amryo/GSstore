@extends('layouts.user')
@section('stylesheet')
<!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
<style>
    .shop.checkout {
	padding: 0;
	background: #fff;
	padding-top: 20px;
	padding-bottom: 50px;
    }
    .shop.checkout .checkout-form {
    	margin-top: 30px;
    }
    .shop.checkout .checkout-form h2 {
    	font-size: 25px;
    	color: #333;
    	font-weight: 700;
    	line-height: 27px;
    }
    .shop.checkout .checkout-form p {
    	font-size: 16px;
    	color: #333;
    	font-weight: 400;
    	margin-top: 12px;
    	margin-bottom: 30px;
    }
    .shop.checkout .form{}
    .shop.checkout .form .form-group {
    	margin-bottom: 25px;
    }
    .shop.checkout .form .form-group label{
    	color:#333;
    	position:relative;
    }
    .shop.checkout .form .form-group label span {
    	color: #ff2c18;
    	display: inline-block;
    	position: absolute;
    	right: -12px;
    	top: 4px;
    	font-size: 16px;
    }
    .shop.checkout .form .form-group input {
    	width: 100%;
    	height: 45px;
    	line-height: 50px;
    	padding: 0 20px;
    	border-radius: 3px;
    	border-radius: 0px;
    	color: #333 !important;
    	border: none;
    	background: #F6F7FB;
    }
    .shop.checkout .form .form-group input:hover{
    
    }
    .shop.checkout .nice-select {
    	width: 100%;
    	height: 45px;
    	line-height: 50px;
    	margin-bottom: 25px;
    	background: #F6F7FB;
    	border-radius: 0px;
    	border:none;
    }
    .shop.checkout .nice-select .list {
    	width: 100%;
    	height: 300px;
    	overflow: scroll;
    }
    .shop.checkout .nice-select .list li{}
    .shop.checkout .nice-select .list li.option{
    	color:#333;
    }
    .shop.checkout .nice-select .list li.option:hover{
    	background:#F6F7FB;
    	color:#333;
    }
    .shop.checkout .form .address input {
    	margin-bottom: 15px;
    }
    .shop.checkout .form .address input:last-child{
    	margin:0;
    }
    .shop.checkout .form .create-account {
    	margin: 0;
    }
    .shop.checkout .form .create-account input {
    	width: auto;
    	display: inline-block;
    	height: auto;
    	border-radius: 100%;
    	margin-right: 3px;
    }
    .shop.checkout .form .create-account label {
    	display: inline-block;
    	margin: 0;
    }
    .shop.checkout .order-details {
    	margin-top: 30px;
    	background: #fff;
    	padding: 15px 0 30px 0;
    	border: 1px solid #eee;
    }
    .shop.checkout .single-widget {
    	margin-bottom: 30px;
    }
    .shop.checkout .single-widget:last-child{
    	margin:0;
    }
    .shop.checkout .single-widget h2 {
    	position:relative;
    	font-size: 15px;
    	font-weight: 600;
    	padding: 10px 30px;
    	line-height: 24px;
    	text-transform: uppercase;
    	color: #333;
    	padding-bottom: 5px;
    }
    .shop.checkout .single-widget h2:before{
    	position:absolute;
    	content:"";
    	left:30px;
    	bottom:0;
    	height:2px;
    	width:50px;
    	background:#F7941D;
    }
    .shop.checkout .single-widget .content ul{
    	margin-top:30px;
    }
    .shop.checkout .single-widget .content ul li {
    	display: block;
    	padding: 0px 30px;
    	font-size: 15px;
    	font-weight: 400;
    	color: #333;
    	margin-bottom: 12px;
    }
    .shop.checkout .single-widget .content ul li span{
    	display:inline-block;
    	float:right;
    }
    .shop.checkout .single-widget .content ul li.last {
    	padding-top: 12px;
    	border-top: 1px solid #ebebeb;
    	display: block;
    	font-size: 15px;
    	font-weight: 400;
    	color: #333;
    }
    .shop.checkout .single-widget .checkbox {
    	text-align: left;
    	margin: 0;
    	padding: 0px 30px;
    	margin-top:30px;
    }
    .shop.checkout .single-widget .checkbox label {
    	color: #555555;
    	position: relative;
    	font-size: 14px;
    	padding-left: 20px;
    	margin-top: -5px;
    	font-weight: 400;
    	display: block;
    	margin-bottom: 15px;
    }
    .shop.checkout .single-widget .checkbox label:last-child{
    	margin-bottom:0;
    }
    .shop.checkout .single-widget .checkbox label:hover{
    	cursor:pointer;
    }
    .shop.checkout .single-widget .checkbox label input{
    	display:none;
    }
    .shop.checkout .single-widget .checkbox label::before {
    	position: absolute;
    	content: "";
    	left: 0;
    	top: 7px;
    	width: 12px;
    	height: 12px;
    	line-height: 16px;
    	border: 1px solid #666;
    	border-radius: 100%;
    }
    .shop.checkout .single-widget .checkbox label::after {
    	position: absolute;
    	content: "";
    	left: 0;
    	top: 7px;
    	width: 12px;
    	height: 12px;
    	line-height: 16px;
    	border-radius: 100%;
    	display:block;
    	background:#666;
    	transform:scale(0);
    	-webkit-transition:all 0.4s ease;
    	-moz-transition:all 0.4s ease;
    	transition:all 0.4s ease;
    }
    .shop.checkout .single-widget .checkbox label.checked::after{
    	opacity:1;
    	visibility:visible;
    	transform:scale(1);
    }
    .shop.checkout .single-widget.payement {
    	padding: 0px 38px;
    	text-align: center;
    	margin-top: 30px;
    }
    .shop.checkout .single-widget.get-button {
    	text-align: center;
    	padding:0px 35px;
    }
    .shop.checkout .single-widget.get-button .btn {
    	height: 46px;
    	width: 100%;
    	line-height: 19px;
    	text-align: center;
    	border-radius: 0;
    	text-transform: uppercase;
    	color: #fff;
    }
</style>
@endsection
@section('content')

		<!-- Breadcrumbs -->
		<div class="breadcrumbs">
			<div class="container">
				<div class="row">
					<div class="col-12">
						<div class="bread-inner">
							<ul class="bread-list">
								<li><a href="index1.html">Home<i class="ti-arrow-right"></i></a></li>
								<li class="active"><a href="blog-single.html">Checkout</a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- End Breadcrumbs -->
				
		<!-- Start Checkout -->
		<section class="shop checkout section">
			<div class="container">
				<div class="row"> 
					<div class="col-lg-8 col-md-6">
						<div class="checkout-form">
							<h2>Make Your Checkout Here</h2>
							<p>Please register in order to checkout more quickly</p>
							<!-- Form -->
							<form class="form" method="post" action="{{route('checkout')}}">
                                @csrf
								<div class="row">
									<div class="col-lg-6 col-md-6 col-12">
										<div class="form-group">
											<label> Name<span>*</span></label>
											<input type="text" name="billing_name" placeholder="" required="required">
										</div>
									</div>
									
									<div class="col-lg-6 col-md-6 col-12">
										<div class="form-group">
											<label>Email Address<span>*</span></label>
											<input type="email" name="billing_email" placeholder="" required="required">
										</div>
									</div>
									<div class="col-lg-6 col-md-6 col-12">
										<div class="form-group">
											<label>Phone Number<span>*</span></label>
											<input type="number" name="billing_phone" placeholder="" required="required">
										</div>
									</div>
									<div class="col-lg-6 col-md-6 col-12">
										<div class="form-group">
											<label>Country<span>*</span></label>
											<select name="billing_country" id="country">
												<option value="AF">Afghanistan</option>
												<option value="AX">Åland Islands</option>
												<option value="AL">Albania</option>
												<option value="DZ">Algeria</option>
												<option value="AS">American Samoa</option>
												<option value="AD">Andorra</option>
												<option value="AO">Angola</option>
												<option value="AI">Anguilla</option>
												<option value="AQ">Antarctica</option>
												<option value="AG">Antigua and Barbuda</option>
												<option value="AR">Argentina</option>
												<option value="AM">Armenia</option>
												<option value="AW">Aruba</option>
												<option value="AU">Australia</option>
												<option value="AT">Austria</option>
												<option value="AZ">Azerbaijan</option>
												<option value="BS">Bahamas</option>
												<option value="BH">Bahrain</option>
												<option value="BD">Bangladesh</option>
												<option value="BB">Barbados</option>
												<option value="BY">Belarus</option>
												<option value="BE">Belgium</option>
												<option value="BZ">Belize</option>
												<option value="BJ">Benin</option>
												<option value="BM">Bermuda</option>
												<option value="BT">Bhutan</option>
												<option value="BO">Bolivia</option>
												<option value="BA">Bosnia and Herzegovina</option>
												<option value="BW">Botswana</option>
												<option value="BV">Bouvet Island</option>
												<option value="BR">Brazil</option>
												<option value="IO">British Indian Ocean Territory</option>
												<option value="VG">British Virgin Islands</option>
												<option value="BN">Brunei</option>
												<option value="BG">Bulgaria</option>
												<option value="BF">Burkina Faso</option>
												<option value="BI">Burundi</option>
												<option value="KH">Cambodia</option>
												<option value="CM">Cameroon</option>
												<option value="CA">Canada</option>
												<option value="CV">Cape Verde</option>
												<option value="KY">Cayman Islands</option>
												<option value="CF">Central African Republic</option>
												<option value="TD">Chad</option>
												<option value="CL">Chile</option>
												<option value="CN">China</option>
												<option value="CX">Christmas Island</option>
												<option value="CC">Cocos [Keeling] Islands</option>
												<option value="CO">Colombia</option>
												<option value="KM">Comoros</option>
												<option value="CG">Congo - Brazzaville</option>
												<option value="CD">Congo - Kinshasa</option>
												<option value="CK">Cook Islands</option>
												<option value="CR">Costa Rica</option>
												<option value="CI">Côte d’Ivoire</option>
												<option value="HR">Croatia</option>
												<option value="CU">Cuba</option>
												<option value="CY">Cyprus</option>
												<option value="CZ">Czech Republic</option>
												<option value="DK">Denmark</option>
												<option value="DJ">Djibouti</option>
												<option value="DM">Dominica</option>
												<option value="DO">Dominican Republic</option>
												<option value="EC">Ecuador</option>
												<option value="EG">Egypt</option>
												<option value="SV">El Salvador</option>
												<option value="GQ">Equatorial Guinea</option>
												<option value="ER">Eritrea</option>
												<option value="EE">Estonia</option>
												<option value="ET">Ethiopia</option>
												<option value="FK">Falkland Islands</option>
												<option value="FO">Faroe Islands</option>
												<option value="FJ">Fiji</option>
												<option value="FI">Finland</option>
												<option value="FR">France</option>
												<option value="GF">French Guiana</option>
												<option value="PF">French Polynesia</option>
												<option value="TF">French Southern Territories</option>
												<option value="GA">Gabon</option>
												<option value="GM">Gambia</option>
												<option value="GE">Georgia</option>
												<option value="DE">Germany</option>
												<option value="GH">Ghana</option>
												<option value="GI">Gibraltar</option>
												<option value="GR">Greece</option>
												<option value="GL">Greenland</option>
												<option value="GD">Grenada</option>
												<option value="GP">Guadeloupe</option>
												<option value="GU">Guam</option>
												<option value="GT">Guatemala</option>
												<option value="GG">Guernsey</option>
												<option value="GN">Guinea</option>
												<option value="GW">Guinea-Bissau</option>
												<option value="GY">Guyana</option>
												<option value="HT">Haiti</option>
												<option value="HM">Heard Island and McDonald Islands</option>
												<option value="HN">Honduras</option>
												<option value="HK">Hong Kong SAR China</option>
												<option value="HU">Hungary</option>
												<option value="IS">Iceland</option>
												<option value="IN">India</option>
												<option value="ID">Indonesia</option>
												<option value="IR">Iran</option>
												<option value="IQ">Iraq</option>
												<option value="IE">Ireland</option>
												<option value="IM">Isle of Man</option>
												<option value="IL">Israel</option>
												<option value="IT">Italy</option>
												<option value="JM">Jamaica</option>
												<option value="JP">Japan</option>
												<option value="JE">Jersey</option>
												<option value="JO">Jordan</option>
												<option value="KZ">Kazakhstan</option>
												<option value="KE">Kenya</option>
												<option value="KI">Kiribati</option>
												<option value="KW">Kuwait</option>
												<option value="KG">Kyrgyzstan</option>
												<option value="LA">Laos</option>
												<option value="LV">Latvia</option>
												<option value="LB">Lebanon</option>
												<option value="LS">Lesotho</option>
												<option value="LR">Liberia</option>
												<option value="LY">Libya</option>
												<option value="LI">Liechtenstein</option>
												<option value="LT">Lithuania</option>
												<option value="LU">Luxembourg</option>
												<option value="MO">Macau SAR China</option>
												<option value="MK">Macedonia</option>
												<option value="MG">Madagascar</option>
												<option value="MW">Malawi</option>
												<option value="MY">Malaysia</option>
												<option value="MV">Maldives</option>
												<option value="ML">Mali</option>
												<option value="MT">Malta</option>
												<option value="MH">Marshall Islands</option>
												<option value="MQ">Martinique</option>
												<option value="MR">Mauritania</option>
												<option value="MU">Mauritius</option>
												<option value="YT">Mayotte</option>
												<option value="MX">Mexico</option>
												<option value="FM">Micronesia</option>
												<option value="MD">Moldova</option>
												<option value="MC">Monaco</option>
												<option value="MN">Mongolia</option>
												<option value="ME">Montenegro</option>
												<option value="MS">Montserrat</option>
												<option value="MA">Morocco</option>
												<option value="MZ">Mozambique</option>
												<option value="MM">Myanmar [Burma]</option>
												<option value="NA">Namibia</option>
												<option value="NR">Nauru</option>
												<option value="NP">Nepal</option>
												<option value="NL">Netherlands</option>
												<option value="AN">Netherlands Antilles</option>
												<option value="NC">New Caledonia</option>
												<option value="NZ">New Zealand</option>
												<option value="NI">Nicaragua</option>
												<option value="NE">Niger</option>
												<option value="NG">Nigeria</option>
												<option value="NU">Niue</option>
												<option value="NF">Norfolk Island</option>
												<option value="MP">Northern Mariana Islands</option>
												<option value="KP">North Korea</option>
												<option value="NO">Norway</option>
												<option value="OM">Oman</option>
												<option value="PK">Pakistan</option>
												<option value="PW">Palau</option>
												<option value="PS">Palestinian Territories</option>
												<option value="PA">Panama</option>
												<option value="PG">Papua New Guinea</option>
												<option value="PY">Paraguay</option>
												<option value="PE">Peru</option>
												<option value="PH">Philippines</option>
												<option value="PN">Pitcairn Islands</option>
												<option value="PL">Poland</option>
												<option value="PT">Portugal</option>
												<option value="PR">Puerto Rico</option>
												<option value="QA">Qatar</option>
												<option value="RE">Réunion</option>
												<option value="RO">Romania</option>
												<option value="RU">Russia</option>
												<option value="RW">Rwanda</option>
												<option value="BL">Saint Barthélemy</option>
												<option value="SH">Saint Helena</option>
												<option value="KN">Saint Kitts and Nevis</option>
												<option value="LC">Saint Lucia</option>
												<option value="MF">Saint Martin</option>
												<option value="PM">Saint Pierre and Miquelon</option>
												<option value="VC">Saint Vincent and the Grenadines</option>
												<option value="WS">Samoa</option>
												<option value="SM">San Marino</option>
												<option value="ST">São Tomé and Príncipe</option>
												<option value="SA">Saudi Arabia</option>
												<option value="SN">Senegal</option>
												<option value="RS">Serbia</option>
												<option value="SC">Seychelles</option>
												<option value="SL">Sierra Leone</option>
												<option value="SG">Singapore</option>
												<option value="SK">Slovakia</option>
												<option value="SI">Slovenia</option>
												<option value="SB">Solomon Islands</option>
												<option value="SO">Somalia</option>
												<option value="ZA">South Africa</option>
												<option value="GS">South Georgia</option>
												<option value="KR">South Korea</option>
												<option value="ES">Spain</option>
												<option value="LK">Sri Lanka</option>
												<option value="SD">Sudan</option>
												<option value="SR">Suriname</option>
												<option value="SJ">Svalbard and Jan Mayen</option>
												<option value="SZ">Swaziland</option>
												<option value="SE">Sweden</option>
												<option value="CH">Switzerland</option>
												<option value="SY">Syria</option>
												<option value="TW">Taiwan</option>
												<option value="TJ">Tajikistan</option>
												<option value="TZ">Tanzania</option>
												<option value="TH">Thailand</option>
												<option value="TL">Timor-Leste</option>
												<option value="TG">Togo</option>
												<option value="TK">Tokelau</option>
												<option value="TO">Tonga</option>
												<option value="TT">Trinidad and Tobago</option>
												<option value="TN">Tunisia</option>
												<option value="TR">Turkey</option>
												<option value="TM">Turkmenistan</option>
												<option value="TC">Turks and Caicos Islands</option>
												<option value="TV">Tuvalu</option>
												<option value="UG">Uganda</option>
												<option value="UA">Ukraine</option>
												<option value="AE">United Arab Emirates</option>
												<option value="US" selected="selected">United Kingdom</option>
												<option value="UY">Uruguay</option>
												<option value="UM">U.S. Minor Outlying Islands</option>
												<option value="VI">U.S. Virgin Islands</option>
												<option value="UZ">Uzbekistan</option>
												<option value="VU">Vanuatu</option>
												<option value="VA">Vatican City</option>
												<option value="VE">Venezuela</option>
												<option value="VN">Vietnam</option>
												<option value="WF">Wallis and Futuna</option>
												<option value="EH">Western Sahara</option>
												<option value="YE">Yemen</option>
												<option value="ZM">Zambia</option>
												<option value="ZW">Zimbabwe</option>
											</select>
										</div>
									</div>
									<div class="col-lg-6 col-md-6 col-12">
										<div class="form-group">
											<label>State / Divition<span>*</span></label>
											<select name="billing_city" id="state-province">
												<option value="divition" selected="selected">New Yourk</option>
												<option>Los Angeles</option>
												<option>Chicago</option>
												<option>Houston</option>
												<option>San Diego</option>
												<option>Dallas</option>
												<option>Charlotte</option>
											</select>
										</div>
									</div>
									<div class="col-lg-6 col-md-6 col-12">
										<div class="form-group">
											<label>Address Line<span>*</span></label>
											<input type="text" name="billing_address" placeholder="" required="required">
										</div>
									</div>
									<button type="submit" class="btn btn-primary">Submit</button>
									<div class="col-12">
										<div class="form-group create-account">
											<input id="cbox" type="checkbox">
											<label>Create an account?</label>
										</div>
									</div>
								</div>
							</form>
							<!--/ End Form -->
						</div>
					</div>
					<div class="col-lg-4 col-12">
						<div class="order-details">
							<!-- Order Widget -->
							<div class="single-widget">
								<h2>CART  TOTALS</h2>
								<div class="content">
                                    <ul>
                                    @foreach ($cart->all() as $item)
                                   
                                        <li>{{$item->product->name}} x{{$item->quantity}}<span class="text-danger">{{$item->product->price * $item->quantity}}</span></li>
                                    
                                    @endforeach
                                </ul> 
									<ul>
										<li>Sub Total<span>{{$cart->total()}}</span></li>
										<li>(+) Shipping<span>{{--$cart->discount--}}</span></li>
										<li class="last">Total<span>{{$cart->total()}}</span></li>
									</ul>
								</div>
							</div>
							<!--/ End Order Widget -->
							<!-- Order Widget -->
							<div class="single-widget">
								<h2>Payments</h2>
								<div class="content">
									<div class="checkbox">
										<label class="checkbox-inline" for="1"><input name="updates" id="1" type="checkbox"> Check Payments</label>
										<label class="checkbox-inline" for="2"><input name="news" id="2" type="checkbox"> Cash On Delivery</label>
										<label class="checkbox-inline" for="3"><input name="news" id="3" type="checkbox"> PayPal</label>
									</div>
								</div>
							</div>
							<!--/ End Order Widget -->
							<!-- Payment Method Widget -->
							<div class="single-widget payement">
								<div class="content">
									<img src="images/payment-method.png" alt="#">
								</div>
							</div>
							<!--/ End Payment Method Widget -->
							<!-- Button Widget -->
							<div class="single-widget get-button">
								<div class="content">
									<div class="button">
										<a href="{{route('orders')}}" class="btn btn-dark">proceed to checkout</a>
									</div>
								</div>
							</div>
							<!--/ End Button Widget -->
						</div>
					</div>
				</div>
			</div>
		</section>
		<!--/ End Checkout -->
		
		
@endsection
@section('scripts')
<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>
@endsection