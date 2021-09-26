<template>
  <div>
    <div class="container">
      <h2>Student : {{ student.id }}</h2>
      <div class="panel panel-primary">
        <div class="panel-heading">
            View Student
            <router-link to="/students" class="btn btn-info float-right" style="margin-top:-7px;margin-left:2px;">Student List</router-link>
        </div>
        <div class="panel-body">
          <table>
            <tr>
              <th>Name:</th>
              <td>{{ student.name }}</td>
            </tr>
            <tr>
              <th>Telephone:</th>
              <td>{{ student.mobile }}</td>
            </tr>
            <tr>
              <th>Email:</th>
               <td>{{ student.email }}</td>
            </tr>
            <tr>
              <th>Gender:</th>
               <td>{{ student.gender }}</td>
            </tr>        
          </table>
        </div>
      </div>
      <hr>
      <h2>Student's Course Groups</h2>
      <div class="panel panel-primary">
        <div class="panel-body">
          <table class="table">
            <thead>
              <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Course</th>
                <th>Lecturer</th>
                <th>Semester</th>
                <th>Actions</th>
              </tr>
            </thead>
            <tbody>
              <tr v-for="course_group in student.course_groups" :key="course_group.id">
                <td>{{ course_group.id }}</td>
                <td>{{ course_group.name }}</td>
                <td>{{ course_group.course.name }}</td>
                <td>{{ course_group.lecturer.name }}</td>
                <td>{{ course_group.semester.season }} {{ course_group.semester.year }}</td>
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
  </div>
</template>
 
<script>
export default {
  data() {
    return {
      student: {},
    };
  },
  created() {
    this.axios
      .get(`/api/students/${this.$route.params.id}`)
      .then((res) => {
        this.student = res.data;
      });
  },
};
</script>