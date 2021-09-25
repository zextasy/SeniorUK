<template>
    <div class="container"> 
        <div class="text-center" style="margin: 20px 0px 20px 0px;">
            <span class="text-secondary">Senior UK</span>
        </div>
 
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="collapse navbar-collapse">
                <div class="navbar-nav">
                    <router-link to="/" class="nav-item nav-link">Home</router-link>
                    <router-link to="/students/" class="nav-item nav-link">Student List</router-link>
                    <router-link to="/lecturers/" class="nav-item nav-link">Lecturer List</router-link>
                    <router-link to="/semesters/" class="nav-item nav-link">Semester List</router-link>
                    <router-link to="/courses/" class="nav-item nav-link">Course List</router-link>
                    <router-link to="/course-groups/" class="nav-item nav-link">Course group List</router-link>
                </div>
            </div>
        </nav>
        <br/>    
        <router-view> </router-view>
    </div>
</template>
 
<script>
    export default {}
</script>