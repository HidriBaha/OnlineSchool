<!DOCTYPE html>
<?php
    $courseList = [
        'course1' => [
            'name' => 'Course Name 1',
            'img-src' => '../../img/SWE Kursverwaltung.png',
	        'course-link' => 'Teacher-EditCourse.php',
        ],
        'course2' => [
            'name' => 'Course Name 2',
            'img-src' => '',
            'course-link' => ''
        ]
    ];
?>

<html lang="de">
    <head>
        <meta charset="UTF-8">
        <title>Courses</title>
        <link rel="stylesheet" href="CoursesOverview.css">
    </head>
    <body>
        <header>
	        HEADER PLACEHOLDER
        </header>
        <div class="main">
            <?php foreach ($courseList as $courseID => $courseInfos) {
                echo "<a href='".$courseInfos['course-link']."'>
				<div class='course-display'>
                    <div class='course-desc'>".$courseInfos['name']."</div>
                    <div class='course-img'><img alt='COURSE IMG' src='".$courseInfos['img-src']."'></div>
                </div></a>";
            }?>
        </div>
    </body>
</html>
