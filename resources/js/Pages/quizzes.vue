<!--<div class="container-xxl flex-grow-1 container-p-y">-->
<!--<div class="container-fluid">-->
<!--    <h1 class="mt-4">Quizzes</h1>-->
<!--    <p class="lead">View all quizzes for this class.</p>-->
<!--    <table class="table table-hover">-->
<!--        <thead class="thead-dark">-->
<!--        <tr>-->
<!--            <th scope="col">Quiz Name</th>-->
<!--            <th scope="col">Subject</th>-->
<!--            <th scope="col">Date</th>-->
<!--            <th scope="col">Time Limit</th>-->
<!--            <th scope="col">Actions</th>-->
<!--        </tr>-->
<!--        </thead>-->
<!--        <tbody>-->
<!--        <tr>-->
<!--            <td> quiz.name </td>-->
<!--            <td> quiz.subject</td>-->
<!--            <td> quiz.date </td>-->
<!--            <td> quiz.timeLimit mins</td>-->
<!--            <td>-->
<!--                <a href="" class="btn btn-outline-primary btn-sm">Take Quiz</a>-->
<!--            </td>-->
<!--        </tr>-->

<!--        <tr>-->
<!--            <td> quiz.name </td>-->
<!--            <td> quiz.subject</td>-->
<!--            <td> quiz.date </td>-->
<!--            <td> quiz.timeLimit mins</td>-->
<!--            <td>-->
<!--                <a href="" class="btn btn-outline-primary btn-sm">Take Quiz</a>-->
<!--            </td>-->
<!--        </tr>-->

<!--        <tr>-->
<!--            <td> quiz.name </td>-->
<!--            <td> quiz.subject</td>-->
<!--            <td> quiz.date </td>-->
<!--            <td> quiz.timeLimit mins</td>-->
<!--            <td>-->
<!--                <a href="" class="btn btn-outline-primary btn-sm">Take Quiz</a>-->
<!--            </td>-->
<!--        </tr>-->

<!--        </tbody>-->
<!--    </table>-->
<!--</div>-->
<!--</div>-->





<!--        <div class="container-xxl flex-grow-1 container-p-y">-->
<!--            <h4 class="breadcrumb-wrapper py-3 mb-4">-->
<!--                <span class="text-muted fw-light">Hello /</span> Yousef-->

<!--            </h4>-->
<!--            <h4 v-show="can.IsTeacher">-->
<!--                <Link :href="`/subject/show/${12}`">-->
<!--                    <button type="button" class="btn rounded-pill btn-warning">Show Subjects</button>-->
<!--                </Link>-->
<!--            </h4>-->

<!--            <template  v-for="(question,indexQ) in questions" :key="question.id">-->
<!--            <div class="card mt-5">-->

<!--                <div class="table-responsive text-nowrap">-->
<!--                    <table class="table">-->
<!--                        <thead class="table-light">-->
<!--                        <tr>-->
<!--                            <th>Question {{indexQ+1}}</th>-->

<!--                        </tr>-->
<!--                        </thead>-->
<!--                        <h5 class="card-header"> {{question.name}} {{question.id}}</h5>-->
<!--                        <tbody class="table-border-bottom-0">-->

<!--                        <tr>-->

<!--                            <td>-->
<!--                                <form>-->

<!--                                    <template v-for="(option,indexO) in question.options" :key="option.id">-->
<!--                                <div  :class="['mb-2 form-check custom-option custom-option-basic  ' ] "  >-->
<!--                                    <label class="form-check-label custom-option-content" :for="indexQ+'customRadioTemp'+indexO">-->
<!--                                        <input-->
<!--                                            :name=question.id-->
<!--                                            class="form-check-input"-->
<!--                                            type="radio"-->
<!--                                           :value="option.id"-->
<!--                                            :id="indexQ+'customRadioTemp'+indexO"-->
<!--                                            @click="checkedValue=option.id"-->
<!--                                            v-model="form.answer[question.id]"-->
<!--                                        />-->
<!--&lt;!&ndash;                                            v-model="form.answer[question.id]"&ndash;&gt;-->

<!--                                        <span class="custom-option-header">-->
<!--                              <strong>{{option.name}} {{option.id}}</strong>-->

<!--                              </span>-->

<!--                                    </label>-->
<!--                                </div>-->
<!--                                    </template>-->

<!--                                </form>-->
<!--                            </td>-->


<!--                        </tr>-->



<!--                        </tbody>-->

<!--                    </table>-->

<!--                </div>-->

<!--            </div>-->
<!--            </template>-->
<!--            <button @click.prevent="submit" class="btn btn-primary m-2" type="submit">-->
<!--                <i class="bx bx-analyse"></i>-->
<!--                <span class="align-middle">Submit</span>-->
<!--            </button>-->

<!--        </div>-->


<!--<style scoped>-->
<!--.lead {-->
<!--    font-size: 1.2rem;-->
<!--}-->

<!--th {-->
<!--    font-weight: bold;-->
<!--    text-transform: uppercase;-->
<!--}-->

<!--td {-->
<!--    vertical-align: middle;-->
<!--}-->

<!--.btn-outline-primary {-->
<!--    border-color: #007bff;-->
<!--    color: #007bff;-->
<!--}-->

<!--.btn-outline-primary:hover {-->
<!--    background-color: #007bff;-->
<!--    color: #fff;-->
<!--}-->
<!--</style>-->
