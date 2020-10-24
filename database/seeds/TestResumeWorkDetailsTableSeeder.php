<?php

use Illuminate\Database\Seeder;

class TestResumeWorkDetailsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('resume_work_details')->truncate();

        DB::table('resume_work_details')->insert([
            'id' => 1,
            'resume_id' => 1,
            'company' => "Honiball Aviation Auditing",
            'title' => "Senior Systems Developer",
            'dates' => "Aug 2019 - Present",
            'details' => "In charge of the SEAMS project. (Smart Electronic Aviation Management System)<br/>
                            • Adding new functionality,<br/>
                            • System maintenance,<br/>
                            • Bug fixes,<br/>
                            • Architecture and system refactoring,<br/>
                            • Speeding up system performance,<br/>
                            • Mentoring and helping out other team mates with PHP/Laravel framework,<br/>
                            • Code review,<br/>
                            • Researching and implementation of new and more efficient technologies to speed up development process,<br/>
                            • Documentation,<br/><br/>
                            Among many other tasks.<br/><br/>
                            Highlights and achievements being:<br/>
                            1. Speeded up the system that was running at a snails pace due to bulk data calls and processing<br/>
                            2. Decoupled troublesome spaghetti code into repository pattern based structure<br/>
                            3. Reduced number of un-processed tickets to 6%!",
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
            'deleted_at' => null,
        ]);

        DB::table('resume_work_details')->insert([
            'id' => 2,
            'resume_id' => 1,
            'company' => "ConciseFlow PTY (Ltd)",
            'title' => "Senior Systems Developer",
            'dates' => "June 2019 - Aug 2019",
            'details' => "I was part of the Concise Flow Development Team.<br/>
                            Building Human Resources Management Systems & Employee Engagement Systems.<br/><br/>
                            Using Laravel, PHP, Amazon EC2, Javascript, Bootstrap, MySQL, GitHub & Bitbucket.",
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
            'deleted_at' => null,
        ]);

        DB::table('resume_work_details')->insert([
            'id' => 3,
            'resume_id' => 1,
            'company' => "Yonder Media",
            'title' => "Systems Developer",
            'dates' => "Jan 2018 - June 2019",
            'details' => "I was part of the Yonder Media development team behind the Campaign Management Systems. My current duties included:<br/>
                            • Development of new database-driven web applications and web services.<br/>
                            • Development of modifications and add-on modules and components to existing PHP applications.<br/>
                            • Linking up of custom built in-house framework with other platforms such as Laravel, October CMS and Joomla.<br/>
                            • Building of USSD, Whatsapp Chatbot and Facebook Chatbot systems using YOMO internal PHP framework.<br/>
                            • Providing assistance where applicable to the project manager, quality assurance team, frontend developers, campaign administrators and managers.<br/>
                            • Analyze, maintain and enhance existing functionality and troubleshoot issues.<br/>
                            • Promote new technologies and share knowledge within the team.<br/>
                            • Recommend improvements to development processes.<br/>
                            • Contribute to implementation plans, and assist in rollout.<br/><br/>
                            Highlights and achievements:<br/>
                            Worked on Admin Systems, USSD, Whatsapp and Facebook Chatbots for big name brands.",
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
            'deleted_at' => null,
        ]);

        DB::table('resume_work_details')->insert([
            'id' => 4,
            'resume_id' => 1,
            'company' => "Honiball Aviation Auditing",
            'title' => "Systems Developer",
            'dates' => "May 2013 - December 2017",
            'details' => "In the fast paced aviation industry I was part of the Smart Electronic Aviation
                                    Management System team where I was tasked with;<br/>
                                    • Designing new systems including process flow, user interface and reports<br/>
                                    • Managing database of the staff, instructors, pilots, students and clients<br/>
                                    • Helping the staff with the general Information Communications Technology related issues<br/>
                                    • Participating in a team-oriented environment to develop complex web-based applications<br/>
                                    • Maintaining existing codebase, to include troubleshooting bugs and adding new features<br/>
                                    • Developing the programming code from scratch or by adapting existing website graphics packages and software to meet business requirements<br/>
                                    • Preparing solutions with applicable tools to execute client-specific interfaces, workflows and data analysis libraries.<br/>
                                    • Interpreting and evaluating business needs to determine risks along with design apt solutions.<br/>
                                    • Determining any functionality that the site must support and developing PHP content based on practical approved layout<br/>
                                    • Guiding business decisions from technical perspective like performance, reliability, scalability and security.<br/>
                                    • Writing all clean object-oriented PHP as well as efficient SQL.<br/>
                                    • Debugging: Testing the website and identifying any technical problems and hitches<br/>
                                    • Troubleshooting: Aiding Customers and users with any problems they come across on the system, and maintaining a list of common problems in order to keep an up to date FAQ’s database to make future troubleshooting easier.<br/><br/>

                                    Highlights and achievements being:<br/>
                                    1. Conversion of the system from plain PHP to Laravel 5 Framework.<br/>
                                    2. Implementation of reliable and more profitable SMS system.<br/>
                                    3. Successfully providing customer support and resolving client's queries and reports.<br/>
                                    4. Bringing to the table multiple suggestions that management approved for implementation.<br/>
                                    5. Taking on the role of Lead Developer during my last few months during which output was at an all time high.",
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
            'deleted_at' => null,
        ]);
    }
}
