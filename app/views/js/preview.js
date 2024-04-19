
$(document).ready(function() {

    document.getElementById('import_file').addEventListener('change', function(e) {

        var option = document.querySelector('input[name="import"]:checked').value;
        var file = e.target.files[0];

        if(option == "option1"){
  
            document.getElementById('c1').innerHTML="COURSE/STRAND";
            document.getElementById('c2').innerHTML="ACRONYM";
            document.getElementById('c3').innerHTML="YEAR";
            document.getElementById('c4').innerHTML="SECTION";
            document.getElementById('image').style.display="none";
            document.getElementById('c5').style.display="none";
          
    
        var reader = new FileReader();
    
        reader.onload = function(e) {
            var data = new Uint8Array(e.target.result);
            var workbook = XLSX.read(data, { type: 'array' });
            var sheet_name = workbook.SheetNames[0];
            var sheet = workbook.Sheets[sheet_name];
            var table = XLSX.utils.sheet_to_json(sheet, { header: 1 });
            var rows = '';
    
            for (var i = 1; i <= 5; i++) { 
                if(table[i] != ""){
                rows += '<tr>';

                for (var j = 0; j < 4; j++) { 
                    rows += '<td>' + (table[i][j] || '') + '</td>';
                }
                rows += '</tr>';
              }
            }
    
            document.getElementById('previewRows').innerHTML = rows;
        };
    
        reader.readAsArrayBuffer(file);
        $('#previewModal').modal('show'); 
        
    }else{
      
            document.getElementById('c1').innerHTML="COURSE/STRAND";
            document.getElementById('c2').innerHTML="ACRONYM";
            document.getElementById('c3').innerHTML="YEAR";
            document.getElementById('c4').style.display="show";
            document.getElementById('c4').innerHTML="SECTION";
            document.getElementById('image').style.display="show";
            document.getElementById('image').innerHTML="IMAGE PATHH";
            document.getElementById('c5').style.display="none";
            
            var reader = new FileReader();
    reader.onload = function(e) {
        var data = new Uint8Array(e.target.result);
        var workbook = XLSX.read(data, { type: 'array' });
        var sheet_name = workbook.SheetNames[0];
        var sheet = workbook.Sheets[sheet_name];
        var table = XLSX.utils.sheet_to_json(sheet, { header: 1 });
        var rows = '';
    
        for (var i = 1; i <= 4; i++) { 
            rows += '<tr>';
            for (var j = 0; j < 5; j++) { 
                rows += '<td>' + (table[i][j] || '') + '</td>';
            }
            rows += '</tr>';
        }
    
        document.getElementById('previewRows').innerHTML = rows;
    };
    
    reader.readAsArrayBuffer(file);
    event.preventDefault();
    $('#previewModal').modal('show'); 
    document.getElementById('previewModal').style.display = 'block';
}
    
    
    
    
    });
    
    
    
    document.getElementById('import_file_teacher').addEventListener('change', function(e) {
        
        var option = document.querySelector('input[name="import"]:checked').value;
        var file = e.target.files[0];

        if(option == "option1"){

            document.getElementById('image').style.display="none";
            document.getElementById('c1').innerHTML="ID";
            document.getElementById('c2').innerHTML="FIRSTNAME";
            document.getElementById('c3').innerHTML="LASTNAME";
            document.getElementById('c4').style.display="none";
            document.getElementById('c5').style.display="none";
    
        var reader = new FileReader();
    
        reader.onload = function(e) {
            var data = new Uint8Array(e.target.result);
            var workbook = XLSX.read(data, { type: 'array' });
            var sheet_name = workbook.SheetNames[0];
            var sheet = workbook.Sheets[sheet_name];
            var table = XLSX.utils.sheet_to_json(sheet, { header: 1 });
            var rows = '';
    
            for (var i = 1; i <= 2; i++) { 
                if(table[i] != ""){
                rows += '<tr>';
                for (var j = 0; j < 3; j++) {
                    rows += '<td>' + (table[i][j] || '') + '</td>';
                }
                rows += '</tr>';
                }
            }
    
            document.getElementById('previewRows').innerHTML = rows;
        };
    
        reader.readAsArrayBuffer(file);
        $('#previewModal').modal('show'); 
    }else{
            var reader = new FileReader();
            document.getElementById('image').style.display="none";
            document.getElementById('c1').innerHTML="ID";
            document.getElementById('c2').innerHTML="FIRSTNAME";
            document.getElementById('c3').innerHTML="LASTNAME";
            document.getElementById('c4').style.display="show";
            document.getElementById('c4').innerHTML="IMAGE PATH";
            document.getElementById('c5').style.display="none";
       //document.getElementById('image').style.display="show";
    
    reader.onload = function(e) {
        var data = new Uint8Array(e.target.result);
        var workbook = XLSX.read(data, { type: 'array' });
        var sheet_name = workbook.SheetNames[0];
        var sheet = workbook.Sheets[sheet_name];
        var table = XLSX.utils.sheet_to_json(sheet, { header: 1 });
        var rows = '';
    
        for (var i = 1; i <= 4; i++) { 
            if(table[i] != ""){
                rows += '<tr>';
                for (var j = 0; j < 4; j++) { 
                    rows += '<td>' + (table[i][j] || '') + '</td>';
                }
                rows += '</tr>';
            }
        }
    
        document.getElementById('previewRows').innerHTML = rows;
    };
    
    reader.readAsArrayBuffer(file);

    $('#previewModal').modal('show'); 
  
    }
    
    
    
    
    });
    
    document.getElementById('import_file_student').addEventListener('change', function(e) {
        var file = e.target.files[0];
    
        // Check if a file is selected
        if (file) {

           document.getElementById('c1').innerHTML="ID";
        document.getElementById('c2').innerHTML="FIRSTNAME";
        document.getElementById('c3').innerHTML="LASTNAME";
        document.getElementById('c4').style.display="show";
        document.getElementById('c4').innerHTML="COURSE";
        document.getElementById('image').style.display="show";
        document.getElementById('image').innerHTML="YEAR";
        document.getElementById('c5').style.display="show";
        document.getElementById('c5').innerHTML="SECTION";
        
            var reader = new FileReader();
    
            reader.onload = function(e) {
                var data = new Uint8Array(e.target.result);
                var workbook = XLSX.read(data, { type: 'array' });
                var sheet_name = workbook.SheetNames[0];
                var sheet = workbook.Sheets[sheet_name];
                var table = XLSX.utils.sheet_to_json(sheet, { header: 1 });
                var rows = '';
    
                for (var i = 1; i <= 4; i++) {
                    if (table[i] && table[i] !== "") { // Check if row exists and is not empty
                        rows += '<tr>';
                        for (var j = 0; j < 6; j++) {
                            rows += '<td>' + (table[i][j] || '') + '</td>';
                        }
                        rows += '</tr>';
                    }
                }
    
                document.getElementById('previewRows').innerHTML = rows;
            };
    
            reader.readAsArrayBuffer(file);
            $('#previewModal').modal('show');
        } else {
            // Handle case where no file is selected
            console.log('No file selected.');
        }
    });
    
});
    

    
    