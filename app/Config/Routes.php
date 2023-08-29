<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');


$routes->get('user', 'UserController::index', ['as' => 'user.index']);
$routes->get('user/new', 'UserController::new', ['as' => 'user.new']);
$routes->post('user', 'UserController::create', ['as' => 'user.create']);
$routes->get('user/(:num)', 'UserController::show/$1', ['as' => 'user.show']);
$routes->get('user/(:num)/edit', 'UserController::edit/$1', ['as' => 'user.edit']);
$routes->put('user/(:num)', 'UserController::update/$1', ['as' => 'user.update']);
$routes->delete('user/(:num)', 'UserController::delete/$1', ['as' => 'user.delete']);

$routes->get('academic', 'AcademicController::index', ['as' => 'academic.index']);
$routes->get('academic/new', 'AcademicController::new', ['as' => 'academic.new']);
$routes->post('academic', 'AcademicController::create', ['as' => 'academic.create']);
$routes->get('academic/(:num)', 'AcademicController::show/$1', ['as' => 'academic.show']);
$routes->get('academic/(:num)/edit', 'AcademicController::edit/$1', ['as' => 'academic.edit']);
$routes->put('academic/(:num)', 'AcademicController::update/$1', ['as' => 'academic.update']);
$routes->delete('academic/(:num)', 'AcademicController::delete/$1', ['as' => 'academic.delete']);

$routes->get('classroom', 'ClassroomController::index', ['as' => 'classroom.index']);
$routes->get('classroom/new', 'ClassroomController::new', ['as' => 'classroom.new']);
$routes->post('classroom', 'ClassroomController::create', ['as' => 'classroom.create']);
$routes->get('classroom/(:num)', 'ClassroomController::show/$1', ['as' => 'classroom.show']);
$routes->get('classroom/(:num)/edit', 'ClassroomController::edit/$1', ['as' => 'classroom.edit']);
$routes->put('classroom/(:num)', 'ClassroomController::update/$1', ['as' => 'classroom.update']);
$routes->delete('classroom/(:num)', 'ClassroomController::delete/$1', ['as' => 'classroom.delete']);

$routes->get('classroom-enrollment', 'ClassroomEnrollmentController::index', ['as' => 'classroom-enrollment.index']);
$routes->get('classroom-enrollment/new', 'ClassroomEnrollmentController::new', ['as' => 'classroom-enrollment.new']);
$routes->post('classroom-enrollment', 'ClassroomEnrollmentController::create', ['as' => 'classroom-enrollment.create']);
$routes->get('classroom-enrollment/(:num)', 'ClassroomEnrollmentController::show/$1', ['as' => 'classroom-enrollment.show']);
$routes->get('classroom-enrollment/(:num)/edit', 'ClassroomEnrollmentController::edit/$1', ['as' => 'classroom-enrollment.edit']);
$routes->put('classroom-enrollment/(:num)', 'ClassroomEnrollmentController::update/$1', ['as' => 'classroom-enrollment.update']);
$routes->delete('classroom-enrollment/(:num)', 'ClassroomEnrollmentController::delete/$1', ['as' => 'classroom-enrollment.delete']);

$routes->get('classroom-session', 'ClassroomSessionController::index', ['as' => 'classroom-session.index']);
$routes->get('classroom-session/new', 'ClassroomSessionController::new', ['as' => 'classroom-session.new']);
$routes->post('classroom-session', 'ClassroomSessionController::create', ['as' => 'classroom-session.create']);
$routes->get('classroom-session/(:num)', 'ClassroomSessionController::show/$1', ['as' => 'classroom-session.show']);
$routes->get('classroom-session/(:num)/edit', 'ClassroomSessionController::edit/$1', ['as' => 'classroom-session.edit']);
$routes->put('classroom-session/(:num)', 'ClassroomSessionController::update/$1', ['as' => 'classroom-session.update']);
$routes->delete('classroom-session/(:num)', 'ClassroomSessionController::delete/$1', ['as' => 'classroom-session.delete']);

$routes->get('course', 'CourseController::index', ['as' => 'course.index']);
$routes->get('course/new', 'CourseController::new', ['as' => 'course.new']);
$routes->post('course', 'CourseController::create', ['as' => 'course.create']);
$routes->get('course/(:num)', 'CourseController::show/$1', ['as' => 'course.show']);
$routes->get('course/(:num)/edit', 'CourseController::edit/$1', ['as' => 'course.edit']);
$routes->put('course/(:num)', 'CourseController::update/$1', ['as' => 'course.update']);
$routes->delete('course/(:num)', 'CourseController::delete/$1', ['as' => 'course.delete']);

