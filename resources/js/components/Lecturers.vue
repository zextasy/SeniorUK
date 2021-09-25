<template>
  <div>
    <div class="container">
      <h2>Lecturers</h2>
      <div class="panel panel-primary">
        <div class="panel-heading">
            Lecturers
            <router-link to="/lecturers/add" class="btn btn-info float-right" style="margin-top:-7px;margin-left:2px;">Add Lecturer</router-link>
        </div>
        <div class="panel-body">
          <table class="table">
            <thead>
              <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Mobile</th>
                <th>Courses</th>
                <th>Actions</th>
              </tr>
            </thead>
            <tbody>
              <tr v-for="lecturer in lecturers" :key="lecturer.id">
                <td>{{ lecturer.id }}</td>
                <td>{{ lecturer.name }}</td>
                <td>{{ lecturer.email }}</td>
                <td>{{ lecturer.mobile }}</td>
                <td>{{ lecturer.course_groups_count }}</td>
                <td>
                  <div class="btn-group" role="group">
                    <router-link
                      :to="{ name: 'show-lecturer', params: { id: lecturer.id } }"
                      class="btn btn-primary"
                      >View</router-link
                    >                  
                    <router-link
                      :to="{ name: 'edit-lecturer', params: { id: lecturer.id } }"
                      class="btn btn-success"
                      >Edit</router-link
                    >
                    <button
                      class="btn btn-danger"
                      @click="deleteLecturer(lecturer.id)"
                    >
                      Delete
                    </button>
                  </div>
                </td>
              </tr>
            </tbody>
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
      lecturers: [],
    };
  },
  created() {
    this.axios.get("/api/lecturers").then((response) => {
      this.lecturers = response.data;
      //console.log(response.data);
    });
  },
  methods: {
    deleteLecturer(id) {
      this.axios
        .delete(`/api/lecturers/${id}`)
        .then((response) => {
          let i = this.lecturers.map((data) => data.id).indexOf(id);
          this.lecturers.splice(i, 1);
        });
    },
  },
  mounted() {
      console.log('Lecturers Component mounted.')
  },
};
</script>
                