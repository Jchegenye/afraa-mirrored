@extends('layouts.app')

@section('title', 'Edit Profile')

@section('content')

{{-- <div class="row">
    <div class="col-md-12">
        <h3 class="page-header">Edit</h3>
    </div>
</div> --}}

<div class="row">
    @if (session('warning'))
        <div class="alert alert-warning">
            {{ session('warning') }}
        </div>
    @endif

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @php
        foreach ($user_by_id as $user){
            $user_id = $user->uid;
        }

        foreach ($session as $sessions){
            //$sessions->uid
            if ($sessions->uid === $user_id){
               // echo "is speaker";
            }
        }

    @endphp
</div>


<div id="adminTable">
    <div class="table_header ">
        <div class="row ">
            <div class="col-md-4">
                <div class="mx-auto mt-2 intro1">
                    <h6 class="text-capitalize">Edit</h6>
                </div>
            </div>

            <div class="col-md-8">
                <div class="row">
                    <div class="col-md-12 text-right">
                        <a href="{{url()->previous()}}" class="btn btn-afraa tb-sm-text">
                            <i class="fas fa-arrow-left pr-2"></i> Back
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="table_body ">

        <form enctype='multipart/form-data' class="" method="post" action="{{action('Users\UsersController@update', $user_id)}}">
            @csrf

            <input name="_method" type="hidden" value="PATCH">

            <div class="row">

                <div class="col-md-12 form-group">
                    <label for="photo" class="col-form-label text-md-right">{{ __('Company Name:') }}</label>
                    <input type="text" class="form-control" name="Company_Name" value="@isset($user->Company_Name) {{ $user->Company_Name}} @endisset">
                </div>

                {{-- Start of Delegate Details --}}
                    <div class="col-md-12 form-group mt-3 mt-1">
                        <h4>Delegate Details</h4>
                    </div>
                    <div class="col-md-6 form-group ">
                        <label for="your_title" class="col-form-label text-md-right">{{ __('Your Title:') }}</label>

                        <select name="your_title" class="form-control">
                            <option value="" @if ($user->your_title=="") selected @endif>Choose Option</option>
                            <option value="Mr." @if ($user->your_title=="Mr.") selected @endif>Mr.</option>
                            <option value="Mrs." @if ($user->your_title=="Mrs.") selected @endif>Mrs.</option>
                            <option value="Dr." @if ($user->your_title=="Dr.") selected @endif>Dr.</option>
                            <option value="Prof." @if ($user->your_title=="Prof.") selected @endif>Prof.</option>
                            <option value="Ms." @if ($user->name=="Ms.") selected @endif>Ms.</option>
                            <option value="Miss" @if ($user->your_title=="Miss") selected @endif>Miss</option>
                        </select>

                    </div>
                    <div class="col-md-6 form-group ">
                        <label for="fullname" class="col-form-label text-md-right">{{ __('Full Name:') }}</label>
                        <input type="text" class="form-control" name="fullname" value="{{$user->name}}">
                    </div>
                    <div class="col-md-6 form-group ">
                        <label for="Job_Title" class="col-form-label text-md-right">{{ __('Job Title:') }}</label>
                        <input type="text" class="form-control" name="Job_Title" value="@isset($user->Job_Title) {{$user->Job_Title}} @endisset">
                    </div>
                    <div class="col-md-6 form-group">
                        <label for="bio" class="col-form-label text-md-right">{{ __('Bio:') }}</label>
                        <textarea class="form-control" name="bio" rows="5">{{$user->bio}}</textarea>
                    </div>
                    <div class="col-md-6 form-group ">
                        <label for="photo" class="col-form-label text-md-right">{{ __('Profile Picture:') }}</label>
                        <div class="custom-file" id="customFile" lang="es">
                            <input type="file" class="form-control custom-file-input {{ $errors->has('photo') ? ' is-invalid' : '' }}" id="photo" name="photo" value="{{ old('photo') }}" aria-describedby="fileHelp">
                            <label class="custom-file-label" for="photo">
                                Choose photo i.e logo...
                            </label>
                        </div>
                    </div>
                {{-- End of Delegate Details --}}

                {{-- Start of Delegate Type --}}
                    <div class="col-md-12 form-group mt-5 mt-1">
                        <h4>Delegate Type</h4>
                    </div>
                    <div class="col-md-4 form-group ">
                        <div class="form-group">
                            <label for="Member_Airline" class="col-form-label text-md-right">{{ __('Member Airline:') }}</label>

                            <select name="Member_Airline" id="Member_Airline" size="1" class="form-control" title="" style="" data-load-state="" data-tooltip="If you are a member airline, please select your airline">
                                <option value="@isset($user->Member_Airline) {{$user->Member_Airline}} @endisset" selected>@isset($user->Member_Airline) {{$user->Member_Airline}} @else Choose Option  @endisset</option>
                                <option value="AB Aviation">AB Aviation</option>
                                <option value="Afriqiyah Airways">Afriqiyah Airways</option>
                                <option value="Air Algerie">Air Algerie</option>
                                <option value="Air Botswana">Air Botswana</option>
                                <option value="Air Burkina">Air Burkina</option>
                                <option value="Air Madagsacar">Air Madagsacar</option>
                                <option value="Air Mauritius">Air Mauritius</option>
                                <option value="Air Namibia">Air Namibia</option>
                                <option value="Air Zimbabwe">Air Zimbabwe</option>
                                <option value="ASKY Airlines">ASKY Airlines</option>
                                <option value="Astral Aviation">Astral Aviation</option>
                                <option value="Air Tanzania">Air Tanzania</option>
                                <option value="Allied Air Ltd">Allied Air Ltd</option>
                                <option value="Badr Airlines">Badr Airlines</option>
                                <option value="Camair-Co">Camair-Co</option>
                                <option value="Ceiba Intercontinental Airlines">Ceiba Intercontinental Airlines</option>
                                <option value="Congo Airways">Congo Airways</option>
                                <option value="Cronos Airlines">Cronos Airlines</option>
                                <option value="EgyptAir">EgyptAir</option>
                                <option value="Ethiopian Airlines">Ethiopian Airlines</option>
                                <option value="Express Air Cargo">Express Air Cargo</option>
                                <option value="Jubba Airways">Jubba Airways</option>
                                <option value="Kenya Airways">Kenya Airways</option>
                                <option value="LAM Mozambique Airlines">LAM Mozambique Airlines</option>
                                <option value="Libyan Airlines">Libyan Airlines</option>
                                <option value="Mauritania Airlines International">Mauritania Airlines International</option>
                                <option value="Nile Air">Nile Air</option>
                                <option value="Nouvelair Tunisie">Nouvelair Tunisie</option>
                                <option value="PrecisionAir">PrecisionAir</option>
                                <option value="Punto Azul">Punto Azul</option>
                                <option value="Royal Air Maroc">Royal Air Maroc</option>
                                <option value="RwandAir">RwandAir</option>
                                <option value="Safe Air Company Ltd">Safe Air Company Ltd</option>
                                <option value="South African Express">South African Express</option>
                                <option value="South African Airways">South African Airways</option>
                                <option value="Starbow">Starbow</option>
                                <option value="Sudan Airways">Sudan Airways</option>
                                <option value="TAAG Angola Airlines">TAAG Angola Airlines</option>
                                <option value="TACV Cabo Verde Airlines">TACV Cabo Verde Airlines</option>
                                <option value="Tassili Airlines">Tassili Airlines</option>
                                <option value="Timbis Air">Timbis Air</option>
                                <option value="Tunisair">Tunisair</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-4 form-group ">
                        <label for="AFRAA_Partner" class="col-form-label text-md-right">{{ __('AFRAA Partner:') }}</label>
                        <select name="AFRAA_Partner" id="AFRAA_Partner" size="1" class="form-control" data-load-state="" data-tooltip="If you are you an AFRAA Partner, please choose your organization">
                            <option value="@isset($user->AFRAA_Partner) {{$user->AFRAA_Partner}} @endisset">@isset($user->AFRAA_Partner) {{$user->AFRAA_Partner}} @else Choose Option @endisset </option>
                            <option value="Accelya">Accelya</option>
                            <option value="Aero Industrial Sales">Aero Industrial Sales</option>
                            <option value="Airbus">Airbus</option>
                            <option value="Amadeus">Amadeus</option>
                            <option value="American General Supplies">American General Supplies</option>
                            <option value="APG">APG</option>
                            <option value="ATR">ATR</option>
                            <option value="ATPCO">ATPCO</option>
                            <option value="Aurora Aviation">Aurora Aviation</option>
                            <option value="Boeing">Boeing</option>
                            <option value="Bombardier">Bombardier</option>
                            <option value="Cellpoint Mobile">Cellpoint Mobile</option>
                            <option value="CHAMP Cargosystems">CHAMP Cargosystems</option>
                            <option value="CFM">CFM</option>
                            <option value="Clairity">Clairity</option>
                            <option value="Derichebourg Atis Aeronautique">Derichebourg Atis Aeronautique</option>
                            <option value="Embraer">Embraer</option>
                            <option value="GE Aviation">GE Aviation</option>
                            <option value="Hahn Air">Hahn Air</option>
                            <option value="Jardine Lloyd Thomson ( JLT ) Insurance Brokers">Jardine Lloyd Thomson ( JLT ) Insurance Brokers</option>
                            <option value="Lufthansa Consulting">Lufthansa Consulting</option>
                            <option value="Lufthansa Systems">Lufthansa Systems</option>
                            <option value="Marsh Limited">Marsh Limited</option>
                            <option value="Milanamos">Milanamos</option>
                            <option value="Mitsubishi Aircraft">Mitsubishi Aircraft</option>
                            <option value="MTU Maintenance">MTU Maintenance</option>
                            <option value="OAG Aviation">OAG Aviation</option>
                            <option value="Pratt &amp; Whitney">Pratt &amp; Whitney</option>
                            <option value="Palma Holding">Palma Holding</option>
                            <option value="Poulina Group Holding">Poulina Group Holding</option>
                            <option value="Rockwell Collins">Rockwell Collins</option>
                            <option value="Rolls Royce">Rolls Royce</option>
                            <option value="Sabre Airline Solutions">Sabre Airline Solutions</option>
                            <option value="Seabury">Seabury</option>
                            <option value="SITA">SITA</option>
                            <option value="Star Oil">Star Oil</option>
                            <option value="US Aviation Services">US Aviation Services</option>
                            <option value="V1 Aviation Services">V1 Aviation Services</option>
                            <option value="Wirecard">Wirecard</option>
                        </select>
                    </div>
                    <div class="col-md-4 form-group ">
                        <label for="other" class="col-form-label text-md-right">{{ __('Other:') }}</label>
                        <input type="text" class="form-control" name="other" value="@isset($user->other) {{$user->other}} @endisset">
                    </div>
                    <div class="col-md-6 form-group">
                        <label for="country" class="col-form-label text-md-right">{{ __('Nationality:') }}</label>
                        {{-- <input type="text" class="form-control" name="country" value="{{$user->country}}"> --}}
                        <select name="country" id="country" class="form-control">
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
                    </div>
                    <div class="col-md-6 form-group ">
                        <label for="Passport_Number" class="col-form-label text-md-right">{{ __('Passport Number:') }}</label>
                        <input type="text" class="form-control" name="Passport_Number" value="@isset($user->Passport_Number) {{$user->Passport_Number}} @endisset">
                    </div>
                    <div class="col-md-12 form-group ">
                        <label for="Business_Address" class="col-form-label text-md-right">{{ __('Business Address:') }}</label>
                        <input type="text" class="form-control" name="Business_Address" value="@isset($user->Business_Address) {{$user->Business_Address}} @endisset">
                    </div>
                    <div class="col-md-4 form-group">
                        <label for="phone" class="col-form-label text-md-right">{{ __('Telephone:') }}</label>
                        <input type="tel" class="form-control" name="phone" value="{{$user->phone}}">
                    </div>
                    <div class="col-md-4 form-group ">
                        <label for="fax" class="col-form-label text-md-right">{{ __('Fax:') }}</label>
                        <input type="text" class="form-control" name="fax" value="{{$user->Fax}}">
                    </div>
                    <div class="col-md-4 form-group ">
                        <label for="email" class="col-form-label text-md-right">{{ __('Email:') }}</label>
                        <input type="email" class="form-control" name="email" value="{{$user->email}}">
                    </div>
                    <div class="col-md-6 form-group">
                        <label for="documentation_language" class="col-form-label text-md-right">{{ __('Documentation Language:') }}</label>
                        <select class="form-control" id="documentation_language" name="documentation_language">

                            <option value="French"
                            @if ($user->documentation_language == 'French')
                                selected
                            @endif
                            >French</option>
                            <option value="English"
                            @if ($user->documentation_language == 'English')
                                    selected
                            @endif>English</option>

                        </select>
                    </div>
                {{-- End of Delegate Type --}}

                {{-- Start of Spouse/ Partner Details --}}
                    <div class="col-md-12 form-group mt-5 mt-1">
                        <h4>Spouse/ Partner Details</h4>
                    </div>

                    <div class="col-md-4 form-group ">
                        <label for="Spouse_Name" class="col-form-label text-md-right">{{ __('Spouse Name:') }}</label>
                        <input type="text" class="form-control" name="Spouse_Name" value="@isset($user->Spouse_Name) {{$user->Spouse_Name}} @endisset">
                    </div>
                    <div class="col-md-4 form-group ">
                        <label for="Spouse_Nationality" class="col-form-label text-md-right">{{ __('Spouse Nationality:') }}</label>
                        <input type="text" class="form-control" name="Spouse_Nationality" value="@isset($user->Spouse_Nationality) {{$user->Spouse_Nationality}} @endisset">
                    </div>
                    <div class="col-md-4 form-group ">
                        <label for="Spouse_Passport_Number" class="col-form-label text-md-right">{{ __('Spouse Passport Number:') }}</label>
                        <input type="text" class="form-control" name="Spouse_Passport_Number" value="@isset($user->Spouse_Passport_Number) {{$user->Spouse_Passport_Number}} @endisset">
                    </div>

                {{-- End of Spouse/ Partner Details --}}

                {{-- Start of Flight Details --}}
                    <div class="col-md-12 form-group mt-5 mt-1">
                        <h4>Flight Details</h4>
                        <h6>Arrival</h6>
                    </div>

                    <div class="col-md-4 form-group ">
                        <label for="ArrivalDate" class="col-form-label text-md-right">{{ __('Arrival Date:') }}</label>
                        <input type="text" class="form-control" name="ArrivalDate" value="@isset($user->ArrivalDate) {{$user->ArrivalDate}} @endisset">
                    </div>
                    <div class="col-md-4 form-group ">
                        <label for="FlightNumber" class="col-form-label text-md-right">{{ __('Flight Number:') }}</label>
                        <input type="text" class="form-control" name="FlightNumber" value="@isset($user->FlightNumber) {{$user->FlightNumber}} @endisset">
                    </div>
                    <div class="col-md-4 form-group ">
                        <label for="ArrivalTime" class="col-form-label text-md-right">{{ __('Arrival Time:') }}</label>
                        <input type="text" class="form-control" name="ArrivalTime" value="@isset($user->ArrivalTime) {{$user->ArrivalTime}} @endisset">
                    </div>

                    <div class="col-md-12 form-group mt-3 mt-1">
                        <h6>Departure</h6>
                    </div>

                    <div class="col-md-4 form-group ">
                        <label for="DepartureDate" class="col-form-label text-md-right">{{ __('Departure Date:') }}</label>
                        <input type="text" class="form-control" name="DepartureDate" value="@isset($user->DepartureDate) {{$user->DepartureDate}} @endisset">
                    </div>
                    <div class="col-md-4 form-group ">
                        <label for="DepartureFlightNumber" class="col-form-label text-md-right">{{ __('Departure Flight Number:') }}</label>
                        <input type="text" class="form-control" name="DepartureFlightNumber" value="@isset($user->DepartureFlightNumber) {{$user->DepartureFlightNumber}} @endisset">
                    </div>
                    <div class="col-md-4 form-group ">
                        <label for="DepartureTime" class="col-form-label text-md-right">{{ __('Departure Time:') }}</label>
                        <input type="text" class="form-control" name="DepartureTime" value="@isset($user->DepartureTime) {{$user->DepartureTime}} @endisset">
                    </div>

                {{-- End of Flight Details --}}

                <div class="col-md-12 form-group ">
                    <label for="Social_Functions" class="col-form-label text-md-right">{{ __('Social Functions:') }}</label>
                    {{-- <input type="text" class="form-control" name="Social_Functions" value="@isset($user->Social_Functions) {{$user->Social_Functions}} @endisset"> --}}

                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" id="Social_Functions1" name="Social_Functions[]" value="Delegate Tour (Sun 25 Nov)" {{ old('type', $user->Social_Functions) === 'Delegate Tour (Sun 25 Nov)' ? 'checked' : ''  }}>
                        <label class="custom-control-label" for="Social_Functions1">Delegate Tour (Sun 25 Nov)</label>
                    </div>
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" id="Social_Functions2" name="Social_Functions[]" value="Welcome Cocktail & Dinner (Sun 25 Nov)" {{ old('type', $user->Social_Functions) === 'Welcome Cocktail & Dinner (Sun 25 Nov)' ? 'checked' : ''  }}>
                        <label class="custom-control-label" for="Social_Functions2">Welcome Cocktail & Dinner (Sun 25 Nov)</label>
                    </div>
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" id="Social_Functions3" name="Social_Functions[]" value="Gala Dinner (Mon 26th Nov)" {{ old('type', $user->Social_Functions) === 'Gala Dinner (Mon 26th Nov)' ? 'checked' : ''  }}>
                        <label class="custom-control-label" for="Social_Functions3">Gala Dinner (Mon 26th Nov)</label>
                    </div>
                </div>

                @if(Auth::user()->role == 'admin')
                    <div class="col-md-12 form-group mt-5">
                        <h4>{{ __('Set Delegate as Speaker?') }}</h4>
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="Social_Functions4" name="set_speaker" value="set_speaker">
                            <label class="custom-control-label" for="Social_Functions4"></label>
                        </div>
                    </div>
                    <div class="col-md-12 form-group">
                        <label for="session1" class="col-form-label text-md-right">{{ __('Choose Session:') }}</label>
                        <select class="form-control" id="session1" name="session">
                            @foreach ($session as $sessions)
                                <option value="{{$sessions->id}}">{{$sessions->title}}</option>
                            @endforeach
                        </select>
                        <input type="hidden" name="user_id" value="{{$user_id}}">
                    </div>
                @endif

                {{-- Start of User Information --}}

                    <div class="col-md-12 form-group mt-5 mt-1">
                        <h4>User Information</h4>
                    </div>

                    <div class="col-md-6 form-group ">
                        <label for="photo" class="col-form-label text-md-right">{{ __('Username:') }}</label>
                        <input type="text" class="form-control" name="username" value="{{ old('username') ? old('username') : $user->username }}">
                    </div>
                    <div class="col-md-6 form-group">
                        <label for="password">{{ __('Current Password:') }}</label>
                        <input type="password" class="form-control" name="password" value="" >
                    </div>
                    <div class="col-md-6 form-group">
                        <label for="new_password">{{ __('New Password:') }}</label>
                        <input type="password" class="form-control" name="new_password" value="">
                    </div>

                {{-- Start of User Information --}}

                <div class="col-md-6 form-group mt-3">
                    <button type="submit" class="btn btn-afraa-full-2">
                        {{ __('Update') }}
                    </button>
                </div>

            </div>
        </form>

    </div>

</div>

@endsection
