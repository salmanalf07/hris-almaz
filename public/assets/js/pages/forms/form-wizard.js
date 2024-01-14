"use strict";
$(function () {
    //Horizontal form basic
    // $("#wizard_horizontal").steps({
    //     headerTag: "h2",
    //     bodyTag: "section",
    //     transitionEffect: "slideLeft",
    //     onInit: function (event, currentIndex) {
    //         setButtonWavesEffect(event);
    //     },
    //     onStepChanged: function (event, currentIndex, priorIndex) {
    //         setButtonWavesEffect(event);
    //     },
    // });
    //Vertical form basic
    // $("#wizard_vertical").steps({
    //     headerTag: "h2",
    //     bodyTag: "section",
    //     transitionEffect: "slideLeft",
    //     stepsOrientation: "vertical",
    //     onInit: function (event, currentIndex) {
    //         setButtonWavesEffect(event);
    //     },
    //     onStepChanged: function (event, currentIndex, priorIndex) {
    //         setButtonWavesEffect(event);
    //     },
    // });
    //Advanced form with validation
});

function setButtonWavesEffect(event) {
    $(event.currentTarget)
        .find('[role="menu"] li a')
        .removeClass("waves-effect");
    $(event.currentTarget)
        .find('[role="menu"] li:not(.disabled) a')
        .addClass("waves-effect");
}
