<?php

namespace Database\Seeders;

use App\Models\AboutSection;
use App\Models\CompanySetting;
use App\Models\HeroSection;
use App\Models\Product;
use App\Models\Service;
use App\Models\Testimonial;
use Illuminate\Database\Seeder;

class DemoSeeder extends Seeder
{
    public function run(): void
    {

        Product::insert([
            [
                'name' => 'Website Company Profile',
                'description' => 'Professional company profile website with modern UI and responsive design.',
                'image' => 'products/company-profile.jpg',
                'is_featured' => true,
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Custom Web Application',
                'description' => 'Tailor-made web application based on your business workflow.',
                'image' => 'products/web-app.jpg',
                'is_featured' => true,
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Mobile App Development',
                'description' => 'Android & iOS application development with scalable backend.',
                'image' => 'products/mobile-app.jpg',
                'is_featured' => true,
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);

        // Company Settings
        CompanySetting::create([
            'company_name' => 'Nexus Digital',
            'tagline' => 'Transforming Ideas Into Digital Reality',
            'description' => 'We are a leading digital agency specializing in web development, mobile apps, and digital marketing solutions. Our team of experts helps businesses thrive in the digital landscape.',
            'email' => 'hello@nexusdigital.com',
            'phone' => '+1 (555) 123-4567',
            'address' => '123 Innovation Street, Tech District, San Francisco, CA 94102',
            'facebook' => 'https://facebook.com/nexusdigital',
            'twitter' => 'https://twitter.com/nexusdigital',
            'instagram' => 'https://instagram.com/nexusdigital',
            'linkedin' => 'https://linkedin.com/company/nexusdigital',
            'youtube' => 'https://youtube.com/@nexusdigital',
            'whatsapp' => '+15551234567',
        ]);

        // Hero Section
        HeroSection::create([
            'title' => 'We Build Digital Experiences That Matter',
            'subtitle' => 'Award-Winning Digital Agency',
            'description' => 'Transform your business with cutting-edge web solutions, stunning designs, and powerful digital strategies that drive growth and engagement.',
            'button_text' => 'Start Your Project',
            'button_link' => '/contact',
            'button_text_secondary' => 'View Our Work',
            'button_link_secondary' => '/portfolio',
            'is_active' => true,
        ]);

        // About Section
        AboutSection::create([
            'title' => 'About Our Company',
            'content' => 'Founded in 2015, Nexus Digital has grown from a small startup to a full-service digital agency serving clients worldwide. We believe in the power of technology to transform businesses and create meaningful connections with customers. Our approach combines creativity, technical expertise, and strategic thinking to deliver solutions that exceed expectations.',
            'mission_title' => 'Our Mission',
            'mission_content' => 'To empower businesses with innovative digital solutions that drive growth, enhance user experiences, and create lasting impact in the digital world.',
            'vision_title' => 'Our Vision',
            'vision_content' => 'To be the leading digital partner for forward-thinking businesses, known for our creativity, reliability, and commitment to excellence.',
            'years_experience' => 9,
            'projects_completed' => 250,
            'happy_clients' => 150,
            'is_active' => true,
        ]);

        // Services
        $services = [
            [
                'title' => 'Web Development',
                'description' =>
                    'Custom web applications built with cutting-edge technologies. From simple websites to complex enterprise solutions, we deliver scalable and secure web experiences.',
                'icon' => 'code',
                'features' => [
                    'Responsive Design',
                    'E-commerce Solutions',
                    'Custom CMS',
                    'API Integration',
                ],
                'youtube_url' => 'https://www.youtube.com/watch?v=Kl9V-LkJ4u0',
                'is_featured' => true,
                'is_active' => true,
                'sort_order' => 1,
            ],
            [
                'title' => 'Mobile Apps',
                'description' =>
                    'Native and cross-platform mobile applications that deliver exceptional user experiences on iOS and Android devices.',
                'icon' => 'smartphone',
                'features' => [
                    'iOS Development',
                    'Android Development',
                    'Cross-Platform',
                    'App Store Optimization',
                ],
                'youtube_url' => 'https://www.youtube.com/watch?v=ysz5S6PUM-U',
                'is_featured' => true,
                'is_active' => true,
                'sort_order' => 2,
            ],
            [
                'title' => 'UI/UX Design',
                'description' =>
                    'Beautiful, intuitive interfaces that delight users and drive conversions. We focus on creating designs that are both stunning and functional.',
                'icon' => 'palette',
                'features' => [
                    'User Research',
                    'Wireframing',
                    'Prototyping',
                    'Design Systems',
                ],
                'youtube_url' => 'https://www.youtube.com/watch?v=9B9YJ3K9R6k',
                'is_featured' => true,
                'is_active' => true,
                'sort_order' => 3,
            ],
            [
                'title' => 'Digital Marketing',
                'description' =>
                    'Data-driven marketing strategies that increase visibility, drive traffic, and convert visitors into loyal customers.',
                'icon' => 'trending-up',
                'features' => [
                    'SEO Optimization',
                    'Social Media',
                    'Content Marketing',
                    'PPC Advertising',
                ],
                'youtube_url' => null,
                'is_featured' => false,
                'is_active' => true,
                'sort_order' => 4,
            ],
            [
                'title' => 'Cloud Solutions',
                'description' =>
                    'Scalable cloud infrastructure and DevOps services to ensure your applications run smoothly and securely.',
                'icon' => 'cloud',
                'features' => [
                    'AWS / Azure / GCP',
                    'CI/CD Pipelines',
                    'Container Orchestration',
                    '24/7 Monitoring',
                ],
                'youtube_url' => null,
                'is_featured' => false,
                'is_active' => true,
                'sort_order' => 5,
            ],
            [
                'title' => 'Consulting',
                'description' =>
                    'Strategic technology consulting to help you make informed decisions and optimize your digital transformation journey.',
                'icon' => 'lightbulb',
                'features' => [
                    'Tech Strategy',
                    'Digital Transformation',
                    'Process Optimization',
                    'Team Training',
                ],
                'youtube_url' => null,
                'is_featured' => false,
                'is_active' => true,
                'sort_order' => 6,
            ],
        ];

        foreach ($services as $service) {
            Service::create($service);
        }




        // Testimonials
        $testimonials = [
            [
                'client_name' => 'Jennifer Walsh',
                'client_position' => 'CEO',
                'client_company' => 'TechFlow Inc.',
                'content' => 'Working with Nexus Digital was a game-changer for our business. They delivered a stunning dashboard that our users love. The team was professional, responsive, and truly understood our vision.',
                'rating' => 5,
                'is_featured' => true,
                'sort_order' => 1,
            ],
            [
                'client_name' => 'Robert Martinez',
                'client_position' => 'Founder',
                'client_company' => 'GreenEats Co.',
                'content' => 'The mobile app Nexus Digital built for us exceeded all expectations. Our customer satisfaction scores have increased by 40% since launch. Highly recommend their team!',
                'rating' => 5,
                'is_featured' => true,
                'sort_order' => 2,
            ],
            [
                'client_name' => 'Amanda Foster',
                'client_position' => 'Marketing Director',
                'client_company' => 'Luxe Boutique',
                'content' => 'The e-commerce platform has transformed our online presence. Sales have doubled and our customers compliment the beautiful design constantly.',
                'rating' => 5,
                'is_featured' => true,
                'sort_order' => 3,
            ],
            [
                'client_name' => 'Thomas Lee',
                'client_position' => 'CTO',
                'client_company' => 'HealthHub Medical',
                'content' => 'Nexus Digital navigated our complex requirements with expertise. The patient portal is secure, user-friendly, and has significantly improved our patient engagement.',
                'rating' => 4,
                'is_featured' => false,
                'sort_order' => 4,
            ],
        ];

        foreach ($testimonials as $testimonial) {
            Testimonial::create($testimonial);
        }
    }
}
