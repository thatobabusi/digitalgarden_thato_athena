<?php

use Illuminate\Database\Seeder;

class TestResumesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('resumes')->truncate();

        $image = App\Models\Image\Image::create([
           'image_type_id' => 2,
            'title' => "tbabusi-grey.png",
            'slug' => Str::slug("tbabusi-grey.png", '-'),
            'src' => 'images/resume/tbabusi-grey.png',
            'mime_type' => 'image/png',
            'description' => "Profile Photo for Resume",
            'base64' => null,
            'credits_if_applicable' => "Thato Babusi",
            'alt' => "Thato Babusi Profile Photo",
        ]);
        $image->save();

        DB::table('resume_image')->insert([
            'image_id' => $image->id,
            'resume_id' => 1
        ]);

        DB::table('resumes')->insert([
            'id' => 1,
            'user_id' => null,
            'firstname' => "Thato",
            'surname' => "Babusi",
            'date_of_birth' => "1988-07-15",
            'gender' => "Male",
            'marital_status' => "Single",
            'nationality' => "South African",
            'location' => "Centurion, GP, South Africa",
            'industry' => "ICT",
            'job_title' => "Senior Systems Developer",
            'highest_qualification' => "BSc (Hons) Business Information Technology",
            'headline' => "Hi, my name is Thato Babusi and I'm a Systems Developer.",

            'bio' => "I'm a Systems Developer specializing in backend development for complex scalable web apps
                        through the use of PHP and the Laravel framework .",

            'bio_what_i_do' => "I am experienced in dynamic team oriented system development and maintenance, providing client
                        focused systems support among many other facets. <br/><br/>

                        I have just over 7 years working experience in the industry; having worked in one of South Africa's
                        leading aviation companies that provides services to key flight schools and charter companies
                        across the continent, followed by (bias aside) one of the best award winning media companies
                        in the world which dealt with major house hold name brands. <br/><br/>

                        My passion for Information Technology comes second to none around the spectrum.
                        Not only am I always eager to share from my experiences and learn from others, but also
                        constantly striving to learn and expand my knowledge on various subject matter daily. <br/><br/>

                        My academic background and hands-on experience make me the ideal candidate to facilitate the
                        symbiosis of Business and Information Technology, in order to bridge the gap effectively. <br/><br/>

                        I believe that I am a well grounded indivi-jewel (*sic) who posses strong work ethic coupled
                        with the ability to grasp and adapt to new concepts and changing environments, and would prove
                        to be an asset. <br/><br/>

                        My main areas of interest are backend development in PHP and Laravel framework, however,
                        I have my eyes and ears wide open for any challenges in the IT field that will make the best
                        use of my existing skill set and experience as well as further my personal and professional
                        development.",

            'about' => "I am a seasoned Systems Developer, who is experienced in dynamic
                            team oriented system development and maintenance, providing client focused systems support
                            among many other facets.<br/><br/>

                            I have 7 years working experience in the industry; having worked in one of South Africa's
                            leading aviation companies that provides services to key flight schools and charter companies
                            across the continent, followed by (bias aside) one of the best award winning media companies
                            in the world which dealt with major house hold name brands.",

            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
            'deleted_at' => null,
        ]);
    }
}
