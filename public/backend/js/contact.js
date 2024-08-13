function addEmailField(info_count, count) {
    const emailField = `
        <div class="input-group mb-3">
            <input type="email" name="location[${info_count}][emails][]" class="form-control" placeholder="Enter Email" required>
            <span class="input-group-text text-danger delete_email" data-info_count="${info_count}"><i class="tim-icons icon-trash-simple"></i></span>
        </div>`;
    $(`#email-${info_count}`).append(emailField);
}
function addPhoneField(info_count, count) {
    console.log(count);

    const phoneField = `
        <div class="input-group mb-3">
            <input type="tel" name="location[${info_count}][phones][${count}][number]" class="form-control" placeholder="Enter phone number" required>
            <div class="div contact_div">
                <select class="input-group-text form-select" name="location[${info_count}][phones][${count}][type]">
                    <option value="Phone" title='Phone'>Phone</option>
                    <option value="Telephone" title='Telephone'>Telephone</option>
                    <option value="Fax" title='Fax'>Fax</option>
                    <option value="WhatsApp" title='WhatsApp'>WhatsApp</option>
                </select>
            </div>
            <span class="input-group-text text-danger delete_phone" data-info_count="${info_count}"><i class="tim-icons icon-trash-simple"></i></span>
        </div>`;
    $(`#phone-${info_count}`).append(phoneField);
}

$(document).ready(function () {
    $(document).on("click", ".add_phone", function () {
        let count = parseInt($(this).data("count")) + 1;
        $(this).data("count", count);
        let info_count = parseInt($(this).data("info_count"));
        addPhoneField(info_count, count);
    });
    $(document).on("click", ".add_email", function () {
        let count = parseInt($(this).data("count")) + 1;
        $(this).data("count", count);
        let info_count = parseInt($(this).data("info_count"));
        addEmailField(info_count, count);
    });

    $(document).on("click", ".delete_email", function () {
        let info_count = parseInt($(this).data("info_count"));
        const emailSection = $(`#email-${info_count}`);
        $(this).closest(".input-group").remove();

        let emailCount = emailSection.find(".add_email").data("count") - 1;
        emailSection.find(".add_email").data("count", emailCount);
    });

    $(document).on("click", ".delete_phone", function () {
        let info_count = parseInt($(this).data("info_count"));
        const phoneSection = $(`#phone-${info_count}`);
        $(this).closest(".input-group").remove();

        // Re-index phone fields
        phoneSection.find(".input-group").each(function (index) {
            let new_index = index + 1;
            $(this)
                .find("input, select, textarea")
                .each(function () {
                    let name = $(this).attr("name");
                    if (name) {
                        // Update the phone index, while keeping the location index static
                        const updatedName = name.replace(
                            /\[phones\]\[\d+\]/,
                            `[phones][${new_index}]`
                        );
                        $(this).attr("name", updatedName);
                    }
                });
        });

        let phoneCount = phoneSection.find(".add_phone").data("count") - 1;
        phoneSection.find(".add_phone").data("count", phoneCount);
    });
});

// function delete_phone_section(info_count, phoneKey) {
//     const phoneSection = $(`#phone-${info_count}`);
//     phoneSection.find(`.input-group:eq(${phoneKey})`).remove();

//     // Re-index phone fields
//     phoneSection.find(".input-group").each(function (index) {
//         $(this)
//             .find("input, select, textarea")
//             .each(function () {
//                 const name = $(this).attr("name");
//                 if (name) {
//                     // Update the phone index, while keeping the location index static
//                     const updatedName = name.replace(
//                         /phones\[\d+\]/,
//                         `phones[${index}]`
//                     );
//                     $(this).attr("name", updatedName);
//                 }
//             });
//     });

//     let phoneCount = phoneSection.find(".add_phone").data("count") - 1;
//     phoneSection.find(".add_phone").data("count", phoneCount);
// }

// function delete_email_section(info_count, emailKey) {
//     const emailSection = $(`#email-${info_count}`);
//     emailSection.find(`.input-group:eq(${emailKey})`).remove();

//     let emailCount = emailSection.find(".add_email").data("count") - 1;
//     emailSection.find(".add_email").data("count", emailCount);
// }

//Append for location
$(document).ready(function () {
    $("#add_location").click(function () {
        result = "";
        count = parseInt($(this).data("count")) + 1;
        $(this).data("count", count);

        result = `
                <div class="card location_group" id="location-${count}">
                    <div class="card-header mb-2 d-flex justify-content-between align-items-center">
                        <div class="title">Contact Information-${count}</div>
                        <span class="btn btn-danger btn-sm" onclick="delete_section_1(${count})">Remove Contact</i></span>
                    </div>
                    <div class="card-body border">
                        <div class="form-group">
                            <label>Location</label>
                            <div class="input-group mb-3">
                                <input type="text" name="location[${count}][title]" class="form-control" placeholder="Enter location title" required>
                                <input type="text" name="location[${count}][address]" class="form-control" placeholder="Enter location address" required>
                                <div class="div contact_div">
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Location URL</label>
                            <input type="text" name="location[${count}][url]" class="form-control" placeholder="Enter location url" required>
                        </div>

                        <div class="form-group">
                            <label>Emails</label>
                            <div id="email-${count}">
                                <div class="input-group mb-3">
                                    <input type="email" name="location[${count}][emails][]"
                                        class="form-control" placeholder="Enter Email" required>
                                    <span class="input-group-text add_email" data-count="1"
                                        data-info_count="${count}"><i
                                            class="tim-icons icon-simple-add"></i></span>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label>Phones</label>
                            <div id="phone-${count}">
                                <div class="input-group mb-3">
                                    <input type="tel" name="location[${count}][phones][1][number]"
                                        class="form-control"
                                        placeholder="Enter phone number" required>
                                    <div class="div contact_div">
                                        <select class="input-group-text form-select no-select"
                                            name="location[${count}][phones][1][type]">
                                            <option value="Phone">
                                                Phone</option>
                                            <option value="Telephone">
                                                Telephone</option>
                                            <option value="Fax">
                                                Fax</option>
                                            <option value="WhatsApp">
                                                WhatsApp</option>
                                        </select>
                                    </div>
                                    <span class="input-group-text add_phone" data-count="1"
                                        data-info_count="${count}"><i
                                            class="tim-icons icon-simple-add"></i></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                `;
        $("#location").append(result);
    });
});
function delete_section_1(count) {
    $("#location-" + count).remove();
    $(".location_group").each(function (index) {
        let newIndex = index + 1;
        // Update the section's ID
        $(this).attr("id", "location-" + newIndex);

        // Update the name attributes within the section
        $(this)
            .find("input, select, textarea")
            .each(function () {
                const name = $(this).attr("name");
                if (name) {
                    // Replace the location index
                    const updatedName = name.replace(
                        /location\[\d+\]/,
                        `location[${newIndex}]`
                    );
                    $(this).attr("name", updatedName);
                }
            });
    });
}

