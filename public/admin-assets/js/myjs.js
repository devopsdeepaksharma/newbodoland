$(document).ready(function() {
    $('#state').on('change', function() {
        var state_id = this.value;
        $("#city").html('');
        var myurl = "getcityname";
        var csrfToken = $('meta[name="csrf-token"]').attr('content');
        
        $.ajax({
            url: myurl,  // Use the URL from the data attribute
            type: "POST",
            data: {
                state_id: state_id,
                _token: csrfToken
            },
            dataType: 'json',
            success: function(result){
                $('#city').html('<option value="">Select City</option>'); 
                $.each(result.cities,function(key,value){
                $("#city").append('<option value="'+value.id+'">'+value.city+'</option>');
                });
                }
        });
    });
});




function isNumber(evt) {
    evt = (evt) ? evt : window.event;
    var charCode = (evt.which) ? evt.which : evt.keyCode;
    if (charCode > 31 && (charCode < 48 || charCode > 57)) {
    alert('Please enter numberic value');
        return false;
    }
    return true;
}

function isNumber1(evt) {
    evt = (evt) ? evt : window.event;
    var charCode = (evt.which) ? evt.which : evt.keyCode;
    if (charCode > 31 && (charCode < 48 || charCode > 57)) {
    alert('Please enter numberic value');
        return false;
    }
    return true;
}

function isNumber2(evt) {
    evt = (evt) ? evt : window.event;
    var charCode = (evt.which) ? evt.which : evt.keyCode;
    if (charCode > 31 && (charCode < 48 || charCode > 57)) {
    alert('Please enter numberic value');
        return false;
    }
    return true;
}



    document.addEventListener('DOMContentLoaded', function () {
        // Get the input element
        var headOfOrganisation = document.getElementById('headOfOrganisation');
        var organisationName = document.getElementById('organisationName');
        var donor1 = document.getElementById('donor1');
        var nameInput = document.getElementById('donor2');
        var nameInput = document.getElementById('donor3');

        // Attach an input event listener to the input element
        headOfOrganisation.addEventListener('input', function () {
            var inputValue1 = headOfOrganisation.value;
            
            // Use a regular expression to check if the input contains only alphabetic characters
            if (/^[A-Za-z\s]*$/.test(inputValue1)) {
                // Input is valid, do nothing
            } else {
                // Input contains non-alphabetic characters, show an alert
                alert('Please enter only alphabetic characters.');
                headOfOrganisation.value = ''; // Clear the input field
            }
        });

         // Attach an input event listener to the input element
         organisationName.addEventListener('input', function () {
            var inputValue2 = organisationName.value;
            
            // Use a regular expression to check if the input contains only alphabetic characters
            if (/^[A-Za-z\s]*$/.test(inputValue2)) {
                // Input is valid, do nothing
            } else {
                // Input contains non-alphabetic characters, show an alert
                alert('Please enter only alphabetic characters.');
                organisationName.value = ''; // Clear the input field
            }
        });

         // Attach an input event listener to the input element  donor1
         donor1.addEventListener('input', function () {
            var inputValue3 = donor1.value;
            
            // Use a regular expression to check if the input contains only alphabetic characters
            if (/^[A-Za-z\s]*$/.test(inputValue3)) {
                // Input is valid, do nothing
            } else {
                // Input contains non-alphabetic characters, show an alert
                alert('Please enter only alphabetic characters.');
                donor1.value = ''; // Clear the input field
            }
        });

         // Attach an input event listener to the input element  donor2
         donor2.addEventListener('input', function () {
            var inputValue4 = donor2.value;
            
            // Use a regular expression to check if the input contains only alphabetic characters
            if (/^[A-Za-z\s]*$/.test(inputValue4)) {
                // Input is valid, do nothing
            } else {
                // Input contains non-alphabetic characters, show an alert
                alert('Please enter only alphabetic characters.');
                donor2.value = ''; // Clear the input field
            }
        });

        // Attach an input event listener to the input element  donor3
        donor3.addEventListener('input', function () {
            var inputValue5 = donor3.value;
            
            // Use a regular expression to check if the input contains only alphabetic characters
            if (/^[A-Za-z\s]*$/.test(inputValue5)) {
                // Input is valid, do nothing
            } else {
                // Input contains non-alphabetic characters, show an alert
                alert('Please enter only alphabetic characters.');
                donor3.value = ''; // Clear the input field
            }
        });
    });

    
    /** only for numbers */

    document.addEventListener('DOMContentLoaded', function () {
        // Get the input element
        var keyContactPerson = document.getElementById('keyContactPerson');
        var mobile = document.getElementById('mobile');
        var landlineNumber = document.getElementById('landlineNumber');
        var pincode = document.getElementById('pincode');

        // Attach an input event listener to the input element
        keyContactPerson.addEventListener('input', function () {
            var keyContactPersonValue = keyContactPerson.value;
            
            // Use a regular expression to check if the input contains only numeric characters
            if (/^\d+$/.test(keyContactPersonValue)) {
                // Input is valid, do nothing
            } else {
                // Input contains non-numeric characters, show an alert
                alert('Please enter only numeric characters.');
                keyContactPerson.value = ''; // Clear the input field
            }
        });

        mobile.addEventListener('input', function () {
            var mobileValue = mobile.value;
            
            // Use a regular expression to check if the input contains only numeric characters
            if (/^\d+$/.test(mobileValue)) {
                // Input is valid, do nothing
            } else {
                // Input contains non-numeric characters, show an alert
                alert('Please enter only numeric characters.');
                mobile.value = ''; // Clear the input field
            }
        });

        landlineNumber.addEventListener('input', function () {
            var landlineNumberValue = landlineNumber.value;
            
            // Use a regular expression to check if the input contains only numeric characters
            if (/^\d+$/.test(landlineNumberValue)) {
                // Input is valid, do nothing
            } else {
                // Input contains non-numeric characters, show an alert
                alert('Please enter only numeric characters.');
                landlineNumber.value = ''; // Clear the input field
            }
        });

        pincode.addEventListener('input', function () {
            var pincodeValue = pincode.value;
            
            // Use a regular expression to check if the input contains only numeric characters
            if (/^\d+$/.test(pincodeValue)) {
                // Input is valid, do nothing
            } else {
                // Input contains non-numeric characters, show an alert
                alert('Please enter only numeric characters.');
                pincode.value = ''; // Clear the input field
            }
        });
    });

    /** end only for numbers */


/*

// Define city data for each state
const cities = {
    "23": ["New York City", "Buffalo", "Rochester"],
    "California": ["Los Angeles", "San Francisco", "San Diego"]
    
};

function populateCities() {
    const stateSelect = document.getElementById("state-dropdown");
    const citySelect = document.getElementById("city");
    const selectedState = stateSelect.value;
    //alert(selectedState);

    // Clear the city select box
    citySelect.innerHTML = '<option value="">Select City</option>';

    if (selectedState in cities) {
        const cityList = cities[selectedState];

        // Populate the city select box with options for the selected state
        for (const city of cityList) {
            const option = document.createElement("option");
            option.value = city;
            option.textContent = city;
            citySelect.appendChild(option);
        }
    }
}

// Initialize the city select box when the page loads
populateCities();
*/