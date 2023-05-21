@extends('layouts.master-form')

@section('title', 'Registration')

@push('custom-css')
    <link rel="stylesheet" href="{{ asset('css/form-theme.css') }}">
@endpush

@section('main-content')

       
        <div class="header">
            <ul>
                <li class=" active form_1_progressbar">
                    <div>
                        <p>1</p>
                    </div>
                </li>
                <li class="form_2_progressbar">
                    <div>
                        <p>2</p>
                    </div>
                </li>
                <li class="form_3_progressbar">
                    <div>
                        <p>3</p>
                    </div>
                </li>
                <li class="form_4_progressbar">
                    <div>
                        <p>4</p>
                    </div>
                </li>
            </ul>
        </div>
        <div class="form_warp">
            <div class="form_1 data_info">
                <h2>Personal Info</h2>
                <form action="{{ route('test') }}" method="post">
                    @csrf
                    <div class="form_container">
                        @include("partials.up-profile")
                        <div class="input_warp">
                            <label for="full_name">Full Name</label>
                            <input type="text" name="fullname" id="full_name" required value="{{ old('fullname') }}">
                        </div>
                        <div class="row">
                            <div class="col">
                                <label for="gender">Gender</label><br>
                                <div class="radio_btn">
                                    <input type="radio" id="female" name="gender" value="FEMALE">
                                    <label for="female">Female</label>
                                    <input type="radio" id="male" name="gender" value="MALE">
                                    <label for="male">Male</label>
                                </div>
                            </div>
                            <div class="input_warp">
                                <label for="birth_date">Birth Date</label>
                                <input type="date" name="Birth Date" id="birth_date">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <label for="identity">Identity Type</label><br>
                                <div class="radio_btn">
                                    <input type="radio" name="identity" id="ktp" value="KTP">
                                    <label for="ktp">KTP</label>
                                    <input type="radio" name="identity" id="ktm" value="KTM">
                                    <label for="ktm">KTM</label>
                                </div>
                            </div>
                            <div class="input_warp">
                                <label for="id_number">Identity Number</label>
                                <input type="id_number" name="id_number">
                            </div>
                        </div>
                        <div class="input_warp" >
                            <label for="status">Status</label>
                            <select id="roleSelect" aria-label="Default select example">
                                <option selected>Choose Status</option>
                                <option value="1">Students</option>                                        
                                <option value="2">Public</option>
                            </select>
                        </div>
                        {{-- Status --}}
                        <div class="row_status">
                            <div class="col_status">
                                <div class="input_warp hidden student-fields">
                                    <select aria-label="Default select example">
                                        <option selected>Major</option>
                                        <option value="1">T. Infromatika</option>
                                        <option value="2">T. Listrik</option>
                                        <option value="3">T. Elektro</option>
                                        <option value="3">T. Mesin</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col_status">
                                <div class="input_warp hidden student-fields">
                                    <select  aria-label="Default select example">
                                        <option selected>Study Program</option>
                                        <option value="1">D3-TI</option>
                                        <option value="2">D3-TL</option>
                                        <option value="3">D3-TE</option>
                                        <option value="3">D3-TM</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col_status">
                                <div class="input_warp hidden student-fields">
                                    <select aria-label="Default select example">
                                        <option selected>Semester</option>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="3">4</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        {{-- Status --}}
                        <h2>Contact</h2>
                        <div class="input_warp">
                            <label for="address">Address</label>
                            <input type="text-area" name="address" id="address">
                        </div>
                        <div class="input_warp">
                            <label for="phonenum">Phone Number</label>
                            <input type="text" name="phonenum" id="phonenum">
                        </div>
                    </div>
                </form> 
            </div>
            <div class="form_2 data_info" style="display: none">
                <h2>Test Info</h2>
                <form>
                <div class="form_container">
                    <div class="input_warp">
                        <label for="schedule">Schedule</label>
                        <select class="form-select" aria-label="Default select example">
                            <option selected>Choose Schedule</option>
                            <option value="1">January</option>
                            <option value="2">February</option>
                            <option value="2">March</option>
                        </select>
                    </div>
                    <div class="input_warp">
                        <label for="test_type">Test Type</label>
                        <select class="form-select" aria-label="Default select example">
                            <option selected>Choose Test Type</option>
                            <option value="1">TOEFL</option>
                            <option value="2">IBT</option>
                        </select>
                    </div>
                </div>
                </form> 
            </div>
            <div class="form_3 data_info" style="display: none">
                <h2>Payment</h2>
                <form>
                <div class="form_container">
                    <div class="input_warp">
                        <label for="payment">Upload The Receipt</label>
                        <input type="file" name="payment" placeholder="Payment" accept="image/jpg,image/png,image/jpeg">
                    </div>
                </div>
                </form> 
            </div>
            <div class="form_4 data_info" style="display: none">
                <h2>Infromation & Regulation</h2>
                <form>
                <div class="form_container">
                    <p style="text-align: justify">Lorem, ipsum dolor sit amet consectetur adipisicing elit.
                        Aliquam non minus laudantium quae.
                        Cupiditate et reiciendis libero officia quia,
                        rem quo modi dolorem totam officiis labore,
                        tempore perspiciatis quas aspernatur. Lorem,
                        ipsum dolor sit amet consectetur adipisicing elit.
                        Perspiciatis reiciendis inventore odio maiores dolorem quos possimus,
                        aperiam aspernatur illo rem, itaque dolores ipsum labore eaque debitis,
                        tenetur facere assumenda quam?
                    </p>
                    <div class="check_warp">
                        <input type="checkbox" id="accept" onclick="myFunction()">
                        <label for="check_label">I'll accept the regulation</label>
                    </div>
                </div>
                </form> 
            </div>
        </div>
        <div class="btns_warp">
            <div class="common_btns form_1_btns">
                <button type="submit" class="btn_next" onclick="return getData()">Next
                    <span class="icon"><i class='bx bx-right-arrow-alt'></i></span>
                </button>
            </div>
            <div class="common_btns form_2_btns" style="display: none">
                <button type="button" class="btn_back">
                    <span class="icon"><i class='bx bx-arrow-back'></i></span>
                    Back
                </button>
                <button type="button" class="btn_next">Next
                    <span class="icon"><i class='bx bx-right-arrow-alt'></i></span>
                </button>
            </div>
            <div class="common_btns form_3_btns" style="display: none">
                <button type="button" class="btn_back">
                    <span class="icon"><i class='bx bx-arrow-back'></i></span>
                    Back
                </button>
                <button type="button" class="btn_next">Next
                    <span class="icon"><i class='bx bx-right-arrow-alt'></i></span>
                </button>
            </div>
            <div class="common_btns form_4_btns" style="display: none">
                <button type="button" class="btn_back">
                    <span class="icon"><i class='bx bx-arrow-back'></i></span>
                    Back
                </button>
                <button type="button" class="btn_done" id="done_btn" style="display:none">Done
                    <span class="icon"></span>
                </button>
            </div>
        </div>
        <div class="modal_wrapper">
            <div class="shadow"></div>
            <div class="success_warp">
                <span class="modal_icon">
                    <i class='bx bx-check-circle'></i>
                </span>
                <p>Thanks For Registration!</p>
            </div>
        </div>

@endsection

@push('child-js')
    <script src="{{ asset('js/form.js') }}"></script>
@endpush