//Append for social
$(document).ready(function () {
    $("#add_social").click(function () {
        result = "";
        count = parseInt($(this).data("count")) + 1;
        $(this).data("count", count);

        result = `<div class="form-group" id='social-${count}'>
                    <label>Social Media Information-${count}</label>
                    <div class="input-group mb-3">
                        <input type="url" name="social[${count}][link]" class="form-control" placeholder="Enter socilal media information"  required>
                        <div class="div">
                            <select class="input-group-text form-select" name="social[${count}][icon]">
                                <option value="fa-brands fa-facebook-f" title="Facebook"><i>&#xf09a</i></option>
                                <option value="fa-brands fa-square-x-twitter" title="Twitter"><i>&#xe61a</i></option>
                                <option value="fa-brands fa-linkedin-in" title="Linkedin"><i>&#xf0e1</i></option>
                                <option value="fa-brands fa-instagram" title="Instagram"><i>&#xf16d</i></option>
                                <option value="fa-brands fa-youtube" title="Youtube"><i>&#xf167</i></option>
                                <option value="fa-brands fa-pinterest" title="Pinterest"><i>&#xf0d2</i></option>
                                <option value="fa-brands fa-google" title="Google"><i>&#xf1a0</i></option>
                                <option value="fa-brands fa-tiktok" title="Tiktok"><i>&#xe07b</i></option>
                                <option value="fa-brands fa-telegram" title="Telegram"><i>&#xf2c6</i></option>
                                <option value="fa-brands fa-whatsapp" title="WhatsApp"><i>&#xf232</i></option>
                                <option value="fa-brands fa-reddit" title="Reddit"><i>&#xf1a1</i></option>
                            </select>
                            <span class="input-group-text text-danger" onclick="delete_section_2(${count})"><i class="tim-icons icon-trash-simple"></i></span>
                        </div>
                    </div>
                </div>`;

        $("#social").append(result);
    });
});
function delete_section_2(count) {
    $("#social-" + count).remove();
}

// $(document).ready(function() {
//     $('#add_phone').click(function() {
//         result = '';
//         count = $(this).data('count') + 1;
//         $(this).data('count', count);

//         result = `<div class="form-group" id="phone-${count}">
//                     <label>Phone Number-${count}</label>
//                     <div class="input-group mb-3">
//                         <input type="tel" name="phone[${count}][number]" class="form-control" placeholder="Enter phone number" required>
//                         <div class="div contact_div">
//                             <select class="input-group-text form-select" name="phone[${count}][type]">
//                                 <option value="Phone" title='Phone'>Phone</option>
//                                 <option value="Telephone" title='Telephone'>Telephone</option>
//                                 <option value="Fax" title='Fax'>Fax</option>
//                                 <option value="WhatsApp" title='WhatsApp'>WhatsApp</option>
//                             </select>
//                             <span class="input-group-text text-danger" onclick="delete_section_3(${count})"><i class="tim-icons icon-trash-simple"></i></span>
//                         </div>
//                     </div>
//                 </div>`;
//         $('#phone').append(result);
//     });
// });
// function delete_section_3(count) {
//     $('#phone-' + count).remove();
// };

// //Append for Email
// $(document).ready(function() {
//     $('#add_email').click(function() {
//         result = '';
//         count = $(this).data('count') + 1;
//         $(this).data('count', count);

//         result = `<div class="form-group" id="email-${count}">
//                     <label>Email-${count}</label>
//                     <div class="input-group mb-3">
//                         <input type="text" name="email[]" class="form-control" placeholder="Enter Phone"  required>
//                         <span class="input-group-text text-danger" onclick="delete_section_4(${count})"><i class="tim-icons icon-trash-simple"></i></span>
//                     </div>
//                 </div>`;

//         $('#email').append(result);

//     });
// });
// function delete_section_4(count) {
//     $('#email-' + count).remove();
// };

// Tab JS
function openTab(evt, tabName) {
    var i, tabcontent, tablinks;
    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
    }
    tablinks = document.getElementsByClassName("tablinks");
    for (i = 0; i < tablinks.length; i++) {
        tablinks[i].className = tablinks[i].className.replace(
            " btn-success text-white",
            ""
        );
    }
    document.getElementById(tabName).style.display = "block";
    evt.currentTarget.className += " btn-success text-white";
}
document.getElementById("defaultOpen").click();
