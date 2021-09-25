<template>
  <div>
    <div class="container">
      <h2>Add Course</h2>
      <div class="panel panel-primary">
        <div class="panel-heading">
            Add Course
            <router-link to="/courses" class="btn btn-info float-right" style="margin-top:-7px;margin-left:2px;">Course List</router-link>
        </div>
        <div class="panel-body">
          <form @submit.prevent="addCourse">
            <div class="form-group">
              <label>Name</label>
              <input type="text" class="form-control" v-model="course.name" />
            </div>
            <div class="form-group">
              <label>Email</label>
              <input
                type="email"
                class="form-control"
                v-model="course.email"
              />
            </div>
            <div class="form-group">
              <label>Mobile</label>
              <input
                type="text"
                class="form-control"
                v-model="course.mobile"
              />
            </div>
            <div class="form-group">
              <label>Gender</label>
              <select class="form-control" v-model="course.gender">
                <option value="">Select gender</option>
                <option value="male">Male</option>
                <option value="female">Female</option>
                <option value="other">Other</option>
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
      course: {},
    };
  },
  methods: {
    addCourse() {
      this.axios
        .post("/api/courses", this.course)
        .then((response) => this.$router.push({ name: "home" }))
        .catch((err) => console.log(err))
        .finally(() => (this.loading = false));
    },
  },
};
</script>
