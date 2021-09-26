<template>
  <div>
    <div class="container">
      <h2>Semesters</h2>
      <div class="panel panel-primary">
        <div class="panel-heading">
            Semesters
            <router-link to="/semesters/add" class="btn btn-info float-right" style="margin-top:-7px;margin-left:2px;">Add Semester</router-link>
        </div>
        <div class="panel-body">
          <table class="table">
            <thead>
              <tr>
                <th>ID</th>
                <th>Season</th>
                <th>Year</th>
                <th>Course Groups</th>
                <th>Actions</th>
              </tr>
            </thead>
            <tbody>
              <tr v-for="semester in semesters.data" :key="semester.id">
                <td>{{ semester.id }}</td>
                <td>{{ semester.season }}</td>
                <td>{{ semester.year }}</td>
                <td>{{ semester.course_groups_count }}</td>
                <td>
                  <div class="btn-group" role="group">
                    <router-link
                      :to="{ name: 'show-semester', params: { id: semester.id } }"
                      class="btn btn-primary"
                      >View</router-link
                    >                  
                    <router-link
                      :to="{ name: 'edit-semester', params: { id: semester.id } }"
                      class="btn btn-success"
                      >Edit</router-link
                    >
                    <button
                      class="btn btn-danger"
                      @click="deleteSemester(semester.id)"
                    >
                      Delete
                    </button>
                  </div>
                </td>
              </tr>
            </tbody>
          </table>
          <pagination :data="semesters" align="center" size="small" :limit=10 @pagination-change-page="getResults"></pagination>
        </div>
      </div>
    </div>
  </div>
</template>
 
<script>
export default {
  data() {
    return {
      semesters: {},
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
        .get("/api/semesters?page=" + page)
        .then(response => {
          this.semesters = response.data;
          //console.log(response);
        });
    },    
    deleteSemester(id) {
      this.axios
        .delete(`/api/semesters/${id}`)
        .then((response) => {
          let i = this.semesters.map((data) => data.id).indexOf(id);
          this.semesters.splice(i, 1);
        });
    },
  },
  mounted() {
      console.log('Semesters Component mounted.')
  },
};
</script>
                