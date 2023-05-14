


<script>
import Master from "@/Pages/master.vue";
export default {
    layout:Master

}
</script>

<script setup>

let props= defineProps({
    quizzes :Object
})

import { onMounted, ref } from 'vue';

const countdownValue = ref(null);
import {Link} from "@inertiajs/inertia-vue3";

const startCountdown = (quiz) => {
    const intervalId = setInterval(() => {
        const now = new Date().getTime();
        const distance = new Date(quiz.available_date).getTime() - now;
        if (distance < 0) {
            clearInterval(intervalId);
            quiz.countdownValue = null;
            return;
        }
        const days = Math.floor(distance / (1000 * 60 * 60 * 24));
        const hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
        const minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
        const seconds = Math.floor((distance % (1000 * 60)) / 1000);
        let countdownValue = '';
        if (days > 0) {
            countdownValue += `${days}d `;
        }
        if (hours > 0) {
            countdownValue += `${hours}h `;
        }
        if (minutes > 0) {
            countdownValue += `${minutes}m `;
        }
        countdownValue += `${seconds}s`;
        quiz.countdownValue = countdownValue.trim();
    }, 1000);
};

const countdown = (quiz) => {
    if (!quiz.available_date) return null;
    if (!quiz.countdownValue) {
        const now = new Date().getTime();
        const distance = new Date(quiz.available_date).getTime() - now;
        if (distance > 0) {
            startCountdown(quiz);
        } else {
            quiz.countdownValue = null;
        }
    }
    return quiz.countdownValue;
};

onMounted(() => {
    console.log('Component mounted.');
});

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
                <div class="col-lg-12">
                    <h2 class="mb-4">Quizzes</h2>
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th scope="col">Quiz Name</th>
                            <th scope="col">subject</th>
                            <th scope="col">Date</th>
                            <th scope="col">Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr v-for="quiz in quizzes" :key="quiz.id">
                            <td>{{quiz.name}}</td>
                            <td>{{quiz.subject_name}}</td>
                            <td>{{quiz.formatted_available_date}}</td>
                            <td v-if="countdown(quiz)"><span class="text-success">{{ countdown(quiz) }}</span></td>
                            <td v-else><Link :href="`/classroom/quiz/attend?quiz_id=${quiz.id}`" class="btn btn-primary">Attend quiz</Link></td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</template>





<!--////////////////-->

<!--<template>-->

<!--    <div class="container-xxl flex-grow-1 container-p-y">-->
<!--        <div class="container-xl">-->

<!--                <div class="quiz-header d-flex justify-content-between align-items-center mb-4">-->
<!--                    <h2 class="quiz-title">{{ quiz.name }}</h2>-->
<!--                    <div class="quiz-info">-->
<!--                        <div class="quiz-countdown" v-if="countdownValue">-->
<!--                            <p class="quiz-countdown-label">Time remaining:</p>-->
<!--                            <p class="quiz-countdown-value">{{ countdownValue }}</p>-->
<!--                        </div>-->
<!--                        <div class="quiz-time-info">-->
<!--                            <p class="quiz-time-available">{{ quiz.available_time }} minutes</p>-->
<!--                            <p class="quiz-time-available-label">available from {{ quiz.formatted_available_date }}</p>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                </div>-->

<!--                <form class="quiz-form" @submit.prevent="submitQuiz">-->
<!--                    <ol class="quiz-questions list-unstyled">-->
<!--                        <li v-for="(question, index) in quiz.questions" :key="question.id" class="quiz-question">-->
<!--                            <h4 class="quiz-question-title">{{ question.title }}</h4>-->
<!--                            <ul class="quiz-answers list-unstyled">-->
<!--                                <li v-for="(answer, answerIndex) in question.answers" :key="answer.id" class="quiz-answer">-->
<!--                                    <div class="form-check">-->
<!--                                        <input class="form-check-input" type="radio" :id="`answer-${answer.id}`" :name="`question-${question.id}`" :value="answer.id" v-model="answers[index]">-->
<!--                                        <label class="form-check-label quiz-answer-label" :for="`answer-${answer.id}`">{{ answer.title }}</label>-->
<!--                                    </div>-->
<!--                                </li>-->
<!--                            </ul>-->
<!--                        </li>-->
<!--                    </ol>-->

<!--                    <div class="quiz-footer mt-4">-->
<!--                        <button type="submit" class="btn btn-primary">Submit Answers</button>-->
<!--                        <div class="quiz-status ml-4">-->
<!--                            <p v-if="submitSuccess" class="quiz-status-message quiz-success">{{ submitSuccess }}</p>-->
<!--                            <p v-if="submitError" class="quiz-status-message quiz-error">{{ submitError }}</p>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                </form>-->
<!--            -->
<!--        </div>-->
<!--    </div>-->
<!--</template>-->

<!--<style scoped>-->


<!--.quiz-title {-->
<!--    font-size: 2.5rem;-->
<!--    font-weight: bold;-->
<!--    margin: 0;-->
<!--}-->

<!--.quiz-info {-->
<!--    display: flex;-->
<!--    flex-direction: column;-->
<!--    align-items: flex-end;-->
<!--}-->

<!--.quiz-countdown {-->
<!--    display: flex;-->
<!--    align-items: center;-->
<!--    margin-bottom: 10px;-->
<!--}-->

