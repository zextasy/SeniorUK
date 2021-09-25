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