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
                $("#city").append('<option value="'+value.state_id+'">'+value.city+'</option>');
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