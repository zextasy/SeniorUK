<template>
  <div>
    <div class="container">
      <h2>Update Lecturer</h2>
      <div class="panel panel-primary">
        <div class="panel-heading">
            Update Lecturer
            <router-link to="/lecturers" class="btn btn-info float-right" style="margin-top:-7px;margin-left:2px;">Lecturer List</router-link>
        </div>
        <div class="panel-body">
          <form @submit.prevent="updateLecturer">
            <div class="form-group">
              <label>Name</label>
              <input type="text" class="form-control" v-model="student.name" />
            </div>
            <div class="form-group">
              <label>Email</label>
              <input
                type="email"
                class="form-control"
                v-model="student.email"
              />
            </div>
            <div class="form-group">
              <label>Mobile</label>
              <input
                type="text"
                class="form-control"
                v-model="student.mobile"
              />
            </div>

            <button type="submit" class="btn btn-primary">Update</button>
          </form>
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
      .get(`/api/lecturers/${this.$route.params.id}`)
      .then((res) => {
        this.student = res.data;
      });
  },
  methods: {
    updateLecturer() {
      this.axios
        .patch(
          `/api/lecturers/${this.$route.params.id}`,
          this.student
        )
        .then((res) => {
          this.$router.push({ name: "home" });
        });
    },
  },
};
</script>