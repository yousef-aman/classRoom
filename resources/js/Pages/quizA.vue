<!--<template>-->
<!--    <div>-->
<!--        <div v-if="quizStarted && !quizEnded">-->
<!--            <div v-if="currentQuestion">-->
<!--                <h2>{{ currentQuestion.name }}</h2>-->
<!--                <div>-->
<!--                    <label v-for="option in currentQuestion.options" :key="option.id">-->
<!--                        <input type="radio" :name="'question-' + currentQuestion.id" :value="option.id" v-model="selectedOption" />-->
<!--                        {{ option.name }}-->
<!--                    </label>-->
<!--                </div>-->
<!--                <button @click="answerQuestion">Answer</button>-->
<!--            </div>-->
<!--            <div v-else>-->
<!--                <h2>Congratulations! You have completed the quiz.</h2>-->
<!--                <button @click="submitQuiz">Submit</button>-->
<!--            </div>-->
<!--        </div>-->
<!--        <div v-else>-->
<!--            <h2>{{ quiz.name }}</h2>-->
<!--            <p>{{ quiz.description }}</p>-->
<!--            <button @click="startQuiz">Start Quiz</button>-->
<!--        </div>-->
<!--        <div v-if="quizStarted && !quizEnded">-->
<!--            <p>Time Remaining: {{ remainingTime }} seconds</p>-->
<!--        </div>-->
<!--    </div>-->
<!--</template>-->
<!--<script setup>-->
<!--import { ref, reactive, computed, onMounted } from 'vue';-->
<!--import { Inertia } from '@inertiajs/inertia';-->
<!--import { Link } from '@inertiajs/inertia-vue3';-->
<!--import moment from 'moment';-->
<!--const calculateRemainingTime = (startedAt, duration) => {-->
<!--    const now = moment();-->
<!--    const endTime = moment(startedAt).add(duration, 'minutes');-->
<!--    const remainingTimeInSeconds = Math.max(0, endTime.diff(now, 'seconds'));-->
<!--    return remainingTimeInSeconds;-->
<!--};-->

<!--const startTimer = (remainingTime, setRemainingTime, setQuizEnded) => {-->
<!--    const intervalId = setInterval(() => {-->
<!--        setRemainingTime(time => {-->
<!--            const newTime = time - 1;-->
<!--            if (newTime <= 0) {-->
<!--                setQuizEnded(true);-->
<!--                clearInterval(intervalId);-->
<!--            }-->
<!--            return newTime;-->
<!--        });-->
<!--    }, 1000);-->
<!--    return intervalId;-->
<!--};-->

<!--const stopTimer = (intervalId) => {-->
<!--    clearInterval(intervalId);-->
<!--};-->

<!--const useQuiz = (quizId, quizAttempt) => {-->
<!--    const quiz = reactive(null);-->
<!--    onMounted(async () => {-->
<!--        const response = await Inertia.get(/quizzes/${quizId});-->
<!--        quiz.value = response.data;-->
<!--    });-->

<!--    const currentQuestionIndex = ref(0);-->
<!--    const selectedOption = ref(null);-->
<!--    const quizStarted = ref(false);-->
<!--    const quizEnded = ref(false);-->
<!--    const remainingTime = ref(0);-->
<!--    const intervalId = ref(null);-->

<!--    const setQuizAttempt = (quizAttemptData) => {-->
<!--        Inertia.post('/quiz-attempts', {-->
<!--            quiz_id: quiz.value.id,-->
<!--        }).then(response => {-->
<!--            quizAttempt.value = response.data;-->
<!--            quizStarted.value = true;-->
<!--            remainingTime.value = quiz.value.duration * 60;-->
<!--            intervalId.value = startTimer(remainingTime.value, remainingTime, quizEnded);-->
<!--        });-->
<!--    };-->

<!--    const currentQuestion = computed(() => {-->
<!--        return quiz.value.questions[currentQuestionIndex.value];-->
<!--    });-->

<!--    if (quizAttempt) {-->
<!--        quizStarted.value = !!quizAttempt.started_at && !quizAttempt.ended_at;-->
<!--        remainingTime.value = calculateRemainingTime(quizAttempt.started_at, quiz.value.duration);-->
<!--        intervalId.value = startTimer(remainingTime.value, remainingTime, quizEnded);-->
<!--        currentQuestionIndex.value = quizAttempt ? quizAttempt.current_question_index : 0;-->
<!--        selectedOption.value = quizAttempt ? quizAttempt.selected_options[currentQuestionIndex.value] : null;-->
<!--    }-->

<!--    const answerQuestion = () => {-->
<!--        const questionId = currentQuestion.value.id;-->
<!--        const optionId = selectedOption.value;-->
<!--        Inertia.post('/quiz-attempts/answer', {-->
<!--            quiz_attempt_id: quizAttempt.value.id,-->
<!--            question_id: questionId,-->
<!--            option_id: optionId,-->
<!--        }).then(response => {-->
<!--            if (response.data.correct) {-->
<!--// Show a success message-->
<!--            } else {-->
<!--// Show an error message-->
<!--            }-->
<!--            currentQuestionIndex.value++;-->
<!--            selectedOption.value = null;-->
<!--            if (currentQuestionIndex.value >= quiz.value.questions.length) {-->
<!--                stopTimer(intervalId.value);-->
<!--                quizEnded.value = true;-->
<!--            }-->
<!--        });-->
<!--    };-->

<!--    const submitQuiz = () => {-->
<!--        stopTimer(intervalId.value);-->
<!--        Inertia.post('/quiz-attempts/submit', {-->
<!--            quiz_attempt_id: quizAttempt.value.id,-->
<!--        }).then(response => {-->
<!--// Redirect to the results page-->
<!--        });-->
<!--    };-->

<!--    const startQuiz = () => {-->
<!--        setQuizAttempt();-->
<!--    };-->

<!--    return {-->
<!--        quiz,-->
<!--        currentQuestionIndex,-->
<!--        selectedOption,-->
<!--        quizStarted,-->
<!--        quizEnded,-->
<!--        remainingTime,-->
<!--        setQuizAttempt,-->
<!--        currentQuestion,-->
<!--        answerQuestion,-->
<!--        submitQuiz,-->
<!--        startQuiz,-->
<!--    };-->
<!--};-->

<!--export default {-->
<!--    components: {-->
<!--        Link,-->
<!--    },-->
<!--    props: {-->
<!--        quizId: {-->
<!--            type: Number,-->
<!--            required: true,-->
<!--        },-->
<!--        quizAttempt: {-->
<!--            type: Object,-->
<!--            default: null,-->
<!--        },-->
<!--    },-->
<!--    setup(props) {-->
<!--        const {-->
<!--            quiz,-->
<!--            currentQuestionIndex,-->
<!--            selectedOption,-->
<!--            quizStarted,-->
<!--            quizEnded,-->
<!--            remainingTime,-->
<!--            setQuizAttempt,-->
<!--            currentQuestion,-->
<!--            answerQuestion,-->
<!--            submitQuiz,-->
<!--            startQuiz,-->
<!--        } = useQuiz(props.quizId, props.quizAttempt);-->

<!--        return {-->
<!--            quiz,-->
<!--            currentQuestionIndex,-->
<!--            selectedOption,-->
<!--            quizStarted,-->
<!--            quizEnded,-->
<!--            remainingTime,-->
<!--            setQuizAttempt,-->
<!--            currentQuestion,-->
<!--            answerQuestion,-->
<!--            submitQuiz,-->
<!--            startQuiz,-->
<!--        };-->
<!--    },-->
<!--};-->
<!--</script>-->
