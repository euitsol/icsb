
// Get all delete buttons
const deleteButtons = document.querySelectorAll('.action-delete');

// Attach click event listener to each delete button
deleteButtons.forEach(button => {
    button.addEventListener('click', function () {
        const itemId = this.dataset.id;
        const modelName = this.dataset.model;

        // Display the confirmation dialog
        swal({
            title: 'Are you sure?',
            text: 'Once deleted, you will not be able to recover this item!',
            icon: 'warning',
            buttons: ['Cancel', 'Delete'],
            dangerMode: true,
        }).then((confirm) => {
            if (confirm) {
                // Send the delete request to the server
                deleteItem(modelName, itemId);
            }
        });
    });
});

// Function to send delete request to the server
function deleteItem(modelName, itemId) {
    // Make an AJAX request to delete the item
    // For example, using the fetch API
    fetch('/' + modelName.toLowerCase() + '/' + itemId, {
        method: 'DELETE',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
        },
    })
        .then(response => {
            if (response.ok) {
                // Handle successful deletion
                swal('Success', 'Item deleted successfully!', 'success');
                // Optionally, you can reload the page or update the table to reflect the changes
            } else {
                // Handle error
                swal('Error', 'An error occurred while deleting the item.', 'error');
            }
        })
        .catch(error => {
            // Handle error
            swal('Error', 'An error occurred while deleting the item.', 'error');
        });
}

// Upload image show 1
$(function () {
    var accountUploadImg = $('#upImg1');
    var accountUploadBtn = $('#upImgInput1');
    var accountUserImage = $('.upImg1');
    var accountResetBtn = $('#upImgReset1');

    if (accountUserImage) {
        var resetImage = accountUserImage.attr("src");
        accountUploadBtn.on("change", function (e) {
            var reader = new FileReader(),
                files = e.target.files;
            reader.onload = function () {
                if (accountUploadImg) {
                    accountUploadImg.attr("src", reader.result);
                }
            };
            reader.readAsDataURL(files[0]);
        });

        accountResetBtn.on("click", function () {
            accountUserImage.attr("src", resetImage);
            accountUploadBtn.val(null);
        });
    }
});
// Upload image show 2
$(function () {
    var accountUploadImg2 = $('#upImg2');
    var accountUploadBtn2 = $('#upImgInput2');
    var accountUserImage2 = $('.upImg2');
    var accountResetBtn2 = $('#upImgReset2');

    if (accountUserImage2) {
        var resetImage = accountUserImage2.attr("src");
        accountUploadBtn2.on("change", function (e) {
            var reader = new FileReader(),
                files = e.target.files;
            reader.onload = function () {
                if (accountUploadImg2) {
                    accountUploadImg2.attr("src", reader.result);
                }
            };
            reader.readAsDataURL(files[0]);
        });

        accountResetBtn2.on("click", function () {
            accountUserImage2.attr("src", resetImage);
            accountUploadBtn2.val(null);
        });
    }
});

// Upload image show 3
$(function () {
    var accountUploadImg3 = $('#upImg3');
    var accountUploadBtn3 = $('#upImgInput3');
    var accountUserImage3 = $('.upImg3');
    var accountResetBtn3 = $('#upImgReset3');

    if (accountUserImage3) {
        var resetImage = accountUserImage3.attr("src");
        accountUploadBtn3.on("change", function (e) {
            var reader = new FileReader(),
                files = e.target.files;
            reader.onload = function () {
                if (accountUploadImg3) {
                    accountUploadImg3.attr("src", reader.result);
                }
            };
            reader.readAsDataURL(files[0]);
        });

        accountResetBtn3.on("click", function () {
            accountUserImage3.attr("src", resetImage);
            accountUploadBtn3.val(null);
        });
    }
});
