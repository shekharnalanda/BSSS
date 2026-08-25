<?php

namespace Database\Seeders;

use App\Models\MembershipType;
use App\Models\Program;
use Illuminate\Database\Seeder;

class BsssProgramMembershipSeeder extends Seeder
{
    public function run(): void
    {
        $programs = [
            [
                'title' => 'शैक्षणिक जागरूकता',
                'slug' => 'educational-awareness',
                'short_description' => 'समाज में शिक्षा के महत्व और गुणवत्तापूर्ण शिक्षण के प्रति जागरूकता बढ़ाना।',
                'sort_order' => 1,
            ],
            [
                'title' => 'विद्यालय एवं संस्थान सहयोग',
                'slug' => 'institution-support',
                'short_description' => 'स्वतंत्र विद्यालयों एवं शिक्षण संस्थानों को संगठनात्मक और शैक्षणिक सहयोग प्रदान करना।',
                'sort_order' => 2,
            ],
            [
                'title' => 'शिक्षक विकास एवं प्रशिक्षण',
                'slug' => 'teacher-development',
                'short_description' => 'शिक्षकों के प्रशिक्षण, क्षमता विकास एवं आधुनिक शिक्षण पद्धतियों को प्रोत्साहित करना।',
                'sort_order' => 3,
            ],
            [
                'title' => 'कौशल एवं रोजगारोन्मुख शिक्षा',
                'slug' => 'skill-development',
                'short_description' => 'विद्यार्थियों एवं युवाओं के लिए व्यावहारिक और रोजगारोन्मुख कौशल विकास को बढ़ावा देना।',
                'sort_order' => 4,
            ],
            [
                'title' => 'विद्यार्थी सहयोग',
                'slug' => 'student-support',
                'short_description' => 'विद्यार्थियों को मार्गदर्शन, शैक्षणिक संसाधन एवं अवसरों से जोड़ना।',
                'sort_order' => 5,
            ],
            [
                'title' => 'सामाजिक एवं राष्ट्रीय जागरूकता',
                'slug' => 'national-awareness',
                'short_description' => 'शिक्षा के माध्यम से सामाजिक जिम्मेदारी, स्वावलम्बन और राष्ट्र निर्माण को मजबूत करना।',
                'sort_order' => 6,
            ],
        ];

        foreach ($programs as $program) {
            Program::updateOrCreate(
                ['slug' => $program['slug']],
                array_merge($program, [
                    'is_featured' => true,
                    'is_active' => true,
                ])
            );
        }

        $memberships = [
            [
                'name' => 'सामान्य सदस्यता',
                'slug' => 'general-membership',
                'description' => 'भारतीय स्वतंत्र शिक्षण संघ से सामान्य सदस्य के रूप में जुड़ने हेतु।',
                'sort_order' => 1,
            ],
            [
                'name' => 'संस्थागत सदस्यता',
                'slug' => 'institutional-membership',
                'description' => 'विद्यालय, शिक्षण संस्थान अथवा शैक्षणिक केन्द्र के संगठन से जुड़ने हेतु।',
                'sort_order' => 2,
            ],
            [
                'name' => 'सहयोगी सदस्यता',
                'slug' => 'associate-membership',
                'description' => 'शिक्षा एवं सामाजिक उद्देश्यों में सहयोग करने वाले व्यक्तियों के लिए।',
                'sort_order' => 3,
            ],
        ];

        foreach ($memberships as $membership) {
            MembershipType::updateOrCreate(
                ['slug' => $membership['slug']],
                array_merge($membership, [
                    'fee' => null,
                    'validity_months' => null,
                    'is_active' => true,
                ])
            );
        }
    }
}
