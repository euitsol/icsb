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
                'form_data' =>
                    '{
                        "1":
                        {
                            "field_key":"banner-image",
                            "field_name":"banner_image",
                            "type":"image",
                            "required":"required"
                        },
                        "2":
                        {
                            "field_key":"details",
                            "field_name":"details",
                            "type":"textarea",
                            "required":"required"
                        }
                    }',
                'documentation' =>
                    '{
                        "title":"Vision",
                        "details":"<p><span style=\"background-color:rgb(255,255,255);color:rgb(29,37,59);\">The role\'s manages user permissions by assigning different roles to users. Each role defines specific access levels and actions a user can perform. It helps ensure proper authorization and security in the system.<\/span><\/p>"
                    }',
        ]);
        SinglePages::create([
                'page_key' => 'mission',
                'frontend_slug' => 'mission',
                'title' => 'Create Mission',
                'form_data' =>
                    '{
                        "1":
                        {
                            "field_key":"banner-image",
                            "field_name":"banner_image",
                            "type":"image",
                            "required":"required"
                        },
                        "2":
                        {
                            "field_key":"details",
                            "field_name":"details",
                            "type":"textarea",
                            "required":"required"
                        }
                    }',
                'documentation' =>
                    '{
                        "title":"Mission",
                        "details":"<p><span style=\"background-color:rgb(255,255,255);color:rgb(29,37,59);\">The role\'s manages user permissions by assigning different roles to users. Each role defines specific access levels and actions a user can perform. It helps ensure proper authorization and security in the system.<\/span><\/p>"
                    }',
        ]);
        SinglePages::create([
                'page_key' => 'objectives',
                'frontend_slug' => 'objectives',
                'title' => 'Create Objectives',
                'form_data' =>
                    '{
                        "1":
                        {
                            "field_key":"banner-image",
                            "field_name":"banner_image",
                            "type":"image",
                            "required":"required"
                        },
                        "2":
                        {
                            "field_key":"details",
                            "field_name":"details",
                            "type":"textarea",
                            "required":"required"
                        }
                    }',
                'documentation' =>
                    '{
                        "title":"Objectives",
                        "details":"<p><span style=\"background-color:rgb(255,255,255);color:rgb(29,37,59);\">The role\'s manages user permissions by assigning different roles to users. Each role defines specific access levels and actions a user can perform. It helps ensure proper authorization and security in the system.<\/span><\/p>"
                    }',
        ]);
        SinglePages::create([
                'page_key' => 'values',
                'frontend_slug' => 'values',
                'title' => 'Create Values',
                'form_data' =>
                    '{
                        "1":
                        {
                            "field_key":"banner-image",
                            "field_name":"banner_image",
                            "type":"image",
                            "required":"required"
                        },
                        "2":
                        {
                            "field_key":"details",
                            "field_name":"details",
                            "type":"textarea",
                            "required":"required"
                        }
                    }',
                'documentation' =>
                    '{
                        "title":"Values",
                        "details":"<p><span style=\"background-color:rgb(255,255,255);color:rgb(29,37,59);\">The role\'s manages user permissions by assigning different roles to users. Each role defines specific access levels and actions a user can perform. It helps ensure proper authorization and security in the system.<\/span><\/p>"
                    }',
        ]);
        SinglePages::create([
                'page_key' => 'cs-for-cg',
                'frontend_slug' => 'cs-for-cg',
                'title' => 'Create CS for CG',
                'form_data' =>
                    '{
                        "1":
                        {
                            "field_key":"banner-image",
                            "field_name":"banner_image",
                            "type":"image",
                            "required":"required"
                        },
                        "2":
                        {
                            "field_key":"details",
                            "field_name":"details",
                            "type":"textarea",
                            "required":"required"
                        }
                    }',
                'documentation' =>
                    '{
                        "title":"CS for CG",
                        "details":"<p><span style=\"background-color:rgb(255,255,255);color:rgb(29,37,59);\">The role\'s manages user permissions by assigning different roles to users. Each role defines specific access levels and actions a user can perform. It helps ensure proper authorization and security in the system.<\/span><\/p>"
                    }',
        ]);
        SinglePages::create([
                'page_key' => 'corporate-governance',
                'frontend_slug' => 'corporate-governance',
                'title' => 'Create Corporate Governance',
                'form_data' =>
                    '{
                        "1":
                        {
                            "field_key":"banner-image",
                            "field_name":"banner_image",
                            "type":"image",
                            "required":"required"
                        },
                        "2":
                        {
                            "field_key":"details",
                            "field_name":"details",
                            "type":"textarea",
                            "required":"required"
                        }
                    }',
                'documentation' =>
                    '{
                        "title":"Corporate Governance",
                        "details":"<p><span style=\"background-color:rgb(255,255,255);color:rgb(29,37,59);\">The role\'s manages user permissions by assigning different roles to users. Each role defines specific access levels and actions a user can perform. It helps ensure proper authorization and security in the system.<\/span><\/p>"
                    }',
        ]);
        SinglePages::create([
                'page_key' => 'who-are-css',
                'frontend_slug' => 'who-are-css',
                'title' => 'Create Who are CSs',
                'form_data' =>
                    '{
                        "1":
                        {
                            "field_key":"banner-image",
                            "field_name":"banner_image",
                            "type":"image",
                            "required":"required"
                        },
                        "2":
                        {
                            "field_key":"details",
                            "field_name":"details",
                            "type":"textarea",
                            "required":"required"
                        }
                    }',
                'documentation' =>
                    '{
                        "title":"Who are CSs",
                        "details":"<p><span style=\"background-color:rgb(255,255,255);color:rgb(29,37,59);\">The role\'s manages user permissions by assigning different roles to users. Each role defines specific access levels and actions a user can perform. It helps ensure proper authorization and security in the system.<\/span><\/p>"
                    }',
        ]);
        SinglePages::create([
                'page_key' => 'cs-membership',
                'frontend_slug' => 'cs-membership',
                'title' => 'Create CS Membership',
                'form_data' =>
                    '{
                        "1":
                        {
                            "field_key":"banner-image",
                            "field_name":"banner_image",
                            "type":"image",
                            "required":"required"
                        },
                        "2":
                        {
                            "field_key":"details",
                            "field_name":"details",
                            "type":"textarea",
                            "required":"required"
                        }
                    }',
                'documentation' =>
                    '{
                        "title":"CS Membership",
                        "details":"<p><span style=\"background-color:rgb(255,255,255);color:rgb(29,37,59);\">The role\'s manages user permissions by assigning different roles to users. Each role defines specific access levels and actions a user can perform. It helps ensure proper authorization and security in the system.<\/span><\/p>"
                    }',
        ]);
        SinglePages::create([
                'page_key' => 'code-of-conducts',
                'frontend_slug' => 'code-of-conducts',
                'title' => 'Create Code of Conducts',
                'form_data' =>
                    '{
                        "1":
                        {
                            "field_key":"banner-image",
                            "field_name":"banner_image",
                            "type":"image",
                            "required":"required"
                        },
                        "2":
                        {
                            "field_key":"details",
                            "field_name":"details",
                            "type":"textarea",
                            "required":"required"
                        }
                    }',
                'documentation' =>
                    '{
                        "title":"Code of Conducts",
                        "details":"<p><span style=\"background-color:rgb(255,255,255);color:rgb(29,37,59);\">The role\'s manages user permissions by assigning different roles to users. Each role defines specific access levels and actions a user can perform. It helps ensure proper authorization and security in the system.<\/span><\/p>"
                    }',
        ]);
        SinglePages::create([
                'page_key' => 'cpd-program',
                'frontend_slug' => 'cpd-program',
                'title' => 'Create CPD Program',
                'form_data' =>
                    '{
                        "1":
                        {
                            "field_key":"banner-image",
                            "field_name":"banner_image",
                            "type":"image",
                            "required":"required"
                        },
                        "2":
                        {
                            "field_key":"details",
                            "field_name":"details",
                            "type":"textarea",
                            "required":"required"
                        }
                    }',
                'documentation' =>
                    '{
                        "title":"CPD Program",
                        "details":"<p><span style=\"background-color:rgb(255,255,255);color:rgb(29,37,59);\">The role\'s manages user permissions by assigning different roles to users. Each role defines specific access levels and actions a user can perform. It helps ensure proper authorization and security in the system.<\/span><\/p>"
                    }',
        ]);
        SinglePages::create([
                'page_key' => 'training-program',
                'frontend_slug' => 'training-program',
                'title' => 'Create Training Program',
                'form_data' =>
                    '{
                        "1":
                        {
                            "field_key":"banner-image",
                            "field_name":"banner_image",
                            "type":"image",
                            "required":"required"
                        },
                        "2":
                        {
                            "field_key":"details",
                            "field_name":"details",
                            "type":"textarea",
                            "required":"required"
                        }
                    }',
                'documentation' =>
                    '{
                        "title":"Training Program",
                        "details":"<p><span style=\"background-color:rgb(255,255,255);color:rgb(29,37,59);\">The role\'s manages user permissions by assigning different roles to users. Each role defines specific access levels and actions a user can perform. It helps ensure proper authorization and security in the system.<\/span><\/p>"
                    }',
        ]);
        SinglePages::create([
                'page_key' => 'help-desk',
                'frontend_slug' => 'help-desk',
                'title' => 'Create Help Desk',
                'form_data' =>
                    '{
                        "1":
                        {
                            "field_key":"banner-image",
                            "field_name":"banner_image",
                            "type":"image",
                            "required":"required"
                        },
                        "2":
                        {
                            "field_key":"details",
                            "field_name":"details",
                            "type":"textarea",
                            "required":"required"
                        }
                    }',
                'documentation' =>
                    '{
                        "title":"Help Desk",
                        "details":"<p><span style=\"background-color:rgb(255,255,255);color:rgb(29,37,59);\">The role\'s manages user permissions by assigning different roles to users. Each role defines specific access levels and actions a user can perform. It helps ensure proper authorization and security in the system.<\/span><\/p>"
                    }',
        ]);
        SinglePages::create([
                'page_key' => 'eligibility',
                'frontend_slug' => 'eligibility',
                'title' => 'Create Eligibility',
                'form_data' =>
                    '{
                        "1":
                        {
                            "field_key":"banner-image",
                            "field_name":"banner_image",
                            "type":"image",
                            "required":"required"
                        },
                        "2":
                        {
                            "field_key":"details",
                            "field_name":"details",
                            "type":"textarea",
                            "required":"required"
                        }
                    }',
                'documentation' =>
                    '{
                        "title":"Eligibility",
                        "details":"<p><span style=\"background-color:rgb(255,255,255);color:rgb(29,37,59);\">The role\'s manages user permissions by assigning different roles to users. Each role defines specific access levels and actions a user can perform. It helps ensure proper authorization and security in the system.<\/span><\/p>"
                    }',
        ]);
        SinglePages::create([
                'page_key' => 'exam-schedule',
                'frontend_slug' => 'exam-schedule',
                'title' => 'Create Exam Schedule',
                'form_data' =>
                    '{
                        "1":
                        {
                            "field_key":"banner-image",
                            "field_name":"banner_image",
                            "type":"image",
                            "required":"required"
                        },
                        "2":
                        {
                            "field_key":"details",
                            "field_name":"details",
                            "type":"textarea",
                            "required":"required"
                        }
                    }',
                'documentation' =>
                    '{
                        "title":"Exam Schedule",
                        "details":"<p><span style=\"background-color:rgb(255,255,255);color:rgb(29,37,59);\">The role\'s manages user permissions by assigning different roles to users. Each role defines specific access levels and actions a user can perform. It helps ensure proper authorization and security in the system.<\/span><\/p>"
                    }',
        ]);
    }
}
