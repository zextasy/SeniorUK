<template>
  <div>
    <div class="container">
      <h2>Update Course</h2>
      <div class="panel panel-primary">
        <div class="panel-heading">
            Update Course
            <router-link to="/courses" class="btn btn-info float-right" style="margin-top:-7px;margin-left:2px;">Course List</router-link>
        </div>
        <div class="panel-body">
          <form @submit.prevent="updateCourse">
            <div class="form-group">
              <label>Name</label>
              <input type="text" class="form-control" v-model="course.name" />
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
      course: {},
    };
  },
  created() {
    this.axios
      .get(`/api/courses/${this.$route.params.id}`)
      .then((res) => {
        this.course = res.data;
      });
  },
  methods: {
    updateCourse() {
      this.axios
        .patch(
          `/api/courses/${this.$route.params.id}`,
          this.course
        )
        .then((res) => {
          this.$router.push({ name: "home" });
        });
    },
  },
};
</script>