<template>
  <div>
    <div class="container">
      <h2>Update Student</h2>
      <div class="panel panel-primary">
        <div class="panel-heading">
            Update Student
            <router-link to="/students" class="btn btn-info float-right" style="margin-top:-7px;margin-left:2px;">Student List</router-link>
        </div>
        <div class="panel-body">
          <form @submit.prevent="updateStudent">
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
            <div class="form-group">
              <label>Gender</label>
              <select class="form-control" v-model="student.gender">
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
      student: {},
    };
  },
  created() {
    this.axios
      .get(`/api/students/${this.$route.params.id}`)
      .then((res) => {
        this.student = res.data;
      });
  },
  methods: {
    updateStudent() {
      this.axios
        .patch(
          `/api/students/${this.$route.params.id}`,
          this.student
        )
        .then((res) => {
          this.$router.push({ name: "home" });
        });
    },
  },
};
</script>