$routes->get('course-prerequisite', 'CoursePrerequisiteController::index', ['as' => 'course-prerequisite.index']);
$routes->get('course-prerequisite/new', 'CoursePrerequisiteController::new', ['as' => 'course-prerequisite.new']);
$routes->post('course-prerequisite', 'CoursePrerequisiteController::create', ['as' => 'course-prerequisite.create']);
$routes->get('course-prerequisite/(:num)', 'CoursePrerequisiteController::show/$1', ['as' => 'course-prerequisite.show']);
$routes->get('course-prerequisite/(:num)/edit', 'CoursePrerequisiteController::edit/$1', ['as' => 'course-prerequisite.edit']);
$routes->put('course-prerequisite/(:num)', 'CoursePrerequisiteController::update/$1', ['as' => 'course-prerequisite.update']);
$routes->delete('course-prerequisite/(:num)', 'CoursePrerequisiteController::delete/$1', ['as' => 'course-prerequisite.delete']);

$routes->get('faculty', 'FacultyController::index', ['as' => 'faculty.index']);
$routes->get('faculty/new', 'FacultyController::new', ['as' => 'faculty.new']);
$routes->post('faculty', 'FacultyController::create', ['as' => 'faculty.create']);
$routes->get('faculty/(:num)', 'FacultyController::show/$1', ['as' => 'faculty.show']);
$routes->get('faculty/(:num)/edit', 'FacultyController::edit/$1', ['as' => 'faculty.edit']);
$routes->put('faculty/(:num)', 'FacultyController::update/$1', ['as' => 'faculty.update']);
$routes->delete('faculty/(:num)', 'FacultyController::delete/$1', ['as' => 'faculty.delete']);

$routes->get('lecturer', 'LecturerController::index', ['as' => 'lecturer.index']);
$routes->get('lecturer/new', 'LecturerController::new', ['as' => 'lecturer.new']);
$routes->post('lecturer', 'LecturerController::create', ['as' => 'lecturer.create']);
$routes->get('lecturer/(:num)', 'LecturerController::show/$1', ['as' => 'lecturer.show']);
$routes->get('lecturer/(:num)/edit', 'LecturerController::edit/$1', ['as' => 'lecturer.edit']);
$routes->put('lecturer/(:num)', 'LecturerController::update/$1', ['as' => 'lecturer.update']);
$routes->delete('lecturer/(:num)', 'LecturerController::delete/$1', ['as' => 'lecturer.delete']);

$routes->get('major', 'MajorController::index', ['as' => 'major.index']);
$routes->get('major/new', 'MajorController::new', ['as' => 'major.new']);
$routes->post('major', 'MajorController::create', ['as' => 'major.create']);
$routes->get('major/(:num)', 'MajorController::show/$1', ['as' => 'major.show']);
$routes->get('major/(:num)/edit', 'MajorController::edit/$1', ['as' => 'major.edit']);
$routes->put('major/(:num)', 'MajorController::update/$1', ['as' => 'major.update']);
$routes->delete('major/(:num)', 'MajorController::delete/$1', ['as' => 'major.delete']);

$routes->get('room', 'RoomController::index', ['as' => 'room.index']);
$routes->get('room/new', 'RoomController::new', ['as' => 'room.new']);
$routes->post('room', 'RoomController::create', ['as' => 'room.create']);
$routes->get('room/(:num)', 'RoomController::show/$1', ['as' => 'room.show']);
$routes->get('room/(:num)/edit', 'RoomController::edit/$1', ['as' => 'room.edit']);
$routes->put('room/(:num)', 'RoomController::update/$1', ['as' => 'room.update']);
$routes->delete('room/(:num)', 'RoomController::delete/$1', ['as' => 'room.delete']);

$routes->get('season', 'SeasonController::index', ['as' => 'season.index']);
$routes->get('season/new', 'SeasonController::new', ['as' => 'season.new']);
$routes->post('season', 'SeasonController::create', ['as' => 'season.create']);
$routes->get('season/(:num)', 'SeasonController::show/$1', ['as' => 'season.show']);
$routes->get('season/(:num)/edit', 'SeasonController::edit/$1', ['as' => 'season.edit']);
$routes->put('season/(:num)', 'SeasonController::update/$1', ['as' => 'season.update']);
$routes->delete('season/(:num)', 'SeasonController::delete/$1', ['as' => 'season.delete']);

