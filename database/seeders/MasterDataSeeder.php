<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class MasterDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        # Create default option groups using firstOrCreate to avoid duplicates
        $groups = [
            ['option_group_name' => 'continent', 'created_by' => 3],
            ['option_group_name' => 'country', 'created_by' => 3],
            ['option_group_name' => 'region', 'created_by' => 3],
            ['option_group_name' => 'division', 'created_by' => 3],
            ['option_group_name' => 'sub-district', 'created_by' => 3],
            ['option_group_name' => 'city', 'created_by' => 3],
            ['option_group_name' => 'state', 'created_by' => 3],
            ['option_group_name' => 'union', 'created_by' => 3],
            ['option_group_name' => 'word', 'created_by' => 3],
            ['option_group_name' => 'village', 'created_by' => 3],
            ['option_group_name' => 'religion', 'created_by' => 3],
            ['option_group_name' => 'gender', 'created_by' => 3],
            ['option_group_name' => 'marital_status', 'created_by' => 3],
            ['option_group_name' => 'blood_group', 'created_by' => 3],
            ['option_group_name' => 'department', 'created_by' => 3],
            ['option_group_name' => 'designation', 'created_by' => 3],
            ['option_group_name' => 'employee_type', 'created_by' => 3],
            ['option_group_name' => 'currency_type', 'created_by' => 3],
            ['option_group_name' => 'grade', 'created_by' => 3],
            ['option_group_name' => 'working_shift', 'created_by' => 3],
            ['option_group_name' => 'leave_type', 'created_by' => 3],
            ['option_group_name' => 'pay_type', 'created_by' => 3],
            ['option_group_name' => 'relative_type', 'created_by' => 3],
            ['option_group_name' => 'bank', 'created_by' => 3],
            ['option_group_name' => 'yearly_holiday', 'created_by' => 3],
            # E-commerce attribute groups
            ['option_group_name' => 'Color', 'created_by' => 3],
            ['option_group_name' => 'Size', 'created_by' => 3],
            ['option_group_name' => 'Fabric', 'created_by' => 3],
            ['option_group_name' => 'Material', 'created_by' => 3],
        ];

        foreach ($groups as $group) {
            DB::table('option_groups')->insertOrIgnore([
                'option_group_name' => $group['option_group_name'],
                'created_by' => $group['created_by'],
            ]);
        }

        $options = [
            [
                'option_group_name' => 'continent',
                'option' => [
                    'Asia', 'Africa', 'North America', 'South America',
                    'Antarctica', 'Europe', 'Australia',
                ]
            ], [
                'option_group_name' => 'country',
                'option' => [
                    'Bangladesh', 'Pakistan', 'India', 'Miyanmar', 'Vutan',
                    'Nepal', 'Srilanka', 'China', 'South Korea', 'North Korea',
                    'Thiland', 'Singapue', 'America', 'Saudi Arabia', 'Iran',
                    'Iraq', 'Afganistan', 'Turkey', 'Libiya', 'Seriya',
                ]
            ], [
                'option_group_name' => 'blood_group',
                'option' => ['A+', 'A-', 'B+', 'B-', 'AB+', 'AB-', 'O+', 'O-']
            ], [
                'option_group_name' => 'gender',
                'option' => ['Male', 'Female', 'Common']
            ], [
                'option_group_name' => 'religion',
                'option' => [
                    'Islam', 'Christianity', 'Buddhism', 'Hinduism', 'Jainism',
                    'Judaism', 'Shinto', 'Sikhism', 'Taoism', 'Zoroastrianism',
                ]
            ], [
                'option_group_name' => 'marital_status',
                'option' => [
                    'Married', 'Divorced', 'Separated', 'Widowed', 'Never married'
                ]
            ], [
                'option_group_name' => 'leave_type',
                'option' => [
                    'Annual Leave', 'Casual Leave', 'Sick Leave',
                    'Maternity Leave', 'Special Leave'
                ]
            ], [
                'option_group_name' => 'pay_type',
                'option' => [
                    'Cash', 'Check', 'Bank', 'Credit Card', 'A/R', 'COD'
                ]
            ], [
                'option_group_name' => 'yearly_holiday',
                'option' => [
                    'Language Martyrs Day', 'Shab e-Barat', 'Independence Day',
                    'Bengali New Year', 'Shab-e-Qadr', 'Jumatul Bidah',
                    'Labour Day', 'Eid al-Fitr', 'Buddha Purnima', 'Eid-ul-Azha',
                    'Ashura', 'National Mourning Day', 'Janmashtami', 'Durga Puja',
                    'Eid-e-Miladunnabi', 'Victory Day', 'Christmas Day'
                ]
            ], [
                'option_group_name' => 'working_shift',
                'option' => ['Day', 'Night', 'Morning']
            ], [
                'option_group_name' => 'relative_type',
                'option' => [
                    'Father', 'Grand Father', 'Mother', 'Grand Mother',
                    'Brother', 'Sister', 'Wife', 'Son', 'Daughter',
                    'Brother-in-law', 'Sister-in-law', 'Father-in-law', 'Mother-in-law'
                ]
            ], [
                'option_group_name' => 'currency_type',
                'option' => [
                    'US dollar (USD)', 'Euro (EUR)', 'Japanese yen (JPY)',
                    'Pound sterling (GBP)', 'Australian dollar (AUD)',
                    'Canadian dollar (CAD)', 'Swiss franc (CHF)',
                    'Chinese renminbi (CNH)', 'Hong Kong dollar (HKD)',
                    'New Zealand dollar (NZD)', 'Taka (BDT)',
                ]
            ], [
                'option_group_name' => 'grade',
                'option' => [
                    'Grade 1', 'Grade 2', 'Grade 3', 'Grade 4', 'Grade 5',
                    'Grade 6', 'Grade 7', 'Grade 8', 'Grade 9', 'Grade 10',
                    'Grade 11', 'Grade 12', 'Grade 13', 'Grade 14'
                ]
            ], [
                'option_group_name' => 'employee_type',
                'option' => [
                    'Full-time', 'Part-time', 'Temporary', 'Seasonal', 'Leased',
                    'Contactual', 'Provision', 'Permenent', 'Terminated', 'Left'
                ]
            ], [
                'option_group_name' => 'designation',
                'option' => [
                    "Account Executive", "Account Manager", "Administrative Assistant",
                    "Administrator", "Advisor", "Agent", "Aide", "Analyst",
                    "Application Developer", "Architect", "Art Director", "Artist",
                    "Assistant", "Assistant Professor", "Attendant", "Attorney",
                    "Auditor", "Barista", "Bookkeeper", "Branch Manager",
                    "Brand Strategist", "Broker", "Business Analyst",
                    "Business Development Manager", "Business Manager", "Cashier",
                    "Chief Architect", "Chief Engineer", "Chief Executive Officer (CEO)",
                    "Chief Financial Officer (CFO)", "Chief Information Officer (CIO)",
                    "Chief Information Security Officer (CISO)", "Chief Marketing Officer (CMO)",
                    "Chief Operating Officer (COO)", "Chief People Officer (CPO)",
                    "Chief Security Officer (CSO)", "Chief Technology Officer (CTO)",
                    "Clerk", "Client Partner", "Controller", "Coordinator", "Counsel",
                    "Creative Director", "Crew", "Curator", "Customer Advocate",
                    "Customer Service Representative", "Data Analyst", "Data Engineer",
                    "Data Scientist", "Designer", "Director", "Driver", "Economist",
                    "Engineer", "Engineering Manager", "Entrepreneur", "Evangelist",
                    "Executive Assistant", "Expert", "Founder", "General Counsel",
                    "Generalist", "Graphic Designer", "Head of HR", "Head of Sales",
                    "Human Resources Associate", "Human Resources Generalist",
                    "Instructor", "Interaction Designer", "Intern", "Interpreter",
                    "Journalist", "Leader / Lead / Team Lead", "Librarian", "Manager",
                    "Managing Director", "Managing Partner", "Marketing Manager",
                    "Media Buyer", "Media Producer", "Musician", "Office Manager",
                    "Operations Analyst", "Operations Manager", "Operator", "Owner",
                    "President", "Principal", "Producer", "Product Manager",
                    "Product Owner", "Professor", "Program Manager", "Project Manager",
                    "Proofreader", "Proprietor", "Receptionist", "Records Clerk",
                    "Recruiter", "Research Manager", "Researcher", "Risk Manager",
                    "Sales Associate", "Sales Engineer", "Sales Manager",
                    "Sales Representative", "Sales Specialist", "Scientist / Research Scientist",
                    "Security Engineer", "Software Architect", "Software Developer",
                    "Software Engineer", "Solutions Architect", "Specialist", "Staff",
                    "Store Manager", "Strategist", "Superintendent", "Supervisor",
                    "Supply Manager", "Support Specialist", "Systems Developer",
                    "Teacher", "Teaching Assistant", "Tech Lead", "Technician",
                    "Test Engineer", "Trainee", "Trainer", "Translator", "Tutor",
                    "UX Designer", "Videographer", "Waiter/Waitress", "Web Designer",
                    "Web Developer", "Web Producer", "Worker", "Writer",
                ]
            ],
            # E-commerce attribute options
            [
                'option_group_name' => 'Color',
                'option' => [
                    'Red', 'Blue', 'Green', 'Black', 'White', 'Gray', 'Grey',
                    'Navy', 'Brown', 'Beige', 'Pink', 'Purple', 'Yellow', 'Orange',
                    'Maroon', 'Teal', 'Olive', 'Cyan', 'Magenta', 'Gold', 'Silver',
                    'Bronze', 'Multicolor', 'Pattern', 'Print',
                ]
            ], [
                'option_group_name' => 'Size',
                'option' => [
                    'XS', 'S', 'M', 'L', 'XL', 'XXL', 'XXXL', '4XL', '5XL',
                    'One Size', 'Custom', '28', '30', '32', '34', '36', '38',
                    '40', '42', '44', '46', '48', '50', '52', '54', '56', '58',
                    '60', 'Free Size',
                ]
            ], [
                'option_group_name' => 'Fabric',
                'option' => [
                    'Cotton', 'Polyester', 'Silk', 'Wool', 'Linen', 'Denim',
                    'Leather', 'Suede', 'Canvas', 'Velvet', 'Chiffon', 'Satin',
                    'Jersey', 'Fleece', 'Knit', 'Woven', 'Mesh', 'Lace',
                    'Organza', 'Tulle', 'Rayon', 'Viscose', 'Modal', 'Bamboo',
                    'Hemp', 'Cashmere', 'Angora', 'Acrylic', 'Nylon', 'Spandex',
                    'Elastane', 'Lycra', 'Microfiber', 'Tencel', 'Modal',
                ]
            ], [
                'option_group_name' => 'Material',
                'option' => [
                    'Cotton', 'Polyester', 'Silk', 'Wool', 'Leather', 'Synthetic',
                    'Canvas', 'Nylon', 'Polyurethane', 'PVC', 'Rubber', 'Metal',
                    'Stainless Steel', 'Aluminum', 'Titanium', 'Plastic', 'Acrylic',
                    'Glass', 'Ceramic', 'Wood', 'Bamboo', 'Paper', 'Cardboard',
                    'EVA', 'TPU', 'Silicone', 'Carbon Fiber', 'Fiberglass',
                    'Cork', 'Felt', 'Neoprene', 'Mesh', 'Organic Cotton',
                    'Recycled Polyester', 'Hemp', 'Jute', 'Linen',
                ]
            ],
        ];

        foreach ($options as $opt) {
            $groupName = $opt['option_group_name'];
            foreach ($opt['option'] as $value) {
                DB::table('options')->insertOrIgnore([
                    'option_group_name' => $groupName,
                    'option_value' => $value,
                    'created_by' => 3,
                    'created_at' => now(),
                ]);
            }
        }
    }
}