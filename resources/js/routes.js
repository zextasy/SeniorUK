import Home from './components/Home.vue';
import Students from './components/Students.vue';
import ShowStudent from './components/ShowStudent.vue';
import AddStudent from './components/AddStudent.vue';
import UpdateStudent from './components/UpdateStudent.vue';
import Lecturers from './components/Lecturers.vue';
import ShowLecturer from './components/ShowLecturer.vue';
import AddLecturer from './components/AddLecturer.vue';
import UpdateLecturer from './components/UpdateLecturer.vue';
import Semesters from './components/Semesters.vue';
import ShowSemester from './components/ShowSemester.vue';
import AddSemester from './components/AddSemester.vue';
import UpdateSemester from './components/UpdateSemester.vue';
import Courses from './components/Courses.vue';
import ShowCourse from './components/ShowCourse.vue';
import AddCourse from './components/AddCourse.vue';
import UpdateCourse from './components/UpdateCourse.vue';
import CourseGroups from './components/CourseGroups.vue';
import ShowCourseGroup from './components/ShowCourseGroup.vue';
import AddCourseGroup from './components/AddCourseGroup.vue';
import UpdateCourseGroup from './components/UpdateCourseGroup.vue';

export const routes = [{
        name: 'home',
        path: '/',
        component: Home
    },
    {
        name: 'students',
        path: '/students',
        component: Students
    },    
    {
        name: 'show-student',
        path: '/students/view/:id',
        component: ShowStudent
    },    
    {
        name: 'add-student',
        path: '/students/add',
        component: AddStudent
    },
    {
        name: 'edit-student',
        path: '/students/edit/:id',
        component: UpdateStudent
    },
    {
        name: 'lecturers',
        path: '/lecturers',
        component: Lecturers
    },    
    {
        name: 'show-lecturer',
        path: '/lecturers/view/:id',
        component: ShowLecturer
    },    
    {
        name: 'add-lecturer',
        path: '/lecturers/add',
        component: AddLecturer
    },
    {
        name: 'edit-lecturer',
        path: '/lecturers/edit/:id',
        component: UpdateLecturer
    },
    {
        name: 'semesters',
        path: '/semesters',
        component: Semesters
    },    
    {
        name: 'show-semester',
        path: '/semesters/view/:id',
        component: ShowSemester
    },    
    {
        name: 'add-semester',
        path: '/semesters/add',
        component: AddSemester
    },
    {
        name: 'edit-semester',
        path: '/semesters/edit/:id',
        component: UpdateSemester
    },
    {
        name: 'courses',
        path: '/courses',
        component: Courses
    },    
    {
        name: 'show-course',
        path: '/courses/view/:id',
        component: ShowCourse
    },    
    {
        name: 'add-course',
        path: '/courses/add',
        component: AddCourse
    },
    {
        name: 'edit-course',
        path: '/courses/edit/:id',
        component: UpdateCourse
    },    
    {
        name: 'course-groups',
        path: '/course-groups',
        component: CourseGroups
    },    
    {
        name: 'show-course-group',
        path: '/course-groups/view/:id',
        component: ShowCourseGroup
    },    
    {
        name: 'add-course-group',
        path: '/course-groups/add',
        component: AddCourseGroup
    },
    {
        name: 'edit-course-group',
        path: '/course-groups/edit/:id',
        component: UpdateCourseGroup
    },        
];