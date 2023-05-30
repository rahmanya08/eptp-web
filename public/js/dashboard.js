const allSideMenu = document.querySelectorAll('#sidebar .side-menu.top li a');

allSideMenu.forEach(item=> {
	const li = item.parentElement;
	
  item.addEventListener('click', function () {
		allSideMenu.forEach(i=> {
			i.parentElement.classList.remove('active');
		})
		li.classList.add('active');
	})

});


//TOGGLE SIDEBAR

const menuBar = document.querySelector('#content nav .bx.bx-menu');
const sideBar = document.getElementById('sidebar');

menuBar.addEventListener('click', function () {
	sideBar.classList.toggle('hide');
})


const searchButton = document.querySelector('#content nav form .form-input button');
const searchButtonIcon = document.querySelector('#content nav form .form-input button .bx');
const searchForm= document.querySelector('#content nav form');

searchButton.addEventListener('click', function (e) {
	if(window.innerWidth < 576) {
		e.preventDefault();
		searchForm.classList.toggle('show');
		if(searchForm.classList.contains('show')) {
			searchButtonIcon.classList.replace('bx-search','bx-x');
		} else {
			searchButtonIcon.classList.replace('bx-x','bx-search');
		}
	}

})

if(window.innerWidth < 768 ) {
	sideBar.classList.add('hide');	
} else if (window.innerWidth > 576) {
	searchButtonIcon.classList.replace('bx-x','bx-search');
	searchForm.classList.remove('show');
}

window.addEventListener('resize', function () {
	if(this.innerWidth > 576 ) {
		searchButtonIcon.classList.replace('bx-x','bx-search');
		searchForm.classList.remove('show');
	}
})

//PROGRESS BAR

//Profile Picture
let profilepic = document.getElementById("profile");
let inputpic = document.getElementById("file");

inputpic.onchange = function(){
    profilepic.src = URL.createObjectURL(inputpic.files[0]);
}

//Status Input
const roleSelect = document.querySelector("#roleSelect");
const studentFields = document.querySelectorAll(".student-fields");

roleSelect.addEventListener("change", function () {
    if (roleSelect.value === "1")
        studentFields.forEach((el) => el.classList.remove("hidden"));
    else studentFields.forEach((el) => el.classList.add("hidden"));
});

const name = document.querySelector('#name');

name.addEventListener('change', function(){
	fetch('/menu-identity')
	.then(response => response.json())
	.then(data => name.value = data.name)
});