<template>
  <div>
    <div class="container">

      <h2>Course : {{ course.id }}</h2>
      <div class="panel panel-primary">
        <div class="panel-heading">
            View Course
            <router-link to="/courses" class="btn btn-info float-right" style="margin-top:-7px;margin-left:2px;">Course List</router-link>
        </div>
        <div class="panel-body">
          <table>
            <tr>
              <th>Name:</th>
              <td>{{ course.name }}</td>
            </tr>
            <tr>
              <th>Lecturers:</th>
              <td><span v-for="lecturer in course.lecturers">{{lecturer.name}} </span></td>
            </tr>            
          </table>
          
        </div>
      </div>
      <hr>
      <h2>Course Groups</h2>
      <div class="panel panel-primary">
        <div class="panel-heading">
            Course Groups
        </div>
        <div class="panel-body">
          <table class="table">
            <thead>
              <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Lecturer</th>
                <th>Semester</th>
                <th>Students</th>
                <th>Actions</th>
              </tr>
            </thead>
            <tbody>
              <tr v-for="course_group in course.course_groups" :key="course_group.id">
                <td>{{ course_group.id }}</td>
                <td>{{ course_group.name }}</td>
                <td>{{ course_group.lecturer.name }}</td>
                <td>{{ course_group.semester.season }} {{ course_group.semester.year }}</td>
                <td>{{ course_group.students_count }}</td>
                <td>
                  <div class="btn-group" role="group">
                    <router-link
                      :to="{ name: 'show-course-group', params: { id: course_group.id } }"
                      class="btn btn-primary"
                      >View</router-link
                    >                  
                  </div>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>      
      <hr>
    </div>
  </div>
</template>
 
<script>
export default {
  data() {
    return {
      course: {},
    };
  },
  created() {
    this.axios
      .get(`/api/courses/${this.$route.params.id}`)
      .then((res) => {
        this.course = res.data;
      });
  },
};
</script>