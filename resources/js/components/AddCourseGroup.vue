<template>
  <div>
    <div class="container">
      <h2>Add Course Group</h2>
      <div class="panel panel-primary">
        <div class="panel-heading">
            Add Course
            <router-link to="/course-groups" class="btn btn-info float-right" style="margin-top:-7px;margin-left:2px;">Course Group List</router-link>
        </div>
        <div class="panel-body">
          <form @submit.prevent="addCourseGroup">
            <div class="form-group">
              <label>Name</label>
              <input type="text" class="form-control" v-model="course_group.name" />
            </div>
            <div class="form-group">
              <label>Course</label>
              <select class="form-control" v-model="course_group.course_id">
                <option v-for="course in courses" :value="course.id">{{course.name}}</option>
              </select>
            </div>
            <div class="form-group">
              <label>Lecturer</label>
              <select class="form-control" v-model="course_group.lecturer_id">
                <option v-for="lecturer in lecturers" :value="lecturer.id">{{lecturer.name}}</option>
              </select>
            </div>
            <div class="form-group">
              <label>Semester</label>
              <select class="form-control" v-model="course_group.semester_id">
                <option v-for="semester in semesters" :value="semester.id">{{semester.season}} {{semester.year}}</option>
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
      course_group: {},
      courses: [],
      lecturers: [],
      semesters: [],
    };
  },
  mounted() {
     this.getCourses();
     this.getLecturers();
     this.getSemesters();
  },
  methods: {
    addCourseGroup() {
      this.axios
        .post("/api/course-groups", this.course_group)
        .then((response) => this.$router.push({ name: "home" }))
        .catch((err) => console.log(err))
        .finally(() => (this.loading = false));
    },
    getCourses(){
        console.log('getCourses');
        axios.get("/api/courses")
            .then((response) => {
                console.log( response.data );
                this.courses = response.data;
            })
            .catch( resonse => {
                console.log('error');
            })
    },
    getLecturers(){
        console.log('getLecturers');
        axios.get("/api/lecturers")
            .then((response) => {
                console.log( response.data );
                this.lecturers = response.data;
            })
            .catch( resonse => {
                console.log('error');
            })
    },
    getSemesters(){
        console.log('getSemesters');
        axios.get("/api/semesters")
            .then((response) => {
                console.log( response.data );
                this.semesters = response.data;
            })
            .catch( resonse => {
                console.log('error');
            })
    },
  },
};
</script>
