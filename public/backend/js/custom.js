
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



// // Upload image
$(function () {
    $('#upImg').each(function () {
        var accountUploadImg = $(this);
        var accountUploadBtn = $('#upImgInput');
        var accountUserImage = $('.upImg');
        var accountResetBtn = $('#upImgReset');

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
});
// // Upload image
$(function () {
    $('#upImg').each(function () {
        var accountUploadImg = $(this);
        var accountUploadBtn = $('#upImgInput');
        var accountUserImage = $('.upImg');
        var accountResetBtn = $('#upImgReset');

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
});




function openTab(evt, tabName) {
    var i, tabcontent, tablinks;
    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
    }
    tablinks = document.getElementsByClassName("tablinks");
    for (i = 0; i < tablinks.length; i++) {
        tablinks[i].className = tablinks[i].className.replace("btn-success", "");
    }
    document.getElementById(tabName).style.display = "block";
    evt.currentTarget.className += " btn-success";
}

// Get the element with id="defaultOpen" and click on it
document.getElementById("defaultOpen").click();
