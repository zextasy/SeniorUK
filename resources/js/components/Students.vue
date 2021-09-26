<template>
  <div>
    <div class="container">
      <h2>Students</h2>
      <div class="panel panel-primary">
        <div class="panel-heading">
            Students
            <router-link to="/students/add" class="btn btn-info float-right" style="margin-top:-7px;margin-left:2px;">Add Student</router-link>
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
                <th>Courses</th>
                <th>Actions</th>
              </tr>
            </thead>
            <tbody>
              <tr v-for="student in students.data" :key="student.id">
                <td>{{ student.id }}</td>
                <td>{{ student.name }}</td>
                <td>{{ student.email }}</td>
                <td>{{ student.mobile }}</td>
                <td>{{ student.gender }}</td>
                <td>{{ student.course_groups_count }}</td>
                <td>
                  <div class="btn-group" role="group">
                    <router-link
                      :to="{ name: 'show-student', params: { id: student.id } }"
                      class="btn btn-primary"
                      >View</router-link
                    >                  
                    <router-link
                      :to="{ name: 'edit-student', params: { id: student.id } }"
                      class="btn btn-success"
                      >Edit</router-link
                    >
                    <button
                      class="btn btn-danger"
                      @click="deleteStudent(student.id)"
                    >
                      Delete
                    </button>
                  </div>
                </td>
              </tr>
            </tbody>
          </table>
          <pagination :data="students" align="center" size="small" :limit=10 @pagination-change-page="getResults"></pagination>
        </div>
      </div>
    </div>
  </div>
</template>
 
<script>
export default {
  data() {
    return {
      students: {},
    };
  },
  created() {
    this.getResults();
  },
  methods: {
    getResults(page) {
      if (typeof page === "undefined") {
        page = 1;
      }
      this.axios
        .get("/api/students?page=" + page)
        .then(response => {
          this.students = response.data;
          //console.log(response);
        });
    },  
    deleteStudent(id) {
      this.axios
        .delete(`/api/students/${id}`)
        .then((response) => {
          let i = this.students.map((data) => data.id).indexOf(id);
          this.students.splice(i, 1);
        });
    },
  },
  mounted() {
      console.log('Students Component mounted.')
  },
};
</script>
                