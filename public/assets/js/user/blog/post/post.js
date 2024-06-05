
function formAddComment() {
    var form;
    var submitButton;
    form = document.querySelector('#form_user_add_post');
    submitButton = document.querySelector('#submit_form_add_post');
    if (!form)
        return
    // Handle form submit
    submitButton.addEventListener('click', function (e) {


        let name = $("#comment-name").val()
        let email = $("#comment-email").val()
        let message = $("#comment-text").val()
        let post_id = $("#post_id").val()

        $.ajax({
            url: $(form).data("request"),
            type: "post",
            data: {
                "_token": $("input[name=csrf_token]").val(),
                'name': name,
                'email': email,
                'message': message,
                'post_id': post_id,
            },
            dataType: 'json',
            success: function (d) {

                console.log(d);
                showToastSuccessMessageJSON(d);
            },
            error: function (d) {
                console.log(d);
                showToastErrorMessageJSON(data);
            }
        });

    });
}



$(document).ready(


    validationForm(),
    formAddComment()
)





