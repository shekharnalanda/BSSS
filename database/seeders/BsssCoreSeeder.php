<?php

namespace Database\Seeders;

use App\Models\Committee;
use App\Models\CommitteeMember;
use App\Models\LeadershipMessage;
use Illuminate\Database\Seeder;

class BsssCoreSeeder extends Seeder
{
    public function run(): void
    {
        $national = Committee::updateOrCreate(
            ['level' => 'national', 'name' => 'राष्ट्रीय कार्यकारिणी'],
            [
                'sort_order' => 1,
                'is_active' => true,
            ]
        );

        $bihar = Committee::updateOrCreate(
            [
                'level' => 'state',
                'name' => 'प्रदेश कार्यकारिणी - बिहार',
                'state' => 'बिहार',
            ],
            [
                'sort_order' => 2,
                'is_active' => true,
            ]
        );

        $nalanda = Committee::updateOrCreate(
            [
                'level' => 'district',
                'name' => 'नालंदा जिला कार्यकारिणी',
                'state' => 'बिहार',
                'district' => 'नालंदा',
            ],
            [
                'sort_order' => 3,
                'is_active' => true,
            ]
        );

        CommitteeMember::updateOrCreate(
            [
                'committee_id' => $national->id,
                'name' => 'भारत मानस',
            ],
            [
                'designation' => 'राष्ट्रीय अध्यक्ष',
                'mobile' => '9430888639',
                'is_authorized_person' => true,
                'is_featured' => true,
                'sort_order' => 1,
                'is_active' => true,
            ]
        );

        CommitteeMember::updateOrCreate(
            [
                'committee_id' => $national->id,
                'name' => 'डॉ. संतोष कु० शर्मा',
            ],
            [
                'designation' => 'राष्ट्रीय महासचिव',
                'mobile' => '9334330043',
                'sort_order' => 2,
                'is_active' => true,
            ]
        );

        $stateMembers = [
            ['प्रदेश अध्यक्ष', 'भूषण शर्मा', '8340536887', '8292606652'],
            ['प्रदेश सचिव', 'राजकुमार', '9534744575', null],
            ['प्रदेश कोषाध्यक्ष', 'श्रीमती अर्चना सिंह', '8969440181', null],
            ['संयुक्त सचिव', 'अजीत कुमार', '9939592514', null],
            ['संयुक्त सचिव', 'संजीत कुमार', '7277569640', null],
            ['अध्यक्ष, सांस्कृतिक प्रकोष्ठ', 'शिवजी मिश्र', '8340671657', null],
            ['अध्यक्ष, तकनीकी प्रकोष्ठ', 'सुजीत शेखर', '9334779133', null],
            ['संरक्षक', 'ई. शशि शेखर', '9934868247', null],
        ];

        foreach ($stateMembers as $index => $member) {
            CommitteeMember::updateOrCreate(
                [
                    'committee_id' => $bihar->id,
                    'name' => $member[1],
                    'designation' => $member[0],
                ],
                [
                    'mobile' => $member[2],
                    'alternate_mobile' => $member[3],
                    'sort_order' => $index + 1,
                    'is_active' => true,
                ]
            );
        }

        $districtMembers = [
            ['जिलाध्यक्ष', 'मो. जाहिद अनवर', '9279422788'],
            ['उपाध्यक्ष', 'धर्मेन्द्र कुमार', '9934739290'],
            ['सचिव', 'रंजीत कुमार', '8651671295'],
            ['कोषाध्यक्ष', 'अरविन्द प्रसाद', '7488066226'],
            ['सह-कोषाध्यक्ष', 'अजय कुमार', '9798157470'],
            ['संयुक्त सचिव', 'विकास कुमार', '9304545594'],
            ['संयुक्त सचिव', 'अखिलेश प्रसाद', '9905266254'],
            ['संयुक्त सचिव', 'अमित कुमार', '9810222374'],
        ];

        foreach ($districtMembers as $index => $member) {
            CommitteeMember::updateOrCreate(
                [
                    'committee_id' => $nalanda->id,
                    'name' => $member[1],
                    'designation' => $member[0],
                ],
                [
                    'mobile' => $member[2],
                    'sort_order' => $index + 1,
                    'is_active' => true,
                ]
            );
        }

        LeadershipMessage::updateOrCreate(
            [
                'name' => 'भारत मानस',
                'designation' => 'राष्ट्रीय अध्यक्ष',
            ],
            [
                'title' => 'राष्ट्रीय अध्यक्ष का संदेश',
                'mobile' => '9430888639',
                'is_featured' => true,
                'sort_order' => 1,
                'is_active' => true,
            ]
        );
    }
}
