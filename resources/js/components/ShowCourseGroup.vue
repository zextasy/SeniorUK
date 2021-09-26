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
              <td>{{ course_group.course.name }}</td>
            </tr>
            <tr>
              <th>Lecturer:</th>
               <td>{{ course_group.lecturer.name }}</td>
            </tr>
            <tr>
              <th>Semester:</th>
               <td>{{ course_group.semester.season }} {{ course_group.semester.year }}</td>
            </tr>                    
            <tr>
              <th>Students:</th>
               <td>{{ course_group.id }}</td>
            </tr>        
          </table>
        </div>
      </div>
    </div>
  </div>
</template>
 
<script>
export default {
  data() {
    return {
      course_group: {},
    };
  },
  created() {
    this.axios
      .get(`/api/course-groups/${this.$route.params.id}`)
      .then((res) => {
        this.course_group = res.data;
      });
  },
};
</script>