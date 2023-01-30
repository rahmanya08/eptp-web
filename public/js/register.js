const btnNext = document.querySelector("form .btn .next");
const btnBack = document.querySelector("form .btn .back");
const indicator = document.querySelector(".indicator .line span");
const indicatorItems = document.querySelectorAll(".indicator p");
const form = document.querySelector("form");
const allTab = document.querySelectorAll("form .tab");
const filebtn = document.getElementById("file");
const customBtn = document.getElementById("upload-btn");
const customTxt = document.getElementById("custom-msg");
const imgArea = document.querySelector(".img-area");
var checkBox = document.getElementById("accept");
let i = 0;

allTab[i].classList.add("show");
indicator.style.width = i;
indicatorItems[i].classList.add("active");

if (i === 0) {
    btnBack.style.display = "none";
} else {
    btnBack.style.display = "block";
}

btnNext.addEventListener("click", function () {
    const allInputPerTab = allTab[i].querySelectorAll("input");
    for (let j = 0; j < allInputPerTab.length; j++) {
        allInputPerTab[j].addEventListener("input", function () {
            allInputPerTab[j].style.borderColor = "#ddd";
        });

        if (
            allInputPerTab[j].value === "" ||
            !allInputPerTab[j].checkValidity()
        ) {
            allInputPerTab[j].style.borderColor = "red";
            return false;
        } else {
            allInputPerTab[j].style.borderColor = "#ddd";
        }
    }

    i += 1;

    if (i >= allTab.length) {
        form.submit();
        return false;
    } else {
        for (let j = 0; j < allTab.length; j++) {
            allTab[j].classList.remove("show");
            indicatorItems[j].classList.remove("active");
        }

        for (let j = 0; j < i; j++) {
            indicatorItems[j].classList.add("active");
        }

        allTab[i].classList.add("show");
        indicator.style.width = "${i * 50}%";
        indicatorItems[i].classList.add("active");
    }
    if (i === 0) {
        btnBack.style.display = "none";
    } else {
        btnBack.style.display = "block";
    }

    if (i === allTab.length - 1) {
        btnNext.innerHTML = "Submit";
    } else {
        btnNext.innerHTML = "Next";
    }
});

btnBack.addEventListener("click", function () {
    i -= 1;

    for (let j = 0; j < allTab.length; j++) {
        allTab[j].classList.remove("show");
        indicatorItems[j].classList.remove("active");
    }

    for (let j = 0; j < i; j++) {
        indicatorItems[j].classList.add("active");
    }

    allTab[i].classList.add("show");
    indicator.style.width = "${i * 50}%";
    indicatorItems[i].classList.add("active");

    if (i === 0) {
        btnBack.style.display = "none";
    } else {
        btnBack.style.display = "block";
    }

    if (i === allTab.length - 1) {
        btnNext.innerHTML = "Submit";
    } else {
        btnNext.innerHTML = "Next";
    }
});

customBtn.addEventListener("click", function () {
    filebtn.click();
});

filebtn.addEventListener("change", function () {
    if (filebtn.value) {
        const image = this.files[0];
        console.log(image);
        const reader = new FileReader();
        reader.onload = () => {
            const imgUrl = reader.result;
            const img = document.createElement("img");
            img.src = imgUrl;
            imgArea.appendChild(img);
        };
        reader.readAsDataURL(image);

        customTxt.innerHTML = filebtn.value.match(
            /[\/\\]([\w\d\s\.\-\(\)]+)$/
        )[1];
    } else {
        customTxt.innerHTML = "No File Chosen";
    }
});

checkBox.onchange = function () {
    if (this.checked) {
        btnNext.innerHTML = "Submit";
        btnNext.disabled = false;
    } else {
        btnNext.innerHTML = "Submit";
        btnNext.disabled = true;
    }
};

const roleSelect = document.querySelector("#roleSelect");
const studentFields = document.querySelectorAll(".student-fields");
roleSelect.addEventListener("change", function () {
    if (roleSelect.value === "4")
        studentFields.forEach((el) => el.classList.remove("hidden"));
    else studentFields.forEach((el) => el.classList.add("hidden"));
});
