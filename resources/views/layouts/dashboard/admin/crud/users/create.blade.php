@extends('layouts.app')

@section('title', 'Dashboard - Add User(s)')

@section('head')
    <script src='https://www.google.com/recaptcha/api.js'></script>
@endsection

@section('content')

<style>

.custom-file-input ~ .custom-file-label::after {
    content: "Upload";
}
.custom-file-input{
    cursor: pointer;
}
</style>

<div class="container-fluid">

    <div id="adminTable">
        <div class="table_header "><!-- table header -->
            <div class="row ">
                <div class="col-md-4">
                    <div class="mx-auto mt-2 intro1">
                        <h6 class="text-capitalize">Add
                        @if ($user_type)
                            {{$user_type}}(s)
                        @else
                            User(s)
                        @endif</h6>
                    </div>
                </div>

                <div class="col-md-8">
                    <div class="row">
                        <div class="col-md-12 text-right">
                            <a href="{{url()->previous()}}" class="btn btn-afraa tb-sm-text">
                                <i class="fas fa-users"></i> Back
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="table_body ">

            <form method="POST" action="{{ url('dashboard/users/store') }}" enctype="multipart/form-data">
                @csrf

                <div class="row">

                    <div class="col-md-6 form-group">
                        <label for="name" class="col-form-label text-md-left">{{ __('Company/Person Name') }}</label>

                        <input id="name" name="name" type="text" class="form-control {{ $errors->has('name') ? ' is-invalid' : '' }}" value="{{ old('name') }}" autofocus>
                        @if ($errors->has('name'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('name') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="col-md-6 form-group">
                        <label for="email" class="col-form-label text-md-right">{{ __('E-Mail') }}</label>

                        <input id="email" name="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" value="{{ old('email') }}">
                        @if ($errors->has('email'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="col-md-6 form-group">
                        <label for="role" class="col-form-label text-md-right">{{ __('Role') }}</label>
                        @if ($user_type == "manager" || $user_type == "delegate")
                            <input value="{!! $user_type !!}" class="form-control {{ $errors->has('roleselector') ? ' is-invalid' : '' }}" id="roleselector" name="roleselector" readonly>
                        @else
                            <select class="form-control {{ $errors->has('roleselector') ? ' is-invalid' : '' }}" id="roleselector" name="roleselector">
                                @foreach($allpermissions as $key => $roles)
                                    @if ($roles->role == old('roleselector'))
                                        <option value="{!! $roles->role !!}" @if(old('roleselector') ==! $roles->role) selected @endif selected> {{$roles->role}}</option>
                                    @else
                                        <option value="{!! $roles->role !!}" @if(old('roleselector') ==! $roles->role) @endif> {{$roles->role}}</option>
                                    @endif
                                @endforeach
                            </select>
                        @endif

                        @if ($errors->has('roleselector'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('roleselector') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="col-md-6 form-group">
                        <label for="phone" class="col-form-label text-md-right">{{ __('Phone') }}</label>
                        <div class="input-group">
                            <input type="tel" id="phone" name="phone" value="{{ old('phone') }}" class="form-control {{ $errors->has('phone') ? ' is-invalid' : '' }}">
                            @if ($errors->has('phone'))
                                <span class="invalid-feedback1 pl-2 pt-2 text-danger" role="alert">
                                    <strong>{{ $errors->first('phone') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="col-md-6 form-group">
                        <label for="bio" class="col-form-label text-md-right">{{ __('Bio/Description') }}</label>
                        <textarea class="form-control {{ $errors->has('bio') ? ' is-invalid' : '' }}" id="bio" name="bio" value="{{ old('bio') }}" rows="3"></textarea>
                        @if ($errors->has('bio'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('bio') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="col-md-6 form-group">
                        <label for="bio" class="col-form-label text-md-right">{{ __('Upload Photo') }}</label>
                        <div class="custom-file" id="customFile" lang="es">
                            <input type="file" class="form-control custom-file-input {{ $errors->has('photo') ? ' is-invalid' : '' }}" id="photo" name="photo" value="{{ old('photo') }}" aria-describedby="fileHelp">
                            <label class="custom-file-label" for="photo">
                                Choose photo i.e logo...
                            </label>

                            @if ($errors->has('photo'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('photo') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                    <div class="col-md-6 form-group">
                        <label for="name" class="col-form-label text-md-right">{{ __('Country') }}</label>
                        {{-- <select class="form-control selectpicker countrypicker {{ $errors->has('country') ? ' is-invalid' : '' }}" name="country" value="{{ old('country') }}"
                                data-live-search="true"
                                data-default="Kenya"
                                data-flag="true">
                        </select> --}}
                        <select name="country" id="country" class="form-control {{ $errors->has('country') ? ' is-invalid' : '' }}">
                            <option value="@isset($user->country) {{$user->country}} @endisset">@isset($user->country) {{$user->country}} @else Choose Option @endisset </option>
                            <optgroup id="country-optgroup-Africa" label="Africa">
                            <option value="DZ" label="Algeria">Algeria</option>
                            <option value="AO" label="Angola">Angola</option>
                            <option value="BJ" label="Benin">Benin</option>
                            <option value="BW" label="Botswana">Botswana</option>
                            <option value="BF" label="Burkina Faso">Burkina Faso</option>
                            <option value="BI" label="Burundi">Burundi</option>
                            <option value="CM" label="Cameroon">Cameroon</option>
                            <option value="CV" label="Cape Verde">Cape Verde</option>
                            <option value="CF" label="Central African Republic">Central African Republic</option>
                            <option value="TD" label="Chad">Chad</option>
                            <option value="KM" label="Comoros">Comoros</option>
                            <option value="CG" label="Congo - Brazzaville">Congo - Brazzaville</option>
                            <option value="CD" label="Congo - Kinshasa">Congo - Kinshasa</option>
                            <option value="CI" label="Côte d’Ivoire">Côte d’Ivoire</option>
                            <option value="DJ" label="Djibouti">Djibouti</option>
                            <option value="EG" label="Egypt">Egypt</option>
                            <option value="GQ" label="Equatorial Guinea">Equatorial Guinea</option>
                            <option value="ER" label="Eritrea">Eritrea</option>
                            <option value="ET" label="Ethiopia">Ethiopia</option>
                            <option value="GA" label="Gabon">Gabon</option>
                            <option value="GM" label="Gambia">Gambia</option>
                            <option value="GH" label="Ghana">Ghana</option>
                            <option value="GN" label="Guinea">Guinea</option>
                            <option value="GW" label="Guinea-Bissau">Guinea-Bissau</option>
                            <option value="KE" label="Kenya">Kenya</option>
                            <option value="LS" label="Lesotho">Lesotho</option>
                            <option value="LR" label="Liberia">Liberia</option>
                            <option value="LY" label="Libya">Libya</option>
                            <option value="MG" label="Madagascar">Madagascar</option>
                            <option value="MW" label="Malawi">Malawi</option>
                            <option value="ML" label="Mali">Mali</option>
                            <option value="MR" label="Mauritania">Mauritania</option>
                            <option value="MU" label="Mauritius">Mauritius</option>
                            <option value="YT" label="Mayotte">Mayotte</option>
                            <option value="MA" label="Morocco">Morocco</option>
                            <option value="MZ" label="Mozambique">Mozambique</option>
                            <option value="NA" label="Namibia">Namibia</option>
                            <option value="NE" label="Niger">Niger</option>
                            <option value="NG" label="Nigeria">Nigeria</option>
                            <option value="RW" label="Rwanda">Rwanda</option>
                            <option value="RE" label="Réunion">Réunion</option>
                            <option value="SH" label="Saint Helena">Saint Helena</option>
                            <option value="SN" label="Senegal">Senegal</option>
                            <option value="SC" label="Seychelles">Seychelles</option>
                            <option value="SL" label="Sierra Leone">Sierra Leone</option>
                            <option value="SO" label="Somalia">Somalia</option>
                            <option value="ZA" label="South Africa">South Africa</option>
                            <option value="SD" label="Sudan">Sudan</option>
                            <option value="SZ" label="Swaziland">Swaziland</option>
                            <option value="ST" label="São Tomé and Príncipe">São Tomé and Príncipe</option>
                            <option value="TZ" label="Tanzania">Tanzania</option>
                            <option value="TG" label="Togo">Togo</option>
                            <option value="TN" label="Tunisia">Tunisia</option>
                            <option value="UG" label="Uganda">Uganda</option>
                            <option value="EH" label="Western Sahara">Western Sahara</option>
                            <option value="ZM" label="Zambia">Zambia</option>
                            <option value="ZW" label="Zimbabwe">Zimbabwe</option>
                            </optgroup>
                            <optgroup id="country-optgroup-Americas" label="Americas">
                            <option value="AI" label="Anguilla">Anguilla</option>
                            <option value="AG" label="Antigua and Barbuda">Antigua and Barbuda</option>
                            <option value="AR" label="Argentina">Argentina</option>
                            <option value="AW" label="Aruba">Aruba</option>
                            <option value="BS" label="Bahamas">Bahamas</option>
                            <option value="BB" label="Barbados">Barbados</option>
                            <option value="BZ" label="Belize">Belize</option>
                            <option value="BM" label="Bermuda">Bermuda</option>
                            <option value="BO" label="Bolivia">Bolivia</option>
                            <option value="BR" label="Brazil">Brazil</option>
                            <option value="VG" label="British Virgin Islands">British Virgin Islands</option>
                            <option value="CA" label="Canada">Canada</option>
                            <option value="KY" label="Cayman Islands">Cayman Islands</option>
                            <option value="CL" label="Chile">Chile</option>
                            <option value="CO" label="Colombia">Colombia</option>
                            <option value="CR" label="Costa Rica">Costa Rica</option>
                            <option value="CU" label="Cuba">Cuba</option>
                            <option value="DM" label="Dominica">Dominica</option>
                            <option value="DO" label="Dominican Republic">Dominican Republic</option>
                            <option value="EC" label="Ecuador">Ecuador</option>
                            <option value="SV" label="El Salvador">El Salvador</option>
                            <option value="FK" label="Falkland Islands">Falkland Islands</option>
                            <option value="GF" label="French Guiana">French Guiana</option>
                            <option value="GL" label="Greenland">Greenland</option>
                            <option value="GD" label="Grenada">Grenada</option>
                            <option value="GP" label="Guadeloupe">Guadeloupe</option>
                            <option value="GT" label="Guatemala">Guatemala</option>
                            <option value="GY" label="Guyana">Guyana</option>
                            <option value="HT" label="Haiti">Haiti</option>
                            <option value="HN" label="Honduras">Honduras</option>
                            <option value="JM" label="Jamaica">Jamaica</option>
                            <option value="MQ" label="Martinique">Martinique</option>
                            <option value="MX" label="Mexico">Mexico</option>
                            <option value="MS" label="Montserrat">Montserrat</option>
                            <option value="AN" label="Netherlands Antilles">Netherlands Antilles</option>
                            <option value="NI" label="Nicaragua">Nicaragua</option>
                            <option value="PA" label="Panama">Panama</option>
                            <option value="PY" label="Paraguay">Paraguay</option>
                            <option value="PE" label="Peru">Peru</option>
                            <option value="PR" label="Puerto Rico">Puerto Rico</option>
                            <option value="BL" label="Saint Barthélemy">Saint Barthélemy</option>
                            <option value="KN" label="Saint Kitts and Nevis">Saint Kitts and Nevis</option>
                            <option value="LC" label="Saint Lucia">Saint Lucia</option>
                            <option value="MF" label="Saint Martin">Saint Martin</option>
                            <option value="PM" label="Saint Pierre and Miquelon">Saint Pierre and Miquelon</option>
                            <option value="VC" label="Saint Vincent and the Grenadines">Saint Vincent and the Grenadines</option>
                            <option value="SR" label="Suriname">Suriname</option>
                            <option value="TT" label="Trinidad and Tobago">Trinidad and Tobago</option>
                            <option value="TC" label="Turks and Caicos Islands">Turks and Caicos Islands</option>
                            <option value="VI" label="U.S. Virgin Islands">U.S. Virgin Islands</option>
                            <option value="US" label="United States">United States</option>
                            <option value="UY" label="Uruguay">Uruguay</option>
                            <option value="VE" label="Venezuela">Venezuela</option>
                            </optgroup>
                            <optgroup id="country-optgroup-Asia" label="Asia">
                            <option value="AF" label="Afghanistan">Afghanistan</option>
                            <option value="AM" label="Armenia">Armenia</option>
                            <option value="AZ" label="Azerbaijan">Azerbaijan</option>
                            <option value="BH" label="Bahrain">Bahrain</option>
                            <option value="BD" label="Bangladesh">Bangladesh</option>
                            <option value="BT" label="Bhutan">Bhutan</option>
                            <option value="BN" label="Brunei">Brunei</option>
                            <option value="KH" label="Cambodia">Cambodia</option>
                            <option value="CN" label="China">China</option>
                            <option value="CY" label="Cyprus">Cyprus</option>
                            <option value="GE" label="Georgia">Georgia</option>
                            <option value="HK" label="Hong Kong SAR China">Hong Kong SAR China</option>
                            <option value="IN" label="India">India</option>
                            <option value="ID" label="Indonesia">Indonesia</option>
                            <option value="IR" label="Iran">Iran</option>
                            <option value="IQ" label="Iraq">Iraq</option>
                            <option value="IL" label="Israel">Israel</option>
                            <option value="JP" label="Japan">Japan</option>
                            <option value="JO" label="Jordan">Jordan</option>
                            <option value="KZ" label="Kazakhstan">Kazakhstan</option>
                            <option value="KW" label="Kuwait">Kuwait</option>
                            <option value="KG" label="Kyrgyzstan">Kyrgyzstan</option>
                            <option value="LA" label="Laos">Laos</option>
                            <option value="LB" label="Lebanon">Lebanon</option>
                            <option value="MO" label="Macau SAR China">Macau SAR China</option>
                            <option value="MY" label="Malaysia">Malaysia</option>
                            <option value="MV" label="Maldives">Maldives</option>
                            <option value="MN" label="Mongolia">Mongolia</option>
                            <option value="MM" label="Myanmar [Burma]">Myanmar [Burma]</option>
                            <option value="NP" label="Nepal">Nepal</option>
                            <option value="NT" label="Neutral Zone">Neutral Zone</option>
                            <option value="KP" label="North Korea">North Korea</option>
                            <option value="OM" label="Oman">Oman</option>
                            <option value="PK" label="Pakistan">Pakistan</option>
                            <option value="PS" label="Palestinian Territories">Palestinian Territories</option>
                            <option value="YD" label="People's Democratic Republic of Yemen">Peoples Democratic Republic of Yemen</option>
                            <option value="PH" label="Philippines">Philippines</option>
                            <option value="QA" label="Qatar">Qatar</option>
                            <option value="SA" label="Saudi Arabia">Saudi Arabia</option>
                            <option value="SG" label="Singapore">Singapore</option>
                            <option value="KR" label="South Korea">South Korea</option>
                            <option value="LK" label="Sri Lanka">Sri Lanka</option>
                            <option value="SY" label="Syria">Syria</option>
                            <option value="TW" label="Taiwan">Taiwan</option>
                            <option value="TJ" label="Tajikistan">Tajikistan</option>
                            <option value="TH" label="Thailand">Thailand</option>
                            <option value="TL" label="Timor-Leste">Timor-Leste</option>
                            <option value="TR" label="Turkey">Turkey</option>
                            <option value="™" label="Turkmenistan">Turkmenistan</option>
                            <option value="AE" label="United Arab Emirates">United Arab Emirates</option>
                            <option value="UZ" label="Uzbekistan">Uzbekistan</option>
                            <option value="VN" label="Vietnam">Vietnam</option>
                            <option value="YE" label="Yemen">Yemen</option>
                            </optgroup>
                            <optgroup id="country-optgroup-Europe" label="Europe">
                            <option value="AL" label="Albania">Albania</option>
                            <option value="AD" label="Andorra">Andorra</option>
                            <option value="AT" label="Austria">Austria</option>
                            <option value="BY" label="Belarus">Belarus</option>
                            <option value="BE" label="Belgium">Belgium</option>
                            <option value="BA" label="Bosnia and Herzegovina">Bosnia and Herzegovina</option>
                            <option value="BG" label="Bulgaria">Bulgaria</option>
                            <option value="HR" label="Croatia">Croatia</option>
                            <option value="CY" label="Cyprus">Cyprus</option>
                            <option value="CZ" label="Czech Republic">Czech Republic</option>
                            <option value="DK" label="Denmark">Denmark</option>
                            <option value="DD" label="East Germany">East Germany</option>
                            <option value="EE" label="Estonia">Estonia</option>
                            <option value="FO" label="Faroe Islands">Faroe Islands</option>
                            <option value="FI" label="Finland">Finland</option>
                            <option value="FR" label="France">France</option>
                            <option value="DE" label="Germany">Germany</option>
                            <option value="GI" label="Gibraltar">Gibraltar</option>
                            <option value="GR" label="Greece">Greece</option>
                            <option value="GG" label="Guernsey">Guernsey</option>
                            <option value="HU" label="Hungary">Hungary</option>
                            <option value="IS" label="Iceland">Iceland</option>
                            <option value="IE" label="Ireland">Ireland</option>
                            <option value="IM" label="Isle of Man">Isle of Man</option>
                            <option value="IT" label="Italy">Italy</option>
                            <option value="JE" label="Jersey">Jersey</option>
                            <option value="LV" label="Latvia">Latvia</option>
                            <option value="LI" label="Liechtenstein">Liechtenstein</option>
                            <option value="LT" label="Lithuania">Lithuania</option>
                            <option value="LU" label="Luxembourg">Luxembourg</option>
                            <option value="MK" label="Macedonia">Macedonia</option>
                            <option value="MT" label="Malta">Malta</option>
                            <option value="FX" label="Metropolitan France">Metropolitan France</option>
                            <option value="MD" label="Moldova">Moldova</option>
                            <option value="MC" label="Monaco">Monaco</option>
                            <option value="ME" label="Montenegro">Montenegro</option>
                            <option value="NL" label="Netherlands">Netherlands</option>
                            <option value="NO" label="Norway">Norway</option>
                            <option value="PL" label="Poland">Poland</option>
                            <option value="PT" label="Portugal">Portugal</option>
                            <option value="RO" label="Romania">Romania</option>
                            <option value="RU" label="Russia">Russia</option>
                            <option value="SM" label="San Marino">San Marino</option>
                            <option value="RS" label="Serbia">Serbia</option>
                            <option value="CS" label="Serbia and Montenegro">Serbia and Montenegro</option>
                            <option value="SK" label="Slovakia">Slovakia</option>
                            <option value="SI" label="Slovenia">Slovenia</option>
                            <option value="ES" label="Spain">Spain</option>
                            <option value="SJ" label="Svalbard and Jan Mayen">Svalbard and Jan Mayen</option>
                            <option value="SE" label="Sweden">Sweden</option>
                            <option value="CH" label="Switzerland">Switzerland</option>
                            <option value="UA" label="Ukraine">Ukraine</option>
                            <option value="SU" label="Union of Soviet Socialist Republics">Union of Soviet Socialist Republics</option>
                            <option value="GB" label="United Kingdom">United Kingdom</option>
                            <option value="VA" label="Vatican City">Vatican City</option>
                            <option value="AX" label="Åland Islands">Åland Islands</option>
                            </optgroup>
                            <optgroup id="country-optgroup-Oceania" label="Oceania">
                            <option value="AS" label="American Samoa">American Samoa</option>
                            <option value="AQ" label="Antarctica">Antarctica</option>
                            <option value="AU" label="Australia">Australia</option>
                            <option value="BV" label="Bouvet Island">Bouvet Island</option>
                            <option value="IO" label="British Indian Ocean Territory">British Indian Ocean Territory</option>
                            <option value="CX" label="Christmas Island">Christmas Island</option>
                            <option value="CC" label="Cocos [Keeling] Islands">Cocos [Keeling] Islands</option>
                            <option value="CK" label="Cook Islands">Cook Islands</option>
                            <option value="FJ" label="Fiji">Fiji</option>
                            <option value="PF" label="French Polynesia">French Polynesia</option>
                            <option value="TF" label="French Southern Territories">French Southern Territories</option>
                            <option value="GU" label="Guam">Guam</option>
                            <option value="HM" label="Heard Island and McDonald Islands">Heard Island and McDonald Islands</option>
                            <option value="KI" label="Kiribati">Kiribati</option>
                            <option value="MH" label="Marshall Islands">Marshall Islands</option>
                            <option value="FM" label="Micronesia">Micronesia</option>
                            <option value="NR" label="Nauru">Nauru</option>
                            <option value="NC" label="New Caledonia">New Caledonia</option>
                            <option value="NZ" label="New Zealand">New Zealand</option>
                            <option value="NU" label="Niue">Niue</option>
                            <option value="NF" label="Norfolk Island">Norfolk Island</option>
                            <option value="MP" label="Northern Mariana Islands">Northern Mariana Islands</option>
                            <option value="PW" label="Palau">Palau</option>
                            <option value="PG" label="Papua New Guinea">Papua New Guinea</option>
                            <option value="PN" label="Pitcairn Islands">Pitcairn Islands</option>
                            <option value="WS" label="Samoa">Samoa</option>
                            <option value="SB" label="Solomon Islands">Solomon Islands</option>
                            <option value="GS" label="South Georgia and the South Sandwich Islands">South Georgia and the South Sandwich Islands</option>
                            <option value="TK" label="Tokelau">Tokelau</option>
                            <option value="TO" label="Tonga">Tonga</option>
                            <option value="TV" label="Tuvalu">Tuvalu</option>
                            <option value="UM" label="U.S. Minor Outlying Islands">U.S. Minor Outlying Islands</option>
                            <option value="VU" label="Vanuatu">Vanuatu</option>
                            <option value="WF" label="Wallis and Futuna">Wallis and Futuna</option>
                            </optgroup>
                        </select>

                        @if ($errors->has('country'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('country') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="col-md-6 form-group mt-5">
                        <button type="submit" class="btn btn-afraa-full-2">
                            {{ __('Add') }}
                        </button>
                    </div>

                </div>

            </form>

        </div>
    </div>

    {{-- <!-- <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card">

                <div class="card-header">

                    <div class="row">

                        <div class="col-md-4 ">
                            <div class="mx-auto mt-2">
                            Dashboard - Add User(s)
                            </div>
                        </div>

                        <div class="col-md-8 ">
                            <div class="row">
                                <div class="col-md-2 offset-md-10">
                                    <a href="{{url('/dashboard/users/create/')}}" class="btn btn-primary">Add User</a>
                                </div>
                            </div>
                        </div>

                    </div>

                </div>

                <div class="card-body">

                    <div class="container">
                        <div class="col-md-12">

                            <form method="POST" action="{{ url('dashboard/users/store') }}" enctype="multipart/form-data">
                                @csrf

                                <div class="form-group row">
                                    <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Company/Person Name') }}</label>

                                    <div class="col-md-6">
                                        <input id="name" name="name" type="text" class="form-control {{ $errors->has('name') ? ' is-invalid' : '' }}" value="{{ old('name') }}" autofocus>

                                        @if ($errors->has('name'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('name') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail') }}</label>

                                    <div class="col-md-6">
                                        <input id="email" name="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" value="{{ old('email') }}">

                                        @if ($errors->has('email'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('email') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="role" class="col-md-4 col-form-label text-md-right">{{ __('Role') }}</label>

                                    <div class="col-md-6">

                                        <select class="form-control {{ $errors->has('roleselector') ? ' is-invalid' : '' }}" id="roleselector" name="roleselector">

                                            @foreach($allpermissions as $key => $roles)

                                                @if ($roles->role == old('roleselector'))
                                                    <option value="{!! $roles->role !!}" @if(old('roleselector') ==! $roles->role) selected @endif selected> {{$roles->role}}</option>

                                                @else
                                                    <option value="{!! $roles->role !!}" @if(old('roleselector') ==! $roles->role) @endif> {{$roles->role}}</option>
                                                @endif

                                            @endforeach

                                        </select>

                                        @if ($errors->has('roleselector'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('roleselector') }}</strong>
                                            </span>
                                        @endif

                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="phone" class="col-md-4 col-form-label text-md-right">{{ __('Phone') }}</label>

                                    <div class="col-md-6">
                                        <div class="input-group">
                                            <input type="tel" id="phone" name="phone" value="{{ old('phone') }}" class="form-control {{ $errors->has('phone') ? ' is-invalid' : '' }}">
                                            @if ($errors->has('phone'))
                                                <span class="invalid-feedback1 pl-2 pt-2 text-danger" role="alert">
                                                    <strong>{{ $errors->first('phone') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="bio" class="col-md-4 col-form-label text-md-right">{{ __('Bio/Description') }}</label>

                                    <div class="col-md-6">
                                        <textarea class="form-control {{ $errors->has('bio') ? ' is-invalid' : '' }}" id="bio" name="bio" value="{{ old('bio') }}" rows="3"></textarea>
                                        @if ($errors->has('bio'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('bio') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-md-6 offset-md-4">
                                        <div class="custom-file" id="customFile" lang="es">
                                            <input type="file" class="custom-file-input {{ $errors->has('photo') ? ' is-invalid' : '' }}" id="photo" name="photo" value="{{ old('photo') }}" aria-describedby="fileHelp">
                                            <label class="custom-file-label" for="photo">
                                                Choose photo i.e logo...
                                            </label>

                                            @if ($errors->has('photo'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('photo') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group row">

                                    <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Country') }}</label>

                                    <div class="col-md-6">
                                        <select class="selectpicker countrypicker {{ $errors->has('country') ? ' is-invalid' : '' }}" name="country" value="{{ old('country') }}"
                                                data-live-search="true"
                                                data-default="Kenya"
                                                data-flag="true">
                                        </select>

                                        @if ($errors->has('country'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('country') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group row mb-0">
                                    <div class="col-md-6 offset-md-4">
                                        <button type="submit" class="btn btn-primary">
                                            {{ __('Add') }}
                                        </button>
                                    </div>
                                </div>
                            </form>

                        </div>
                    </div>

                </div>

            </div>

        </div>
    </div> --> --}}

</div>

@endsection
