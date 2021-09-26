<template>
  <div>
    <div class="container">

      <h2>Course Group: {{ course_group.id }}</h2>
      <div class="panel panel-primary">
        <div class="panel-heading">
            View Course Group
            <router-link to="/course-groups" class="btn btn-info float-right" style="margin-top:-7px;margin-left:2px;">Course Group List</router-link>
        </div>
        <div class="panel-body">
          <table>
            <tr>
              <th>Name:</th>
              <td>{{ course_group.name }}</td>
            </tr>
            <tr>
              <th>Course:</th>
              <td>{{ course.name }}</td>
            </tr>            
            <tr>
              <th>Lecturer:</th>
               <td>{{ lecturer.name }}</td>
            </tr>
            <tr>
              <th>Semester:</th>
               <td>{{ semester.season }} {{ semester.year }}</td>
            </tr>                    
            <tr>
              <th>Students:</th>
               <td>{{ course_group.students_count }}</td>
            </tr>        
          </table>
        </div>
      </div>
      <hr>
      <h2>Students</h2>
      <div class="panel panel-primary">
        <div class="panel-heading">
            Students
        </div>
        <div class="panel-body">
          <table class="table">
            <thead>
              <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Mobile</th>
                <th>Gender</th>
                <th>Actions</th>
              </tr>
            </thead>
            <tbody>
              <tr v-for="student in course_group.students" :key="student.id">
                <td>{{ student.id }}</td>
                <td>{{ student.name }}</td>
                <td>{{ student.email }}</td>
                <td>{{ student.mobile }}</td>
                <td>{{ student.gender }}</td>
                <td>
                  <div class="btn-group" role="group">
                    <router-link
                      :to="{ name: 'show-student', params: { id: student.id } }"
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
      course_group: {},
      course: {},
      lecturer: {},
      semester: {},
    };
  },
  created() {
    this.axios
      .get(`/api/course-groups/${this.$route.params.id}`)
      .then((response) => {
        this.course_group = response.data;
        this.course = response.data.course;
        this.lecturer = response.data.lecturer;
        this.semester = response.data.semester;
        console.log(response);
      });
  },
};
</script>