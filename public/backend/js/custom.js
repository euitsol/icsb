
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

// Get the necessary elements
const imageUploadInputs = document.querySelectorAll('.image-upload');
const existingFilesArray = [];

// Add event listener for each file input change
imageUploadInputs.forEach(function (imageUploadInput, index) {

    const mainDiv = document.createElement('div');
    mainDiv.classList.add('imagePreviewMainDiv');

    imageUploadInput.parentNode.append(mainDiv);

    // Check if data-existing-files attribute is present
    if (imageUploadInput.hasAttribute('data-existing-files')) {

        const existingFilesValue = imageUploadInput.getAttribute('data-existing-files');
        if (existingFilesValue) {
            let existingFiles;
            try {
                existingFiles = JSON.parse(existingFilesValue);
            } catch (error) {
                existingFiles = [existingFilesValue];
            }

            existingFilesArray[index] = existingFiles;
            populateImagePreview(existingFiles, mainDiv);
        }
    }

    imageUploadInput.addEventListener('change', function () {
        const files = Array.from(this.files);

        // Remove previous images if not multiple
        if (!this.hasAttribute('multiple')) {
            const previousImages = this.parentNode.querySelectorAll('.imagePreview');
            previousImages.forEach(function (image) {
                image.parentNode.remove();
            });
        }

        files.forEach(function (file) {
            if (file) {

                const imageUploadContainer = imageUploadInput.parentNode;

                const imagePreviewDiv = document.createElement('div');
                imagePreviewDiv.classList.add('imagePreviewDiv');

                // Create the image element
                const previewImage = document.createElement('img');
                previewImage.classList.add('imagePreview', 'rounded', 'me-50', 'border');
                previewImage.setAttribute('src', '#');
                previewImage.setAttribute('alt', 'Uploaded Image');

                // Create the remove button
                const removeButton = document.createElement('i');
                removeButton.classList.add('fa-solid', 'fa-trash', 'removeImage', 'text-danger');

                // Add event listener for remove button click
                removeButton.addEventListener('click', function () {
                    const imageContainer = this.parentNode;
                    const imagePreview = imageContainer.querySelector('.imagePreview');

                    // Remove the image, remove button, and clear the file input value
                    imageContainer.remove();
                    imageUploadInput.value = '';
                });

                // Append the image and remove button to the preview div
                imagePreviewDiv.appendChild(previewImage);
                imagePreviewDiv.appendChild(removeButton);

                // Append the preview div to the container
                mainDiv.appendChild(imagePreviewDiv);

                // Read the file and set the image source
                const reader = new FileReader();
                reader.onload = function (e) {
                    previewImage.setAttribute('src', e.target.result);
                };
                reader.readAsDataURL(file);
            }
        });
    });
});

function populateImagePreview(files, container) {
    files.forEach(function (file) {
        const imagePreviewDiv = document.createElement('div');
        imagePreviewDiv.classList.add('imagePreviewDiv');

        // Create the image element
        const previewImage = document.createElement('img');
        previewImage.classList.add('imagePreview', 'rounded', 'me-50', 'border');
        previewImage.setAttribute('src', file);
        previewImage.setAttribute('alt', 'Uploaded Image');

        // Create the remove button
        const removeButton = document.createElement('i');
        removeButton.classList.add('fa-solid', 'fa-trash', 'removeImage', 'text-danger');

        // Add event listener for remove button click
        removeButton.addEventListener('click', function () {
            const imageContainer = this.parentNode;
            const imagePreview = imageContainer.querySelector('.imagePreview');

            // Remove the image, remove button, and clear the file input value
            imageContainer.remove();
            // TODO: Handle removal of file from the existingFilesArray if needed
        });

        // Append the image and remove button to the preview div
        imagePreviewDiv.appendChild(previewImage);
        imagePreviewDiv.appendChild(removeButton);

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
