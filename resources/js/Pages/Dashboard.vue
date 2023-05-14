


<script>
import Master from "@/Pages/master.vue";
export default {
    layout:Master

}
</script>

<script setup>

import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';

import { Head } from '@inertiajs/inertia-vue3';
import {Link} from "@inertiajs/inertia-vue3";
import {reactive, ref} from "vue";
import {Inertia} from "@inertiajs/inertia";

let props = defineProps({
    questions: Array,
    can:Object,
    classroom:Number
})
let checkedValue = ref('');

let itArray= reactive([]);

let form = reactive( {
    answer :{

    },

});
// for (let index in data)
// {
//     itArray.push(data[index].key);
//
// }

let submit =()=>{
    Inertia.post('quiz/add',form)
}
</script>


<template>

    <div class="container-xxl flex-grow-1 container-p-y">

        <!-- Main Content -->
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="mt-4">Welcome {{$page.props.auth.user.name}} to Classroom Dashboard</h1>
                    <p>This dashboard provides quick access to all the important information related to your class. You can view your subjects, assignments, quizzes, announcements, gradebook, classmates and participate in discussions. You can also view your upcoming assignments, recent activity, class schedule, class resources and ongoing and completed class projects. </p>
                </div>
            </div>
        </div>

        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-3">
                    <div v-if="can.IsTeacher" class="card mb-4">
                        <div class="card-body">
                            <h5 class="card-title">Subjects</h5>
                            <p class="card-text">View all subjects for this class.</p>
                            <Link :href="`/subject/show/${classroom}`">
                                <button type="button" class="btn btn-primary">View Subjects</button>
                            </Link>

                        </div>
                    </div>
                    <div v-else class="card mb-4">
                        <div class="card-body">
                            <h5 class="card-title">Subjects</h5>
                            <p class="card-text">View all subjects for this class.</p>
                            <Link :href="`/subject/show/${classroom}`">
                                <button type="button" class="btn btn-primary">Show Subjects</button>
                            </Link>

                        </div>
                    </div>
                    <div class="card mb-4">
                        <div class="card-body">
                            <h5 class="card-title">Assignments</h5>
                            <p class="card-text">View all assignments for this class.</p>
                            <a href="/classroom/assignments" class="btn btn-primary">View Assignments</a>
                        </div>
                    </div>

                    <div class="card mb-4">
                        <div class="card-body">
                            <h5 class="card-title">Quizzes</h5>
                            <p class="card-text">View all quizzes for this class.</p>
                            <Link :href="`/classroom/quizzes/${classroom}`" class="btn btn-primary">View Quizzes</Link>
                        </div>
                    </div>

                    <div class="card mb-4">
                        <div class="card-body">
                            <h5 class="card-title">Announcements</h5>
                            <p class="card-text">View all announcements for this class.</p>
                            <a href="/classroom/announcements" class="btn btn-primary">View Announcements</a>
                        </div>
                    </div>

                    <div class="card mb-4">
                        <div class="card-body">
                            <h5 class="card-title">Gradebook</h5>
                            <p class="card-text">View all grades for this class.</p>
                            <a href="/classroom/gradebook" class="btn btn-primary">View Gradebook</a>
                        </div>
                    </div>

                    <div class="card mb-4">
                        <div class="card-body">
                            <h5 class="card-title">Classmates</h5>
                            <p class="card-text">View all classmates for this class.</p>
                            <a href="/classroom/classmates" class="btn btn-primary">View Classmates</a>
                        </div>
                    </div>
                </div>

                <div class="col-lg-9">
                    <div class="card mb-4">
                        <div class="card-body">
                            <h5 class="card-title">Add Subject</h5>
                            <p class="card-text">Add Subject for this class</p>
                            <a href="/classroom/assignments/upcoming" class="btn btn-primary">Add Subject</a>
                        </div>
                    </div>

                    <div class="card mb-4">
                        <div class="card-body">
                            <h5 class="card-title">Recent Activity</h5>
                            <p class="card-text">View recent activity for this class.</p>
                            <a href="/classroom/activity" class="btn btn-primary">View Activity</a>
                        </div>
                    </div>

                    <div class="card mb-4">
                        <div class="card-body">
                            <h5 class="card-title">Class Schedule</h5>
                            <p class="card-text">View the schedule for this class.</p>
                            <a href="/classroom/schedule" class="btn btn-primary">View Schedule</a>
                        </div>
                    </div>

                    <div class="card mb-4">
                        <div class="card-body">
                            <h5 class="card-title">Class Resources</h5>
                            <p class="card-text">Access all the resources for this class.</p>
                            <a href="/classroom/resources" class="btn btn-primary">View Resources</a>
                        </div>
                    </div>
                    <div class="card mb-4">
                        <div class="card-body">
                            <h5 class="card-title">Class Discussions</h5>
                            <p class="card-text">Participate in class discussions.</p>
                            <a href="/classroom/discussions" class="btn btn-primary">View Discussions</a>
                        </div>
                    </div>

                    <div class="card mb-4">
                        <div class="card-body">
                            <h5 class="card-title">Class Projects</h5>
                            <p class="card-text">View all ongoing and completed class projects.</p>
                            <a href="/classroom/projects" class="btn btn-primary">View Projects</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