$routes->get('student', 'StudentController::index', ['as' => 'student.index']);
$routes->get('student/new', 'StudentController::new', ['as' => 'student.new']);
$routes->post('student', 'StudentController::create', ['as' => 'student.create']);
$routes->get('student/(:num)', 'StudentController::show/$1', ['as' => 'student.show']);
$routes->get('student/(:num)/edit', 'StudentController::edit/$1', ['as' => 'student.edit']);
$routes->put('student/(:num)', 'StudentController::update/$1', ['as' => 'student.update']);
$routes->delete('student/(:num)', 'StudentController::delete/$1', ['as' => 'student.delete']);

$routes->get('student-attendance', 'StudentAttendanceController::index', ['as' => 'student-attendance.index']);
$routes->get('student-attendance/new', 'StudentAttendanceController::new', ['as' => 'student-attendance.new']);
$routes->post('student-attendance', 'StudentAttendanceController::create', ['as' => 'student-attendance.create']);
$routes->get('student-attendance/(:num)', 'StudentAttendanceController::show/$1', ['as' => 'student-attendance.show']);
$routes->get('student-attendance/(:num)/edit', 'StudentAttendanceController::edit/$1', ['as' => 'student-attendance.edit']);
$routes->put('student-attendance/(:num)', 'StudentAttendanceController::update/$1', ['as' => 'student-attendance.update']);
$routes->delete('student-attendance/(:num)', 'StudentAttendanceController::delete/$1', ['as' => 'student-attendance.delete']);

$routes->get('student-grade', 'StudentGradeController::index', ['as' => 'student-grade.index']);
$routes->get('student-grade/new', 'StudentGradeController::new', ['as' => 'student-grade.new']);
$routes->post('student-grade', 'StudentGradeController::create', ['as' => 'student-grade.create']);
$routes->get('student-grade/(:num)', 'StudentGradeController::show/$1', ['as' => 'student-grade.show']);
$routes->get('student-grade/(:num)/edit', 'StudentGradeController::edit/$1', ['as' => 'student-grade.edit']);
$routes->put('student-grade/(:num)', 'StudentGradeController::update/$1', ['as' => 'student-grade.update']);
$routes->delete('student-grade/(:num)', 'StudentGradeController::delete/$1', ['as' => 'student-grade.delete']);

$routes->get('student-season-log', 'StudentSeasonLogController::index', ['as' => 'student-season-log.index']);
$routes->get('student-season-log/new', 'StudentSeasonLogController::new', ['as' => 'student-season-log.new']);
$routes->post('student-season-log', 'StudentSeasonLogController::create', ['as' => 'student-season-log.create']);
$routes->get('student-season-log/(:num)', 'StudentSeasonLogController::show/$1', ['as' => 'student-season-log.show']);
$routes->get('student-season-log/(:num)/edit', 'StudentSeasonLogController::edit/$1', ['as' => 'student-season-log.edit']);
$routes->put('student-season-log/(:num)', 'StudentSeasonLogController::update/$1', ['as' => 'student-season-log.update']);
$routes->delete('student-season-log/(:num)', 'StudentSeasonLogController::delete/$1', ['as' => 'student-season-log.delete']);

$routes->get('tuition-payment', 'TuitionPaymentController::index', ['as' => 'tuition-payment.index']);
$routes->get('tuition-payment/new', 'TuitionPaymentController::new', ['as' => 'tuition-payment.new']);
$routes->post('tuition-payment', 'TuitionPaymentController::create', ['as' => 'tuition-payment.create']);
$routes->get('tuition-payment/(:num)', 'TuitionPaymentController::show/$1', ['as' => 'tuition-payment.show']);
$routes->get('tuition-payment/(:num)/edit', 'TuitionPaymentController::edit/$1', ['as' => 'tuition-payment.edit']);
$routes->put('tuition-payment/(:num)', 'TuitionPaymentController::update/$1', ['as' => 'tuition-payment.update']);

service('auth')->routes($routes);
$routes->delete('tuition-payment/(:num)', 'TuitionPaymentController::delete/$1', ['as' => 'tuition-payment.delete']);