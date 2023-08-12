jQuery(document).ready(function() {
    var inupttrxtarea = jQuery("#inupttrxtarea");
    var characters_remaining = jQuery("#characters-remaining");

    // Update the count of characters
    inupttrxtarea.on("keyup", function() {
        var length = inupttrxtarea.val().length;
        characters_remaining.text(length + ' characters remaining');
    });

    // Get all the <p> elements in the first <div>
    var firstdiv = jQuery(".content-area div:first");
    var paragraphs = firstdiv.find("p");

    paragraphs.each(function() {
        var word = jQuery(this).text().split(' ');
        if (word.length > 1) {
            word[1] = '<strong>' + word[1] + '</strong>';
            jQuery(this).html(word.join(" "));
        }
    });

    var exercises = jQuery("#exercises");
    exercises.children(':not(:first)').remove();

});