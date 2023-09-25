$(document).ready(function () {
    $("#add_file").click(function () {
        result = "";
        count = $(this).data("count") + 1;
        $(this).data("count", count);

        result = `<div class="form-group" id="file-${count}">
                    <label>File-${count}</label>
                    <div class="input-group mb-3">
                        <input type="text" name="file[${count}][file_name]" class="form-control" placeholder="Enter file name" >
                        <input type="file" accept=".pdf,.doc,.docx,.xls,.xlsx,.ppt,.pptx,.odt,.ods,.odp" name="file[${count}][file_path]" class="form-control" >
                        <span class="input-group-text text-danger" onclick="delete_section(${count})"><i class="tim-icons icon-trash-simple"></i></span>
                    </div>
                </div>`;
        $("#file").append(result);
    });
});

function delete_section(count) {
    $("#file-" + count).remove();
}

function generateSlug(str) {
    return str
        .toLowerCase()
        .replace(/\s+/g, "-")
        .replace(/[^\w\u0980-\u09FF-]+/g, "") // Allow Bangla characters (\u0980-\u09FF)
        .replace(/--+/g, "-")
        .replace(/^-+|-+$/g, "");
}
$(document).ready(function () {
    $("#title").on("keyup", function () {
        const titleValue = $(this).val().trim();
        const slugValue = generateSlug(titleValue);
        $("#slug").val(slugValue);
    });
});
