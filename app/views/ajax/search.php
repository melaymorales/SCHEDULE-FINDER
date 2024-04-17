
<script src="https://cdn.jsdelivr.net/npm/lodash@4.17.21/lodash.min.js"></script>

<script>
$(document).ready(function(){

    function debounce(func, wait) {
        let timeout;
        return function executedFunction(...args) {
            const later = () => {
                clearTimeout(timeout);
                func(...args);
            };
            clearTimeout(timeout);
            timeout = setTimeout(later, wait);
        };
    }


    const debouncedAjaxRequest_year = debounce(function(selectedItem, getcourse) {
        $.ajax({
            method: 'POST',
            url: '../app/views/ajax/retrieveData.php',
            data: {
                course_year:true,
                item: selectedItem,
                course: getcourse
            },
            success: function(response) {
                $("#showdata").html(response);
            }
        });
    }, 0); // 300 milliseconds debounce delay

  
    $('#course_year').on("change", function() {
        var selectedItem = $(this).val();
        var getcourse = document.getElementById('getCourse').value;
        debouncedAjaxRequest_year(selectedItem, getcourse);
    });

    const debouncedAjaxRequest_student_year = debounce(function(selectedItem,getcourse,getsection) {
        $.ajax({
            method: 'POST',
            url: '../app/views/ajax/retrieveData.php',
            data: {
                student_year: true,
                item: selectedItem,
                course: getcourse,
                section: getsection
            },
            success: function(response) {
                $("#showdata_student").html(response);
            }
        });
    }, 0); // 300 milliseconds debounce delay

    // Bind ng debounce function sa keyup event ng #getCourse input field
    $('#student_year').on("change", function() {
            var selectedItem = $(this).val();
            var getcourse = document.getElementById('getStudent').value;
            var getsection= document.getElementById('student_section').value;
        debouncedAjaxRequest_student_year(selectedItem,getcourse,getsection);
    });

    const debouncedAjaxRequest_student_section = debounce(function(selectedItem,getcourse,getyear) {
        $.ajax({
            method: 'POST',
            url: '../app/views/ajax/retrieveData.php',
            data: {
                student_section: true,
                item: selectedItem,
                course: getcourse,
                year: getyear
                
            },
            success: function(response) {
                $("#showdata_student").html(response);
            }
        });
    }, 0); // 300 milliseconds debounce delay

    // Bind ng debounce function sa keyup event ng #getCourse input field
    $('#student_section').on("change", function() {

            var selectedItem = $(this).val();
            var getcourse = document.getElementById('getStudent').value;
            var getyear= document.getElementById('student_year').value;


        debouncedAjaxRequest_student_section(selectedItem,getcourse,getyear);
    });
  

 });



</script>


<script>
$(document).ready(function(){

        function debounce(func, wait) {
        let timeout;
        return function executedFunction(...args) {
            const later = () => {
                clearTimeout(timeout);
                func(...args);
            };
            clearTimeout(timeout);
            timeout = setTimeout(later, wait);
        };
    }

// Gumawa ng debounce function para sa AJAX request
    const debouncedAjaxRequest = debounce(function(getName, getYear) {
        $.ajax({
            method: 'POST',
            url: '../app/views/ajax/retrieveData.php',
            data: {
                view_course:true,
                names: getName,
                year: getYear
            },
            success: function(response) {
                $("#showdata").html(response);
            }
        });
    }, 0); // 300 milliseconds debounce delay

    // Bind ng debounce function sa keyup event ng #getCourse input field
    $('#getCourse').on("keyup", function() {
        var getName = $(this).val();
        var getYear = document.getElementById('course_year').value;
        debouncedAjaxRequest(getName, getYear);
    });

    const debouncedAjaxRequest_teacher = debounce(function(getName, getYear) {
        $.ajax({
            method: 'POST',
            url: '../app/views/ajax/retrieveData.php',
            data: {
                view_teacher:true,
                names:getName,
            },
            success: function(response) {
                $("#showdata_teacher").html(response);
            }
        });
    }, 0); // 300 milliseconds debounce delay

    // Bind ng debounce function sa keyup event ng #getCourse input field
    $('#getTeacher').on("keyup", function() {
        var getName = $(this).val();
        debouncedAjaxRequest_teacher(getName);
    });

    const debouncedAjaxRequest_student = debounce(function(getName,getyear,getsection) {
        $.ajax({
            method: 'POST',
            url: '../app/views/ajax/retrieveData.php',
            data: {
                view_student:true,
                names:getName,
                year: getyear,
                section:getsection
            },
            success: function(response) {
                $("#showdata_student").html(response);
            }
        });
    }, 300); // 300 milliseconds debounce delay

    $('#getStudent').on("keyup", function() {
 
            var getName = $(this).val();
            var getyear= document.getElementById('student_year').value;
            var getsection= document.getElementById('student_section').value;

            debouncedAjaxRequest_student(getName,getyear,getsection);
    });

});
</script>

