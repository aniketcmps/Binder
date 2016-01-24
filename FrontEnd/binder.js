
//a click on hamburger menu button should open the hamburger menu
$(document).on('click', "div#open-ham", function() {
    $("#ham-menu").animate({ left: 0 }, "slow");
});

//a click on close hamburger menu button should close the hamburger menu
$(document).on('click', "div#close-ham", function() {
    $("#ham-menu").animate({ left: -300 }, "slow");
});