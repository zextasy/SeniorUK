<template>
  <div>
    <div class="container">
      <h2>Update Semester</h2>
      <div class="panel panel-primary">
        <div class="panel-heading">
            Update Semester
            <router-link to="/semesters" class="btn btn-info float-right" style="margin-top:-7px;margin-left:2px;">Semester List</router-link>
        </div>
        <div class="panel-body">
          <form @submit.prevent="updateSemester">
            <div class="form-group">
              <label>Name</label>
              <input type="text" class="form-control" v-model="semester.name" />
            </div>
            <div class="form-group">
              <label>Email</label>
              <input
                type="email"
                class="form-control"
                v-model="semester.email"
              />
            </div>
            <div class="form-group">
              <label>Mobile</label>
              <input
                type="text"
                class="form-control"
                v-model="semester.mobile"
              />
            </div>
            <div class="form-group">
              <label>Gender</label>
              <select class="form-control" v-model="semester.gender">
                <option value="">Select gender</option>
                <option value="male">Male</option>
                <option value="female">Female</option>
                <option value="other">Other</option>
              </select>
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
  methods: {
    updateSemester() {
      this.axios
        .patch(
          `/api/semesters/${this.$route.params.id}`,
          this.semester
        )
        .then((res) => {
          this.$router.push({ name: "home" });
        });
    },
  },
};
</script>