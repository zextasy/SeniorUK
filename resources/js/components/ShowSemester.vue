<template>
  <div>
    <div class="container">

      <h2>Semester : {{ semester.id }}</h2>
      <div class="panel panel-primary">
        <div class="panel-heading">
            <h4>View Semester</h4>
            <router-link to="/semesters" class="btn btn-info float-right" style="margin-top:-7px;margin-left:2px;">Semester List</router-link>
        </div>

        <div class="panel-body">
        <hr>
          <table>
            <tr>
              <th>Name:</th>
              <td>{{ semester.season }} {{ semester.year }}</td>
            </tr>
          </table>
        </div>
      </div>
      <hr>
      <h2>Course Groups</h2>
      <div class="panel panel-primary">
        <div class="panel-heading">
            Course Groups
            <router-link to="/course-groups/add" class="btn btn-info float-right" style="margin-top:-7px;margin-left:2px;">Add Course Group</router-link>
        </div>
        <div class="panel-body">
          <table class="table">
            <thead>
              <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Course</th>
                <th>Lecturer</th>
                <th>Students</th>
                <th>Actions</th>
              </tr>
            </thead>
            <tbody>
              <tr v-for="course_group in semester.course_groups" :key="course_group.id">
                <td>{{ course_group.id }}</td>
                <td>{{ course_group.name }}</td>
                <td>{{ course_group.course.name }}</td>
                <td>{{ course_group.lecturer.name }}</td>
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
      semester: {},
    };
  },
  created() {
    this.axios
      .get(`/api/semesters/${this.$route.params.id}`)
      .then((res) => {
        this.semester = res.data;
      });
  },
};
</script>