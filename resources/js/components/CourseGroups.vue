<template>
  <div>
    <div class="container">
      <h2>Course Groups</h2>
      <div class="panel panel-primary">
        <div class="panel-heading">
            Course Groups
            <router-link to="/course-groups/add" class="btn btn-info float-right" style="margin-top:-7px;margin-left:2px;">Add Course Group</router-link>
        </div>
        <div class="panel-body">
          <table class="table">
            <thead>
              <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Course</th>
                <th>Lecturer</th>
                <th>Semester</th>
                <th>Students</th>
                <th>Actions</th>
              </tr>
            </thead>
            <tbody>
              <tr v-for="course_group in course_groups.data" :key="course_group.id">
                <td>{{ course_group.id }}</td>
                <td>{{ course_group.name }}</td>
                <td>{{ course_group.course.name }}</td>
                <td>{{ course_group.lecturer.name }}</td>
                <td>{{ course_group.semester.season }} {{ course_group.semester.year }}</td>
                <td>{{ course_group.students_count }}</td>
                <td>
                  <div class="btn-group" role="group">
                    <router-link
                      :to="{ name: 'show-course-group', params: { id: course_group.id } }"
                      class="btn btn-primary"
                      >View</router-link
                    >                  
                    <router-link
                      :to="{ name: 'edit-course-group', params: { id: course_group.id } }"
                      class="btn btn-success"
                      >Edit</router-link
                    >
                    <button
                      class="btn btn-danger"
                      @click="deleteCourseGroup(course_group.id)"
                    >
                      Delete
                    </button>
                  </div>
                </td>
              </tr>
            </tbody>
          </table>
          <pagination :data="course_groups" align="center" size="small" :limit=10 @pagination-change-page="getResults"></pagination>
        </div>
      </div>
    </div>
  </div>
</template>
 
<script>
export default {
  data() {
    return {
      course_groups: {},
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
        .get("/api/course-groups?page=" + page)
        .then(response => {
          this.course_groups = response.data;
          //console.log(response);
        });
    },    
    deleteCourseGroup(id) {
      this.axios
        .delete(`/api/course-groups/${id}`)
        .then((response) => {
          let i = this.course_groups.map((data) => data.id).indexOf(id);
          this.course_groups.splice(i, 1);
        });
    },
  },
  mounted() {
      console.log('Course Groups Component mounted.')
  },
};
</script>
                