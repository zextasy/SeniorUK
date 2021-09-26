<template>
  <div>
    <div class="container">
      <h2>Add Semester</h2>
      <div class="panel panel-primary">
        <div class="panel-heading">
            Add Semester
            <router-link to="/semesters" class="btn btn-info float-right" style="margin-top:-7px;margin-left:2px;">Semester List</router-link>
        </div>
        <div class="panel-body">
          <form @submit.prevent="addSemester">
            <div class="form-group">
              <label>Year</label>
              <input
                type="number"
                class="form-control"
                v-model="semester.year"
              />
            </div>
            <div class="form-group">
              <label>Season</label>
              <select class="form-control" v-model="semester.season">
                <option value="">Select Season</option>
                <option value="spring">Spring</option>
                <option value="fall">Fall</option>
              </select>
            </div>

            <button type="submit" class="btn btn-primary">Add</button>
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
  methods: {
    addSemester() {
      this.axios
        .post("/api/semesters", this.semester)
        .then((response) => this.$router.push({ name: "home" }))
        .catch((err) => console.log(err))
        .finally(() => (this.loading = false));
    },
  },
};
</script>
