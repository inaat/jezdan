<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SystemSettingsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('system_settings')->insert([
            [
                'id' => 1,
                'org_name' => 'Antalya School & College Swat Campus',
                'org_short_name' => 'ASC',
                'org_address' => 'Bagh Deri Road, Sambat Cham, Swat, Khyber Pakhtunkhwa',
                'org_contact_number' => '03404099910',
                'org_email' => null, // Insert organization email here
                'org_website' => null, // Insert organization website here
                'org_logo' => 'storage/tenantsaadschool/business_logos/1711390582_1692769444_A07-removebg-preview.png',
                'tag_line' => 'Turkish Standard Education',
                'page_header_logo' => 'storage/tenantsaadschool/business_logos/1711390582_1699678092_New.jpg',
                'id_card_logo' => 'storage/tenantsaadschool/business_logos/1711390582_1699681002_3.jpg',
                'org_favicon' => 'storage/tenantsaadschool/business_logos/1711390582_1692769444_A07-removebg-preview.png',
                'currency_id' => 91,
                'currency_symbol_placement' => 'before',
                'start_date' => '2023-01-01',
                'date_format' => 'd-m-Y',
                'time_format' => '12',
                'time_zone' => 'Asia/Karachi',
                'start_month' => '',
                'transaction_edit_days' => 30,
                'email_settings' => '{"mail_driver":"smtp","mail_host":"sirms.edu.pk","mail_port":"465","mail_username":"info@sirms.edu.pk","mail_password":"sirms.edu.pk","mail_encryption":"ssl","mail_from_address":"info@sirms.edu.pk","mail_from_name":"info@sirms.edu.pk"}',
                'sms_settings' => '{"sms_service":"other","nexmo_key":null,"nexmo_secret":null,"nexmo_from":null,"twilio_sid":null,"twilio_token":null,"twilio_from":null,"url":"http:\/\/localhost\/django-admin\/api\/sms","send_to_param_name":"to","msg_param_name":"text","request_method":"post","header_1":null,"header_val_1":null,"header_2":null,"header_val_2":null,"header_3":null,"header_val_3":null,"param_1":null,"param_val_1":null,"param_2":null,"param_val_2":null,"param_3":null,"param_val_3":null,"param_4":null,"param_val_4":null,"param_5":null,"param_val_5":null,"param_6":null,"param_val_6":null,"param_7":null,"param_val_7":null,"param_8":null,"param_val_8":null,"param_9":null,"param_val_9":null,"param_10":null,"param_val_10":null}',
                'ref_no_prefixes' => '{"student":"std1","employee":"Em","fee_payment":"FeeP","expenses_payment":"FeeP","admission":"Adm"}',
                'enable_tooltip' => 1,
                'theme_color' => 'blue',
                'common_settings' => '{"default_datatable_page_entries":"25","active_students":"1","inactive_students":"1","pass_out_students":"1","struck_up_students":"1","took_slc_students":"1","active_employees":"1","resign_employees":"1"}',
                'created_at' => now(),
                'updated_at' => now(),
                'pdf' => '',
            ],
        ]);
    }
}
