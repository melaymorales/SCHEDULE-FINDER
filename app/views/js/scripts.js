/*!
* Start Bootstrap - Resume v7.0.6 (https://startbootstrap.com/theme/resume)
* Copyright 2013-2023 Start Bootstrap
* Licensed under MIT (https://github.com/StartBootstrap/startbootstrap-resume/blob/master/LICENSE)
*/
//
// Scripts
// 
window.addEventListener('DOMContentLoaded', event => {

    // Activate Bootstrap scrollspy on the main nav element
    const sideNav = document.body.querySelector('#sideNav');
    if (sideNav) {
        new bootstrap.ScrollSpy(document.body, {
            target: '#sideNav',
            rootMargin: '0px 0px -40%',
        });
    };

    // Collapse responsive navbar when toggler is visible
    const navbarToggler = document.body.querySelector('.navbar-toggler');
    const responsiveNavItems = [].slice.call(
        document.querySelectorAll('#navbarResponsive .nav-link')
    );
    responsiveNavItems.map(function (responsiveNavItem) {
        responsiveNavItem.addEventListener('click', () => {
            if (window.getComputedStyle(navbarToggler).display !== 'none') {
                navbarToggler.click();
            }
        });
    });

});

function removePTag() {
    var inputText = document.getElementById('getCourse').value;
    var paragraph = document.getElementById('page_section');

    if (inputText.trim() !== '') {
        paragraph.style.display = 'none';
    } else {
        paragraph.style.display = 'block';
    }
}

function removePTag_teacher() {
    var inputText = document.getElementById('getTeacher').value;
    var paragraph = document.getElementById('page_section_teacher');

    if (inputText.trim() !== '') {
        paragraph.style.display = 'none';
    } else {
        paragraph.style.display = 'block';
    }
}

function removePTag_student() {
    var inputText = document.getElementById('getStudent').value;
    var paragraph = document.getElementById('page_section_student');

    if (inputText.trim() !== '') {
        paragraph.style.display = 'none';
    } else {
        paragraph.style.display = 'block';
    }
}

window.onload = function() {
    var urlParams = new URLSearchParams(window.location.search);
    if (urlParams.has('page')) {
   
    var table = document.getElementById("myTable");
    table.scrollIntoView({ behavior: 'smooth', block: 'start' });}

//     if (urlParams.has('teacher')) {
   
//    var table = document.getElementById("teacher");
//    table.scrollIntoView({ behavior: 'smooth', block: 'start' });}

   if (urlParams.has('page_teacher')) {
   
   var table = document.getElementById("teacher");
   table.scrollIntoView({ behavior: 'smooth', block: 'start' });}

//    if (urlParams.has('student')) {
   
//    var table = document.getElementById("student");
//    table.scrollIntoView({ behavior: 'smooth', block: 'start' });}

   if (urlParams.has('page_student')) {
   
   var table = document.getElementById("student");
   table.scrollIntoView({ behavior: 'smooth', block: 'start' });}

//    if (urlParams.has('setting')) {
   
//    var table = document.getElementById("setting");
//    table.scrollIntoView({ behavior: 'smooth', block: 'start' });}
   
};



