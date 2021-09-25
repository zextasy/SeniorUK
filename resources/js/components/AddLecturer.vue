<template>
  <div>
    <div class="container">
      <h2>Add Lecturer</h2>
      <div class="panel panel-primary">
        <div class="panel-heading">
            Add Lecturer
            <router-link to="/lecturers" class="btn btn-info float-right" style="margin-top:-7px;margin-left:2px;">Lecturer List</router-link>
        </div>
        <div class="panel-body">
          <form @submit.prevent="addLecturer">
            <div class="form-group">
              <label>Name</label>
              <input type="text" class="form-control" v-model="lecturer.name" />
            </div>
            <div class="form-group">
              <label>Email</label>
              <input
                type="email"
                class="form-control"
                v-model="lecturer.email"
              />
            </div>
            <div class="form-group">
              <label>Mobile</label>
              <input
                type="text"
                class="form-control"
                v-model="lecturer.mobile"
              />
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
      lecturer: {},
    };
  },
  methods: {
    addLecturer() {
      this.axios
        .post("/api/lecturers", this.lecturer)
        .then((response) => this.$router.push({ name: "home" }))
        .catch((err) => console.log(err))
        .finally(() => (this.loading = false));
    },
  },
};
</script>
