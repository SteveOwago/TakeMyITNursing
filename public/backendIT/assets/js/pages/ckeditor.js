CKEDITOR.replace('editor', {
    extraPlugins: 'wordcount',
    wordcount: {
        showWordCount: true,
        showCharCount: false,
        maxWordCount: 200,
        //maxCharCount: 160,
        paragraphsCountGreaterThanMaxLengthEvent: function(currentLength, maxLength) {
            $("#informationparagraphs").css("background-color", "crimson").css("color", "white").text(
                currentLength + "/" + maxLength + " - paragraphs").show();
        },
        // wordCountGreaterThanMaxLengthEvent: function(currentLength, maxLength) {
        //     $("#informationword").css("background-color", "crimson").css("color", "white").text(
        //         currentLength + "/" + maxLength + " - word").show();
        // },
        charCountGreaterThanMaxLengthEvent: function(currentLength, maxLength) {
            $("#informationchar").css("background-color", "crimson").css("color", "white").text(
                currentLength + "/" + maxLength + " - char").show();
        },
        charCountLessThanMaxLengthEvent: function(currentLength, maxLength) {
            $("#informationchar").css("background-color", "white").css("color", "black").hide();
        },
        paragraphsCountLessThanMaxLengthEvent: function(currentLength, maxLength) {
            $("#informationparagraphs").css("background-color", "white").css("color", "black").hide();
        },
        // wordCountLessThanMaxLengthEvent: function(currentLength, maxLength) {
        //     $("#informationword").css("background-color", "white").css("color", "black").hide();
        // }
    }
});
CKEDITOR.replace('editor1', {
    extraPlugins: 'wordcount',
    wordcount: {
        showWordCount: true,
        showCharCount: false,
        maxWordCount: 200,
        //maxCharCount: 160,
        paragraphsCountGreaterThanMaxLengthEvent: function(currentLength, maxLength) {
            $("#informationparagraphs").css("background-color", "crimson").css("color", "white").text(
                currentLength + "/" + maxLength + " - paragraphs").show();
        },
        // wordCountGreaterThanMaxLengthEvent: function(currentLength, maxLength) {
        //     $("#informationword").css("background-color", "crimson").css("color", "white").text(
        //         currentLength + "/" + maxLength + " - word").show();
        // },
        charCountGreaterThanMaxLengthEvent: function(currentLength, maxLength) {
            $("#informationchar").css("background-color", "crimson").css("color", "white").text(
                currentLength + "/" + maxLength + " - char").show();
        },
        charCountLessThanMaxLengthEvent: function(currentLength, maxLength) {
            $("#informationchar").css("background-color", "white").css("color", "black").hide();
        },
        paragraphsCountLessThanMaxLengthEvent: function(currentLength, maxLength) {
            $("#informationparagraphs").css("background-color", "white").css("color", "black").hide();
        },
        // wordCountLessThanMaxLengthEvent: function(currentLength, maxLength) {
        //     $("#informationword").css("background-color", "white").css("color", "black").hide();
        // }
    }
});
CKEDITOR.replace('editor2', {
    extraPlugins: 'wordcount',
    wordcount: {
        showWordCount: true,
        showCharCount: false,
        maxWordCount: 200,
        //maxCharCount: 160,
        paragraphsCountGreaterThanMaxLengthEvent: function(currentLength, maxLength) {
            $("#informationparagraphs").css("background-color", "crimson").css("color", "white").text(
                currentLength + "/" + maxLength + " - paragraphs").show();
        },
        // wordCountGreaterThanMaxLengthEvent: function(currentLength, maxLength) {
        //     $("#informationword").css("background-color", "crimson").css("color", "white").text(
        //         currentLength + "/" + maxLength + " - word").show();
        // },
        charCountGreaterThanMaxLengthEvent: function(currentLength, maxLength) {
            $("#informationchar").css("background-color", "crimson").css("color", "white").text(
                currentLength + "/" + maxLength + " - char").show();
        },
        charCountLessThanMaxLengthEvent: function(currentLength, maxLength) {
            $("#informationchar").css("background-color", "white").css("color", "black").hide();
        },
        paragraphsCountLessThanMaxLengthEvent: function(currentLength, maxLength) {
            $("#informationparagraphs").css("background-color", "white").css("color", "black").hide();
        },
        // wordCountLessThanMaxLengthEvent: function(currentLength, maxLength) {
        //     $("#informationword").css("background-color", "white").css("color", "black").hide();
        // }
    }
});
