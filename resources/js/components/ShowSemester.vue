<template>
  <div>
    <div class="container">

      <h2>Semester : {{ semester.id }}</h2>
      <div class="panel panel-primary">
        <div class="panel-heading">
            View Semester
            <router-link to="/semesters" class="btn btn-info float-right" style="margin-top:-7px;margin-left:2px;">Semester List</router-link>
        </div>
        <div class="panel-body">
          <table>
            <tr>
              <th>Name:</th>
              <td>{{ semester.name }}</td>
            </tr>
            <tr>
              <th>Telephone:</th>
              <td>{{ semester.mobile }}</td>
            </tr>
            <tr>
              <th>Email:</th>
               <td>{{ semester.email }}</td>
            </tr>
            <tr>
              <th>Gender:</th>
               <td>{{ semester.gender }}</td>
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