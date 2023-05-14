<script>
import Master from "@/Pages/master.vue";
export default {
    layout:Master

}
</script>
<script setup>
import {reactive, ref, watch} from "vue";
import {Inertia} from "@inertiajs/inertia";
import {Link} from "@inertiajs/inertia-vue3";


let props = defineProps({
    errors :Object,
    Questions :Array,
    filters:Object,
    quiz:Number
})
let addQuestions =()=>{
    Inertia.get('/ques/create')
}


//////////////////////////////////////////////

const questionID = ref() ;

let toDisable = ref(0) ;

const isDisabled = ref(false) ;

let form = reactive({
    name : [''],
    questionID,
    correctAns :''
});

let ifNameErrorExist = (index) => {
    return !!props.errors['name.'+index];
};
const addRow = () => {
    toDisable.value +=1 ;
    form.name.push('');
}
const removeRow = (index) => {
    toDisable.value -=1 ;
    form.name.splice(index,1)
}
///////////////////////////////////////////////
let submit =()=>{
    Inertia.post('/options/add/', form )
}

let deleteQ=(id)=>{
    Inertia.delete(`/ques/delete/${id}`)
}
let search = ref(props.filters.search);


watch(search ,value => {
    Inertia.get(`/ques/show/${props.quiz}`,{search: value},
        {
            preserveScroll:false,
            replace:true,
            preserveState:true,
        }
    )
})
</script>


