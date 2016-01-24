
//a click on hamburger menu button should open the hamburger menu
$(document).on('click', "div#open-ham", function() {
    $("#ham-menu").animate({ left: 0 }, "slow");
});

//a click on close hamburger menu button should close the hamburger menu
$(document).on('click', "div#close-ham", function() {
    $("#ham-menu").animate({ left: -300 }, "slow");
});

//Move some elements depending on the height of the navbar.
$(window).on("load", function() {
        //Move the black box
        $(".blackbox").css({"top": $(".navbar").height()});

        //Move the container up to the bottom of the black box
        $(".container-under").css({"top": $(".blackbox").height()});
});

$(document).on('click', ".no-job-button", function() {
    $(this).closest(".card").fadeOut( "slow", function() {
        // Animation complete.
    });

    $.ajax({
        type: "POST",
        url: "scripts/dislike-job.php",
        data: { 'jobID': $(this).data("id") },
        cache: false,
        success: function(data)
        {

        }

    });
});

$(document).on('click', ".yes-job-button", function() {
    $(this).closest(".card").fadeOut( "slow", function() {
        // Animation complete.
    });

    $.ajax({
        type: "POST",
        url: "scripts/like-job.php",
        data: { 'jobID': $(this).data("id") },
        cache: false,
        success: function(data)
        {

        }

    });
});

$(document).on('click', ".no-person-button", function() {
    $(this).closest(".card").fadeOut( "slow", function() {
        // Animation complete.
    });


    $.ajax({
        type: "POST",
        url: "scripts/dislike-user.php",
        data: { 'jobID': $(this).data("jobid"), 'email': $(this).data("email") },
        cache: false,
        success: function(data)
        {

        }

    });
});

$(document).on('click', ".yes-person-button", function() {
    $(this).closest(".card").fadeOut( "slow", function() {
        // Animation complete.
    });

    $.ajax({
        type: "POST",
        url: "scripts/like-person.php",
        data: { 'jobID': $(this).data("jobid"), 'email': $(this).data("email") },
        cache: false,
        success: function(data)
        {

        }

    });
});