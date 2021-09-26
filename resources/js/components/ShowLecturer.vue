<template>
  <div>
    <div class="container">

      <h2>Lecturer : {{ lecturer.id }}</h2>
      <div class="panel panel-primary">
        <div class="panel-heading">
            <h5>View Lecturer</h5>
            <router-link to="/lecturers" class="btn btn-info float-right" style="margin-top:-7px;margin-left:2px;">Lecturer List</router-link>
        </div>
        <div class="panel-body">
          <table>
            <tr>
              <th>Name:</th>
              <td>{{ lecturer.name }}</td>
            </tr>
            <tr>
              <th>Telephone:</th>
              <td>{{ lecturer.mobile }}</td>
            </tr>
            <tr>
              <th>Email:</th>
               <td>{{ lecturer.email }}</td>
            </tr>
          </table>
        </div>
      </div>
      <hr>
      <h2>Lecturer's Course Groups</h2>
      <div class="panel panel-primary">
        <div class="panel-body">
          <table class="table">
            <thead>
              <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Course</th>
                <th>Semester</th>
                <th>Students</th>
                <th>Actions</th>
              </tr>
            </thead>
            <tbody>
              <tr v-for="course_group in lecturer.course_groups" :key="course_group.id">
                <td>{{ course_group.id }}</td>
                <td>{{ course_group.name }}</td>
                <td>{{ course_group.course.name }}</td>
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
      lecturer: {},
    };
  },
  created() {
    this.axios
      .get(`/api/lecturers/${this.$route.params.id}`)
      .then((res) => {
        this.lecturer = res.data;
      });
  },
};
</script>