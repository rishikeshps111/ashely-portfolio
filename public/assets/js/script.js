function showToast(type, message) {
    const toast = document.getElementById('custom-toast');
    const icon = document.getElementById('toast-icon');
    const text = document.getElementById('toast-message');
    toast.className = `custom-toast ${type}`;
    icon.className = '';
    switch (type) {
        case 'success':
            icon.className = 'fa-solid fa-circle-check';
            break;
        case 'error':
            icon.className = 'fa-solid fa-triangle-exclamation';
            break;
        case 'info':
            icon.className = 'fa-solid fa-circle-info';
            break;
        case 'warning':
            icon.className = 'fa-solid fa-exclamation';
            break;
        default:
            icon.className = 'fa-solid fa-bell';
    }

    text.textContent = message;
    toast.classList.remove('hidden');
    setTimeout(() => toast.classList.add('show'), 10);
    setTimeout(() => {
        toast.classList.remove('show');
        setTimeout(() => toast.classList.add('hidden'), 400);
    }, 3000);
}

$(document).ready(function () {

    $.ajaxSetup({
        headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') }
    });

    $(document).on('click', '#subscribeBtn', function (e) {
        e.preventDefault();
        var email = $('#subscriberEmail').val();
        $.ajax({
            url: '/subscribe',
            type: 'POST',
            data: {
                email: email,
            },
            success: function (response) {
                showToast('success', 'Subscribed successfully!');
                $('#subscriberEmail').val('');
            },
            error: function (xhr) {
                let msg = 'Something went wrong';
                if (xhr.responseJSON && xhr.responseJSON.message) {
                    msg = xhr.responseJSON.message;
                }
                showToast('error', msg);
            }
        });
    });

    $(document).on('submit', '#contactForm', function (e) {
        e.preventDefault();

        $('.text-danger').text('');

        const name = $('#contactName').val();
        const email = $('#contactEmail').val();
        const message = $('#contactMessage').val();

        $.ajax({
            url: '/contact-form',
            type: 'POST',
            data: {
                name: name,
                email: email,
                message: message,
            },
            success: function (response) {
                showToast('success', 'Message sent successfully!');
                $('#contactForm')[0].reset();
            },
            error: function (xhr) {
                if (xhr.status === 422 && xhr.responseJSON.errors) {
                    const errors = xhr.responseJSON.errors;
                    if (errors.name) $('.error-name').text(errors.name[0]);
                    if (errors.email) $('.error-email').text(errors.email[0]);
                    if (errors.message) $('.error-message').text(errors.message[0]);
                    setTimeout(() => $('.text-danger').fadeOut(400, function () {
                        $(this).text('').show();
                    }), 2000);
                } else {
                    let msg = 'Something went wrong. Please try again.';
                    if (xhr.responseJSON && xhr.responseJSON.message) {
                        msg = xhr.responseJSON.message;
                    }
                    showToast('error', msg);
                }
            }
        });
    });

});