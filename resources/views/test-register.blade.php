<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <title>Registration</title>
</head>
<body>
   
    <div class="container">
        <div class="indicator">
            <span class="line"><span></span></span>
            <p class="active">1</p>
            <p>2</p>
            <p>3</p>
            <p>4</p>
        </div>
        @csrf
        <form action="#">
            <div class="tab show">
                <h1>Profile Infromation</h1>
                <p>fill out a few details to start registration the test</p>
                <div class="form">
                    <label for="name" class="form-label">Full Name</label>
                    <input type="text" name="fullname" placeholder="Full Name">
                </div>
                <div class="row form">
                        <div class="col">
                          <label for="gender" class="form-label">Gender</label>
                          <input class="form-check-input" type="radio" name="malerad" id="inlineRadio1" value="male">
                          <label class="form-check-label" for="inlineRadio1">Male</label>
                          <input class="form-check-input" type="radio" name="femalerad" id="inlineRadio2" value="female">
                          <label class="form-check-label" for="inlineRadio2">Female</label>   
                        </div>
                        <div class="col">
                          <label for="birth" class="form-label">Date of Birth</label>
                          <input type="date" class="form-control" placeholder="Last name" aria-label="Last name">
                        </div>
                </div>
                <div class="form">
                    <label for="status" class="form-label">Participant Status</label>
                    <select class="form-select" aria-label="Default select example">
                        <option selected>Select Your Status</option>
                        <option value="1">Public</option>
                        <option value="2">Lecturer</option>
                        <option value="3">Employee/Staff</option>
                        <option value="3">Student</option>
                    </select>
                    <select hidden class="form-select" aria-label="Default select example">
                        <option selected>Study Program</option>
                        <option value="1">D3-TI</option>
                        <option value="2">D3-TM</option>
                        <option value="3">D3-TE</option>
                        <option value="3">D4-TPPL</option>
                    </select>
                    <select hidden class="form-select" aria-label="Default select example">
                        <option selected>Major</option>
                        <option value="1">T. Infromatika</option>
                        <option value="2">T. Listrik</option>
                        <option value="3">T. Elektro</option>
                        <option value="3">T. Mesin</option>
                    </select>
                    <select hidden class="form-select" aria-label="Default select example">
                        <option selected>Semester</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="3">4</option>
                    </select>
                </div>
                <label for="identity" class="form-label">Identity Type</label>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="ktp" id="inlineRadio1" value="ktp">
                    <label class="form-check-label" for="inlineRadio1">KTP</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="ktm" id="inlineRadio2" value="ktm">
                    <label class="form-check-label" for="inlineRadio2">KTM</label>
                </div>
                <div class="form">
                    <label for="inumber" class="form-label">Identity Number</label>
                    <input type="text" name="inumber" placeholder="Number of Identity">
                </div>
                <h1>Contact</h1>
                <div class="form">
                    <label for="address" class="form-label">Address</label>
                    <input type="text-area" name="address" placeholder="Address">
                </div>
                <div class="form">
                    <label for="phonenum" class="form-label">Phone Number</label>
                    <input type="text" name="phonenum" placeholder="Phone Number">
                </div>
            </div>
            <div class="tab">
                <h1>Test Details</h1>
                <div class="form">
                    <label for="type" class="form-label">Test Type</label>
                    <select class="form-select" aria-label="Default select example">
                        <option selected>Choose Test</option>
                        <option value="1">TOEFL</option>
                        <option value="2">TOEIC</option>
                    </select>
                </div>
                <div class="form">
                    <label for="schedule" class="form-label">Schedule</label>
                    <select class="form-select" aria-label="Default select example">
                        <option selected>Choose Test</option>
                        <option value="1">Jadwal 1</option>
                        <option value="2">Jadwal 2</option>
                        <option value="2">Jadwal 3</option>
                    </select>
                </div>
            </div>
            <div class="tab">
                <h1>Payment</h1>
                <div class="form">
                    <input type="file" name="payment" placeholder="Payment" accept="image/jpg,image/png,image/jpeg">
                </div>
            </div>
            <div class="tab view">
                <h1>Test Regulation</h1>
                <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. 
                    Aliquam non minus laudantium quae. 
                    Cupiditate et reiciendis libero officia quia, 
                    rem quo modi dolorem totam officiis labore, 
                    tempore perspiciatis quas aspernatur. Lorem, 
                    ipsum dolor sit amet consectetur adipisicing elit. 
                    Perspiciatis reiciendis inventore odio maiores dolorem quos possimus, 
                    aperiam aspernatur illo rem, itaque dolores ipsum labore eaque debitis,
                    tenetur facere assumenda quam?
                </p> 
                <div>
                    <input type="checkbox" name="accept" id="accept">
                    <label for="check-label">I'll accept the regulation</label>
                </div>
            </div>

            <div class="btn">
                <button type="button" class="back">Back</button>
                <button type="button" class="next">Next</a></button>
            </div>
        </form>
    </div>


    <script src="{{ asset('js/register.js') }}"></script>
</body>
</html>