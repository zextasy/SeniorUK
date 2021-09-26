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
              <label>Year</label>
              <input type="text" class="form-control" v-model="semester.year" />
            </div>
            <div class="form-group">
              <label>Season</label>
              <select class="form-control" v-model="semester.season">
                <option value="">Select season</option>
                <option value="spring">Spring</option>
                <option value="fall">Fall</option>
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