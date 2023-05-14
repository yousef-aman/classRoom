<script setup>
import { ref } from 'vue';
import {Inertia} from "@inertiajs/inertia";

let props =defineProps({
    quiz : Object,
    questions : Object,
    minutes :Number,
    seconds :Number
})

const quiz = {
    name: 'Example Quiz',
    formatted_available_date: '2022-05-01',
    available_time: 100, // 30 minutes in milliseconds
    questions: [
        {
            id: 1,
            title: 'Question 1',
            answers: [
                { id: 1, title: 'Answer 1' },
                { id: 2, title: 'Answer 2' },
                { id: 3, title: 'Answer 3' },
            ],
        },
        {
            id: 2,
            title: 'Question 2',
            answers: [
                { id: 4, title: 'Answer 4' },
                { id: 5, title: 'Answer 5' },
                { id: 6, title: 'Answer 6' },
            ],
        },
    ],
};

const countdownValue = ref(null);
const answers = ref(Array(quiz.questions.length).fill(null));
const submitSuccess = ref(null);
const submitError = ref(null);

const startCountdown = (availableTime) => {
    const intervalId = setInterval(() => {
        availableTime -= 1000;
        if (availableTime < 0) {
            clearInterval(intervalId);
            countdownValue.value = null;
            Inertia.get(`/classroom/quiz/attend?quiz_id=${props.quiz.id}`)
            return;
        }
        const minutes = Math.floor(availableTime / (1000 * 60));
        const seconds = Math.floor((availableTime / 1000) % 60);
        countdownValue.value = `${minutes}m ${seconds}s`;
    }, 1000);
};

startCountdown(props.minutes *1000*60);

const submitQuiz = () => {
    let allAnswered = true;
    for (let i = 0; i < answers.value.length; i++) {
        if (answers.value[i] ===null) {
            allAnswered = false;
            break;
        }
    }
    if (!allAnswered) {
        submitError.value = 'Please answer all questions before submitting.';
        return;
    }

// Simulate sending the answers to the server
    setTimeout(() => {
        const numCorrect = Math.floor(Math.random() * quiz.questions.length);
        submitSuccess.value = `You answered ${numCorrect} out of ${quiz.questions.length} questions correctly!`;
    }, 2000);
};
</script>

<template>

    <div class="container-xxl flex-grow-1 container-p-y">

        <div class="quiz-header">
            <h2 class="quiz-title">quiz</h2>
            <div class="quiz-info">
                <div class="quiz-countdown" v-if="countdownValue">
                    <p class="quiz-countdown-label text-body">Time remaining:</p>
                    <p class="quiz-countdown-value">{{ countdownValue }}</p>
                </div>
                <div class="quiz-time-info">
                    <h2 class="quiz-time-available ">{{ props.quiz.duration }} minutes</h2>
                    <p class="quiz-time-available-label">available from {{ props.quiz.available_date }}</p>
                </div>
            </div>
        </div>

        <form class="quiz-form" @submit.prevent="submitQuiz">
            <ol class="quiz-questions">
                <li v-for="(question, index) in props.questions" :key="question.id" class="quiz-question">
                    <h4 class="quiz-question-title">{{ question.name }}</h4>
                    <ul class="quiz-answers">
                        <li v-for="(option, answerIndex) in question.options" :key="option.id" class="quiz-answer">

                            <input type="radio" :id="`answer-${option.id}`" :name="`question-${question.id}`" :value="option.id" v-model="answers[index]" class="quiz-answer-input">
                            <label :for="`answer-${option.id}`" class="quiz-answer-label text-body">{{ option.name }}</label>

                        </li>
                    </ul>
                </li>
            </ol>

            <div class="quiz-footer">
                <button type="submit" class="quiz-submit-btn">Submit Answers</button>
                <div class="quiz-status">
                    <p v-if="submitSuccess" class="quiz-status-message quiz-success">{{ submitSuccess }}</p>
                    <p v-if="submitError" class="quiz-status-message quiz-error">{{ submitError }}</p>
                </div>
            </div>
        </form>

    </div>
</template>


<style scoped>

/* Quiz Wrapper */
.quiz-wrapper {
    max-width: 900px;
    margin: 0 auto;
    background-color: #fff;
    border-radius: 10px;
    box-shadow: 0 2px 6px rgba(0,0,0,0.3);
    padding: 50px;
}

/* Quiz Header */
.quiz-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 40px;
}

.quiz-title {
    font-size: 36px;
    font-weight: bold;
    margin: 0;
}

.quiz-info {
    display: flex;
    flex-direction: column;
    align-items: flex-end;
}

.quiz-countdown {
    display: flex;
    align-items: center;
    margin-bottom: 10px;
}

.quiz-countdown-label {
    font-size: 18px;
    margin-right: 10px;
    color: #555;
}

.quiz-countdown-value {
    font-size: 24px;
    font-weight: bold;
    color: #009688;
}

.quiz-time-info {
    display: flex;
    flex-direction: column;
    align-items: flex-end;
}

.quiz-time-available {
    font-size: 18px;
    margin-bottom: 10px;

}

.quiz-time-available-label {
    font-size: 14px;
    color: #888;
}


/* Quiz Questions */
.quiz-questions {
    list-style: none;
    margin: 0;
    padding: 0;
}

.quiz-question {
    margin-bottom: 40px;
}

.quiz-question-title {
    font-size: 24px;
    font-weight: bold;
    margin: 0;
}

.quiz-answers {
    list-style: none;
    margin: 20px 0 0 0;
    padding: 0;
}

.quiz-answer {
    margin-bottom: 10px;
    display: flex;
    align-items: center;
}

.quiz-answer-input {
    margin-right: 10px;
    appearance: none;
    width: 24px;
    height: 24px;
    border-radius: 50%;
    border: 2px solid #aaa;
    transition: all 0.3s ease;
}

.quiz-answer-input:checked {
    border-color: #009688;
    background-color: #009688;
}

.quiz-answer-label {
    font-size: 18px;
    color: #333;
}

/* Quiz Footer */
.quiz-footer {
    display: flex;
    justify-content: center;
    align-items: center;
    margin-top: 40px;
}

.quiz-submit-btn {
    background-color: #009688;
    color: #fff;
    border: none;
    border-radius: 5px;
    font-size: 18px;
    font-weight: bold;
    padding: 10px 20px;
    cursor: pointer;
    transition: all 0.3s ease;
}

.quiz-submit-btn:hover {
    background-color: #00796b;
}

.quiz-status {
    margin-left: 20px;
}

.quiz-status-message {
    font-size: 18px;
    font-weight: bold;
    margin: 0;
    padding: 10px;
    border-radius: 5px;
}

.quiz-success {
    background-color: #4caf50;
    color: #fff;
}

.quiz-error {
    background-color: #f44336;
    color: #fff;
}
</style>
