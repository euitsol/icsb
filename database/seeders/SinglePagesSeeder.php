<?php

namespace Database\Seeders;

use App\Models\SinglePages;
use Illuminate\Database\Seeder;

class SinglePagesSeeder extends Seeder
{
    public function run()
    {
        SinglePages::create([
            'page_key' => 'vision',
            'frontend_slug' => 'vision',
            'title' => 'Create Vision',
            'form_data' => '{
                "1":
                {
                    "field_key":"banner-image",
                    "field_name":"Banner Image",
                    "type":"image",
                    "required":"required"
                },
                "2":
                {
                    "field_key":"image",
                    "field_name":"Image",
                    "type":"image",
                    "required":"required"
                },
                "3":
                {
                    "field_key":"additional-images",
                    "field_name":"Additional Images",
                    "type":"file_multiple",
                    "required":"nullable"
                },
                "4":
                {
                    "field_key":"details",
                    "field_name":"Details",
                    "type":"textarea",
                    "required":"required"
                }
            }',
            'documentation' => '{
                "title":"Vision",
                "details":"<p><span style=\"background-color:rgb(255,255,255);color:rgb(29,37,59);\">The role\'s manages user permissions by assigning different roles to users. Each role defines specific access levels and actions a user can perform. It helps ensure proper authorization and security in the system.<\/span><\/p>"
            }',
        ]);
        SinglePages::create([
            'page_key' => 'mission',
            'frontend_slug' => 'mission',
            'title' => 'Create Mission',
            'form_data' => '{
                "1":
                {
                    "field_key":"banner-image",
                    "field_name":"Banner Image",
                    "type":"image",
                    "required":"required"
                },
                "2":
                {
                    "field_key":"image",
                    "field_name":"Image",
                    "type":"image",
                    "required":"required"
                },
                "3":
                {
                    "field_key":"additional-images",
                    "field_name":"Additional Images",
                    "type":"file_multiple",
                    "required":"nullable"
                },
                "4":
                {
                    "field_key":"details",
                    "field_name":"Details",
                    "type":"textarea",
                    "required":"required"
                }
            }',
            'documentation' => '{
                "title":"Mission",
                "details":"<p><span style=\"background-color:rgb(255,255,255);color:rgb(29,37,59);\">The role\'s manages user permissions by assigning different roles to users. Each role defines specific access levels and actions a user can perform. It helps ensure proper authorization and security in the system.<\/span><\/p>"
            }',
        ]);
        SinglePages::create([
            'page_key' => 'objectives',
            'frontend_slug' => 'objectives',
            'title' => 'Create Objectives',
            'form_data' => '{
                "1":
                {
                    "field_key":"banner-image",
                    "field_name":"Banner Image",
                    "type":"image",
                    "required":"required"
                },
                "2":
                {
                    "field_key":"image",
                    "field_name":"Image",
                    "type":"image",
                    "required":"required"
                },
                "3":
                {
                    "field_key":"additional-images",
                    "field_name":"Additional Images",
                    "type":"file_multiple",
                    "required":"nullable"
                },
                "4":
                {
                    "field_key":"details",
                    "field_name":"Details",
                    "type":"textarea",
                    "required":"required"
                }
            }',
            'documentation' => '{
                "title":"Objectives",
                "details":"<p><span style=\"background-color:rgb(255,255,255);color:rgb(29,37,59);\">The role\'s manages user permissions by assigning different roles to users. Each role defines specific access levels and actions a user can perform. It helps ensure proper authorization and security in the system.<\/span><\/p>"
            }',
        ]);
        SinglePages::create([
            'page_key' => 'values',
            'frontend_slug' => 'values',
            'title' => 'Create Values',
            'form_data' => '{
                "1":
                {
                    "field_key":"banner-image",
                    "field_name":"Banner Image",
                    "type":"image",
                    "required":"required"
                },
                "2":
                {
                    "field_key":"additional-images",
                    "field_name":"Additional Images",
                    "type":"file_multiple",
                    "required":"nullable"
                },
                "3":
                {
                    "field_key":"details",
                    "field_name":"Details",
                    "type":"textarea",
                    "required":"required"
                }
            }',
            'documentation' => '{
                "title":"Values",
                "details":"<p><span style=\"background-color:rgb(255,255,255);color:rgb(29,37,59);\">The role\'s manages user permissions by assigning different roles to users. Each role defines specific access levels and actions a user can perform. It helps ensure proper authorization and security in the system.<\/span><\/p>"
            }',
        ]);
        SinglePages::create([
            'page_key' => 'cs-for-cg',
            'frontend_slug' => 'cs-for-cg',
            'title' => 'Create CS for CG',
            'form_data' => '{
                "1":
                {
                    "field_key":"banner-image",
                    "field_name":"Banner Image",
                    "type":"image",
                    "required":"required"
                },
                "2":
                {
                    "field_key":"additional-images",
                    "field_name":"Additional Images",
                    "type":"file_multiple",
                    "required":"nullable"
                },
                "3":
                {
                    "field_key":"details",
                    "field_name":"Details",
                    "type":"textarea",
                    "required":"required"
                }
            }',
            'documentation' => '{
                "title":"CS for CG",
                "details":"<p><span style=\"background-color:rgb(255,255,255);color:rgb(29,37,59);\">The role\'s manages user permissions by assigning different roles to users. Each role defines specific access levels and actions a user can perform. It helps ensure proper authorization and security in the system.<\/span><\/p>"
            }',
        ]);
        SinglePages::create([
            'page_key' => 'corporate-governance',
            'frontend_slug' => 'corporate-governance',
            'title' => 'Create Corporate Governance',
            'form_data' => '{
                "1":
                {
                    "field_key":"banner-image",
                    "field_name":"Banner Image",
                    "type":"image",
                    "required":"required"
                },
                "2":
                {
                    "field_key":"additional-images",
                    "field_name":"Additional Images",
                    "type":"file_multiple",
                    "required":"nullable"
                },
                "3":
                {
                    "field_key":"details",
                    "field_name":"Details",
                    "type":"textarea",
                    "required":"required"
                }
            }',
            'documentation' => '{
                "title":"Corporate Governance",
                "details":"<p><span style=\"background-color:rgb(255,255,255);color:rgb(29,37,59);\">The role\'s manages user permissions by assigning different roles to users. Each role defines specific access levels and actions a user can perform. It helps ensure proper authorization and security in the system.<\/span><\/p>"
            }',
        ]);
        SinglePages::create([
            'page_key' => 'who-are-css',
            'frontend_slug' => 'who-are-css',
            'title' => 'Create Who are CSs',
            'form_data' => '{
                "1":
                {
                    "field_key":"banner-image",
                    "field_name":"Banner Image",
                    "type":"image",
                    "required":"required"
                },
                "2":
                {
                    "field_key":"additional-images",
                    "field_name":"Additional Images",
                    "type":"file_multiple",
                    "required":"nullable"
                },
                "3":
                {
                    "field_key":"details",
                    "field_name":"Details",
                    "type":"textarea",
                    "required":"required"
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
            'title' => 'Create CS Membership',
            'form_data' => '{
                "1":
                {
                    "field_key":"banner-image",
                    "field_name":"Banner Image",
                    "type":"image",
                    "required":"required"
                },
                "2":
                {
                    "field_key":"additional-images",
                    "field_name":"Additional Images",
                    "type":"file_multiple",
                    "required":"nullable"
                },
                "3":
                {
                    "field_key":"details",
                    "field_name":"Details",
                    "type":"textarea",
                    "required":"required"
                }
            }',
            'documentation' => '{
                "title":"CS Membership",
                "details":"<p><span style=\"background-color:rgb(255,255,255);color:rgb(29,37,59);\">The role\'s manages user permissions by assigning different roles to users. Each role defines specific access levels and actions a user can perform. It helps ensure proper authorization and security in the system.<\/span><\/p>"
            }',
        ]);
        SinglePages::create([
            'page_key' => 'code-of-conducts',
            'frontend_slug' => 'code-of-conducts',
            'title' => 'Create Code of Conducts',
            'form_data' => '{
                "1":
                {
                    "field_key":"banner-image",
                    "field_name":"Banner Image",
                    "type":"image",
                    "required":"required"
                },
                "2":
                {
                    "field_key":"additional-images",
                    "field_name":"Additional Images",
                    "type":"file_multiple",
                    "required":"nullable"
                },
                "3":
                {
                    "field_key":"details",
                    "field_name":"Details",
                    "type":"textarea",
                    "required":"required"
                }
            }',
            'documentation' => '{
                "title":"Code of Conducts",
                "details":"<p><span style=\"background-color:rgb(255,255,255);color:rgb(29,37,59);\">The role\'s manages user permissions by assigning different roles to users. Each role defines specific access levels and actions a user can perform. It helps ensure proper authorization and security in the system.<\/span><\/p>"
            }',
        ]);
        SinglePages::create([
            'page_key' => 'cpd-program',
            'frontend_slug' => 'cpd-program',
            'title' => 'Create CPD Program',
            'form_data' => '{
                "1":
                {
                    "field_key":"banner-image",
                    "field_name":"Banner Image",
                    "type":"image",
                    "required":"required"
                },
                "2":
                {
                    "field_key":"additional-images",
                    "field_name":"Additional Images",
                    "type":"file_multiple",
                    "required":"nullable"
                },
                "3":
                {
                    "field_key":"details",
                    "field_name":"Details",
                    "type":"textarea",
                    "required":"required"
                }
            }',
            'documentation' => '{
                "title":"CPD Program",
                "details":"<p><span style=\"background-color:rgb(255,255,255);color:rgb(29,37,59);\">The role\'s manages user permissions by assigning different roles to users. Each role defines specific access levels and actions a user can perform. It helps ensure proper authorization and security in the system.<\/span><\/p>"
            }',
        ]);
        SinglePages::create([
            'page_key' => 'training-program',
            'frontend_slug' => 'training-program',
            'title' => 'Create Training Program',
            'form_data' => '{
                "1":
                {
                    "field_key":"banner-image",
                    "field_name":"Banner Image",
                    "type":"image",
                    "required":"required"
                },
                "2":
                {
                    "field_key":"additional-images",
                    "field_name":"Additional Images",
                    "type":"file_multiple",
                    "required":"nullable"
                },
                "3":
                {
                    "field_key":"details",
                    "field_name":"Details",
                    "type":"textarea",
                    "required":"required"
                }
            }',
            'documentation' => '{
                "title":"Training Program",
                "details":"<p><span style=\"background-color:rgb(255,255,255);color:rgb(29,37,59);\">The role\'s manages user permissions by assigning different roles to users. Each role defines specific access levels and actions a user can perform. It helps ensure proper authorization and security in the system.<\/span><\/p>"
            }',
        ]);
        SinglePages::create([
            'page_key' => 'help-desk',
            'frontend_slug' => 'help-desk',
            'title' => 'Create Help Desk',
            'form_data' => '{
                "1":
                {
                    "field_key":"banner-image",
                    "field_name":"Banner Image",
                    "type":"image",
                    "required":"required"
                },
                "2":
                {
                    "field_key":"additional-images",
                    "field_name":"Additional Images",
                    "type":"file_multiple",
                    "required":"nullable"
                },
                "3":
                {
                    "field_key":"details",
                    "field_name":"Details",
                    "type":"textarea",
                    "required":"required"
                }
            }',
            'documentation' => '{
                "title":"Help Desk",
                "details":"<p><span style=\"background-color:rgb(255,255,255);color:rgb(29,37,59);\">The role\'s manages user permissions by assigning different roles to users. Each role defines specific access levels and actions a user can perform. It helps ensure proper authorization and security in the system.<\/span><\/p>"
            }',
        ]);
        SinglePages::create([
            'page_key' => 'eligibility',
            'frontend_slug' => 'eligibility',
            'title' => 'Create Eligibility',
            'form_data' => '{
                "1":
                {
                    "field_key":"banner-image",
                    "field_name":"Banner Image",
                    "type":"image",
                    "required":"required"
                },
                "2":
                {
                    "field_key":"additional-images",
                    "field_name":"Additional Images",
                    "type":"file_multiple",
                    "required":"nullable"
                },
                "3":
                {
                    "field_key":"details",
                    "field_name":"Details",
                    "type":"textarea",
                    "required":"required"
                }
            }',
            'documentation' => '{
                "title":"Eligibility",
                "details":"<p><span style=\"background-color:rgb(255,255,255);color:rgb(29,37,59);\">The role\'s manages user permissions by assigning different roles to users. Each role defines specific access levels and actions a user can perform. It helps ensure proper authorization and security in the system.<\/span><\/p>"
            }',
        ]);
        SinglePages::create([
            'page_key' => 'exam-schedule',
            'frontend_slug' => 'exam-schedule',
            'title' => 'Create Exam Schedule',
            'form_data' => '{
                "1":
                {
                    "field_key":"banner-image",
                    "field_name":"Banner Image",
                    "type":"image",
                    "required":"required"
                },
                "2":
                {
                    "field_key":"image",
                    "field_name":"Image",
                    "type":"image",
                    "required":"required"
                },
                "3":
                {
                    "field_key":"additional-images",
                    "field_name":"Additional Images",
                    "type":"file_multiple",
                    "required":"nullable"
                },
                "4":
                {
                    "field_key":"details",
                    "field_name":"Details",
                    "type":"textarea",
                    "required":"required"
                }
            }',
            'documentation' => '{
                "title":"Exam Schedule",
                "details":"<p><span style=\"background-color:rgb(255,255,255);color:rgb(29,37,59);\">The role\'s manages user permissions by assigning different roles to users. Each role defines specific access levels and actions a user can perform. It helps ensure proper authorization and security in the system.<\/span><\/p>"
            }',
        ]);
        SinglePages::create([
            'page_key' => 'member-portal',
            'frontend_slug' => 'member-portal',
            'title' => 'Create Member Portal',
            'form_data' => '{
                "1":
                {
                    "field_key":"portal-url",
                    "field_name":"Portal URL",
                    "type":"url",
                    "required":"required"
                }
            }',
            'documentation' => '{
                "title":"Member Portal",
                "details":"<p><span style=\"background-color:rgb(255,255,255);color:rgb(29,37,59);\">The role\'s manages user permissions by assigning different roles to users. Each role defines specific access levels and actions a user can perform. It helps ensure proper authorization and security in the system.<\/span><\/p>"
            }',
        ]);
        SinglePages::create([
            'page_key' => 'members-lounge',
            'frontend_slug' => 'members-lounge',
            'title' => 'Create Members Lounge',
            'form_data' => '{
                "1":
                {
                    "field_key":"title",
                    "field_name":"Title",
                    "type":"text",
                    "required":"required"},
                "2":
                {
                    "field_key":"images",
                    "field_name":"Images",
                    "type":"file_multiple",
                    "required":"required"
                },
                "3":
                {
                    "field_key":"details",
                    "field_name":"Details",
                    "type":"textarea",
                    "required":"required"
                }
            }',
            'documentation' => '{
                "title":"Members Lounge",
                "details":"<p><span style=\"background-color:rgb(255,255,255);color:rgb(29,37,59);\">The role\'s manages user permissions by assigning different roles to users. Each role defines specific access levels and actions a user can perform. It helps ensure proper authorization and security in the system.<\/span><\/p>"
            }',
        ]);
        SinglePages::create([
            'page_key' => 'job-placement',
            'frontend_slug' => 'job-placement',
            'title' => 'Create Job Placement',
            'form_data' => '{
                "1":
                {
                    "field_key":"title",
                    "field_name":"Title",
                    "type":"text",
                    "required":"required"},
                "2":
                {
                    "field_key":"company-name",
                    "field_name":"Company Name",
                    "type":"text",
                    "required":"required"},
                "3":
                {
                    "field_key":"company-url",
                    "field_name":"Company URL",
                    "type":"url",
                    "required":"required"},
                "4":
                {
                    "field_key":"job-type",
                    "field_name":"Job Type",
                    "type":"text",
                    "required":"required"},
                "5":
                {
                    "field_key":"salary-per-month",
                    "field_name":"Salary (Per Month)",
                    "type":"number",
                    "required":"required"},
                "6":
                {
                    "field_key":"deadline",
                    "field_name":"Deadline",
                    "type":"text",
                    "required":"required"},
                "7":
                {
                    "field_key":"application-url",
                    "field_name":"Application URL",
                    "type":"url",
                    "required":"required"}
            }',
            'documentation' => '{
                "title":"Job Placement",
                "details":"<p><span style=\"background-color:rgb(255,255,255);color:rgb(29,37,59);\">The role\'s manages user permissions by assigning different roles to users. Each role defines specific access levels and actions a user can perform. It helps ensure proper authorization and security in the system.<\/span><\/p>"
            }',
        ]);
    }
}
