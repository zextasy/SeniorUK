<template>
  <div>
    <div class="container">
      <h2>Update Course Group</h2>
      <div class="panel panel-primary">
        <div class="panel-heading">
            Update Course Group
            <router-link to="/course-groups" class="btn btn-info float-right" style="margin-top:-7px;margin-left:2px;">Course Group List</router-link>
        </div>
        <div class="panel-body">
          <form @submit.prevent="updateCourseGroup">
            <div class="form-group">
              <label>Name</label>
              <input type="text" class="form-control" v-model="course_group.name" />
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
      course_group: {},
    };
  },
  created() {
    this.axios
      .get(`/api/course-groups/${this.$route.params.id}`)
      .then((res) => {
        this.course_group = res.data;
      });
  },
  methods: {
    updateCourseGroup() {
      this.axios
        .patch(
          `/api/course-groups/${this.$route.params.id}`,
          this.course_group
        )
        .then((res) => {
          this.$router.push({ name: "home" });
        });
    },
  },
};
</script>