<template>


        <div class="container-xxl flex-grow-1 container-p-y">
            <h4 class="breadcrumb-wrapper py-3 mb-4">
                <span class="text-muted fw-light">Hello /</span> Yousef
            </h4>
            <!-- DataTable with Buttons -->
            <div class="card">
                <div class="card-datatable table-responsive pt-0">
                    <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper dt-bootstrap5 no-footer">
                        <div class="card-header flex-column flex-md-row">
                            <div class="head-label text-center">
                                <h5 class="card-title mb-0">DataTable with Buttons</h5>
                            </div>
                            <div class="dt-action-buttons text-end pt-3 pt-md-0">
                                <div class="dt-buttons">
                                    <button class="dt-button buttons-collection btn btn-label-primary dropdown-toggle me-2" tabindex="0" aria-controls="DataTables_Table_0" type="button" aria-haspopup="true" aria-expanded="false">
                                        <span>
                                            <i class="bx bx-export me-sm-2"></i>
                                            <span class="d-none d-sm-inline-block">Export</span>
                                        </span>
                                    </button>
                                    <button @click="addQuestions" class="dt-button create-new btn btn-primary" tabindex="0" aria-controls="DataTables_Table_0" type="button">
                                        <span><i class="bx bx-plus me-sm-2">

                                        </i> <span class="d-none d-sm-inline-block" >Add New Question</span>
                                        </span>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12 col-md-6">
                                <div class="dataTables_length" id="DataTables_Table_0_length">
                                    <label>Show
                                        <select name="DataTables_Table_0_length" aria-controls="DataTables_Table_0" class="form-select">
                                            <option value="7">7</option>
                                            <option value="10">10</option>
                                            <option value="25">25</option>
                                            <option value="50">50</option>
                                            <option value="75">75</option>
                                            <option value="100">100</option>
                                        </select> entries
                                    </label>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-6 d-flex justify-content-center justify-content-md-end">
                                <div id="DataTables_Table_0_filter" class="dataTables_filter">
                                    <label>Search:
                                        <input v-model="search" type="text" class="form-control" placeholder="search here" >
                                    </label>
                                </div>
                            </div>
                        </div>

                        <table class="datatables-basic table table-bordered dataTable no-footer dtr-column" id="DataTables_Table_0" role="grid" aria-describedby="DataTables_Table_0_info" style="width: 1266px;">
                            <thead>
                            <tr role="row">
                                <th class="control sorting_disabled" rowspan="1" colspan="1" style="width: 38px; display: none;" aria-label=""></th>
                                <th class="sorting_disabled dt-checkboxes-cell dt-checkboxes-select-all" rowspan="1" colspan="1" style="width: 42px;" data-col="1" aria-label="">
                                    <input type="checkbox" class="form-check-input"></th>
                                <th class="sorting">Questions</th>
                                <th class="sorting">Options</th>

                                <th class="sorting_disabled" style="width: 25%">Actions</th></tr>
                            </thead>
                            <tbody>
                            <td valign="top" v-if="!Questions.length " colspan="7" class="dataTables_empty">No data available in table</td>

                            <template v-for="(question,index) in Questions" :key="question.id" >
                                <tr class="odd">
                                    <!--                            <td valign="top" colspan="7" class="dataTables_empty">Loading...</td>-->

                                    <td>{{index+1}}</td>
                                    <td>{{question.name}}</td>
                                    <td>
                                        <div class="card-body">

                                            <div class="demo-inline-spacing">
                                                <div class="btn-group">
                                        <Link :href="`/options/show/${question.id}`">
                                        <button type="button" class="btn rounded-pill btn-warning">Show options</button>
                                        </Link>
                                                </div>
                                            </div>
                                        </div>

                                    </td>

                                    <td>
                                        <div class="card-body">

                                            <div class="demo-inline-spacing">
                                                <div class="btn-group">
                                                    <button  data-bs-toggle="offcanvas" data-bs-target="#offcanvasAddUser" type="button" class="btn rounded-pill btn-success " @click="questionID = question.id" >
                                                        Add options
                                                    </button>

                                                </div>
                                                <div class="btn-group">
                                                    <button @click="deleteQ(question.id)" type="button" class="btn rounded-pill btn-danger">
                                                        Delete
                                                    </button>

                                                </div>

                                            </div>
                                        </div>


                                    </td>

                                </tr>

                            </template>
                            </tbody>
                        </table>
                        <div class="row">
                            <div class="col-sm-12 col-md-6">
                                <div class="dataTables_info" id="DataTables_Table_0_info" role="status" aria-live="polite">Showing 0 to 0 of 0 entries</div>
                            </div>
                            <div class="col-sm-12 col-md-6">
                                <div class="dataTables_paginate paging_simple_numbers" id="DataTables_Table_0_paginate">
                                    <ul class="pagination">
                                        <li class="paginate_button page-item previous disabled" id="DataTables_Table_0_previous">
                                            <a href="#" aria-controls="DataTables_Table_0" data-dt-idx="0" tabindex="0" class="page-link">Previous</a>
                                        </li>
                                        <li class="paginate_button page-item next disabled" id="DataTables_Table_0_next">
                                            <a href="#" aria-controls="DataTables_Table_0" data-dt-idx="1" tabindex="0" class="page-link">Next</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Modal to add new record -->
            <div
                class="offcanvas offcanvas-end"
                tabindex="-1"
                id="offcanvasAddUser"
                aria-labelledby="offcanvasAddUserLabel"
            >
                <div class="offcanvas-header border-bottom">
                    <h6 id="offcanvasAddUserLabel" class="offcanvas-title">Add Options</h6>
                    <button
                        type="button"
                        class="btn-close text-reset"
                        data-bs-dismiss="offcanvas"
                        aria-label="Close"
                    ></button>
                </div>


                <div class="offcanvas-body flex-grow-0 mx-0">
                    <form class="add-new-user pt-0" id="addNewUserForm" >

                        <template v-for="(item,index) in form.name" :key="index" >
                        <div class="mb-3">

                            <label class="form-label" for="add-user-fullname">Options {{ index+1 }}</label>

                            <input
                                :class="ifNameErrorExist(index) ? 'border-danger' :''"
                                v-model="form.name[index]"
                                name="name"
                                type="text"
                                class="form-control"
                                id="add-user-fullname"
                                :placeholder="'Options'"

                            />
                            <div class="col-sm-6 mt-1">

                                <div class="switches-stacked">
                                    <label class="switch switch-square">
                                        <input type="radio" class="switch-input" name="switches-square-stacked-radio" :value="index" v-model="form.correctAns" >
                                        <span class="switch-toggle-slider">
                                <span class="switch-on"></span>
                                <span class="switch-off"></span>
                              </span>
                                        <span class="switch-label">Correct Answer</span>
                                    </label>


                                </div>
                            </div>
                                <button @click="removeRow(index)" class="btn btn-label-danger mt-4" type="button"  >
                                    <i class="bx bx-x"></i>
                                    <span class="align-middle">Delete</span>
                                </button>

                        </div>
                            <div class="mt-1 badge rounded-pill bg-label-danger "  v-if="props.errors['name.'+index]" v-text="props.errors['name.'+index]"  ></div>


                        </template>
                        <button  @click="addRow" :disabled="toDisable===3"   type="button" :class="['btn btn-primary data-submit me-1 me-sm-1', ]" >Add</button>
                        <button @click.prevent="submit" class="btn btn-primary data-submit me-1 me-sm-3">Submit</button>
                        <button type="reset" class="btn btn-label-secondary" data-bs-dismiss="offcanvas">Cancel</button>
                    </form>
                </div>
            </div>
            <!--/ DataTable with Buttons -->

            <hr class="container-m-nx my-5" />

        </div>

</template>
