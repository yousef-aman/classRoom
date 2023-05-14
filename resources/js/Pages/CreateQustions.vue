<script setup>
import Master from "@/Pages/master.vue";
import {computed, reactive, ref} from "vue";
import {Inertia} from "@inertiajs/inertia";
let props = defineProps({
    errors :Object
})
let form = reactive({
    name : [''],
});
let ifNameErrorExist = (index) => {
  return !!props.errors['name.'+index];
};

let submit= () => {
    Inertia.post('/ques/add', form)
}
const addRow = () => {
    form.name.push('')
}

const removeRow = (index) => {
    form.name.splice(index,1)
}
</script>


<template>
    <Master>
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="breadcrumb-wrapper py-3 mb-4">
            <span class="text-muted fw-light">Hello /</span> Yousef
        </h4>
    <div class="row">

        <!-- Form Repeater -->
        <div class="col-12">
            <div class="card">
                <h5 class="card-header">Form </h5>

                    <div class="card-body">

                    <form  class="form-repeater">
                        <template v-for="(item,index) in form.name" :key="index">
                            {{item}} - {{index}}
                        <div data-repeater-list="group-a">
                            <div data-repeater-item>
                                <div class="row">
                                    <div class="col-12 col-lg-6 col-xl-3 mb-0 mb-3">
                                        <label class="form-label" for="form-repeater-1-1">Question {{ index+1 }}</label>
                                        <input :class="ifNameErrorExist(index) ? 'border-danger' :''   " v-model="form.name[index]" type="text" name="name"  class="form-control " placeholder="Type the question"  />

                                        <div class="mt-1 badge rounded-pill bg-label-danger " v-if="props.errors['name.'+index]" v-text="props.errors['name.'+index]"  ></div>
                                    </div>
                                    <div class="d-flex col-12 col-lg-12 col-xl-2 align-items-center mb-0 mb-3">
                                        <button @click="removeRow(index)" class="btn btn-label-danger mt-4" type="button" >
                                            <i class="bx bx-x"></i>
                                            <span class="align-middle">Delete</span>
                                        </button>
                                    </div>
                                </div>
                                <hr />
                            </div>
                        </div>

                        </template>
                        <div class="mb-0 ">
                            <button  @click="addRow" class="btn btn-primary" type="button">
                                <i class="bx bx-plus"></i>
                                <span class="align-middle">Add</span>
                            </button>

                            <button @click.prevent="submit" class="btn btn-primary m-2" type="submit">
                                <i class="bx bx-analyse"></i>
                                <span class="align-middle">Submit</span>
                            </button>
                        </div>
                    </form>
                </div>


            </div>
        </div>
        <!-- /Form Repeater -->
    </div>
    </div>
    </Master>
</template>

