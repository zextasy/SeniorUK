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
              <th>Telephone:</th>
              <td>{{ course.mobile }}</td>
            </tr>
            <tr>
              <th>Email:</th>
               <td>{{ course.email }}</td>
            </tr>
            <tr>
              <th>Gender:</th>
               <td>{{ course.gender }}</td>
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