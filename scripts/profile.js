$(document).ready(function() {
    $.ajax({
        url: "api/profile.php",
        success: show
    });
})

function show(data) {
    data = JSON.parse(data);
    data = data[0];

    $('#name').text(`${data.firstname} ${data.lastname}`);
    
    $('#email').text(data.email);
    
    set_age(data.birthdate);

    if(data.newsletter == 1)
        $('#newsletter').removeClass('hidden');

    if(data.admin == 1)
        $('#admin').removeClass('hidden');
}

function set_age(birthdate) {
    let seconds = Math.floor((new Date() - new Date(birthdate)) / 1000);
    $('#age').text(seconds);

    setTimeout(() => set_age(birthdate), 1000);
}