<!--.quiz-countdown-label {-->
<!--    font-size: 1.5rem;-->
<!--    margin-right: 10px;-->
<!--    color: #555;-->
<!--}-->

<!--.quiz-countdown-value {-->
<!--    font-size: 2rem;-->
<!--    font-weight: bold;-->
<!--    color: #009688;-->
<!--}-->

<!--.quiz-time-info {-->
<!--    display: flex;-->
<!--    flex-direction: column;-->
<!--    align-items: flex-end;-->
<!--}-->

<!--.quiz-time-available {-->
<!--    font-size: 1.5rem;-->
<!--    margin-bottom: 10px;-->
<!--    color: #555;-->
<!--}-->

<!--.quiz-time-available-label {-->
<!--    font-size: 1.25rem;-->
<!--    margin: 0;-->
<!--    color: #777;-->
<!--}-->

<!--.quiz-form {-->
<!--    margin-top: 30px;-->
<!--}-->

<!--.quiz-question {-->
<!--    margin-bottom: 30px;-->
<!--}-->

<!--.quiz-question-title {-->
<!--    font-size: 1.5rem;-->
<!--    margin-bottom: 10px;-->
<!--    font-weight: bold;-->
<!--}-->

<!--.quiz-answer-label {-->
<!--    font-size: 1.25rem;-->
<!--}-->

<!--.quiz-footer {-->
<!--    display: flex;-->
<!--    justify-content: space-between;-->
<!--    align-items: center;-->
<!--    margin-top: 50px;-->
<!--}-->

<!--.quiz-status-message {-->
<!--    font-size: 1.25rem;-->
<!--    font-weight: bold;-->
<!--    margin: 0;-->
<!--}-->

<!--.quiz-success {-->
<!--    color: #009688;-->
<!--}-->

<!--.quiz-error {-->
<!--    color: #ff5722;-->
<!--}-->


<!--</style>-->


<!---->



<!--<template>-->
<!--    <div class="container-xxl flex-grow-1 container-p-y">-->
<!--        <h2>{{ quiz.name }}</h2>-->
<!--        <p>Available for {{ quiz.available_time }} minutes from {{ quiz.formatted_available_date }}</p>-->
<!--        <p v-if="countdownValue"><span class="text-success">{{ countdownValue }}</span></p>-->
<!--        <form @submit.prevent="submitQuiz">-->
<!--            <ol>-->
<!--                <li v-for="(question, index) in quiz.questions" :key="question.id">-->
<!--                    <h4>{{ question.title }}</h4>-->
<!--                    <ul>-->
<!--                        <li v-for="(answer, answerIndex) in question.answers" :key="answer.id">-->
<!--                            <input type="radio" :id="`answer-${answer.id}`" :name="`question-${question.id}`" :value="answer.id" v-model="answers[index]">-->
<!--                            <label :for="`answer-${answer.id}`">{{ answer.title }}</label>-->
<!--                        </li>-->
<!--                    </ul>-->
<!--                </li>-->
<!--            </ol>-->
<!--            <button type="submit" class="btn btn-primary">Submit Answers</button>-->
<!--        </form>-->
<!--        <p v-if="submitSuccess" class="text-success">{{ submitSuccess }}</p>-->
<!--        <p v-if="submitError" class="text-danger">{{ submitError }}</p>-->
<!--    </div>-->
<!--</template>-->









<!--<template>-->
<!--    <div class="container-fluid d-flex flex-column align-items-center">-->
<!--        <div class="card my-4 p-4">-->
<!--            <h2 class="card-title text-center mb-4">{{ quiz.name }}</h2>-->
<!--            <p class="card-text text-center">Available for {{ quiz.available_time }} minutes from {{ quiz.formatted_available_date }}</p>-->
<!--            <p v-if="countdownValue" class="card-text text-center"><span class="text-success">{{ countdownValue }}</span></p>-->
<!--            <form @submit.prevent="submitQuiz" class="card-text">-->
<!--                <ol class="list-unstyled">-->
<!--                    <li v-for="(question, index) in quiz.questions" :key="question.id">-->
<!--                        <h4 class="mb-3">{{ question.title }}</h4>-->
<!--                        <ul class="list-unstyled">-->
<!--                            <li v-for="(answer, answerIndex) in question.answers" :key="answer.id">-->
<!--                                <div class="form-check">-->
<!--                                    <input type="radio" :id="`answer-${answer.id}`" :name="`question-${question.id}`" :value="answer.id" v-model="answers[index]" class="form-check-input">-->
<!--                                    <label :for="`answer-${answer.id}`" class="form-check-label">{{ answer.title }}</label>-->
<!--                                </div>-->
<!--                            </li>-->
<!--                        </ul>-->
<!--                    </li>-->
<!--                </ol>-->
<!--                <button type="submit" class="btn btn-primary btn-block mt-4">Submit Answers</button>-->
<!--            </form>-->
<!--            <p v-if="submitSuccess" class="text-success mt-4">{{ submitSuccess }}</p>-->
<!--            <p v-if="submitError" class="text-danger mt-4">{{ submitError }}</p>-->
<!--        </div>-->
<!--    </div>-->
<!--</template>-->



















