<?php

function cv_data( $type ) {
    $cv_data = [
        'description' => 'I study computer science, I gained my first experience by participating in many non-commercial projects, now I would like to test myself in the labor market.'
        ,

        'experience' => [
            [
                'date' => [ 'IX 2017', 'VI 2018' ], 
                'job' => 'Junior Front-End Developer',
                'comp' => 'Black Cliff Media',
                'desc' => 'Marketing Agency',
                'skil' => [ 
                    'creating websites ( PSD > HTML, Wordpress, PHP, JavaScript, jQuery', 
                    'managing content (Wordpress, CoreMedia)',
                ],
            ],
        ],

        'projects' => [
            [
                'name' => 'flute-tabs.com',
                'link' => 'http://www.test.flute-tabs.com/',
                'desc' => 'help in learning to play flute, songs ready to play without knowledge of notes',
                'skil' => [ 'JavaScript', 'PHP', 'HTML5', 'CSS3', 'mySQL' ],
            ],
            [
                'name' => 'domrowerowy.pl',
                'link' => 'http://domrowerowy.pl',
                'desc' => 'website of the bicycle service',
                'skil' => [ 'HTML5', 'LESS', 'JavaScript' ],
            ],
            [
                'name' => 'logrybow.pl',
                'link' => 'https://web.archive.org/web/20160626234947/http://logrybow.pl:80/',
                'desc' => 'website of the high school I attended',
                'skil' => [ 'PHP', 'Wordpress', 'HTML', 'CSS3', 'jQuery' ],
            ],
            [
                'name' => 'janschab.pl',
                'link' => 'http://janschab.pl',
                'desc' => 'portfolio prototype',
                'skil' => [ 'SVG animation', 'JavaScript', 'HTML5', 'CSS3' ],
            ],
        ],

        'education' => [
            [
                'date' => [ 'IX 2016', 'now' ],
                'place' => 'University of Technology and Science in Cracow',
                'spec' => 'Education of Technology and Computer Science',
            ],
            [
                'date' => [ '2013', '2016' ],
                'place' => 'LO - Artur Grottger in Grybów',
            ],
        ],

        'personal informations' => [
            [
                'type' => 'Phone',
                'value' => '784 797 869',
                'link' => 'tel:784797869',
            ],
            [
                'type' => 'E-mail',
                'value' => 'janschab@gmail.com',
                'link' => 'mailto:janschab@gmail.com',
            ],
        ],

        'skills' => [
            [
                'type' => 'working knowledge:',
                'skil' => [
                    'JavaScript (EC6, jQuery, Meteor, MongoDB)',
                    'HTML5, CSS3 (LESS)',
                    'PHP',
                    'SVG animation',
                    'Wordpress (creating themes, beaver builder)',
                ],
            ],
            [
                'type' => 'basic knowledge:',
                'skil' => [
                    'C/C++',
                    'Node.js',
                    'Python',
                    'GIT',
                    'Webpack, GULP'
                ],
            ],
            [
                'type' => 'other:',
                'skil' => [
                    'creation and visualization of 3D graphics',
                    'programming 3D graphics in python (Blender API)',
                ],
            ],
            
        ],

        'languages' => [
            'mother' => 'polish',
            'other' => [
                [
                    'lang' => 'english',
                    'reading' => 'upper intermediate',
                    'listening' => 'intermediate',
                    'speaking' => 'low intermediate',
                ],
            ],
        ],

        'interests' => [
            'front-end',
            'back-end',
            'AI, ML',
            [
                'name' => '3D graphic',
                'link' => 'https://www.deviantart.com/schabu0',
            ],
            'drawing',
            [
                'name' => 'cycling',
                'link' => 'https://www.strava.com/athletes/17031975',
            ],
            'playing tennis',
            'chess',
            'playing musical instruments: especially the guitar',
        ],
    ];

    return $cv_data[$type];
}

?>