<!--    <div class="container-xxl flex-grow-1 container-p-y">-->

<!--        &lt;!&ndash; Main Content &ndash;&gt;-->
<!--        <div class="container-fluid">-->
<!--            <div class="row">-->
<!--                <div class="col-lg-12">-->
<!--                    <h1 class="mt-4">Welcome {{$page.props.auth.user.name}} to Classroom Dashboard</h1>-->
<!--                    <p>This dashboard provides quick access to all the important information related to your class. You can view your subjects, assignments, quizzes, announcements, gradebook, classmates and participate in discussions. You can also view your upcoming assignments, recent activity, class schedule, class resources and ongoing and completed class projects. </p>-->
<!--                </div>-->
<!--            </div>-->
<!--        </div>-->

<!--        &lt;!&ndash; Card Grid &ndash;&gt;-->
<!--        <div class="row mt-4 ">-->
<!--            <div v-if="can.IsTeacher" class="col-md-4 mb-4">-->
<!--                <div class="card h-100 bg-gray text-center text-white">-->
<!--                    <div class="card-body">-->
<!--                        <h5 class="card-title text-white">Subjects</h5>-->
<!--                        <p class="card-text">View all subjects for this class.</p>-->
<!--                        <Link :href="`/subject/show/${classroom}`">-->
<!--                            <button type="button" class="btn btn-primary">View Subjects</button>-->
<!--                        </Link>-->
<!--                    </div>-->
<!--                </div>-->
<!--            </div>-->
<!--            <div class="col-md-4 mb-4 text-white">-->
<!--                <div class="card h-100 bg-github text-center">-->
<!--                    <div class="card-body">-->
<!--                        <h5 class="card-title text-white">Assignments</h5>-->
<!--                        <p class="card-text">View all assignments for this class.</p>-->
<!--                        <a href="/classroom/assignments" class="btn btn-primary" data-toggle="tooltip" data-placement="bottom" title="View Assignments">View Assignments</a>-->
<!--                    </div>-->
<!--                </div>-->
<!--            </div>-->
<!--            <div class="col-md-4 mb-4">-->
<!--                <div class="card h-100 bg-secondary text-center text-white">-->
<!--                    <div class="card-body ">-->
<!--                        <h5 class="card-title text-white">Announcements</h5>-->
<!--                        <p class="card-text">View all announcements for this class.</p>-->
<!--                        <a href="/classroom/quizzes" class="btn btn-primary" data-toggle="tooltip" data-placement="bottom" title="View Quizzes">View Announcements</a>-->
<!--                    </div>-->
<!--                </div>-->
<!--            </div>-->
<!--            <div class="col-md-4 mb-4">-->
<!--                <div class="card h-100 bg-gray text-center text-white">-->
<!--                    <div class="card-body">-->
<!--                        <h5 class="card-title text-white">Upcoming Assignments</h5>-->
<!--                        <p class="card-text">View assignments due in the next week.</p>-->
<!--                        <a href="/subject/show/${classroom}" class="btn btn-primary" data-toggle="tooltip" data-placement="bottom" title="View Subjects">View Upcoming Assignments</a>-->
<!--                    </div>-->
<!--                </div>-->
<!--            </div>-->
<!--            <div class="col-md-4 mb-4 text-white">-->
<!--                <div class="card h-100 bg-github text-center">-->
<!--                    <div class="card-body">-->
<!--                        <h5 class="card-title text-white">Recent Activity</h5>-->
<!--                        <p class="card-text">View recent activity for this class.-->
<!--                        </p>-->
<!--                        <a href="/classroom/assignments" class="btn btn-primary" data-toggle="tooltip" data-placement="bottom" title="View Assignments">View recent activity</a>-->
<!--                    </div>-->
<!--                </div>-->
<!--            </div>-->
<!--            <div class="col-md-4 mb-4">-->
<!--                <div class="card h-100 bg-secondary text-center text-white">-->
<!--                    <div class="card-body ">-->
<!--                        <h5 class="card-title text-white">Classmates</h5>-->
<!--                        <p class="card-text">View all classmates for this class.</p>-->
<!--                        <a href="/classroom/quizzes" class="btn btn-primary" data-toggle="tooltip" data-placement="bottom" title="View Quizzes">View Classmates</a>-->
<!--                    </div>-->
<!--                </div>-->
<!--            </div>-->

