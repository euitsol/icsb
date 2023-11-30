<?php

namespace Database\Seeders;

use App\Models\SinglePages;
use Illuminate\Database\Seeder;

class SinglePagesSeeder extends Seeder
{
    public function run()
    {
        SinglePages::create([
            'page_key' => 'icsb-profile',
            'frontend_slug' => 'icsb-profile',
            'title' => 'ICSB Profile',
            'form_data' => '{
                "1":
                {
                    "field_key":"banner-image",
                    "field_name":"Banner Image",
                    "type":"image",
                    "required":"nullable"
                },
                "2":
                {
                    "field_key":"back-image",
                    "field_name":"Page Image",
                    "type":"image",
                    "required":"nullable"
                },
                "3":
                {
                    "field_key":"page-description",
                    "field_name":"Page Description",
                    "type":"textarea",
                    "required":"required"
                }
            }',
            'documentation' => '{
                "title": "ICSB Profile",
                "details": "<p><b>Banner Image: </b><span style=\"background-color:rgb(255,255,255);color:rgb(29,37,59);\">This field is nullable. It supports file uploads in jpeg, png, jpg, gif, & svg format, with a maximum size limit of 2MB. The dimensions of the image should be 910 x 230px.</span></p><p><b>Page Image: </b><span style=\"background-color:rgb(255,255,255);color:rgb(29,37,59);\">This field is required. It supports file uploads in jpeg, png, jpg, gif, & svg format, with a maximum size limit of 2MB. The dimensions of the image should be 1200 x 800px.</span></p><p><b>Page Description: </b><span style=\"background-color:rgb(255,255,255);color:rgb(29,37,59);\">This field is required. It is a textarea field.</span></p>"
            }',
        ]);
        SinglePages::create([
            'page_key' => 'mission',
            'frontend_slug' => 'mission',
            'title' => 'Mission',
            'form_data' => '{
                "1":
                {
                    "field_key":"banner-image",
                    "field_name":"Banner Image",
                    "type":"image",
                    "required":"nullable"
                },
                "2":
                {
                    "field_key":"page-image",
                    "field_name":"Page Image",
                    "type":"image",
                    "required":"nullable"
                },
                "3":
                {
                    "field_key":"page-description",
                    "field_name":"Page Description",
                    "type":"textarea",
                    "required":"required"
                }
            }',
            'documentation' => '{
                "title": "Mission",
                "details": "<p><b>Banner Image: </b><span style=\"background-color:rgb(255,255,255);color:rgb(29,37,59);\">This field is nullable. It supports file uploads in jpeg, png, jpg, gif, & svg format, with a maximum size limit of 2MB. The dimensions of the image should be 910 x 230px.</span></p><p><b>Page Image: </b><span style=\"background-color:rgb(255,255,255);color:rgb(29,37,59);\">This field is nullable. It supports file uploads in jpeg, png, jpg, gif, & svg format, with a maximum size limit of 2MB. The dimensions of the image should be 1200 x 800px.</span></p><p><b>Page Description: </b><span style=\"background-color:rgb(255,255,255);color:rgb(29,37,59);\">This field is required. It is a textarea field.</span></p>"
            }',
        ]);
        SinglePages::create([
            'page_key' => 'objectives',
            'frontend_slug' => 'objectives',
            'title' => 'Objectives',
            'form_data' => '{
                "1":
                {
                    "field_key":"banner-image",
                    "field_name":"Banner Image",
                    "type":"image",
                    "required":"nullable"
                },
                "2":
                {
                    "field_key":"page-image",
                    "field_name":"Page Image",
                    "type":"image",
                    "required":"nullable"
                },
                "3":
                {
                    "field_key":"page-description",
                    "field_name":"Page Description",
                    "type":"textarea",
                    "required":"required"
                }
            }',
            'documentation' => '{
                "title": "Objectives",
                "details": "<p><b>Banner Image: </b><span style=\"background-color:rgb(255,255,255);color:rgb(29,37,59);\">This field is nullable. It supports file uploads in jpeg, png, jpg, gif, & svg format, with a maximum size limit of 2MB. The dimensions of the image should be 910 x 230px.</span></p><p><b>Page Image: </b><span style=\"background-color:rgb(255,255,255);color:rgb(29,37,59);\">This field is nullable. It supports file uploads in jpeg, png, jpg, gif, & svg format, with a maximum size limit of 2MB. The dimensions of the image should be 1200 x 800px.</span></p><p><b>Page Description: </b><span style=\"background-color:rgb(255,255,255);color:rgb(29,37,59);\">This field is required. It is a textarea field.</span></p>"
            }',
        ]);
        SinglePages::create([
            'page_key' => 'values',
            'frontend_slug' => 'values',
            'title' => 'Values',
            'form_data' => '{
                "1":
                {
                    "field_key":"banner-image",
                    "field_name":"Banner Image",
                    "type":"image",
                    "required":"nullable"
                },
                "2":
                {
                    "field_key":"page-image",
                    "field_name":"Page Image",
                    "type":"image",
                    "required":"nullable"
                },
                "3":
                {
                    "field_key":"page-description",
                    "field_name":"Page Description",
                    "type":"textarea",
                    "required":"required"
                },
                "4":
                {
                    "field_key":"upload-file",
                    "field_name":"Upload File",
                    "type":"file_single",
                    "required":"nullable"
                },
                "5":
                {
                    "field_key":"upload-images",
                    "field_name":"Upload Images",
                    "type":"image_multipe",
                    "required":"nullable"
                }
            }',
            'documentation' => '{
                "title": "Values",
                "details": "<p><b>Banner Image: </b><span style=\"background-color:rgb(255,255,255);color:rgb(29,37,59);\">This field is nullable. It supports file uploads in jpeg, png, jpg, gif, & svg format, with a maximum size limit of 2MB. The dimensions of the image should be 910 x 230px.</span></p><p><b>Page Image: </b><span style=\"background-color:rgb(255,255,255);color:rgb(29,37,59);\">This field is nullable. It supports file uploads in jpeg, png, jpg, gif, & svg format, with a maximum size limit of 2MB. The dimensions of the image should be 1200 x 800px.</span></p><p><b>Page Description: </b><span style=\"background-color:rgb(255,255,255);color:rgb(29,37,59);\">This field is required. It is a textarea field.</span></p>"
            }',
        ]);
        SinglePages::create([
            'page_key' => 'cs-for-cg',
            'frontend_slug' => 'cs-for-cg',
            'title' => 'CS for CG',
            'form_data' => '{
                "1":
                {
                    "field_key":"banner-image",
                    "field_name":"Banner Image",
                    "type":"image",
                    "required":"nullable"
                },
                "2":
                {
                    "field_key":"page-image",
                    "field_name":"Page Image",
                    "type":"image",
                    "required":"nullable"
                },
                "3":
                {
                    "field_key":"page-description",
                    "field_name":"Page Description",
                    "type":"textarea",
                    "required":"required"
                },
                "4":
                {
                    "field_key":"upload-images",
                    "field_name":"Upload Images",
                    "type":"image_multipe",
                    "required":"nullable"
                },
                "5":
                {
                    "field_key":"upload-file",
                    "field_name":"Upload File",
                    "type":"file_single",
                    "required":"nullable"
                }
            }',
            'documentation' => '{
                "title": "CS for CG",
                "details": "<p><b>Banner Image: </b><span style=\"background-color:rgb(255,255,255);color:rgb(29,37,59);\">This field is nullable. It supports file uploads in jpeg, png, jpg, gif, & svg format, with a maximum size limit of 2MB. The dimensions of the image should be 910 x 230px.</span></p><p><b>Page Image: </b><span style=\"background-color:rgb(255,255,255);color:rgb(29,37,59);\">This field is nullable. It supports file uploads in jpeg, png, jpg, gif, & svg format, with a maximum size limit of 2MB. The dimensions of the image should be 1200 x 800px.</span></p><p><b>Page Description: </b><span style=\"background-color:rgb(255,255,255);color:rgb(29,37,59);\">This field is required. It is a textarea field.</span></p><p><b>Upload File: </b><span style=\"background-color:rgb(255,255,255);color:rgb(29,37,59);\">This field is nullable. The name filed should be the file name. It supports file uploads in pdf, doc, docx, xls, xlsx, ppt, pptx, odt, ods, and odp format.</span></p>"
            }',
        ]);
        SinglePages::create([
            'page_key' => 'corporate-governance',
            'frontend_slug' => 'corporate-governance',
            'title' => 'Corporate Governance',
            'form_data' => '{
                "1":
                {
                    "field_key":"banner-image",
                    "field_name":"Banner Image",
                    "type":"image",
                    "required":"nullable"
                },
                "2":
                {
                    "field_key":"page-image",
                    "field_name":"Page Image",
                    "type":"image",
                    "required":"nullable"
                },
                "3":
                {
                    "field_key":"page-description",
                    "field_name":"Page Description",
                    "type":"textarea",
                    "required":"required"
                },
                "4":
                {
                    "field_key":"upload-images",
                    "field_name":"Upload Images",
                    "type":"image_multipe",
                    "required":"nullable"
                },
                "5":
                {
                    "field_key":"upload-file",
                    "field_name":"Upload File",
                    "type":"file_single",
                    "required":"nullable"
                }
            }',
            'documentation' => '{
                "title": " Corporate Governance",
                "details": "<p><b>Banner Image: </b><span style=\"background-color:rgb(255,255,255);color:rgb(29,37,59);\">This field is nullable. It supports file uploads in jpeg, png, jpg, gif, & svg format, with a maximum size limit of 2MB. The dimensions of the image should be 910 x 230px.</span></p><p><b>Page Image: </b><span style=\"background-color:rgb(255,255,255);color:rgb(29,37,59);\">This field is nullable. It supports file uploads in jpeg, png, jpg, gif, & svg format, with a maximum size limit of 2MB. The dimensions of the image should be 1200 x 800px.</span></p><p><b>Page Description: </b><span style=\"background-color:rgb(255,255,255);color:rgb(29,37,59);\">This field is required. It is a textarea field.</span></p><p><b>Upload File: </b><span style=\"background-color:rgb(255,255,255);color:rgb(29,37,59);\">This field is nullable. The name filed should be the file name. It supports file uploads in pdf, doc, docx, xls, xlsx, ppt, pptx, odt, ods, and odp format.</span></p>"
            }',
        ]);
        SinglePages::create([
            'page_key' => 'who-are-cs',
            'frontend_slug' => 'who-are-cs',
            'title' => 'Who are CSs',
            'form_data' => '{
                "1":
                {
                    "field_key":"banner-image",
                    "field_name":"Banner Image",
                    "type":"image",
                    "required":"nullable"
                },
                "2":
                {
                    "field_key":"page-image",
                    "field_name":"Page Image",
                    "type":"image",
                    "required":"nullable"
                },
                "3":
                {
                    "field_key":"page-description",
                    "field_name":"Page Description",
                    "type":"textarea",
                    "required":"required"
                },
                "4":
                {
                    "field_key":"upload-images",
                    "field_name":"Upload Images",
                    "type":"image_multipe",
                    "required":"nullable"
                }
            }',
            'documentation' => '{
                "title":"Who are CSs",
                "details":"<p><span style=\"background-color:rgb(255,255,255);color:rgb(29,37,59);\">The role\'s manages user permissions by assigning different roles to users. Each role defines specific access levels and actions a user can perform. It helps ensure proper authorization and security in the system.<\/span><\/p>"
            }',
        ]);
        SinglePages::create([
            'page_key' => 'cs-membership',
            'frontend_slug' => 'cs-membership',
            'title' => 'CS Membership',
            'form_data' => '{
                "1":
                {
                    "field_key":"banner-image",
                    "field_name":"Banner Image",
                    "type":"image",
                    "required":"nullable"
                },
                "2":
                {
                    "field_key":"page-image",
                    "field_name":"Page Image",
                    "type":"image",
                    "required":"nullable"
                },
                "3":
                {
                    "field_key":"page-description",
                    "field_name":"Page Description",
                    "type":"textarea",
                    "required":"required"
                },
                "4":
                {
                    "field_key":"upload-file",
                    "field_name":"Upload File",
                    "type":"file_single",
                    "required":"nullable"
                },
                "5":
                {
                    "field_key":"upload-images",
                    "field_name":"Upload Images",
                    "type":"image_multipe",
                    "required":"nullable"
                }
            }',
            'documentation' => '{
                "title": "CS Membership",
                "details": "<p><b>Banner Image: </b><span style=\"background-color:rgb(255,255,255);color:rgb(29,37,59);\">This field is nullable. It supports file uploads in jpeg, png, jpg, gif, & svg format, with a maximum size limit of 2MB. The dimensions of the image should be 910 x 230px.</span></p><p><b>Page Image: </b><span style=\"background-color:rgb(255,255,255);color:rgb(29,37,59);\">This field is nullable. It supports file uploads in jpeg, png, jpg, gif, & svg format, with a maximum size limit of 2MB. The dimensions of the image should be 1200 x 800px.</span></p><p><b>Page Description: </b><span style=\"background-color:rgb(255,255,255);color:rgb(29,37,59);\">This field is required. It is a textarea field.</span></p><p><b>Upload File: </b><span style=\"background-color:rgb(255,255,255);color:rgb(29,37,59);\">This field is nullable. The name filed should be the file name. It supports file uploads in pdf, doc, docx, xls, xlsx, ppt, pptx, odt, ods, and odp format.</span></p>"
            }',
        ]);
        SinglePages::create([
            'page_key' => 'code-of-conducts',
            'frontend_slug' => 'code-of-conducts',
            'title' => 'Code of Conducts',
            'form_data' => '{
                "1":
                {
                    "field_key":"banner-image",
                    "field_name":"Banner Image",
                    "type":"image",
                    "required":"nullable"
                },
                "2":
                {
                    "field_key":"page-image",
                    "field_name":"Page Image",
                    "type":"image",
                    "required":"nullable"
                },
                "3":
                {
                    "field_key":"page-description",
                    "field_name":"Page Description",
                    "type":"textarea",
                    "required":"required"
                },
                "4":
                {
                    "field_key":"upload-file",
                    "field_name":"Upload File",
                    "type":"file_single",
                    "required":"nullable"
                }
            }',
            'documentation' => '{
                "title": "Code of Conducts",
                "details": "<p><b>Banner Image: </b><span style=\"background-color:rgb(255,255,255);color:rgb(29,37,59);\">This field is nullable. It supports file uploads in jpeg, png, jpg, gif, & svg format, with a maximum size limit of 2MB. The dimensions of the image should be 910 x 230px.</span></p><p><b>Page Image: </b><span style=\"background-color:rgb(255,255,255);color:rgb(29,37,59);\">This field is nullable. It supports file uploads in jpeg, png, jpg, gif, & svg format, with a maximum size limit of 2MB. The dimensions of the image should be 1200 x 800px.</span></p><p><b>Page Description: </b><span style=\"background-color:rgb(255,255,255);color:rgb(29,37,59);\">This field is required. It is a textarea field.</span></p><p><b>Upload File: </b><span style=\"background-color:rgb(255,255,255);color:rgb(29,37,59);\">This field is nullable. The name filed should be the file name. It supports file uploads in pdf, doc, docx, xls, xlsx, ppt, pptx, odt, ods, and odp format.</span></p>"
            }',
        ]);
        SinglePages::create([
            'page_key' => 'cpd-program',
            'frontend_slug' => 'cpd-program',
            'title' => 'CPD Program',
            'form_data' => '{
                "1": {
                    "field_key": "banner-image",
                    "field_name": "Banner Image",
                    "type": "image",
                    "required": "nullable"
                },
                "2": {
                    "field_key": "page-image",
                    "field_name": "Page Image",
                    "type": "image",
                    "required": "nullable"
                },
                "3": {
                    "field_key": "page-description",
                    "field_name": "Page Description",
                    "type": "textarea",
                    "required": "required"
                },
                "4": {
                    "field_key": "upload-file",
                    "field_name": "Upload File",
                    "type": "file_single",
                    "required": "nullable"
                },
                "5": {
                    "field_key": "upload-images",
                    "field_name": "Upload Images",
                    "type": "image_multipe",
                    "required": "nullable"
                }
            }',
            'documentation' => '{
                "title": "CPD Program",
                "details": "<p><b>Banner Image: </b><span style=\"background-color:rgb(255,255,255);color:rgb(29,37,59);\">This field is nullable. It supports file uploads in jpeg, png, jpg, gif, & svg format, with a maximum size limit of 2MB. The dimensions of the image should be 910 x 230px.</span></p><p><b>Page Image: </b><span style=\"background-color:rgb(255,255,255);color:rgb(29,37,59);\">This field is nullable. It supports file uploads in jpeg, png, jpg, gif, & svg format, with a maximum size limit of 2MB. The dimensions of the image should be 1200 x 800px.</span></p><p><b>Page Description: </b><span style=\"background-color:rgb(255,255,255);color:rgb(29,37,59);\">This field is required. It is a textarea field.</span></p><p><b>Upload File: </b><span style=\"background-color:rgb(255,255,255);color:rgb(29,37,59);\">This field is nullable. The name filed should be the file name. It supports file uploads in pdf, doc, docx, xls, xlsx, ppt, pptx, odt, ods, and odp format.</span></p>"
            }',
        ]);
        SinglePages::create([
            'page_key' => 'member-portal',
            'frontend_slug' => 'member-portal',
            'title' => 'Member Portal',
            'form_data' => '{
                "1": {
                    "field_key": "portal-url",
                    "field_name": "Portal Url",
                    "type": "url",
                    "required": "required"
                }
            }',
            'documentation' => '{
                "title": "Member Portal",
                "details": "<p><b>Portal Url: </b><span style=\"background-color:rgb(255,255,255);color:rgb(29,37,59);\">This field is required. It is a URL field that represents the URL of the ISCB Member Portal</span></p>"
            }',
        ]);
        SinglePages::create([
            'page_key' => 'training-program',
            'frontend_slug' => 'training-program',
            'title' => 'Training Program',
            'form_data' => '{
                "1": {
                    "field_key": "banner-image",
                    "field_name": "Banner Image",
                    "type": "image",
                    "required": "nullable"
                },
                "2": {
                    "field_key": "page-image",
                    "field_name": "Page Image",
                    "type": "image",
                    "required": "nullable"
                },
                "3": {
                    "field_key": "page-description",
                    "field_name": "Page Description",
                    "type": "textarea",
                    "required": "required"
                },
                "4": {
                    "field_key": "upload-file",
                    "field_name": "Upload File",
                    "type": "file_single",
                    "required": "nullable"
                },
                "5": {
                    "field_key": "upload-images",
                    "field_name": "Upload Images",
                    "type": "image_multipe",
                    "required": "nullable"
                }
            }',
            'documentation' => '{
                "title": "Training Program",
                "details": "<p><b>Banner Image: </b><span style=\"background-color:rgb(255,255,255);color:rgb(29,37,59);\">This field is nullable. It supports file uploads in jpeg, png, jpg, gif, & svg format, with a maximum size limit of 2MB. The dimensions of the image should be 910 x 230px.</span></p><p><b>Page Image: </b><span style=\"background-color:rgb(255,255,255);color:rgb(29,37,59);\">This field is nullable. It supports file uploads in jpeg, png, jpg, gif, & svg format, with a maximum size limit of 2MB. The dimensions of the image should be 1200 x 800px.</span></p><p><b>Page Description: </b><span style=\"background-color:rgb(255,255,255);color:rgb(29,37,59);\">This field is required. It is a textarea field.</span></p><p><b>Upload File: </b><span style=\"background-color:rgb(255,255,255);color:rgb(29,37,59);\">This field is nullable. The name filed should be the file name. It supports file uploads in pdf, doc, docx, xls, xlsx, ppt, pptx, odt, ods, and odp format.</span></p>"
            }',
        ]);
        SinglePages::create([
            'page_key' => 'cs-hand-book',
            'frontend_slug' => 'cs-hand-book',
            'title' => 'CS Hand Book',
            'form_data' => '{
                "1": {
                    "field_key": "banner-image",
                    "field_name": "Banner Image",
                    "type": "image",
                    "required": "nullable"
                },
                "2": {
                    "field_key": "new-student-hand-book-pdf",
                    "field_name": "New Student Hand Book PDF",
                    "type": "file_single",
                    "required": "nullable"
                },
                "3": {
                    "field_key": "old-student-hand-book-pdf",
                    "field_name": "Old Student Hand Book PDF",
                    "type": "file_single",
                    "required": "nullable"
                }
            }',
            'documentation' => '{
                "title": "CS Hand Book",
                "details": "<p><span style=\"background-color:rgb(255,255,255);color:rgb(29,37,59);\">The role\'s manages user permissions by assigning different roles to users. Each role defines specific access levels and actions a user can perform. It helps ensure proper authorization and security in the system.</span></p>"
            }',
        ]);
        SinglePages::create([
            'page_key' => 'student-portal',
            'frontend_slug' => 'student-portal',
            'title' => 'Student Portal',
            'form_data' => '{
                "1": {
                    "field_key": "portal-url",
                    "field_name": "Portal Url",
                    "type": "url",
                    "required": "required"
                }
            }',
            'documentation' => '{
                "title": "Student Portal",
                "details": "<p><b>Portal Url: </b><span style=\"background-color:rgb(255,255,255);color:rgb(29,37,59);\">This field is required. It is a URL field that represents the URL of the ISCB Student Portal</span></p>"
            }',
        ]);
        SinglePages::create([
            'page_key' => 'faculty-evaluation-system',
            'frontend_slug' => 'faculty-evaluation-system',
            'title' => 'Faculty Evaluation System',
            'form_data' => '{
                "1": {
                    "field_key": "url",
                    "field_name": "URL",
                    "type": "url",
                    "required": "required"
                }
            }',
            'documentation' => '{
                "title": "Faculty Evaluation System",
                "details": "<p><span style=\"background-color:rgb(255,255,255);color:rgb(29,37,59);\">The role\'s manages user permissions by assigning different roles to users. Each role defines specific access levels and actions a user can perform. It helps ensure proper authorization and security in the system.</span></p>"
            }',
        ]);
        SinglePages::create([
            'page_key' => 'help-desk',
            'frontend_slug' => 'help-desk',
            'title' => 'Help Desk',
            'form_data' => '{
                "1": {
                    "field_key": "banner-image",
                    "field_name": "Banner Image",
                    "type": "image",
                    "required": "nullable"
                },
                "2": {
                    "field_key": "page-image",
                    "field_name": "Page Image",
                    "type": "image",
                    "required": "nullable"
                },
                "3": {
                    "field_key": "page-description",
                    "field_name": "Page Description",
                    "type": "textarea",
                    "required": "required"
                }
            }',
            'documentation' => '{
                "title": "Help Desk",
                "details": "<p><span style=\"background-color:rgb(255,255,255);color:rgb(29,37,59);\">The role\'s manages user permissions by assigning different roles to users. Each role defines specific access levels and actions a user can perform. It helps ensure proper authorization and security in the system.</span></p>"
            }',
        ]);
        SinglePages::create([
            'page_key' => 'cs-practicing-guideline',
            'frontend_slug' => 'cs-practicing-guideline',
            'title' => 'CS Practicing Guideline',
            'form_data' => '{
                "1": {
                    "field_key": "banner-image",
                    "field_name": "Banner Image",
                    "type": "image",
                    "required": "nullable"
                },
                "2": {
                    "field_key": "page-image",
                    "field_name": "Page Image",
                    "type": "image",
                    "required": "nullable"
                },
                "3": {
                    "field_key": "page-description",
                    "field_name": "Page Description",
                    "type": "textarea",
                    "required": "required"
                },
                "4": {
                    "field_key": "upload-files",
                    "field_name": "Upload Files",
                    "type": "file_multiple",
                    "required": "nullable"
                }
            }',
            'documentation' => '{
                "title": "CS Practicing Guideline",
                "details": "<p><span style=\"background-color:rgb(255,255,255);color:rgb(29,37,59);\">The role\'s manages user permissions by assigning different roles to users. Each role defines specific access levels and actions a user can perform. It helps ensure proper authorization and security in the system.</span></p>"
            }',
        ]);
        SinglePages::create([
            'page_key' => 'other-publications',
            'frontend_slug' => 'other-publications',
            'title' => 'Other Publications',
            'form_data' => '{
                "1": {
                    "field_key": "banner-image",
                    "field_name": "Banner Image",
                    "type": "image",
                    "required": "nullable"
                },
                "2": {
                    "field_key": "upload-files",
                    "field_name": "Upload Files",
                    "type": "file_multiple",
                    "required": "required"
                }
            }',
            'documentation' => '{
                "title": "Others",
                "details": "<p><span style=\"background-color:rgb(255,255,255);color:rgb(29,37,59);\">The role\'s manages user permissions by assigning different roles to users. Each role defines specific access levels and actions a user can perform. It helps ensure proper authorization and security in the system.</span></p>"
            }',
        ]);
        SinglePages::create([
            'page_key' => 'eligibility',
            'frontend_slug' => 'eligibility',
            'title' => 'Eligibility',
            'form_data' => '{
                "1": {
                    "field_key": "banner-image",
                    "field_name": "Banner Image",
                    "type": "image",
                    "required": "nullable"
                },
                "2": {
                    "field_key": "page-image",
                    "field_name": "Page Image",
                    "type": "image",
                    "required": "nullable"
                },
                "3": {
                    "field_key": "page-description",
                    "field_name": "Page Description",
                    "type": "textarea",
                    "required": "required"
                },
                "4": {
                    "field_key": "upload-file",
                    "field_name": "Upload File",
                    "type": "file_single",
                    "required": "nullable"
                },
                "5": {
                    "field_key": "upload-images",
                    "field_name": "Upload Images",
                    "type": "image_multipe",
                    "required": "nullable"
                }
            }',
            'documentation' => '{
                "title": "Eligibility",
                "details": "<p><span style=\"background-color:rgb(255,255,255);color:rgb(29,37,59);\">The role\'s manages user permissions by assigning different roles to users. Each role defines specific access levels and actions a user can perform. It helps ensure proper authorization and security in the system.</span></p>"
            }',
        ]);
        SinglePages::create([
            'page_key' => 'vision',
            'frontend_slug' => 'vision',
            'title' => 'Vision',
            'form_data' => '{
                "1": {
                    "field_key": "banner-image",
                    "field_name": "Banner Image",
                    "type": "image",
                    "required": "nullable"
                },
                "2": {
                    "field_key": "page-image",
                    "field_name": "Page Image",
                    "type": "image",
                    "required": "nullable"
                },
                "3": {
                    "field_key": "page-description",
                    "field_name": "Page Description",
                    "type": "textarea",
                    "required": "required"
                }
            }',
            'documentation' => '{
                "title": "Vision",
                "details": "<p><b>Banner Image: </b><span style=\"background-color:rgb(255,255,255);color:rgb(29,37,59);\">This field is nullable. It supports file uploads in jpeg, png, jpg, gif, & svg format, with a maximum size limit of 2MB. The dimensions of the image should be 910 x 230px.</span></p><p><b>Page Image: </b><span style=\"background-color:rgb(255,255,255);color:rgb(29,37,59);\">This field is nullable. It supports file uploads in jpeg, png, jpg, gif, & svg format, with a maximum size limit of 2MB. The dimensions of the image should be 1200 x 800px.</span></p><p><b>Page Description: </b><span style=\"background-color:rgb(255,255,255);color:rgb(29,37,59);\">This field is required. It is a textarea field.</span></p>"
            }',
        ]);
        SinglePages::create([
            'page_key' => 'exam-schedule',
            'frontend_slug' => 'exam-schedule',
            'title' => 'Exam Schedule',
            'form_data' => '{
                "1": {
                    "field_key": "banner-image",
                    "field_name": "Banner Image",
                    "type": "image",
                    "required": "nullable"
                },
                "2": {
                    "field_key": "page-image",
                    "field_name": "Page Image",
                    "type": "image",
                    "required": "nullable"
                },
                "3": {
                    "field_key": "page-description",
                    "field_name": "Page Description",
                    "type": "textarea",
                    "required": "required"
                },
                "4": {
                    "field_key": "upload-file",
                    "field_name": "Upload File",
                    "type": "file_single",
                    "required": "nullable"
                },
                "5": {
                    "field_key": "upload-images",
                    "field_name": "Upload Images",
                    "type": "image_multipe",
                    "required": "nullable"
                }
            }',
            'documentation' => '{
                "title": "Exam Schedule",
                "details": "<p><span style=\"background-color:rgb(255,255,255);color:rgb(29,37,59);\">The role\'s manages user permissions by assigning different roles to users. Each role defines specific access levels and actions a user can perform. It helps ensure proper authorization and security in the system.</span></p>"
            }',
        ]);
        SinglePages::create([
            'page_key' => 'csr-initiatives',
            'frontend_slug' => 'csr-initiatives',
            'title' => 'CSR Initiatives',
            'form_data' => '{
                "1": {
                    "field_key": "banner-image",
                    "field_name": "Banner Image",
                    "type": "image",
                    "required": "nullable"
                },
                "2": {
                    "field_key": "page-image",
                    "field_name": "Page Image",
                    "type": "image",
                    "required": "nullable"
                },
                "3": {
                    "field_key": "page-description",
                    "field_name": "Page Description",
                    "type": "textarea",
                    "required": "required"
                },
                "4": {
                    "field_key": "upload-file",
                    "field_name": "Upload File",
                    "type": "file_single",
                    "required": "nullable"
                }
            }',
            'documentation' => '{
                "title": "CSR Initiatives",
                "details": "<p><b>Banner Image: </b><span style=\"background-color:rgb(255,255,255);color:rgb(29,37,59);\">This field is nullable. It supports file uploads in jpeg, png, jpg, gif, & svg format, with a maximum size limit of 2MB. The dimensions of the image should be 910 x 230px.</span></p><p><b>Page Image: </b><span style=\"background-color:rgb(255,255,255);color:rgb(29,37,59);\">This field is nullable. It supports file uploads in jpeg, png, jpg, gif, & svg format, with a maximum size limit of 2MB. The dimensions of the image should be 1200 x 800px.</span></p><p><b>Page Description: </b><span style=\"background-color:rgb(255,255,255);color:rgb(29,37,59);\">This field is required. It is a textarea field.</span></p><p><b>Upload File: </b><span style=\"background-color:rgb(255,255,255);color:rgb(29,37,59);\">This field is nullable. The name filed should be the file name. It supports file uploads in pdf, doc, docx, xls, xlsx, ppt, pptx, odt, ods, and odp format.</span></p>"
            }',
        ]);
        SinglePages::create([
            'page_key' => 'membership-benefits',
            'frontend_slug' => 'membership-benefits',
            'title' => 'Membership Benefits',
            'form_data' => '{
                "1": {
                    "field_key": "banner-image",
                    "field_name": "Banner Image",
                    "type": "image",
                    "required": "nullable"
                },
                "2": {
                    "field_key": "page-image",
                    "field_name": "Page Image",
                    "type": "image",
                    "required": "nullable"
                },
                "3": {
                    "field_key": "page-description",
                    "field_name": "Page Description",
                    "type": "textarea",
                    "required": "required"
                },
                "4": {
                    "field_key": "upload-file",
                    "field_name": "Upload File",
                    "type": "file_single",
                    "required": "nullable"
                }
            }',
            'documentation' => '{
                "title": "Membership Benefits",
                "details": "<p><b>Banner Image: </b><span style=\"background-color:rgb(255,255,255);color:rgb(29,37,59);\">This field is nullable. It supports file uploads in jpeg, png, jpg, gif, & svg format, with a maximum size limit of 2MB. The dimensions of the image should be 910 x 230px.</span></p><p><b>Page Image: </b><span style=\"background-color:rgb(255,255,255);color:rgb(29,37,59);\">This field is nullable. It supports file uploads in jpeg, png, jpg, gif, & svg format, with a maximum size limit of 2MB. The dimensions of the image should be 1200 x 800px.</span></p><p><b>Page Description: </b><span style=\"background-color:rgb(255,255,255);color:rgb(29,37,59);\">This field is required. It is a textarea field.</span></p><p><b>Upload File: </b><span style=\"background-color:rgb(255,255,255);color:rgb(29,37,59);\">This field is nullable. The name filed should be the file name. It supports file uploads in pdf, doc, docx, xls, xlsx, ppt, pptx, odt, ods, and odp format.</span></p>"
            }',
        ]);
        SinglePages::create([
            'page_key' => 'the-chartered-secretary',
            'frontend_slug' => 'the-chartered-secretary',
            'title' => 'The Chartered Secretary',
            'form_data' => '{
                "1": {
                    "field_key": "banner-image",
                    "field_name": "Banner Image",
                    "type": "image",
                    "required": "nullable"
                },
                "2": {
                    "field_key": "upload-files",
                    "field_name": "Upload Files",
                    "type": "file_multiple",
                    "required": "required"
                }
            }',
            'documentation' => '{
                "title": "The Chartered Secretary",
                "details": "<p><span style=\"background-color:rgb(255,255,255);color:rgb(29,37,59);\">The role\'s manages user permissions by assigning different roles to users. Each role defines specific access levels and actions a user can perform. It helps ensure proper authorization and security in the system.</span></p>"
            }',
        ]);
        SinglePages::create([
            'page_key' => 'admission-form',
            'frontend_slug' => 'admission-form',
            'title' => 'Admission Form',
            'form_data' => '{
                "1": {
                    "field_key": "banner-image",
                    "field_name": "Banner Image",
                    "type": "image",
                    "required": "nullable"
                },
                "2": {
                    "field_key": "upload-files",
                    "field_name": "Upload Files",
                    "type": "file_multiple",
                    "required": "required"
                }
            }',
            'documentation' => '{
                "title": "Admission Form",
                "details": "<p><span style=\"background-color:rgb(255,255,255);color:rgb(29,37,59);\">The role\'s manages user permissions by assigning different roles to users. Each role defines specific access levels and actions a user can perform. It helps ensure proper authorization and security in the system.</span></p>"
            }',
        ]);
        SinglePages::create([
            'page_key' => 'entry-criteria',
            'frontend_slug' => 'entry-criteria',
            'title' => 'Entry Criteria',
            'form_data' => '{
                "1": {
                    "field_key": "banner-image",
                    "field_name": "Banner Image",
                    "type": "image",
                    "required": "nullable"
                },
                "2": {
                    "field_key": "upload-files",
                    "field_name": "Upload Files",
                    "type": "file_multiple",
                    "required": "required"
                }
            }',
            'documentation' => '{
                "title": "Entry Criteria",
                "details": "<p><span style=\"background-color:rgb(255,255,255);color:rgb(29,37,59);\">The role\'s manages user permissions by assigning different roles to users. Each role defines specific access levels and actions a user can perform. It helps ensure proper authorization and security in the system.</span></p>"
            }',
        ]);
        SinglePages::create([
            'page_key' => 'examination-policy',
            'frontend_slug' => 'examination-policy',
            'title' => 'Examination Policy',
            'form_data' => '{
                "1": {
                    "field_key": "banner-image",
                    "field_name": "Banner Image",
                    "type": "image",
                    "required": "nullable"
                },
                "2": {
                    "field_key": "page-description",
                    "field_name": "Page Description",
                    "type": "textarea",
                    "required": "required"
                }
            }',
            'documentation' => '{
                "title": "Examination Policy",
                "details": "<p><span style=\"background-color:rgb(255,255,255);color:rgb(29,37,59);\">The role\'s manages user permissions by assigning different roles to users. Each role defines specific access levels and actions a user can perform. It helps ensure proper authorization and security in the system.</span></p>"
            }',
        ]);
        SinglePages::create([
            'page_key' => 'financial-assistance',
            'frontend_slug' => 'financial-assistance',
            'title' => 'Financial Assistance',
            'form_data' => '{
                "1": {
                    "field_key": "banner-image",
                    "field_name": "Banner Image",
                    "type": "image",
                    "required": "required"
                },
                "2": {
                    "field_key": "page-image",
                    "field_name": "Page Image",
                    "type": "image",
                    "required": "required"
                },
                "3": {
                    "field_key": "page-description",
                    "field_name": "Page Description",
                    "type": "textarea",
                    "required": "required"
                }
            }',
            'documentation' => '{
                "title": "Financial Assistance",
                "details": "<p><span style=\"background-color:rgb(255,255,255);color:rgb(29,37,59);\">The role\'s manages user permissions by assigning different roles to users. Each role defines specific access levels and actions a user can perform. It helps ensure proper authorization and security in the system.</span></p>"
            }',
        ]);
        SinglePages::create([
            'page_key' => 'annual-report',
            'frontend_slug' => 'annual-report',
            'title' => 'Annual Report',
            'form_data' => '{
                "1": {
                    "field_key": "banner-image",
                    "field_name": "Banner Image",
                    "type": "image",
                    "required": "nullable"
                },
                "2": {
                    "field_key": "upload-files",
                    "field_name": "Upload Files",
                    "type": "file_multiple",
                    "required": "required"
                }
            }',
            'documentation' => '{
                "title": "Annual Report",
                "details": "<p style=\"margin-left:-15px;\">The role\'s manages user permissions by assigning different roles to users. Each role defines specific access levels and actions a user can perform. It helps ensure proper authorization and security in the system.</p>"
            }',
        ]);
        SinglePages::create([
            'page_key' => 'members-lounge',
            'frontend_slug' => 'members-lounge',
            'title' => 'Members Lounge',
            'form_data' => '{
                "1": {
                    "field_key": "banner-image",
                    "field_name": "Banner Image",
                    "type": "image",
                    "required": "nullable"
                },
                "2": {
                    "field_key": "page-images",
                    "field_name": "Page Images",
                    "type": "image_multiple",
                    "required": "required"
                },
                "3": {
                    "field_key": "page-description",
                    "field_name": "Page Description",
                    "type": "textarea",
                    "required": "required"
                }
            }',
            'documentation' => '{
                "title": "Members Lounge",
                "details": "<p><b>Banner Image: </b><span style=\"background-color:rgb(255,255,255);color:rgb(29,37,59);\">This field is nullable. It supports file uploads in jpeg, png, jpg, gif, & svg format, with a maximum size limit of 2MB. The dimensions of the image should be 910 x 230px.</span></p><p><b>Page Images: </b><span style=\"background-color:rgb(255,255,255);color:rgb(29,37,59);\">This field is required. It supports file uploads in jpeg, png, jpg, gif, & svg format, with a maximum size limit of 2MB. The dimensions of the image should be 750 X 750px. You can select multiple images by pressing the SHIFT/CTRL key.</span></p><p><b>Page Description: </b><span style=\"background-color:rgb(255,255,255);color:rgb(29,37,59);\">This field is required. It is a textarea field.</span></p>"
            }',
        ]);
        SinglePages::create([
            'page_key' => 'icsb-library',
            'frontend_slug' => 'icsb-library',
            'title' => 'ICSB Library',
            'form_data' => '{
                "1": {
                    "field_key": "banner-image",
                    "field_name": "Banner Image",
                    "type": "image",
                    "required": "nullable"
                },
                "2": {
                    "field_key": "page-images",
                    "field_name": "Page Images",
                    "type": "image_multiple",
                    "required": "required"
                },
                "3": {
                    "field_key": "page-description",
                    "field_name": "Page Description",
                    "type": "textarea",
                    "required": "required"
                }
            }',
            'documentation' => '{
                "title": "ICSB Library",
                "details": "<p><span style=\"background-color:rgb(255,255,255);color:rgb(29,37,59);\">The role\'s manages user permissions by assigning different roles to users. Each role defines specific access levels and actions a user can perform. It helps ensure proper authorization and security in the system.</span></p>"
            }',
        ]);
        SinglePages::create([
            'page_key' => 'foundation-complete',
            'frontend_slug' => 'foundation-complete',
            'title' => 'Foundation Complete',
            'form_data' => '{
                "1": {
                    "field_key": "banner-image",
                    "field_name": "Banner Image",
                    "type": "image",
                    "required": "nullable"
                },
                "2": {
                    "field_key": "upload-files",
                    "field_name": "Upload Files",
                    "type": "file_multiple",
                    "required": "required"
                }
            }',
            'documentation' => '{
                "title": "Foundation Complete",
                "details": "<p><span style=\"background-color:rgb(255,255,255);color:rgb(29,37,59);\">The role\'s manages user permissions by assigning different roles to users. Each role defines specific access levels and actions a user can perform. It helps ensure proper authorization and security in the system.</span></p>"
            }',
        ]);
        SinglePages::create([
            'page_key' => 'subject-complete',
            'frontend_slug' => 'subject-complete',
            'title' => 'Subject Complete',
            'form_data' => '{
                "1": {
                    "field_key": "banner-image",
                    "field_name": "Banner Image",
                    "type": "image",
                    "required": "nullable"
                },
                "2": {
                    "field_key": "upload-files",
                    "field_name": "Upload Files",
                    "type": "file_multiple",
                    "required": "required"
                }
            }',
            'documentation' => '{
                "title": "Subject Complete",
                "details": "<p><span style=\"background-color:rgb(255,255,255);color:rgb(29,37,59);\">The role\'s manages user permissions by assigning different roles to users. Each role defines specific access levels and actions a user can perform. It helps ensure proper authorization and security in the system.</span></p>"
            }',
        ]);
        SinglePages::create([
            'page_key' => 'final-complete',
            'frontend_slug' => 'final-complete',
            'title' => 'Final Complete',
            'form_data' => '{
                "1": {
                    "field_key": "banner-image",
                    "field_name": "Banner Image",
                    "type": "image",
                    "required": "nullable"
                },
                "2": {
                    "field_key": "upload-files",
                    "field_name": "Upload Files",
                    "type": "file_multiple",
                    "required": "required"
                }
            }',
            'documentation' => '{
                "title": "Final Complete",
                "details": "<p><span style=\"background-color:rgb(255,255,255);color:rgb(29,37,59);\">The role\'s manages user permissions by assigning different roles to users. Each role defines specific access levels and actions a user can perform. It helps ensure proper authorization and security in the system.</span></p>"
            }',
        ]);
        SinglePages::create([
            'page_key' => 'genesis',
            'frontend_slug' => 'genesis',
            'title' => 'Genesis',
            'form_data' => '{
                "1": {
                    "field_key": "banner-image",
                    "field_name": "Banner Image",
                    "type": "image",
                    "required": "nullable"
                },
                "2": {
                    "field_key": "page-image",
                    "field_name": "Page Image",
                    "type": "image",
                    "required": "nullable"
                },
                "3": {
                    "field_key": "page-description",
                    "field_name": "Page Description",
                    "type": "textarea",
                    "required": "required"
                }
            }',
            'documentation' => '{
                "title": "Genesis",
                "details": "<p><b>Banner Image: </b><span style=\"background-color:rgb(255,255,255);color:rgb(29,37,59);\">This field is nullable. It supports file uploads in jpeg, png, jpg, gif, & svg format, with a maximum size limit of 2MB. The dimensions of the image should be 910 x 230px.</span></p><p><b>Page Image: </b><span style=\"background-color:rgb(255,255,255);color:rgb(29,37,59);\">This field is nullable. It supports file uploads in jpeg, png, jpg, gif, & svg format, with a maximum size limit of 2MB. The dimensions of the image should be 1200 x 800px.</span></p><p><b>Page Description: </b><span style=\"background-color:rgb(255,255,255);color:rgb(29,37,59);\">This field is required. It is a textarea field.</span></p>"
            }',
        ]);
        SinglePages::create([
            'page_key' => 'purpose-of-the-award',
            'frontend_slug' => 'purpose-of-the-award',
            'title' => 'Purpose of the Award',
            'form_data' => '{
                "1": {
                    "field_key": "banner-image",
                    "field_name": "Banner Image",
                    "type": "image",
                    "required": "nullable"
                },
                "2": {
                    "field_key": "page-image",
                    "field_name": "Page Image",
                    "type": "image",
                    "required": "nullable"
                },
                "3": {
                    "field_key": "page-description",
                    "field_name": "Page Description",
                    "type": "textarea",
                    "required": "required"
                }
            }',
            'documentation' => '{
                "title": "Purpose of the Award",
                "details": "<p><b>Banner Image: </b><span style=\"background-color:rgb(255,255,255);color:rgb(29,37,59);\">This field is nullable. It supports file uploads in jpeg, png, jpg, gif, & svg format, with a maximum size limit of 2MB. The dimensions of the image should be 910 x 230px.</span></p><p><b>Page Image: </b><span style=\"background-color:rgb(255,255,255);color:rgb(29,37,59);\">This field is nullable. It supports file uploads in jpeg, png, jpg, gif, & svg format, with a maximum size limit of 2MB. The dimensions of the image should be 1200 x 800px.</span></p><p><b>Page Description: </b><span style=\"background-color:rgb(255,255,255);color:rgb(29,37,59);\">This field is required. It is a textarea field.</span></p>"
            }',
        ]);
        SinglePages::create([
            'page_key' => 'eligibility-for-participation',
            'frontend_slug' => 'eligibility-for-participation',
            'title' => 'Eligibility for Participation',
            'form_data' => '{
                "1": {
                    "field_key": "banner-image",
                    "field_name": "Banner Image",
                    "type": "image",
                    "required": "nullable"
                },
                "2": {
                    "field_key": "page-image",
                    "field_name": "Page Image",
                    "type": "image",
                    "required": "nullable"
                },
                "3": {
                    "field_key": "page-description",
                    "field_name": "Page Description",
                    "type": "textarea",
                    "required": "required"
                }
            }',
            'documentation' => '{
                "title": "Eligibility for Participation",
                "details": "<p><b>Banner Image: </b><span style=\"background-color:rgb(255,255,255);color:rgb(29,37,59);\">This field is nullable. It supports file uploads in jpeg, png, jpg, gif, & svg format, with a maximum size limit of 2MB. The dimensions of the image should be 910 x 230px.</span></p><p><b>Page Image: </b><span style=\"background-color:rgb(255,255,255);color:rgb(29,37,59);\">This field is nullable. It supports file uploads in jpeg, png, jpg, gif, & svg format, with a maximum size limit of 2MB. The dimensions of the image should be 1200 x 800px.</span></p><p><b>Page Description: </b><span style=\"background-color:rgb(255,255,255);color:rgb(29,37,59);\">This field is required. It is a textarea field.</span></p>"
            }',
        ]);
        SinglePages::create([
            'page_key' => 'sources-for-evaluation',
            'frontend_slug' => 'sources-for-evaluation',
            'title' => 'Sources for Evaluation',
            'form_data' => '{
                "1": {
                    "field_key": "banner-image",
                    "field_name": "Banner Image",
                    "type": "image",
                    "required": "nullable"
                },
                "2": {
                    "field_key": "page-image",
                    "field_name": "Page Image",
                    "type": "image",
                    "required": "nullable"
                },
                "3": {
                    "field_key": "page-description",
                    "field_name": "Page Description",
                    "type": "textarea",
                    "required": "required"
                }
            }',
            'documentation' => '{
                "title": "Sources for Evaluation",
                "details": "<p><b>Banner Image: </b><span style=\"background-color:rgb(255,255,255);color:rgb(29,37,59);\">This field is nullable. It supports file uploads in jpeg, png, jpg, gif, & svg format, with a maximum size limit of 2MB. The dimensions of the image should be 910 x 230px.</span></p><p><b>Page Image: </b><span style=\"background-color:rgb(255,255,255);color:rgb(29,37,59);\">This field is nullable. It supports file uploads in jpeg, png, jpg, gif, & svg format, with a maximum size limit of 2MB. The dimensions of the image should be 1200 x 800px.</span></p><p><b>Page Description: </b><span style=\"background-color:rgb(255,255,255);color:rgb(29,37,59);\">This field is required. It is a textarea field.</span></p>"
            }',
        ]);
        SinglePages::create([
            'page_key' => 'evaluation-&-assessment-basis',
            'frontend_slug' => 'evaluation-&-assessment-basis',
            'title' => 'Evaluation & Assessment Basis',
            'form_data' => '{
                "1": {
                    "field_key": "banner-image",
                    "field_name": "Banner Image",
                    "type": "image",
                    "required": "nullable"
                },
                "2": {
                    "field_key": "page-image",
                    "field_name": "Page Image",
                    "type": "image",
                    "required": "nullable"
                },
                "3": {
                    "field_key": "page-description",
                    "field_name": "Page Description",
                    "type": "textarea",
                    "required": "required"
                }
            }',
            'documentation' => '{
                "title": "Evaluation & Assessment Basis",
                "details": "<p><b>Banner Image: </b><span style=\"background-color:rgb(255,255,255);color:rgb(29,37,59);\">This field is nullable. It supports file uploads in jpeg, png, jpg, gif, & svg format, with a maximum size limit of 2MB. The dimensions of the image should be 910 x 230px.</span></p><p><b>Page Image: </b><span style=\"background-color:rgb(255,255,255);color:rgb(29,37,59);\">This field is nullable. It supports file uploads in jpeg, png, jpg, gif, & svg format, with a maximum size limit of 2MB. The dimensions of the image should be 1200 x 800px.</span></p><p><b>Page Description: </b><span style=\"background-color:rgb(255,255,255);color:rgb(29,37,59);\">This field is required. It is a textarea field.</span></p>"
            }',
        ]);
        SinglePages::create([
            'page_key' => 'jury-board',
            'frontend_slug' => 'jury-board',
            'title' => 'Jury Board',
            'form_data' => '{
                "1": {
                    "field_key": "banner-image",
                    "field_name": "Banner Image",
                    "type": "image",
                    "required": "nullable"
                },
                "2": {
                    "field_key": "page-image",
                    "field_name": "Page Image",
                    "type": "image",
                    "required": "nullable"
                },
                "3": {
                    "field_key": "page-description",
                    "field_name": "Page Description",
                    "type": "textarea",
                    "required": "required"
                }
            }',
            'documentation' => '{
                "title": "Jury Board",
                "details": "<p><b>Banner Image: </b><span style=\"background-color:rgb(255,255,255);color:rgb(29,37,59);\">This field is nullable. It supports file uploads in jpeg, png, jpg, gif, & svg format, with a maximum size limit of 2MB. The dimensions of the image should be 910 x 230px.</span></p><p><b>Page Image: </b><span style=\"background-color:rgb(255,255,255);color:rgb(29,37,59);\">This field is nullable. It supports file uploads in jpeg, png, jpg, gif, & svg format, with a maximum size limit of 2MB. The dimensions of the image should be 1200 x 800px.</span></p><p><b>Page Description: </b><span style=\"background-color:rgb(255,255,255);color:rgb(29,37,59);\">This field is required. It is a textarea field.</span></p>"
            }',
        ]);
        SinglePages::create([
            'page_key' => 'assessment-criteria',
            'frontend_slug' => 'assessment-criteria',
            'title' => 'Assessment Criteria',
            'form_data' => '{
                "1": {
                    "field_key": "banner-image",
                    "field_name": "Banner Image",
                    "type": "image",
                    "required": "nullable"
                },
                "2": {
                    "field_key": "page-image",
                    "field_name": "Page Image",
                    "type": "image",
                    "required": "nullable"
                },
                "3": {
                    "field_key": "page-description",
                    "field_name": "Page Description",
                    "type": "textarea",
                    "required": "required"
                }
            }',
            'documentation' => '{
                "title": "Assessment Criteria",
                "details": "<p><b>Banner Image: </b><span style=\"background-color:rgb(255,255,255);color:rgb(29,37,59);\">This field is nullable. It supports file uploads in jpeg, png, jpg, gif, & svg format, with a maximum size limit of 2MB. The dimensions of the image should be 910 x 230px.</span></p><p><b>Page Image: </b><span style=\"background-color:rgb(255,255,255);color:rgb(29,37,59);\">This field is nullable. It supports file uploads in jpeg, png, jpg, gif, & svg format, with a maximum size limit of 2MB. The dimensions of the image should be 1200 x 800px.</span></p><p><b>Page Description: </b><span style=\"background-color:rgb(255,255,255);color:rgb(29,37,59);\">This field is required. It is a textarea field.</span></p>"
            }',
        ]);
        SinglePages::create([
            'page_key' => 'fees-&-costs',
            'frontend_slug' => 'fees-&-costs',
            'title' => 'Fees & Costs',
            'form_data' => '{
                "1": {
                    "field_key": "banner-image",
                    "field_name": "Banner Image",
                    "type": "image",
                    "required": "nullable"
                },
                "2": {
                    "field_key": "upload-files",
                    "field_name": "Upload Files",
                    "type": "file_multiple",
                    "required": "required"
                }
            }',
            'documentation' => '{
                "title": "Fees & Costs",
                "details": "<p><span style=\"background-color:rgb(255,255,255);color:rgb(29,37,59);\">The role\'s manages user permissions by assigning different roles to users. Each role defines specific access levels and actions a user can perform. It helps ensure proper authorization and security in the system.</span></p>"
            }',
        ]);
        SinglePages::create([
            'page_key' => 'icsb-faculty',
            'frontend_slug' => 'icsb-faculty',
            'title' => 'ICSB Faculty',
            'form_data' => '{
                "1": {
                    "field_key": "banner-image",
                    "field_name": "Banner Image",
                    "type": "image",
                    "required": "nullable"
                },
                "2": {
                    "field_key": "page-image",
                    "field_name": "Page Image",
                    "type": "image",
                    "required": "nullable"
                },
                "3": {
                    "field_key": "page-description",
                    "field_name": "Page Description",
                    "type": "textarea",
                    "required": "required"
                }
            }',
            'documentation' => '{
                "title": "ICSB Faculty",
                "details": "<p style=\"margin-left:-15px;\">The role\'s manages user permissions by assigning different roles to users. Each role defines specific access levels and actions a user can perform. It helps ensure proper authorization and security in the system.</p><p style=\"margin-left:auto;\"><br>&nbsp;</p>"
            }',
        ]);
        SinglePages::create([
            'page_key' => 'who-we-are',
            'frontend_slug' => 'who-we-are',
            'title' => 'Who we are',
            'form_data' => '{
                "1": {
                    "field_key": "background-image",
                    "field_name": "Background Image",
                    "type": "image",
                    "required": "required"
                },
                "2": {
                    "field_key": "slider-images",
                    "field_name": "Slider Images",
                    "type": "image_multiple",
                    "required": "required"
                },
                "3": {
                    "field_key": "page-description",
                    "field_name": "Page Description",
                    "type": "textarea",
                    "required": "required"
                }
            }',
            'documentation' => '{
                "title": "Who we are",
                "details": "<p><b>Background Image: </b><span style=\"background-color:rgb(255,255,255);color:rgb(29,37,59);\">This field is required. It supports file uploads in jpeg, png, jpg, gif, & svg format, with a maximum size limit of 2MB. The dimensions of the image should be 1920 x 700px.</span></p><p><b>Slider Images: </b><span style=\"background-color:rgb(255,255,255);color:rgb(29,37,59);\">This field is required. It supports file uploads in jpeg, png, jpg, gif, & svg format, with a maximum size limit of 5MB. The dimensions of the image should be 1200 x 800px. You can select multiple images by pressing the SHIFT/CTRL key.</span></p><p><b>Page Description: </b><span style=\"background-color:rgb(255,255,255);color:rgb(29,37,59);\">This field is required. It is a textarea field.</span></p>"
            }',
        ]);
        SinglePages::create([
            'page_key' => 'pop-up',
            'frontend_slug' => 'pop-up',
            'title' => 'Pop Up',
            'form_data' => '{
                "1": {
                    "field_key": "upload-image",
                    "field_name": "Upload Image",
                    "type": "image",
                    "required": "required"
                },
                "2": {
                    "field_key": "url",
                    "field_name": "URL",
                    "type": "url",
                    "required": "nullable"
                }
            }',
            'documentation' => '{
                "title": "Pop Up",
                "details": "<p><b>Upload Image: </b><span style=\"background-color:rgb(255,255,255);color:rgb(29,37,59);\">This field is required. It supports file uploads in jpeg, png, jpg, gif, & svg format, with a maximum size limit of 2MB. The dimensions of the image should be 1200 x 800px.</span></p><p><b>URL: </b><span style=\"background-color:rgb(255,255,255);color:rgb(29,37,59);\">This field is nullable. It is a URL field and it represents the URL of the Pop Up Details.</span></p>"
            }',
        ]);
        SinglePages::create([
            'page_key' => 'banner-video',
            'frontend_slug' => 'banner-video',
            'title' => 'Banner Video',
            'form_data' => '{
                "1": {
                    "field_key": "upload-video",
                    "field_name": "Upload Video",
                    "type": "file_single",
                    "required": "required"
                },
                "2": {
                    "field_key": "banner-title",
                    "field_name": "Banner Title",
                    "type": "text",
                    "required": "required"
                }
            }',
            'documentation' => '{
                "title": "Banner Video",
                "details": "<p><b>Upload Video: </b><span style=\"background-color:rgb(255,255,255);color:rgb(29,37,59);\">This field is required. The name field should represent the file name, and it supports file uploads in the mp4 format. Multiple files can be uploaded, and individual files can be deleted by clicking on the delete icon next to each file.</span></p><p><b>Banner Title: </b><span style=\"background-color:rgb(255,255,255);color:rgb(29,37,59);\">This field is required. It is a text field with character limit of 255 characters.</span></p>"
            }',
        ]);
        SinglePages::create([
            'page_key' => 'policy',
            'frontend_slug' => 'policy',
            'title' => 'Policy',
            'form_data' => '{
                "1": {
                    "field_key": "banner-image",
                    "field_name": "Banner Image",
                    "type": "image",
                    "required": "nullable"
                },
                "2": {
                    "field_key": "upload-files",
                    "field_name": "Upload Files",
                    "type": "file_multiple",
                    "required": "required"
                }
            }',
            'documentation' => '{
                "title": "Policy",
                "details": "<p><span style=\"background-color:rgb(255,255,255);color:rgb(29,37,59);\">The role\'s manages user permissions by assigning different roles to users. Each role defines specific access levels and actions a user can perform. It helps ensure proper authorization and security in the system.</span></p>"
            }',
        ]);
        SinglePages::create([
            'page_key' => 'student-login',
            'frontend_slug' => 'student-login',
            'title' => 'Student Login',
            'form_data' => '{
                "1": {
                    "type": "url",
                    "required": "required",
                    "field_key": "url",
                    "field_name": "URL"
                }
            }',
            'documentation' => '{
                "title": "Student Login",
                "details": "<p><b>URL: </b><span style=\"background-color:rgb(255,255,255);color:rgb(29,37,59);\">This field is required. It is a URL field that represents the login URL of the ICSB Student Portal</span></p>"
            }',
        ]);
        SinglePages::create([
            'page_key' => 'member-login',
            'frontend_slug' => 'member-login',
            'title' => 'Member Login',
            'form_data' => '{
                "1": {
                    "type": "url",
                    "required": "required",
                    "field_key": "url",
                    "field_name": "URL"
                }
            }',
            'documentation' => '{
                "title": "Member Login",
                "details": "<p><b>URL: </b><span style=\"background-color:rgb(255,255,255);color:rgb(29,37,59);\">This field is required. It is a URL field that represents the login URL of the ICSB Member Portal</span></p>"
            }',
        ]);
        SinglePages::create([
            'page_key' => 'online-admission',
            'frontend_slug' => 'online-admission',
            'title' => 'Online Admission',
            'form_data' => '{
                "1": {
                    "type": "url",
                    "required": "required",
                    "field_key": "url",
                    "field_name": "URL"
                }
            }',
            'documentation' => '{
                "title": "Online Admission",
                "details": "<p><span style=\"background-color:rgb(255,255,255);color:rgb(29,37,59);\">The role\'s manages user permissions by assigning different roles to users. Each role defines specific access levels and actions a user can perform. It helps ensure proper authorization and security in the system.</span></p>"
            }',
        ]);
        SinglePages::create([
            'page_key' => 'exam-registration',
            'frontend_slug' => 'exam-registration',
            'title' => 'Exam Registration',
            'form_data' => '{
                "1": {
                    "type": "url",
                    "required": "required",
                    "field_key": "url",
                    "field_name": "URL"
                }
            }',
            'documentation' => '{
                "title": "Exam Registration",
                "details": "<p><span style=\"background-color:rgb(255,255,255);color:rgb(29,37,59);\">The role\'s manages user permissions by assigning different roles to users. Each role defines specific access levels and actions a user can perform. It helps ensure proper authorization and security in the system.</span></p>"
            }',
        ]);
    }
}
