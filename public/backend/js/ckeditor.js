function initializeEditor() {
    if (isTextareaExists()) {
        ClassicEditor.create(document.querySelector('textarea'), {
            licenseKey: '',
            toolbar: {
                items: [
                    'heading',
                    '|',
                    'fontFamily',
                    'fontSize',
                    'fontColor',
                    'fontBackgroundColor',
                    'bold',
                    'italic',
                    'highlight',
                    'underline',
                    '|',
                    'link',
                    'bulletedList',
                    'numberedList',
                    '|',
                    'superscript',
                    'subscript',
                    '|',
                    'outdent',
                    'indent',
                    'alignment',
                    '|',
                    'imageUpload',
                    'blockQuote',
                    'insertTable',
                    'mediaEmbed',
                    'horizontalLine',
                    'htmlEmbed',
                    'findAndReplace',
                    '|',
                    'undo',
                    'redo'
                ],
                shouldNotGroupWhenFull: false
            },
            plugins: ['Alignment', 'Autoformat', 'AutoLink', 'Base64UploadAdapter', 'BlockQuote', 'Bold', 'Essentials', 'FindAndReplace', 'FontBackgroundColor', 'FontColor',
                'FontFamily', 'FontSize', 'GeneralHtmlSupport', 'Heading', 'Highlight', 'HorizontalLine', 'HtmlComment', 'HtmlEmbed', 'Image', 'ImageCaption', 'ImageResize',
                'ImageStyle', 'ImageToolbar', 'ImageUpload', 'Indent', 'IndentBlock', 'Italic', 'Link', 'List', 'ListProperties', 'MediaEmbed', 'MediaEmbedToolbar',
                'Paragraph', 'PasteFromOffice', 'Subscript', 'Superscript', 'Table', 'TableCaption', 'TableCellProperties', 'TableColumnResize', 'TableProperties', 'TableToolbar',
                'Underline'],
            removePlugins: [
                'Title',
            ],


        }).then(editor => {
            window.editor = editor;
        }).catch(error => {
            console.error('Oops, something went wrong!');
            console.error('Please, report the following error on https://github.com/ckeditor/ckeditor5/issues with the build id and the error stack trace:');
            console.warn('Build id: ft9qmrg1pzi1-s4l9tbd9o6iv');
            console.error(error);
        });
    }
}

function isTextareaExists() {
    return document.querySelector('textarea') !== null;
}

$(document).ready(function () {
    initializeEditor();
});