<!--            <div class="col-md-4 mb-4">-->
<!--                <div class="card h-100 bg-gray text-center text-white">-->
<!--                    <div class="card-body">-->
<!--                        <h5 class="card-title text-white">Subjects</h5>-->
<!--                        <p class="card-text">View all subjects for this class.</p>-->
<!--                        <a href="/subject/show/${classroom}" class="btn btn-primary" data-toggle="tooltip" data-placement="bottom" title="View Subjects">View Subjects</a>-->
<!--                    </div>-->
<!--                </div>-->
<!--            </div>-->
<!--            <div class="col-md-4 mb-4 text-white">-->
<!--                <div class="card h-100 bg-github text-center">-->
<!--                    <div class="card-body">-->
<!--                        <h5 class="card-title text-white">Assignments</h5>-->
<!--                        <p class="card-text">View all assignments for this class.</p>-->
<!--                        <a href="/classroom/assignments" class="btn btn-primary" data-toggle="tooltip" data-placement="bottom" title="View Assignments">View Assignments</a>-->
<!--                    </div>-->
<!--                </div>-->
<!--            </div>-->
<!--            <div class="col-md-4 mb-4">-->
<!--                <div class="card h-100 bg-secondary text-center text-white">-->
<!--                    <div class="card-body ">-->
<!--                        <h5 class="card-title text-white">Quizzes</h5>-->
<!--                        <p class="card-text">View all quizzes for this class.</p>-->
<!--                        <a href="/classroom/quizzes" class="btn btn-primary" data-toggle="tooltip" data-placement="bottom" title="View Quizzes">View Quizzes</a>-->
<!--                    </div>-->
<!--                </div>-->
<!--            </div>-->

<!--            <div class="col-md-4 mb-4">-->
<!--                <div class="card h-100 bg-gray text-center text-white">-->
<!--                    <div class="card-body">-->
<!--                        <h5 class="card-title text-white">Subjects</h5>-->
<!--                        <p class="card-text">View all subjects for this class.</p>-->
<!--                        <a href="/subject/show/${classroom}" class="btn btn-primary" data-toggle="tooltip" data-placement="bottom" title="View Subjects">View Subjects</a>-->
<!--                    </div>-->
<!--                </div>-->
<!--            </div>-->
<!--            <div class="col-md-4 mb-4 text-white">-->
<!--                <div class="card h-100 bg-github text-center">-->
<!--                    <div class="card-body">-->
<!--                        <h5 class="card-title text-white">Assignments</h5>-->
<!--                        <p class="card-text">View all assignments for this class.</p>-->
<!--                        <a href="/classroom/assignments" class="btn btn-primary" data-toggle="tooltip" data-placement="bottom" title="View Assignments">View Assignments</a>-->
<!--                    </div>-->
<!--                </div>-->
<!--            </div>-->
<!--            <div class="col-md-4 mb-4">-->
<!--                <div class="card h-100 bg-secondary text-center text-white">-->
<!--                    <div class="card-body ">-->
<!--                        <h5 class="card-title text-white">Quizzes</h5>-->
<!--                        <p class="card-text">View all quizzes for this class.</p>-->
<!--                        <a href="/classroom/quizzes" class="btn btn-primary" data-toggle="tooltip" data-placement="bottom" title="View Quizzes">View Quizzes</a>-->
<!--                    </div>-->
<!--                </div>-->
<!--            </div>-->

<!--        </div>-->


<!--    </div>-->

    </template>

