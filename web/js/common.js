
/* text selection */

// @see http://stackoverflow.com/questions/9975707/use-jquery-select-to-select-contents-of-a-div

jQuery.fn.selectText = function() {
    this.find('input').each(function() {
        if ($(this).prev().length == 0 || !$(this).prev().hasClass('p_copy')) {
            $('<p class="p_copy" style="position: absolute; z-index: -1;"></p>').insertBefore($(this));
        }
        $(this).prev().html($(this).val());
    });
    var doc = document;
    var element = this[0];
    console.log(this, element);
    if (doc.body.createTextRange) {
        var range = document.body.createTextRange();
        range.moveToElementText(element);
        range.select();
    } else if (window.getSelection) {
        var selection = window.getSelection();
        var range = document.createRange();
        range.selectNodeContents(element);
        selection.removeAllRanges();
        selection.addRange(range);
    }
};

$('body').delegate('.select-text', 'click', function(e) {
    var selector = $(this).data('selector');
    $(selector).selectText();
    e.preventDefault();
});

/* frames */

function resizeFrame(iframe) {
    var body = iframe.contents().find('body');
    if (body.length > 0) {
        var height = body.height();
        if (height > 0) {
            iframe.css('height', height + 50);
        }
    }
}

function resizeFrames() {
    $('.demo-iframe').each(function() {
        var iframe = $(this);
        resizeFrame(iframe);
    });
}

$('body').delegate('.demo-switcher', 'click', function(e) {
    setTimeout(function() {
        resizeFrames();
    }, 200);
});

$('body').delegate('.no-click', 'click', function(e) {
    e.preventDefault();
})

/* other */

function hideGoHome(iframe) {
    var back = iframe.contents().find('.go-back-home');
    back.css('display', 'none');
}

function hideGoHomes() {
    $('.demo-iframe').each(function() {
        var iframe = $(this);
        hideGoHome(iframe);
    });
}

$(document).ready(function() {
    prettyPrint();
});
