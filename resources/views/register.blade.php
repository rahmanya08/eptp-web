<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/style.css">
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
        <form action="#">
            <div class="tab show">
                <h1>Personal</h1>
                <p>Please fill in your information</p>
                <div class="form">
                    <input type="text" placeholder="Full Name">
                </div>
                <div class="form">
                    <label for="birth">Date of Birth</label>
                    <input type="date" placeholder="">
                </div>
                <div class="form">
                    <label for="gender">Gender</label>
                    <select class="dropdn">
                        <option disabled selected value></option>
                        <option>Male</option>
                        <option>Female</option>
                    </select>
                </div>
                <div class="form ">
                    <label for="status">Participant Status</label>
                    <select class="dropdn">
                        <option disabled selected value> </option>
                        <option>Public</option>
                        <option>Student</option>
                        <option>Lecture</option>
                    </select>
                </div>
                <div class="form ">
                    <label for="identity">Identity Type</label>
                    <select class="dropdn">
                        <option disabled selected value></option>
                        <option>KTP</option>
                        <option>KTM</option>
                    </select>
                </div>
                <div class="form">
                    <input type="number" placeholder="Number of Identity">
                </div>
                <h1>Contact</h1>
                <div class="form">
                    <input type="text-area" placeholder="Address">
                </div>
                <div class="form">
                    <input type="text" placeholder="Phone Number">
                </div>
            </div>
            <div class="tab">
                <h1>Test Details</h1>
                <div class="form">
                    <label for="type">Test Type</label>
                    <select class="dropdn">
                        <option disabled selected value></option>
                        <option>TOEFL</option>
                        <option>TOEIC</option>
                    </select>
                </div>
                <div class="form">
                    <label for="schedule">Schedule</label>
                    <select class="dropdn">
                        <option disabled selected value></option>
                        <option>How to input schedule</option>
                    </select>
                </div>
            </div>
            <div class="tab">
                <h1>Payment</h1>
                <div class="form">
                    <input type="file" placeholder="Payment" accept=".jpg, .png, .jpeg, .bmp|image/*">
                </div>
            </div>
            <div class="tab view">
                <h1>Test Card</h1>
                <div class="form">
                    <input type="text" placeholder="Full Name" readonly>
                </div>
                <div class="form">
                    <input type="date" placeholder="Birth Date" readonly>
                </div>
                <div class="form">
                    <input type="text" placeholder="Gender" readonly>
                </div>
                <div class="form">
                    <input type="text" placeholder="Participant Status" readonly>
                </div>
                <div class="form">
                    <input type="text" placeholder="Identity Type" readonly>
                </div>
                <div class="form">
                    <input type="text" placeholder="Identity Number" readonly>
                </div>
                <div class="form">
                    <input type="text" placeholder="Address" readonly>
                </div>
                <div class="form">
                    <input type="text" placeholder="Phone Number" readonly>
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


    <script src="js/register.js"></script>
</body>
</html>