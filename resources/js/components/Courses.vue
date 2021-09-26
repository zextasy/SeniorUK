<template>
  <div>
    <div class="container">
      <h2>Courses</h2>
      <div class="panel panel-primary">
        <div class="panel-heading">
            Courses
            <router-link to="/courses/add" class="btn btn-info float-right" style="margin-top:-7px;margin-left:2px;">Add Course</router-link>
        </div>
        <div class="panel-body">
          <table class="table">
            <thead>
              <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Lecturers</th>
                <th> Course Groups</th>
                <th>Actions</th>
              </tr>
            </thead>
            <tbody>
              <tr v-for="course in courses.data" :key="course.id">
                <td>{{ course.id }}</td>
                <td>{{ course.name }}</td>
                <td>{{ course.lecturers_count}}</td>
                <td>{{ course.course_groups_count }}</td>
                <td>
                  <div class="btn-group" role="group">
                    <router-link
                      :to="{ name: 'show-course', params: { id: course.id } }"
                      class="btn btn-primary"
                      >View</router-link
                    >                  
                    <router-link
                      :to="{ name: 'edit-course', params: { id: course.id } }"
                      class="btn btn-success"
                      >Edit</router-link
                    >
                    <button
                      class="btn btn-danger"
                      @click="deleteCourse(course.id)"
                    >
                      Delete
                    </button>
                  </div>
                </td>
              </tr>
            </tbody>
          </table>
          <pagination :data="courses" align="center" size="small" :limit=10 @pagination-change-page="getResults"></pagination>
        </div>
      </div>
    </div>
  </div>
</template>
 
<script>
export default {
  data() {
    return {
      courses: {},
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
        .get("/api/courses?page=" + page)
        .then(response => {
          this.courses = response.data;
          //console.log(response);
        });
    },    
    deleteCourse(id) {
      this.axios
        .delete(`/api/courses/${id}`)
        .then((response) => {
          let i = this.courses.map((data) => data.id).indexOf(id);
          this.courses.splice(i, 1);
        });
    },
  },
  mounted() {
      console.log('Courses Component mounted.')
  },
};
</script>
                