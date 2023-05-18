<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Nationalitie;
use Illuminate\Support\Facades\DB;

class NationalitiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('nationalities')->delete();

        $nationals = [

            
                'Afghan','Albanian','Aland Islander','Algerian','American Samoan','Andorran','Angolan','Anguillan',
                'Antarctican','Antiguan','Argentinian','Armenian','Aruban','Australian','Austrian','Azerbaijani','Bahamian',
                'Bahraini','Bangladeshi','Barbadian','Belarusian','Belgian','Belizean','Beninese','Saint Barthelmian',
                'Bermudan','Bhutanese','Bolivian','Bosnian / Herzegovinian','Botswanan','Bouvetian','Brazilian','British Indian Ocean Territory',
                'Bruneian','Bulgarian','Burkinabe','Burundian','Cambodian','Cameroonian','Canadian','Cape Verdean','Caymanian',
                'Central African','Chadian','Chilean','Chinese','Christmas Islander','Cocos Islander','Colombian','Comorian',
                'Congolese','Cook Islander','Costa Rican','Croatian','Cuban','Cypriot','Curacian','Czech','Danish','Djiboutian',
                'Dominican','Dominican','Ecuadorian','Egyptian','Salvadoran','Equatorial Guinean','Eritrean','Estonian',
                'Ethiopian','Falkland Islander','Faroese','Fijian','Finnish','French','French Guianese','French Polynesian',
                'French','Gabonese','Gambian','Georgian','German','Ghanaian','Gibraltar','Guernsian','Greek','Greenlandic',
                'Grenadian','Guadeloupe','Guamanian','Guatemalan','Guinean','Guinea-Bissauan','Guyanese','Haitian','Heard and Mc Donald Islanders',
                'Honduran','Hongkongese','Hungarian','Icelandic','Indian','Manx','Indonesian','Iranian','Iraqi','Irish','Italian',
                'Ivory Coastian','Jersian','Jamaican','Japanese','Jordanian','Kazakh','Kenyan','I-Kiribati','North Korean',
                'South Korean','Kosovar','Kuwaiti','Kyrgyzstani','Laotian','Latvian','Lebanese','Basotho','Liberian','Libyan',
                'Liechtenstein','Lithuanian','Luxembourger','Sri Lankian','Macanese','Macedonian','Malagasy','Malawian','Malaysian',
                'Maldivian','Malian','Maltese','Marshallese','Martiniquais','Mauritanian','Mauritian','Mahoran','Mexican','Micronesian',
                'Moldovan','Monacan','Mongolian','Montenegrin','Montserratian','Moroccan','Mozambican','Myanmarian','Namibian',
                'Nauruan','Nepalese','Dutch','Dutch Antilier','New Caledonian','New Zealander','Nicaraguan','Nigerien','Nigerian',
                'Niuean','Norfolk Islander','Northern Marianan','Norwegian','Omani','Pakistani','Palauan','Palestinian','Panamanian',
                'Papua New Guinean','Paraguayan','Peruvian','Filipino','Pitcairn Islander','Polish','Portuguese','Puerto Rican',
                'Qatari','Reunionese','Romanian','Russian','Rwandan','Kittitian/Nevisian','St. Martian(French)','St. Martian(Dutch)',
                'St. Pierre and Miquelon','Saint Vincent and the Grenadines','Samoan','Sammarinese','Sao Tomean','Saudi Arabian',
                'Senegalese','Serbian','Seychellois','Sierra Leonean','Singaporean','Slovak','Slovenian','Solomon Island',
                'Somali','South African','South Georgia and the South Sandwich','South Sudanese','Spanish','St. Helenian',
                'Sudanese','Surinamese','Svalbardian/Jan Mayenian','Swazi','Swedish','Swiss','Syrian','Taiwanese','Tajikistani',
                'Tanzanian','Thai','Timor-Lestian','Togolese','Tokelaian','Tongan','Trinidadian/Tobagonian','Tunisian','Turkish',
                'Turkmen','Turks and Caicos Islands','Tuvaluan','Ugandan','Ukrainian','Emirati','British','American','US Minor Outlying Islander',
                'Uruguayan','Uzbek','Vanuatuan','Venezuelan','Vietnamese','American Virgin Islander','Vatican','Wallisian/Futunan',
                'Sahrawian','Yemeni','Zambian','Zimbabwean'
            
        ];

        foreach ($nationals as $n) {
            Nationalitie::create(['Name' => $n]);
        }
    }
}
