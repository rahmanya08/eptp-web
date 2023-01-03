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
                <h1>Personal</h1>
                <p>Please fill in your information</p>
                <div class="form">
                    <label for="name" class="form-label">Full Name</label>
                    <input type="text" name="fullname" placeholder="Full Name">
                </div>
                <div class="form">
                    <label for="birth" class="form-label">Date of Birth</label>
                    <input type="date" name="birth" placeholder="">
                </div>
                    <label for="gender" class="form-gender">Gender</label>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="malerad" id="inlineRadio1" value="male">
                        <label class="form-check-label" for="inlineRadio1">Male</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="femalerad" id="inlineRadio2" value="female">
                        <label class="form-check-label" for="inlineRadio2">Female</label>
                    </div>
                <div class="form ">
                    <label for="status" class="form-label">Participant Status</label>
                    <select class="form-select" aria-label="Default select example">
                        <option selected>Select Your Status</option>
                        <option value="1">Public</option>
                        <option value="2">Lecturer</option>
                        <option value="3">Employee/Staff</option>
                        <option value="3">Student</option>
                    </select>
                </div>
                <label for="identity" class="form-identity">Identity Type</label>
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
                    <input type="number" name="inumber" placeholder="Number of Identity">
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
                <h1>Test Card</h1>
                <div class="form">
                    <label for="name" class="form-label">Full Name</label>
                    <input type="text" name="fullname"  placeholder="Full Name" readonly>
                </div>
                <div class="form">
                    <label for="name" class="form-label">Birth Date</label>
                    <input type="date" name="birthdate" placeholder="Birth Date" readonly>
                </div>
                <div class="form">
                    <label for="name" class="form-label">Gender</label>
                    <input type="text" name="gender" placeholder="Gender" readonly>
                </div>
                <div class="form">
                    <label for="name" class="form-label">Participant Status</label>
                    <input type="text" name="status" placeholder="Participant Status" readonly>
                </div>
                <div class="form">
                    <label for="name" class="form-label">Identity Type</label>
                    <input type="text" name="itype" placeholder="Identity Type" readonly>
                </div>
                <div class="form">
                    <label for="name" class="form-label">Identity Number</label>
                    <input type="text" name="inum" placeholder="Identity Number" readonly>
                </div>
                <div class="form">
                    <label for="name" class="form-label">Address</label>
                    <input type="text" name="address" placeholder="Address" readonly>
                </div>
                <div class="form">
                    <label for="name" class="form-label">Phone Number</label>
                    <input type="text" name="phonenum" placeholder="Phone Number" readonly>
                </div>
                <div class="form">
                    <label for="payment">Payment</label>
                    <p>Payed</p>
                </div>
                <div class="download">
                    <button type="button">Download</button>
                </div>
            </div>
            <div class="btn">
                <button type="button" class="back">Back</button>
                <button type="button" class="next">Next</button>
            </div>
        </form>
    </div>


    <script src="{{ asset('js/register.js') }}"></script>
</body>
</html>