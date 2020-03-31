<?php

use App\Models\Blog\BlogPostCategory;
use App\Models\Blog\BlogPostStatus;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class BlogPostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('blog_posts')->truncate();

        $faker = Faker::create('en_US');

        #--------------------------------------------------------------------------------------------------------------
        DB::table('blog_posts')->insert([
            'blog_post_category_id' => 1,
            'blog_post_status_id' => 6,
            'title' => "What are the most damaging mentalities that you frequently observe in today’s youth?",
            'slug' => Str::slug("What are the most damaging mentalities that you frequently observe in today’s youth?", "-"),
            'summary' => "Isabelle Grey, studied Chemical Dependency Counseling (2020) breaks down the most damaging mentalities that you frequently observe in today’s youth ",
            'body' => 'The glorification of insecurity. I see this most often in young women-that is, an extreme that they hate their physical appearances. Now, insecurity is a normal part of life, we all face it and we never fully out grow it. However, this trend is more damaging, why? Because they take “insecurity” as a virtue. Look at the lyrics to One Direction’s hit, What Makes You Beautiful; the end of the chorus goes like this: “you don’t know you’re beautiful, that’s what makes you beautiful”. No, no, no and f**** no. Being insecure is not a virtue. It’s normal to be unsure, but it’s not a good thing. In excess, insecurity is destructive; it destroys your life. Because a young woman fails to see her beauty, she will never, ever believe someone can be attracted to her. Her insecurity will eat away her and she’ll accuse her significant other of being unhappy with her, that he’s cheating, that he’s lying when he says he thinks she’s beautiful and eventually, her constant neediness, unwillingness to believe anything he says and her constant distrust will become a self-fulfilling prophecy. Because a young person (male or female) believes they are worthless, inept and not as good as others, they’ll never take chances. They’ll miss opportunities because they’re self-defeated mentality is internal sabotage at it’s finest. The fact that youth views insecurity as a virtue is a terrible thing to believe.
Unwillingness to work at the bottom. I’m not saying today’s youth are all lazy, I know plenty of hard working young people and most older persons would put me in the same group. But the problem I see around teenagers and my fellow twenty-somethings is an unwillingness to take the bottom tier jobs. Here’s a reality of the workforce: no one starts off making bank. You come into a new job, with very few real-life skills and experience, sometimes you haven’t even finished high school. Guess how much your worth to your employer? Minimum wage under the law. The work you’ll be doing? The grunt work. You are the gopher on the construction team, picking up the scrap metal and making ten bucks an hour. You are the guy behind the Subway counter making sandwiches and cutting tomatoes. These jobs are not glamorous, they are not the “dream job” and they don’t pay very well. It’s a fact but someone has to do it. When you are new to the work force, with very little no to formal education, you have to start at these jobs. These jobs and continuing your education are the only two ways you can make yourself more valuable in the workplace market. To be successful in the workforce, you have to be willing to start at the bottom if you want to work your way up.
Why do I have to prove I’m smart? I saw this when I was in high school and I see it often in my college peers. They ignore assignments or do them very poorly, viewing them as a waste of time because “I already know this”. Great but guess what? Your teachers, the gatekeepers to your degree do not know this. They have to know for certain that you know the subject and your word is not enough. Even if a person does already grasp the material, the work is still not useless or beneath them. Completing it and doing it well, even if it only takes ten minutes is concrete proof that you know what you’re doing with X subject and that you are ready to move onto more advanced material and (in the case of higher education) ready to take on more responsibility and go out into the real world via internship.
I must post about this! Social media is huge and it’s very useful. I’ve used it to buy and sell goods, I’ve met some great people whom I could not have met otherwise, it’s helped me keep in touch with friends and family who live very far away from me. It’s a great tool, but it’s also damaging. I’m not talking about cyber bullying (though it’s an issue) or how it can worsen mental health issues because of how it shows a constant highlight reel and creates unrealistic expectations. I’m talking about how young people will post about their personal problems like it’s an online diary. The passive-aggressive posts calling out the girlfriend they have a fight with? Or maybe complaining about a “super annoying” teacher? This constant airing dirty laundry on social media is a terrible practice in my view, it kills people’s ability to manage conflict in a healthy way and what you say in anger, posted on Facebook is out there for everyone to see and has the ability to bite you in the butt years later.',
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
            'deleted_at' => null,
        ]);
        #--------------------------------------------------------------------------------------------------------------
        DB::table('blog_posts')->insert([
            'blog_post_category_id' => 1,
            'blog_post_status_id' => 6,
            'title' => "Why do PHP developers love Laravel? What are the things that distinguish Laravel from other PHP frameworks?",
            'slug' => Str::slug("Why do PHP developers love Laravel? What are the things that distinguish Laravel from other PHP frameworks?", "-"),
            'summary' => "Krisha Patel, works at Infigic Technologies breaks down for us why PHP developers love Laravel and the things that distinguish Laravel from other PHP frameworks.",
            'body' => "Laravel is an open source web framework available for developing web application. It is written in PHP and distributed in MIT license. If PHP developers want to create everything from the scratch over time period and in a no rush, then Laravel could be used for the purpose. It is one of the trusted platform preferred by many of the companies. Laravel platform offers a wide spectrum of web development solution which attracts many of the framework development companies.

Here is the list of features which makes this frameworks incomparable with others:

Migration: It is the code representation of the database schema. The development team is independent from menial tasks of sharing SQL (Structured Query Language) dumps with new developers.

• Awesome Documentation: Taylor never release a version of Laravel with improper Documentation, so Laravel is a developer friendly. The way of coding and writing description is done in a simple, detailed and consistent way.

• Database seeding: This reduces the stress of the developer from populating data manually. It is very useful when dealing with APIs and web services.

• Eloquent: It is one of the best ORM to understand easily and it has a clean syntax.

• Elixir: These days tasks are automated to take care. Elixir is a gulp wrapper of running task automatically.

• Blade: It is a Laravel rich template engine with clean syntax to pick up. HTML can be written easily by using Blade.

• Artisan CLI: it is simple to create your own custom commands using Artisan CLI. It finds its importance as a tool for creating controller, seeding database and running unit test.

• Forge: Taylor created aservice called Forge which provides the ease in the deployment of Laravel apps.

• Dependency Injection: This makes unit testing quite easy. It promotes TDD & BDD style of coding and reusing of codes.

• Authentication code: It is not required to write authentication code for every new app that the developer needs to create. Basic authentication is available by default in a new install of Laravel.

We at Infigic Technologies provide laravel development services or If you are looking to hire laravel developer for your project you can visit us at www.infigic.com",
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
            'deleted_at' => null,
        ]);
        #--------------------------------------------------------------------------------------------------------------
        DB::table('blog_posts')->insert([
            'blog_post_category_id' => 1,
            'blog_post_status_id' => 6,
            'title' => "As an experienced software developer what stops you from creating your dream project?",
            'slug' => Str::slug("As an experienced software developer what stops you from creating your dream project?", "-"),
            'summary' => "Eric Litovsky, Principal Software Engineer at Grey Swan Inc (2014-present)",
            'body' => "Motivation. I love building things that make people happy. That includes writing software. It’s hard for me to justify writing something that nobody asked for or wants.
Velocity. If I’m an army of one, I can do a lot, but it has to be structured, and in a focused flow. Unlike a team which can compartmentalize and multi-task, I have to focus on one area at a time.
Inspiration. I don’t have any disruptive, dream-level ideas that haven’t been done or aren’t already being done.
Over-thinking. When I do get an idea for a great new product, I end up researching it. Sometimes the research feels like I’m just looking for a reason not to do it. Subconsciously I seem to be really good at this. As soon as I find a startup or community project already working on it or something very similar, I tend to back off.
Market penetration. This is where great ideas go to die. I don’t have the connections or the resources to go at it alone. I have personally seen a lot of great ideas expertly executed which go nowhere because nobody knew or cared enough about them to invest and promote.
Market saturation. The market is flooded with tech startups. There was a golden age when you could really take an idea through several funding rounds and get a lot of traction. I personally know someone who cashed out with nothing more than a website and a cool domain name. Now, it’s much harder because everyone is focused on tech. Unless you have already cleared a few successful ventures, it’s virtually impossible to get anyone’s attention. Which leads me to...
Name recognition. Don’t have it, don’t have a co-founder who has it.
Risk. I have a family and a comfortable lifestyle. I work really hard to achieve and maintain both. The only thing I stand to win by risking that is some self-satisfaction. My ego is just not worth it. The risk of losing what I already have is much worse.
Time. If I don’t dedicate all I have to it, someone else will overtake me. There is only room for 1 winner on the podium. I can sacrifice my most valuable asset (time) and still lose out. I have other things I enjoy doing which I don’t want to give up.
Quora. I wouldn’t have the time to answer questions here, and I do enjoy doing that because it helps me become a better writer, and it’s way more rewarding than Instagram.",
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
            'deleted_at' => null,
        ]);
        #--------------------------------------------------------------------------------------------------------------
        DB::table('blog_posts')->insert([
            'blog_post_category_id' => 1,
            'blog_post_status_id' => 6,
            'title' => "Is Linux good for programming and coding?",
            'slug' => Str::slug("Is Linux good for programming and coding?", "-"),
            'summary' => "Hanno Behrens, IT Consultant living in Germany, 200+ languages, don't care",
            'body' => "Linux is the best environment for programming that we have at the moment. Most development companies shift their base of operation to Linux nowadays.

I got now 500 languages installed on my system, and the system will support me when I am working with all of them. It shares the toolchain, is flexible, neutral, doesn’t force me to use the one over the other, so, Linux is an open market of ideas, of software, where everything competes in a fair way and supports each other in a defined and consistent way.

My editor (VIM) cooperates with my shell (ZSH) and some of my languages (Lua) directly, as the typesetting system shares the Makefile tool chain with my compiler, uses the same editor, also bridges over to other programs by Lua, Perl is the system wide binding language, you can easy install own libraries to the system, that will get shared by every other program on the system. You don’t go for huge software packages, you share code. So my system, if it has started up my Kubuntu 17.10 (recent version from october this year, patched up to date) with 197 mb used RAM, X+Plasma running.

This allows the system to run in a completely responsive way on all my computers, in a consistent and compatible way from my desktop AMD FX-6300 to my other computers in my network down to my aged Pentium 4 32 bit machine or my Raspberry Pi stack or even my Android phones, where I have SSH running on Termux and can enter the system just the same way I enter my aged server systems over ssh.

All this software is free and I can install the same sort of software on all of my system, just by copying a script and running it, I have no license problems with anything of it, everything is connecting to each other, communicating over a defined system, that can be accessed by GUI or by Console as well.

On all of my systems I have a full TCPIP stack and can launch every server application I need, I can cluster my computers together if I have a larger stack to compile and they will just connect together and work collaborative on the compiling process.

Same is true if I am working with Blender and doing graphics and I need to build up my own render farm. The systems are open, free, compatible, reliable, fast, comfortable.

And if you are working with text, there is in my opinion no better interface than a text-interface to work with that. Graphics for graphics, text for text. Makes sense and it works for me. So, I am a happy Linux developer and I am using that system now since 1994.

Languages installed: 500+

No compromises. System size (without personal data): 56 GB

Mind me: I got a huge Linux system. Really huge. Way more than 10k programs installed, huge development database, manuals, books and everything you need.

All for free. No propriety software installed. No needed.

I have not seen a forced license agreement for years. Oh. And of course no malwares, no shit, no advertising, no corporate espionage and shitware.",
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
            'deleted_at' => null,
        ]);
        #--------------------------------------------------------------------------------------------------------------
        DB::table('blog_posts')->insert([
            'blog_post_category_id' => 1,
            'blog_post_status_id' => 6,
            'title' => "Should I use a PHP framework for my project?",
            'slug' => Str::slug("Should I use a PHP framework for my project?", "-"),
            'summary' => "Dana Kozubska, Vakoms - one-stop software company",
            'body' => "PHP might or might not be the best choice for your project. Usually, PHP is considered the right choice for:

small startups with limited resources
content-based web apps (new website for example)
e-commerce software
social networks
online communities
database-related software solutions
enterprise-specific software (CRMs, CMS).

To understand why or why not, let’s explore the key advantages of this programming language. They are:
Simplicity. PHP is quite easy to learn, and PHP developers are generally easy to find. Moreover, PHP frameworks such as Laravel, Send or Symphony simplify the development process, making it faster.
High performance. The language doesn’t require significant system resources which speeds up the app functioning. The turnaround time is very prompt.
Affordability. Services of PHP developers usually cost less than development with other technologies. The language itself is free to use, so all you need is a skilled workforce.

Not to mention its huge support community and cross-platform nature. So before choosing it or any other programming language, leverage all the ins and outs of it. This way, you can get the expected results within the shortest period of time.",
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
            'deleted_at' => null,
        ]);
        #--------------------------------------------------------------------------------------------------------------
        DB::table('blog_posts')->insert([
            'blog_post_category_id' => 1,
            'blog_post_status_id' => 6,
            'title' => "What is something almost every junior software developer does wrong yet has no idea?",
            'slug' => Str::slug("What is something almost every junior software developer does wrong yet has no idea?", "-"),
            'summary' => "Wes Winn, Senior SDE at Smartsheet",
            'body' => "Finds “I don’t know” to be a bad or demeaning answer.

“Hey Wes, you fixed that bug with the characters in it. Do you know where we’re parsing the regex in that call?”

Junior dev, internally, “OMG, the regex? Holy shit, no. I just included an international symbol that we weren’t supporting on that page, I didn’t touch regex, but I need to come up with something! I think I remember from school, uhhh, okay, let me try to find it, ahhhh!”

Compared to someone with a little experience,

“Hey Wes, do you know how the legacy xml parser works?”

“No idea. That was implemented and deprecated long before I got here. I bet Sue would know though, I think she had a few commits in that area in ye olde times.”

Not knowing something is totally fine, even if it’s something that feels embarrassing not to know. When I went to school, we didn’t really cover REST (it wasn’t quite as standard issue as it is now) and when that first came up in the job world for me, I was horrified. How did I miss this!?

Well, then you see a principal dev go, “oh yeah, I looked into that a little, but I really have no idea. I’ll go check it out” and you’re like, whew… Not such a huge deal.

As it turns out, everybody who knows anything learned it at some point. Also, teams want to make everyone as good as they can be, so even if it’s something you probably should know, they’ll try to shove that in your brain like the Matrix so everyone can do better.",
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
            'deleted_at' => null,
        ]);
        #--------------------------------------------------------------------------------------------------------------
        DB::table('blog_posts')->insert([
            'blog_post_category_id' => 1,
            'blog_post_status_id' => 6,
            'title' => "Do employers read through your emails after you leave?",
            'slug' => Str::slug("Do employers read through your emails after you leave?", "-"),
            'summary' => "Lisa Lawson, B.S. from Pennsylvania State University",
            'body' => "I'm certain they do.

I learned some very interesting information a few years ago about what an employer actually knows about their employees.

I'm rather computer savvy. I happened to stumble upon a Menu on my computer one night I was working late for this particular company. It's a very large, very high tech corporation.

This Menu was a list of Managers who had access to view employees’ computer screens real time while they worked at any time day or night. Those who had access, could watch exactly what any employee was doing on their computer at anytime, without their knowledge.

I came into work one morning about 5am, as I had to conference with executives at the parent company located overseas and it was about Noon their time. Before I got on the conference call, I was emailing my father at home who was sick and wanted me to pick up a couple things after work for him. Now, oddly enough, a Manager who I knew was on this access list, and was a very nosy person anyway, came over and scolded me for using my computer for personal use.

I asked him to step inside my office and I closed the door. I said, “Now first, how would you know this early in the morning, that I was doing anything personal on my computer? Secondly, I'm actually working overtime right now. Work hours don't even start until 8am. Which doesn't even apply to me as I am a salaried employee. Third, I was communicating with my elderly father who is sick at home with cancer and needs me to pick up some of his medications after work tonight. Lastly, I don't work for you. So tell me this. How do you know what I was doing on my computer this time of the day when I had my door closed and my computer screen faces the wall and I know you weren't standing behind me?”.

“Let me tell you something. I know you have access to view anyone's computer screen at any time. If you ever view what I'm doing on my screen again and I catch you, I will report you to HR for harrassment. Not only that, I will send out a company wide email with the list of every Manager who has access to view any employee's screen at anytime. While it might be legal for this company to watch what their employees do during the day, imagine what could happen when all employees are made aware of this information? And how they might react to being monitored daily?? So be careful the next time you log on to watch what I am doing. You might just see me typing a letter with your name on it addressed to my Attorney .”

Watch what you do on your computer or laptop at work at all times. Because big brother has eyes on you.",
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
            'deleted_at' => null,
        ]);
        #--------------------------------------------------------------------------------------------------------------
        DB::table('blog_posts')->insert([
            'blog_post_category_id' => 1,
            'blog_post_status_id' => 6,
            'title' => "What is a “rockstar programmer”?",
            'slug' => Str::slug("What is a “rockstar programmer”?", "-"),
            'summary' => "Kurt Guntheroth, Software Engineer for 40 years, author of book Optimized C++",
            'body' => "What does a company want when they ask for a rock star programmer?

Rock star programmers are usually virtuosos of coding, able to improvise good code riffs fluently. But that’s not why management asks for them. Rock star programmers have an ego that can be stroked by imploring them to give a hundred and ten percent effort. They believe “the show must go on”. Rock star programmers will do anything to make the deadline. They’ll work all night, take drugs to stay awake, give up their family to take the band on the coding road.

There are many talented programmers, but most of them will tell you that, “One hundred percent is all there is.” They resist exhortations to greater effort, knowing it isn’t possible. Managers like the rock stars because the managers are responsible for getting the product delivered, but have no control handles to make the developers work faster or think better. Managers believe they can manipulate the rock star programmer to a greater effort.

What really happens of course is that the rock star gets loopy after 10 or 12 hours of coding and starts to make mistakes, like a musician who’s had too much booze and too many pills and stayed up too late. But management isn’t usually able to track inserted bugs back to this behavior. They see the rock star appearing to make a super-human effort, and think that’s what is pushing the project along.

Some rock star programmers have a particularly high tolerance for long hours and caffeine. The best of them are actually a little more productive than normal. They end up looking like Keith Richards or sounding like Ozzie Osborne


A rock star programmer is a fool, but he’s a fool that foolish managers want to hire.",
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
            'deleted_at' => null,
        ]);
        #--------------------------------------------------------------------------------------------------------------
        DB::table('blog_posts')->insert([
            'blog_post_category_id' => 1,
            'blog_post_status_id' => 6,
            'title' => "Why didn’t any computer scientists realize that Y2K was all nonsense?",
            'slug' => Str::slug("Why didn’t any computer scientists realize that Y2K was all nonsense?", "-"),
            'summary' => "Ken Gregg, Started developing software in 1977.",
            'body' => "I’m constantly amused at how some people attempt to rewrite history by just parroting what they hear or read, without knowing anything about what actually happened.

The premise of the question is flawed. I can personally testify (under oath, if need be) that Y2K was indeed a very real issue, and there wasn’t any nonsense about it.

The reason major problems weren’t seen was because of the billions of dollars and countless person-hours that were poured into fixing the issue for several years leading up to 2000. Had this money not been spent and had all this work not been done, many of the disasters predicted by the media would have taken place.

The media, as they always do, focused on the potential disasters, and rarely (if ever) told the behind-the-scenes stories of the money, time, and expertise that went into mitigating the problem leading up to the deadline.

Have a look at this answer for more detailed insights on the reality of the Y2K problem:

Ken Gregg's answer to What happened on December 31, 1999 at midnight? How many computers crashed from the Y2K hype? Where did that big lie originate from?",
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
            'deleted_at' => null,
        ]);
        #--------------------------------------------------------------------------------------------------------------
        DB::table('blog_posts')->insert([
            'blog_post_category_id' => 1,
            'blog_post_status_id' => 6,
            'title' => "What is something that almost nobody knows about the Linux operating system?",
            'slug' => Str::slug("What is something that almost nobody knows about the Linux operating system?", "-"),
            'summary' => "Michael Gautier, Understanding life through inner exploration",
            'body' => "The #1 fact about Linux based operating systems is that they surround all of us more than Windows.

Think about all those apartment buildings ...

Estimated 43 million households in the US rent an apartment[1]
About 109 million residents in the US or 36% of the US population
Approx. 21 million rooms across apartment buildings in the US[2]
That is a lot of apartment dwelling.

Many of those rooms have a WiFi router with Linux inside.

Although Linux is invisible, it is used to connect you to the Internet. Home routers are often running 24/7. All those cities with hundreds of WiFi routers running Linux.

You are often surrounded by Linux.

Think about all those hotels ...

4 years ago, there were approx. 5 million hotels in the US[3]
Hotels are known for their free WiFi
Most of us can’t hold off 7 minutes until we must connect[4]
Thousands of daily business travelers
Thousands of daily tourists
Thousands of long-term visitors and corporate contractors
Hotels have contracts with wireline Internet providers that back their building wide WiFi. All those travelers, tourists, and business residents surrounded by premium grade hotel WiFi.

Although some may use Cisco IOS[5], Juniper[6] or similar, many establishments use WiFi equipment 1 or 2 levels up from typical home WiFi. Often that means you are surrounded by Linux.

Wait at an airport, a bus station, or walk through a museum these days and there is WiFi somewhere. Almost every public place you visit has a WiFi router somewhere running some form of BSD UNIX or, more commonly, some form of Linux. Public or private, what almost nobody knows is that Linux is everywhere.

Consider coffee shops[7], shopping malls[8], public libraries[9], gas stations and truck stops[10]. Those are places where …

Tens of thousands of each type of commercial venue serves millions customers and patrons
Combined, you have well over a million venues.
Many WiFi routers are broadcasting freely accessible SSIDs
Indeed, some WiFi routers are unpatched and insecure but are extremely convenient and effortless to connect
Other WiFi routers at some places are managed by world class IT with a process involving a receipt with an additional access requirements
Multiple tens of thousands of WiFi routers running Linux
Even when you shop or sit at a quiet place, you are surrounded by Linux.

Finally, there are many times when you are at home or in a public space filled with people with a smartphone in their hand. Many of those are Android phones. Android is near 55% market share in 2019 so far[11].

Smartphone participants may be answering a text real quick. Maybe they are finding directions in a map app or ordering some food from Bite Squad or Uber Eats. The ones running Android are just a handful of the 2.5 billion Android phones around the world[12]. Each Android has Linux at its core.

You are surrounded by Linux.

Footnotes

[1] Quick Facts: Resident Demographics

[2] Quick Facts: Apartment Stock

[3] U.S. Hotel Supply Breaks 5 Million-Room Mark: Business Travel News

[4] Hotel guests use Wi-Fi within seven minutes

[5] Cisco IOS - Wikipedia

[6] Junos OS - Wikipedia

[7] Coffee Statistics

[8] Number of shopping malls in the U.S. 2017 | Statista

[9] LibGuides: Number of Libraries in the United States: Home

[10] Home - Energy Explained, Your Guide To Understanding Energy - Energy Information Administration

[11] Apple's Share Of U.S. Smartphone Market Up To 45.5%

[12] There are now more than 2.5 billion active Android devices",
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
            'deleted_at' => null,
        ]);
        #--------------------------------------------------------------------------------------------------------------
        DB::table('blog_posts')->insert([
            'blog_post_category_id' => 1,
            'blog_post_status_id' => 6,
            'title' => "Which is the most overrated laptop brand?",
            'slug' => Str::slug("Which is the most overrated laptop brand?", "-"),
            'summary' => "Yu-Jin Chia, MS Computer Engineering, Santa Clara University (2006)",
            'body' => "Apple, no contest.

Among other things, I’ve heard MacBooks called:

Immune to viruses
Extremely durable
A great investment
Have great resale value
Have perfect build quality
Have the best screen, trackpad, case, speakers, keyboard, etc - basically anything but webcam because those are just hilariously awful on Macs
Great (and great value) for everyone from students to grandparents who can barely text
To date, it’s the only brand I’ve seen where when they have made serious design flaws, their customers defend them. Usually, it’s the exact opposite. If any other company released a laptop with - say - a bad keyboard design, they’d get crucified by customers (and rightly so). If they persisted to keep that bad keyboard design for 4 years in a row nobody would be left buying their machines. Apple seems to be the only exception to the rule.

P.S. I have owned many Apple laptops, dating all the way back from this beast:


So I’m not an ‘Apple hater.’ They do make good machines in general, but they are not the best in all categories, not great value for the hardware, not without flaws, and not virus free. The fact that so many people think they are and loudly proclaim it shows that they are, however, incredibly overrated.",
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
            'deleted_at' => null,
        ]);
        #--------------------------------------------------------------------------------------------------------------
        DB::table('blog_posts')->insert([
            'blog_post_category_id' => 1,
            'blog_post_status_id' => 6,
            'title' => "What does Core i5 and i7 mean?",
            'slug' => Str::slug("What does Core i5 and i7 mean?", "-"),
            'summary' => "Travis Casey, MS in Comp Sci; Unix admin; taught Operating Systems at FSU",
            'body' => "Nothing, really. They’re completely arbitrary labels, deliberately arbitrary so they will be trademarkable.

You may know that AMD makes processors that are compatible with Intel processors. They’ve been doing that for a long time. Early on, when AMD was making copies of the 80386 processor and selling them as “80386” processors, Intel sued, claiming that 80386 was their trademark, and that AMD could not use it.

AMD countered that “80386” was the part number of the processor as listed in Intel’s catalogs, and thus, was not eligible for trademark protection, because it was the only natural way to refer to the processor. Courts upheld this argument, and Intel lost its trademark on the 80386.

For their next generation, Intel decided to call the processor the “486” in marketing materials. AMD produced copies and sold them as “486” processors, and the two again went to court. AMD argued that “486” was simply a shortening of the part number “80486”, and should not be eligible for trademark protection. Again, the courts sided with AMD.

That’s why Intel’s next processor was referred to not with any number at all, but as the “Pentium”. As a purely made-up word that was not a shortening of the part number, it was plainly trademarkable. AMD could sell their processors as “586” processors, but they could not use the word “Pentium” on their packaging without a massive number of disclaimers and footnotes.

As AMD became better established, they began doing their own branding. Eventually, Intel became comfortable with putting numbers in their CPU names again… but instead of making them be meaningful in any way, they avoided that. So, “i5” and “i7” don’t have any real meaning — they’re just marketing names, with the “i” chosen to remind people that these are Intel processors, and the “5” and “7” (and the “3”, and now “9”) using a series of ascending numbers to indicate that, within a particular generation of processors, the ones with higher numbers are generally superior.

Note that “within a particular generation”. An i5 in today’s generation may well be superior to an i7 that’s several years old.

They may have gone with 3, 5, 7 (and now 9) to avoid using numbers that directly relate to the number of cores in the processor. That would be a number that actually indicates a fact about the processor, and that could weaken trademark protection.",
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
            'deleted_at' => null,
        ]);

        $y = 88;
        for ($x = 0; $x < $y; $x++) {

            $category_id = BlogPostCategory::inRandomOrder()->skip(12)->first()->id;
            $status_id = BlogPostStatus::inRandomOrder()->first()->id;

            $title = $faker->realText($maxNbChars = 20, $indexSize = 2);
            $slug = Str::slug($title, '-') . '-' .$faker->unixTime($max = 'now');

            $summary = $faker->realText($maxNbChars = 200, $indexSize = 2);
            $body = $faker->realText($maxNbChars = 6000, $indexSize = 2);

            $created_at = $faker->dateTimeBetween($startDate = '-24 months', $endDate = 'now');
            $updated_at = $faker->dateTimeBetween($created_at, $endDate = 'now');

            DB::table('blog_posts')->insert([
                'blog_post_category_id' => $category_id,
                'blog_post_status_id' => $status_id,
                'title' => $title,
                'slug' => $slug,
                'summary' => $summary,
                'body' => $body,
                'created_at' => $created_at,
                'updated_at' => \Carbon\Carbon::now(),
                'deleted_at' => null,
            ]);
        }

        Schema::enableForeignKeyConstraints();
    }
}
